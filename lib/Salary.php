<?php

$Salary=new Salary();

class Salary{
    protected $dbc;
    function __construct()
    {
        include_once ('Dbconnect.php');
        $Dbconnect=new Dbconnect();
        $this->dbc=$Dbconnect->connect();
    }

    function get_base_list(){
        include_once ("Staff.php");
        $Staff=new Staff();
        $list=$Staff->get_the_list();
        
        
        
        $rs=$this->dbc->prepare("SELECT * FROM `salary_base`");
        $rs->execute();
        $salary_list=array();
        foreach ($rs->fetchAll() as $value){
            $salary_list[$value['sid']]['base']=$value['value'];
        }


        foreach ($list as $value){
            if(isset($salary_list[$value['staff_id']]))
                continue;
            else{
                $rs=$this->dbc->prepare("INSERT INTO `salary_base` (`sid`, `value`) VALUES (:id, '0');");
                $rs->bindValue(":id",$value['staff_id']);
                $rs->execute();
                $salary_list[$value['staff_id']]['base']=0;
            }
        }
        return $salary_list;
    }

    function update_base($id,$value){
        include_once ('Dbconnect.php');
        
        
        $rs=$this->dbc->prepare("UPDATE `salary_base` SET `value`=:v WHERE `sid`=:id");
        $rs->bindValue(":v",$value);
        $rs->bindValue(":id",$id);
        $rs->execute();
    }

    function salary_output(){
        
        
        
        $rs=$this->dbc->prepare("DELETE FROM `salary` WHERE `state`=0");
        $rs->execute();
        $rs=$this->dbc->prepare("SELECT * FROM `salary_base`");
        $rs->execute();

        foreach ($rs->fetchAll() as $value){
            $rs2=$this->dbc->prepare("INSERT INTO `salary` (`staff_id`, `year`, `month`, `salary`) VALUES (:id, :y,:m,:s);");
            $rs2->bindValue(":id",$value['sid']);
            $rs2->bindValue(":s",$value['value']);
            $rs2->bindValue(":y",date("Y",time()));
            $rs2->bindValue(":m",date("m",time()));
            $rs2->execute();
        }
    }

    function get_salary_list_unckecked(){
        include_once ('Dbconnect.php');
        
        
        $rs=$this->dbc->prepare("SELECT * FROM `salary` WHERE `state`=0");
        $rs->execute();
        return $rs->fetchAll();
    }

    function get_salary_list_ckecked(){
        include_once ('Dbconnect.php');
        
        
        $rs=$this->dbc->prepare("SELECT * FROM `salary` WHERE `state`=1 OR `state`=2");
        $rs->execute();
        return $rs->fetchAll();
    }

    function get_salary_list($staff_id){
        include_once ('Dbconnect.php');
        
        
        $rs=$this->dbc->prepare("SELECT * FROM `salary` WHERE `staff_id`=:id AND `state`=2 ORDER BY `year` DESC,`month` DESC");
        $rs->bindValue(":id",$staff_id);
        $rs->execute();
        return $rs->fetchAll();
    }

    function salary_calcute($salary_id){
        include_once ('Dbconnect.php');
        
        
        $rs=$this->dbc->prepare("SELECT * FROM `salary` WHERE `id`=:id");
        $rs->bindValue(":id",$salary_id);
        $rs->execute();
        $s=$rs->fetch();

        return $s['salary']-$this->LI($s['salary'])-$this->HI($s['salary'])+$s['position_add']+$s['profession_add']+$s['area_add']+$s['other_add']-$s['mutual_funds']-$s['resignation_reserve']+$s['bonus'];
    }

    //人事確認後將資料寄給會計
    function salary_send($salary_id,$position_add,$profession_add,$area_add,$other_add,$mutual_funds,$resignation_reserve,$bonus){
        
        
        
        $rs=$this->dbc->prepare("UPDATE `salary` SET `state`=1,`position_add`=:poa,`profession_add`=:pfa,`area_add`=:aa,`other_add`=:oa,`mutual_funds`=:mf,`resignation_reserve`=:rr,`bonus`=:b WHERE `id`=:id");
        $rs->bindValue(":poa",$position_add);
        $rs->bindValue(":pfa",$profession_add);
        $rs->bindValue(":aa",$area_add);
        $rs->bindValue(":oa",$other_add);
        $rs->bindValue(":mf",$mutual_funds);
        $rs->bindValue(":rr",$resignation_reserve);
        $rs->bindValue(":b",$bonus);
        $rs->bindValue(":id",$salary_id);
        $rs->execute();
    }

    //會計核可
    function salary_verify($salary_id,$state){
        
        
        
        $rs=$this->dbc->prepare("UPDATE `salary` SET `state`=:s WHERE `id`=:id");
        $rs->bindValue(":s",$state);
        $rs->bindValue(":id",$salary_id);
        $rs->execute();
    }

    //應發合計
    function should_sum($salary_id){
        
        
        
        $rs=$this->dbc->prepare("SELECT * FROM `salary` WHERE `id`=:id");
        $rs->bindValue(":id",$salary_id);
        $rs->execute();
        $s=$rs->fetch();

        return $s['salary']+$s['position_add']+$s['profession_add']+$s['area_add']+$s['other_add'];
    }

    //應扣合計
    function sub_sum($salary_id){
        
        
        
        $rs=$this->dbc->prepare("SELECT * FROM `salary` WHERE `id`=:id");
        $rs->bindValue(":id",$salary_id);
        $rs->execute();
        $s=$rs->fetch();

        return $this->LI($s['salary'])+$this->HI($s['salary'])+$s['mutual_funds']+$s['resignation_reserve'];
    }

    //勞保計算
    function LI($value){
        $level=array(23100,24000,25200,26400,27600,28800,30300,31800,33300,34800,36300,38200,40100,42000,43900,45800);
        for ($i=0;$i<15;$i++){
            if ($value<=$level[$i]){
                return round($level[$i]*0.105*0.2);
            }
        }
        return round($level[15]*0.105*0.2);
    }

    //勞工退休金
    function LP($value){
        $group=array(1500,1200,0,1200,1500,1900,2400,3000,3700,4500,5400);
        $group2=array(2340,660,780,600,1167,961,1001,991,1100,900);
        $x=0;
        $z=1;
        for($i=0;$i<11;$i++){
            //echo "Group : ".($i+1)."<br/><br/>";
            if($i==2){
                for($j=0;$j<10;$j++){
                    $x+=$group2[$j];
                    //echo $z++." = ".$x."<br/>";
                    if($value<=$x)return $x;
                }
                continue;
            }
            if($i==3 || $i==8){
                for($j=1;$j<=4;$j++){
                    $x+=$group[$i];
                    //echo $z++." = ".$x."<br/>";
                    if($value<=$x)return $x;
                }
                continue;
            }
            if($i==10){
                for($j=1;$j<=7;$j++){
                    $x+=$group[$i];
                    //echo $z++." = ".$x."<br/>";
                    if($value<=$x)return $x;
                }
                continue;
            }
            for($j=1;$j<=5;$j++){
                $x+=$group[$i];
                //echo $z++." = ".$x."<br/>";
                if($value<=$x)return $x;
            }
        }
        //echo "<br/>";
        $x+=2100;
        //echo $z." = ".$x."<br/>";
        return $x;
    }

    //健保
    function HI($value){
        $group=array(900,1200,1500,1900,2400,3000,3700,4500,5400,6400);
        $x=23100;
        $rate=0.3*0.0469;
        $z=1;
        for($i=0;$i<10;$i++){
            //echo "Group : ".($i+1)."<br/><br/>";
            if($i==0){
                if($value<=$x)
                    //echo $z++." = ".$x."<br/>";
                    return round($x*$rate);
                $x+=$group[$i];
                //echo $z++." = ".$x."<br/>";
                if($value<=$x)return round($x*$rate);
                continue;
            }

            if($i==1 ||$i==6){
                for($j=1;$j<=4;$j++){
                    $x+=$group[$i];
                    //echo $z++." = ".$x."<br/>";
                    if($value<=$x)return round($x*$rate);
                }
                continue;
            }
            if($i==8){
                for($j=1;$j<=7;$j++){
                    $x+=$group[$i];
                    //echo $z++." = ".$x."<br/>";
                    if($value<=$x)return round($x*$rate);
                }
                $x+=2100;
                //echo $z++." = ".$x."<br/>";
                if($value<=$x)return round($x*$rate);
                continue;
            }
            for($j=1;$j<=5;$j++){
                $x+=$group[$i];
                //echo $z++." = ".$x."<br/>";
                if($value<=$x)return round($x*$rate);
            }
        }
        return round($x*$rate);
    }

    function get_salary_date($salary_id){
        
        
        
        $rs=$this->dbc->prepare("SELECT * FROM `salary` WHERE `id`=:id");
        $rs->bindValue(":id",$salary_id);
        $rs->execute();
        return $rs->fetch();
    }
}