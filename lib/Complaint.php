<?php
    $Complaint=new Complaint();
    class Complaint{
	
		function __construct()
        {
        
        }
		
		function rowcount_manage(){
			
			include_once "Dbconnect.php";
			$db=new Dbconnect();
			$dbc=$db->connect();
			$rs=$dbc->prepare("SELECT * FROM `complaint` ORDER BY `INTIME` ASC");
			$rs->execute();
			
			return $rs->rowCount();
		}
	
		function page_manage(&$pagesize, &$page, &$pagecount, &$start, &$end, &$i){
			
			$row_count = $this->rowcount_manage();
			$pagecount=ceil($row_count/$pagesize);      	// 分頁總數
			$start=($page-1)*$pagesize;                     // 起始內容
			
			if($page-2 > 0)
				$i = $page-2;
			else
				$i = 1;
			if($page+2 <= $pagecount)
				$end = $page+2;
			else
				$end = $pagecount;
			
			if($i==1){
				if($pagecount>=5)
					$end = 5;
				else
					$end = $pagecount;
			}
			if($end==$pagecount && $i!=1){
				if( ($end-4)>0 )
					$i = $end-4;
				else
					$i = 1;
			}
		}
		
		function content_manage(&$start, &$pagesize){
			
			include_once "Dbconnect.php";
			$db=new Dbconnect();
			$dbc=$db->connect();
			$rs=$dbc->prepare("SELECT * FROM `complaint` ORDER BY `INTIME` ASC LIMIT ".$start.",".$pagesize);
			$rs->bindValue(":dt",date ("Y/m/d H:i:s"));
			//$rs->bindValue(":st",$start);
			//$rs->bindValue(":p",$pagesize);
			$rs->execute();

			return $rs;
		}
	
		function save($title, $content, $obj, $u){
			
			include_once "Dbconnect.php";
			$db=new Dbconnect();
			$dbc=$db->connect();
			$rs=$dbc->prepare("INSERT INTO `complaint` (`sender`,`title`,`content`,`obj`,`intime`) VALUES(:s,:t,:c,:o,:i)");
			$rs->bindValue(":s",$u);
			$rs->bindValue(":t",$title);
			$rs->bindValue(":c",$content);
			$rs->bindValue(":o",$obj);
			$rs->bindValue(":i",date("Y-m-d G:i:s",time()));
			$result=$rs->execute();
			
			return $result;
		}

	}