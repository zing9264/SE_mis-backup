<?php
class Mission{
    protected $leave_type;
    protected $dbc=null,$dbc_log=null,$Dbconnect;
    
    function __construct(){
        include_once 'Dbconnect.php';
        $this->Dbconnect=new Dbconnect();

        $this->leave_type=array(
            1=>"事假",
            2=>"公假",
            3=>"病假",
            4=>"婚假",
            5=>"喪假",
            6=>"休假",
            7=>"生理假",
            8=>"家庭照顧假",
            9=>"產前假",
            10=>"陪產假",
            11=>"分娩假",
            12=>"流產假",
            13=>"慰勞假",
            128=>"公差"
        );
    }

    function dbconnect(){
        $this->dbc=$this->Dbconnect->connect();
    }

    function dbconnect_log(){
        $this->dbc_log=$this->Dbconnect->connect_log();
    }

    function get_leave_type($type=0){
        if($type==0)
            return $this->leave_type;
        else
            return $this->leave_type[$type];
    }

    function leave_apply($leave_category,$date_start,$date_end,$location,$reason,$document){
        if($this->dbc==null)
            $this->dbconnect();
        $rs=$this->dbc->prepare("INSERT INTO `leave_list` (`staff_id`,`state`,`category`,`date_start`,`date_end`,`location`,`reason`,`document`) VALUES (:id,1,:c,:ds,:de,:l,:r,:d)");
        $rs->bindValue(":id",$_SESSION[md5('id')]);
        $rs->bindValue(":c",$leave_category);
        $rs->bindValue(":ds",$date_start);
        $rs->bindValue(":de",$date_end);
        $rs->bindValue(":l",$location);
        $rs->bindValue(":r",$reason);
        $rs->bindValue(":d",$document);
        $reason = $rs->execute();
        if ($reason)return 1;
        else return 0;
    }

    function verify_leave($lid,$state){
        if($this->dbc==null)
            $this->dbconnect();
        $rs=$this->dbc->prepare("UPDATE `leave_list` SET `state`=:s WHERE `id`=:id");
        $rs->bindValue(":s",$state);
        $rs->bindValue(":id",$lid);
        $rs->execute();

    }

    function get_leave_list_unckecked(){
        if($this->dbc==null)
            $this->dbconnect();
        $rs=$this->dbc->prepare("SELECT * FROM `leave_list` WHERE `state`=1");
        $rs->execute();

        $row=$rs->fetchAll();
        return $row;
    }

    function get_leave_list_by_id($sid){
        if($this->dbc==null)
            $this->dbconnect();
        $rs=$this->dbc->prepare("SELECT * FROM `leave_list` WHERE `staff_id`=:id");
        $rs->bindValue(":id",$sid);
        $rs->execute();

        return $rs->fetchAll();
    }

    function get_leave_data($id){
        if($this->dbc==null)
            $this->dbconnect();
        $rs=$this->dbc->prepare("SELECT * FROM `leave_list` WHERE `id`=:id");
        $rs->bindValue(":id",$id);
        $rs->execute();
        return $rs->fetch();
    }

    function get_leave_category($leave_id){
        if($this->dbc==null)
            $this->dbconnect();
        $rs=$this->dbc->prepare("SELECT * FROM `leave_list` WHERE `id`=:id");
        $rs->bindValue(":id",$leave_id);
        $rs->execute();
        return $rs->fetch()['category'];
    }

    function get_leave_stime($leave_id){
        if($this->dbc==null)
            $this->dbconnect();
        $rs=$this->dbc->prepare("SELECT * FROM `leave_list` WHERE `id`=:id");
        $rs->bindValue(":id",$leave_id);
        $rs->execute();
        return $rs->fetch()['date_start'];
    }

    function get_GPS(){
        if($this->dbc==null)
            $this->dbconnect();
        $rs=$this->dbc->prepare("SELECT * FROM `location`");
        $rs->execute();
        if($rs->rowCount()==1)
            return $rs->fetch();
        else return $rs->rowCount();
    }

    function punchcard($latitude,$longitude,$ip,$state){
        $u=$_SESSION[md5('username')];
        if($this->dbc_log==null)
            $this->dbconnect_log();
        $rs=$this->dbc_log->prepare("INSERT INTO `punchcard_$u` (`time`,`state`,`latitude`,`longitude`,`IP`) VALUES (:t,:s,:la,:lo,:ip)");
        $rs->bindValue(":t",date("Y-m-d G:i:s",time()));
        $rs->bindValue(":s",$state);
        $rs->bindValue(":la",$latitude);
        $rs->bindValue("lo",$longitude);
        $rs->bindValue(":ip",$ip);
        $rs->execute();
    }

    function punchcard_leave($u,$state,$lid){
        if($this->dbc_log==null)
            $this->dbconnect_log();
        $rs=$this->dbc_log->prepare("INSERT INTO `punchcard_$u` (`time`,`state`,`leave_id`) VALUES (:t,:s,:lid)");
        $rs->bindValue(":t",$this->get_leave_stime($lid));
        $rs->bindValue(":s",$state);
        $rs->bindValue(":lid",$lid);
        $rs->execute();
    }

    function punchcard_state(){
        if($x=$this->check_leave_state()){
            return $x;
        }
        $u=$_SESSION[md5('username')];
        if($this->dbc_log==null)
            $this->dbconnect_log();
        $rs=$this->dbc_log->prepare("SELECT * FROM `punchcard_$u` WHERE `time` BETWEEN :s AND :e");
        $rs->bindValue(":s",date("Y-m-d G:i:s",strtotime('today')));
        $rs->bindValue(":e",date("Y-m-d G:i:s",strtotime('today+1day-1second')));
        $rs->execute();
        $conut=$rs->rowCount();
        if($conut==0)
            return 1;
        elseif($conut%2==1){
            return 2;
        }
        else return 1;
    }

    function punchcard_state_y(){
        $u=$_SESSION[md5('username')];
        if($this->dbc_log==null)
            $this->dbconnect_log();
        $rs=$this->dbc_log->prepare("SELECT * FROM `punchcard_$u` WHERE (`state`=1 OR `state`=2 ) AND `time` BETWEEN :s AND :e");
        $rs->bindValue(":s",date("Y-m-d G:i:s",strtotime('today-1day')));
        $rs->bindValue(":e",date("Y-m-d G:i:s",strtotime('today-1second')));
        $rs->execute();
        $conut=$rs->rowCount();
        if($conut==0)
            return 1;
        elseif($conut%2==1){
            return 2;
        }
        else return 1;
    }

    function check_leave_state(){
        if($this->dbc==null)
            $this->dbconnect();
        $rs=$this->dbc->prepare("SELECT * FROM `leave_list` WHERE `category`=128 AND `staff_id`=:id AND :time BETWEEN `date_start` AND `date_end` AND `state`=2");
        $rs->bindValue(":time",date("Y-m-d G:i:s",time()));
        $rs->bindValue(":id",$_SESSION[md5('id')]);
        $rs->execute();

        if($rs->rowCount()>0){
            $row=$rs->fetch();
            if($row['state']==2){
                if($row['category']==128)
                    return 128;
                else
                    return 1;
            }
            else
                return 0;
        }
        else return 0;
    }

    function get_record(){
        $u=$_SESSION[md5('username')];
        if($this->dbc_log==null)
            $this->dbconnect_log();
        $rs=$this->dbc_log->prepare("SELECT * FROM `punchcard_$u`");
        $rs->execute();
        return $rs->fetchAll();
    }

    function get_record_by_day($date=null){
        if($date==null)$date=time();
        else $date=strtotime($date);
        $u=$_SESSION[md5('username')];
        if($this->dbc_log==null)
            $this->dbconnect_log();
        $rs=$this->dbc_log->prepare("SELECT * FROM `punchcard_$u` WHERE `time` BETWEEN :d AND :dd");
        $rs->bindValue(":d",date("Y-m-d 0:0:0",$date));
        $rs->bindValue(":dd",date("Y-m-d G:i:s",mktime(23,59,59,date("m",$date),date("d",$date),date("Y",$date))));
        $rs->execute();
        return $rs->fetchAll();
    }

    function get_record_by_month($date=null){
        if($date==null)$date=time();
        else $date=strtotime($date);
        $u=$_SESSION[md5('username')];
        $sd=date("Y-m-01 00:00:00",$date);
        $tsd=strtotime($sd);
        $ed=date("Y-m-d G:i:s",mktime(0,0,0,date("m",$tsd)+1,1,date("Y",$tsd)));
        if($this->dbc_log==null)
            $this->dbconnect_log();
        $rs=$this->dbc_log->prepare("SELECT * FROM `punchcard_$u` WHERE `time` BETWEEN :d AND :dd");
        $rs->bindValue(":d",$sd);
        $rs->bindValue(":dd",$ed);
        $rs->execute();
        return $rs->fetchAll();
    }

    function get_record_target_by_month($date=null,$u){
        if($date==null)$date=time();
        else $date=strtotime($date);
        $sd=date("Y-m-01 00:00:00",$date);
        $tsd=strtotime($sd);
        $ed=date("Y-m-d G:i:s",mktime(0,0,0,date("m",$tsd)+1,1,date("Y",$tsd)));
        if($this->dbc_log==null)
            $this->dbconnect_log();
        $rs=$this->dbc_log->prepare("SELECT * FROM `punchcard_$u` WHERE `time` BETWEEN :d AND :dd");
        $rs->bindValue(":d",$sd);
        $rs->bindValue(":dd",$ed);
        $rs->execute();
        return $rs->fetchAll();
    }

    function get_target_record($record_id,$u){
        if($this->dbc_log==null)
            $this->dbconnect_log();
        $rs=$this->dbc_log->prepare("SELECT * FROM `punchcard_$u` WHERE `id`=:id");
        $rs->bindValue(":id",$record_id);
        $rs->execute();
        return $rs->fetch();
    }

    function edit_record($record_id,$u,$state,$time,$array){
        if($this->dbc_log==null)
            $this->dbconnect_log();
        $rs=$this->dbc_log->prepare("UPDATE `punchcard_$u` SET `state`=:s,`time`=:t,`latitude`=:la,`longitude`=:lo WHERE `id`=:id");
        $rs->bindValue(":s",$state);
        $rs->bindValue(":t",$time);
        $rs->bindValue(":la",$array[0]);
        $rs->bindValue(":lo",$array[1]);
        $rs->bindValue(":id",$record_id);
        $rs->execute();
    }

    function delete_record($record_id,$u){
        if($this->dbc_log==null)
            $this->dbconnect_log();
        $rs=$this->dbc_log->prepare("DELETE FROM `punchcard_$u` WHERE `id`=:id");
        $rs->bindValue(":id",$record_id);
        $rs->execute();
    }

    function echo_punchcard_state($state){
        switch ($state){
            case 1:
                return '上班打卡';
                break;
            case 2:
                return '下班打卡';
                break;
            case 3:
                return '請假紀錄';
                break;
            case 4:
                return '出差紀錄';
                break;
            case 128:
                return '出差打卡';
                break;
            default:
                return '錯誤';
                break;
        }
    }

    function echo_punchcard_state_color($state){
        switch ($state){
            case 1:
                return '#3efd41';
                break;
            case 2:
                return '#c70700';
                break;
            case 3:
                return '#cd66f4';
                break;
            case 4:
                return '#17c2f2';
                break;
            case 128:
                return '#17c2f2';
                break;
            default:
                return '錯誤';
                break;
        }
    }

    function location_setting($latitude,$longitude,$size){
        if($this->dbc==null)
            $this->dbconnect();
        $rs=$this->dbc->prepare("UPDATE `location` SET `latitude`=:la,`longitude`=:lo,`size`=:s WHERE `id`=1");
        $rs->bindValue(":la",$latitude);
        $rs->bindValue(":lo",$longitude);
        $rs->bindValue(":s",$size);
        $rs->execute();
    }
}
$Mission=new Mission();