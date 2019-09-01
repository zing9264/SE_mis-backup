<?php
    $Staff=new Staff();
    class Staff{
        protected $permission,$permission_name;
        protected $dbc,$dbc_log,$Dbconnect;
        function __construct()
        {

            include_once 'Dbconnect.php';
            $this->Dbconnect=new Dbconnect();

            $this->permission=array(
                0 => 'staff',
                1 => 'personnal',
                2 => 'accountant',
                3 => 'manager',
                7 => 'login',
                9 => 'announcement',
                10 => 'staff_edit'
            );

            $this->permission_name=array();
            foreach ($this->permission as $x => $value){
                $this->permission_name[$value]=$x;
            }

        }

        function dbconnect(){
            $this->dbc=$this->Dbconnect->connect();
        }

        function dbconnect_log(){
            $this->dbc_log=$this->Dbconnect->connect_log();
        }

        function login($user,$pass){
            if($this->dbc==null)
                $this->dbconnect();
            $rs=$this->dbc->prepare("SELECT * FROM `staff` WHERE `username`=:u AND `password`=:p");
            $rs->bindValue(":u",$user);
            $rs->bindValue(":p",hash("sha512",$pass));
            $rs->execute();

            if($rs->rowCount()==1){
                $data=$rs->fetch();
                if(password_verify($pass, $data['salt'])){
                    session_start();
                    $_SESSION[md5('id')]=$data['id'];
                    $_SESSION[md5('username')]=$data['username'];
                    $_SESSION[md5('permission')]=$data['permission'];
                    return 0;
                }
                else
                    return 2;
            }
            else
                return 1;
        }

        function logout(){
            session_start();
            session_destroy();
        }

        function login_auth(){
            if(isset($_SESSION[md5('username')]) && isset($_SESSION[md5('permission')])){
                if($this->dbc==null)
                    $this->dbconnect();
                $rs=$this->dbc->prepare("SELECT * FROM `staff` WHERE `username`=:u AND `permission`=:p");
                $rs->bindValue(":u",$_SESSION[md5('username')]);
                $rs->bindValue(":p",$_SESSION[md5('permission')]);
                $rs->execute();

                if($rs->rowCount()==1){
                    $data=$rs->fetch();
                    $_SESSION[md5('id')]=$data['id'];
                    $_SESSION[md5('username')]=$data['username'];
                    $_SESSION[md5('permission')]=$data['permission'];
                    return 1;
                }
                else{
                    session_destroy();
                    return null;
                }
            }
            else{
                return null;
            }
        }

        function check_permission($permission_item){
            if(defined("DEBUG"))return true;
            if((1<<$this->permission_name[$permission_item]) & $_SESSION[md5('permission')]){
                return true;
            }
            else return false;
        }

        function permission_auth($permission_item,$path){
            if(!$this->check_permission($permission_item)){
                echo "<script rel='script' type='application/javascript'>alert('權限錯誤!');window.location.href='".$path."index.php';</script>";
            }
            return;
        }

        function new_staff($username,$name,$position_plus,$birthday,$ID,$hometown,$address,$phone_home,$phone,$phone_2,$Email,$emergency_contact,$emergency_relationship,$emergency_phone,$detail,$custom_photo){
            $result=$this->insert($username,$name,$position_plus,$birthday,$ID,$hometown,$address,$phone_home,$phone,$phone_2,$Email,$emergency_contact,$emergency_relationship,$emergency_phone,$detail,$custom_photo);
            if($result){
                if($this->dbc_log==null)
                    $this->dbconnect_log();
                $rs=$this->dbc_log->prepare('CREATE TABLE `'."punchcard_".$username.'` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `time` DATETIME NOT NULL , `state` INT(11) NOT NULL , `latitude` DOUBLE NOT NULL , `longitude` DOUBLE NOT NULL , `IP` CHAR(15) NOT NULL ,  `leave_id` INT(11) NOT NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB;');
                //$rs->bindValue(':n','punchcard_'.$username);
                $result=$rs->execute();
                if($result)
                    return 0;
                else
                    return 2;//Error 2 : fail to create staff log
            }//ALTER TABLE `punchcard_admin` ADD `latitude` DOUBLE NOT NULL AFTER `state`, ADD `longitude` DOUBLE NOT NULL AFTER `latitude`, ADD `IP` CHAR(15) NOT NULL AFTER `longitude`;
            else
                return 1;//Error 1 : function insert error

        }

        function insert($username,$name,$position_plus,$birthday,$ID,$hometown,$address,$phone_home,$phone,$phone_2,$Email,$emergency_contact,$emergency_relationship,$emergency_phone,$detail,$custom_photo){
            //$pass=substr(str_shuffle(md5(rand())),0,8);
            $pass='123456';
            if($this->dbc==null)
                $this->dbconnect();
            $rs=$this->dbc->prepare('INSERT INTO `staff` (`username`,`password`,`salt`,`permission`) VALUES (:u,:p,:s,385)');
            $rs->bindValue(':u',$username);
            $rs->bindValue(":p",hash("sha512",$pass));
            $rs->bindValue(":s",password_hash($pass, PASSWORD_DEFAULT, ['cost' => 11]));
            $result=$rs->execute();
            if($result==false){
                return 1;//Error 1 : insert table `staff` failed
            }
            $staff_id=$this->dbc->lastInsertId();
            if($this->dbc==null)
                $this->dbconnect();
            $rs=$this->dbc->prepare('INSERT INTO `staff_profile` (`staff_id`, `name`, `position_plus`, `birthday`, `ID`, `hometown`, `address`, `phone_home`, `phone`, `phone_2`, `Email`, `emergency_contact`, `emergency_relationship`, `emergency_phone`, `detail`, `custom_photo`) VALUES (:sid, :n, :pp, :b, :ID, :ht, :addr, :ph, :p, :p2, :E, :ec, :er, :ep, :detail, :photo)');
            $rs->bindValue(':sid',$staff_id);
            $rs->bindValue(':n',$name);
            $rs->bindValue(':pp',$position_plus);
            $rs->bindValue(':b',$birthday);
            $rs->bindValue(':ID',$ID);
            $rs->bindValue(':ht',$hometown);
            $rs->bindValue(':addr',$address);
            $rs->bindValue(':ph',$phone_home);
            $rs->bindValue(':p',$phone);
            $rs->bindValue(':p2',$phone_2);
            $rs->bindValue(':E',$Email);
            $rs->bindValue(':ec',$emergency_contact);
            $rs->bindValue(':er',$emergency_relationship);
            $rs->bindValue(':ep',$emergency_phone);
            $rs->bindValue(':detail',$detail);
            $rs->bindValue(':photo',$custom_photo);
            $result=$rs->execute();

            if($result==false){
                return 2;//Error 2 : insert table `staff_profile` failed
            }

            return $result;
        }

        function update($staff_id,$name,$position_plus,$birthday,$ID,$hometown,$address,$phone_home,$phone,$phone_2,$Email,$emergency_contact,$emergency_relationship,$emergency_phone,$detail,$custom_photo){
            if($this->dbc==null)
                $this->dbconnect();
            $rs=$this->dbc->prepare('UPDATE `staff_profile` SET `name`=:n, `position_plus`=:pp, `birthday`=:b, `ID`=:ID, `hometown`=:ht, `address`=:addr, `phone_home`=:ph, `phone`=:p, `phone_2`=:p2, `Email`=:E, `emergency_contact`=:ec, `emergency_relationship`=:er, `emergency_phone`=:ep, `detail`=:detail, `custom_photo`=:photo WHERE `staff_id`=:sid');
            $rs->bindValue(':n',$name);
            $rs->bindValue(':pp',$position_plus);
            $rs->bindValue(':b',$birthday);
            $rs->bindValue(':ID',$ID);
            $rs->bindValue(':ht',$hometown);
            $rs->bindValue(':addr',$address);
            $rs->bindValue(':ph',$phone_home);
            $rs->bindValue(':p',$phone);
            $rs->bindValue(':p2',$phone_2);
            $rs->bindValue(':E',$Email);
            $rs->bindValue(':ec',$emergency_contact);
            $rs->bindValue(':er',$emergency_relationship);
            $rs->bindValue(':ep',$emergency_phone);
            $rs->bindValue(':detail',$detail);
            $rs->bindValue(':photo',$custom_photo);
            $rs->bindValue(':sid',$staff_id);
            echo $result=$rs->execute();

            if($result==false){
                return 1;//Error 1 : update table `staff_profile` failed
            }

            return $result;
        }

        function change_password($old,$new){
            if($this->dbc==null)
                $this->dbconnect();
            $rs=$this->dbc->prepare("SELECT * FROM `staff` WHERE id=:id AND password=:p");
            $rs->bindValue(":id",$_SESSION[md5('id')]);
            $rs->bindValue(":p",hash("sha512",$old));
            $rs->execute();
            if($rs->rowCount()==1){
                $salt=$rs->fetch()['salt'];
                if(password_verify($old,$salt)){
                    $rs=$this->dbc->prepare('UPDATE  `staff` SET `password`=:p,`salt`=:s WHERE id=:id');
                    $rs->bindValue(':id',$_SESSION[md5('id')]);
                    $rs->bindValue(":p",hash("sha512",$new));
                    $rs->bindValue(":s",password_hash($new, PASSWORD_DEFAULT, ['cost' => 11]));
                    $result=$rs->execute();
                    if($result==false){
                        return 3;//Error 3 : Update table `staff` failed
                    }
                    else return 0;
                }
                else
                    return 2;//Error 2 : password salt verify failed
            }
            else
                return 1;//Error 1 : password incorrect
        }

        function sid_get_name($sid){
            if($this->dbc==null)
                $this->dbconnect();
            $rs=$this->dbc->prepare('SELECT `name` FROM `staff_profile` WHERE `staff_id`=:id');
            $rs->bindValue(':id',$sid);
            $rs->execute();
            $row=null;
            if($rs->rowCount()==1)$row=$rs->fetch()['name'];
            return $row;
        }

        function sid_get_username($sid){
            if($this->dbc==null)
                $this->dbconnect();
            $rs=$this->dbc->prepare('SELECT `username` FROM `staff` WHERE `id`=:id');
            $rs->bindValue(':id',$sid);
            $rs->execute();
            $row=null;
            if($rs->rowCount()==1)$row=$rs->fetch()['username'];
            return $row;
        }

        function sid_get_permission($sid){
            if($this->dbc==null)
                $this->dbconnect();
            $rs=$this->dbc->prepare('SELECT `permission` FROM `staff` WHERE `id`=:id');
            $rs->bindValue(':id',$sid);
            $rs->execute();
            $row=null;
            if($rs->rowCount()==1)$row=$rs->fetch()['permission'];
            return $row;
        }

        function get_the_list(){
            if($this->dbc==null)
                $this->dbconnect();
            $rs=$this->dbc->prepare('SELECT * FROM `staff_profile`');
            $rs->execute();

            return $rs->fetchAll();
        }

        function get_title($staff_id){
            if($this->dbc==null)
                $this->dbconnect();
            $rs=$this->dbc->prepare('SELECT `permission` FROM `staff` WHERE id=:n');
            $rs->bindValue(":n",$staff_id);
            $rs->execute();

            if($rs->rowCount()==1){
                $p=$rs->fetch()['permission'];
                if($p & 1<<3)return $this->permission[3];
                else if($p & 1<<2)return $this->permission[2];
                else if($p & 1<<1)return $this->permission[1];
                else return $this->permission[0];
            }else return 'error';
        }

        function power_update($sid,$permission){
            if($this->dbc==null)
                $this->dbconnect();
            $rs=$this->dbc->prepare('UPDATE `staff` SET `permission`=:p WHERE id=:n');
            $rs->bindValue(":p",$permission);
            $rs->bindValue(":n",$sid);
            $rs->execute();
        }

        function get_profile($staff_id){
            if($this->dbc==null)
                $this->dbconnect();
            $rs=$this->dbc->prepare('SELECT * FROM `staff_profile` WHERE staff_id=:n');
            $rs->bindValue(":n",$staff_id);
            $rs->execute();

            if($rs->rowCount()==1)return $rs->fetch();
            else return 0;
        }
    }