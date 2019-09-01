<?php
    $Announcement=new Announcement();
    class Announcement{
	
		function __construct()
        {
        
        }
	
		function rowcount(){
			
			include_once "Dbconnect.php";
			$db=new Dbconnect();
			$dbc=$db->connect();
			$rs=$dbc->prepare("SELECT * FROM `announcement_list` WHERE `stime` <= :dt AND `etime` >= :dt ORDER BY `istop` DESC,`INTIME` DESC");
			$rs->bindValue(":dt",date ("Y/m/d H:i:s"));
			$rs->execute();
			
			return $rs->rowCount();
		}
		
		function rowcount_manage(){
			
			include_once "Dbconnect.php";
			$db=new Dbconnect();
			$dbc=$db->connect();
			$rs=$dbc->prepare("SELECT * FROM `announcement_list` ORDER BY `istop` DESC,`INTIME` DESC");
			$rs->execute();
			
			return $rs->rowCount();
		}
	
		function page(&$pagesize, &$page, &$pagecount, &$start, &$end, &$i){
			
			$row_count = $this->rowcount();
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
		
		function content(&$start, &$pagesize){
			
			include_once "Dbconnect.php";
			$db=new Dbconnect();
			$dbc=$db->connect();
			$rs=$dbc->prepare("SELECT * FROM `announcement_list` WHERE `stime` <= ? AND `etime` >= ? ORDER BY `istop` DESC,`INTIME` DESC LIMIT ?,?");

			$datetime = date ("Y/m/d H:i:s");
			$rs->bindParam(1,$datetime);
			$rs->bindParam(2,$datetime);
			$rs->bindParam(3,$start,PDO::PARAM_INT);
			$rs->bindParam(4,$pagesize,PDO::PARAM_INT);

			$rs->execute();

			return $rs;
		}
		
		function content_manage(&$start, &$pagesize){
			
			include_once "Dbconnect.php";
			$db=new Dbconnect();
			$dbc=$db->connect();
			$rs=$dbc->prepare("SELECT * FROM `announcement_list` ORDER BY `istop` DESC,`INTIME` DESC LIMIT ".$start.",".$pagesize);
			$rs->bindValue(":dt",date ("Y/m/d H:i:s"));
			//$rs->bindValue(":st",$start);
			//$rs->bindValue(":p",$pagesize);
			$rs->execute();

			return $rs;
		}
	
		function save($title, $content, $stime, $etime){
			
			include_once "Dbconnect.php";
			$db=new Dbconnect();
			$dbc=$db->connect();
			$rs=$dbc->prepare("INSERT INTO `announcement_list` (`title`,`content`,`intime`,`stime`,`etime`) VALUES(:u,:c,:i,:st,:et)");
			$rs->bindValue(":i",date("Y-m-d G:i:s",time()));
			$rs->bindValue(":u",$title);
			$rs->bindValue(":c",$content);
			$rs->bindValue(":st",$stime);
			$rs->bindValue(":et",$etime);
			$result=$rs->execute();
			
			return $result;
		}

		function edit($title, $content, $stime, $etime, $id){
			
			include_once "Dbconnect.php";
			$db=new Dbconnect();
			$dbc=$db->connect();
			$rs=$dbc->prepare("UPDATE `announcement_list` SET `title`=:u,`content`=:c,`stime`=:st,`etime`=:et WHERE `id`=:i");
			//$sql="update announcement_list set title='$title',content='$content',stime='$stime',etime='$etime' where id=$id";
			$rs->bindValue(":u",$title);
			$rs->bindValue(":c",$content);
			$rs->bindValue(":st",$stime);
			$rs->bindValue(":et",$etime);
			$rs->bindValue(":i",$id);
			$result=$rs->execute();
			
			return $result;
		}
		
		function fetch_one($id){
		
			include_once "Dbconnect.php";
			$db=new Dbconnect();
			$dbc=$db->connect();
			$rs=$dbc->prepare("SELECT * FROM `announcement_list` WHERE `id`=:i");
			$rs->bindValue(":i",$id);
			$result=$rs->execute();
			$row=$rs->fetch(PDO::FETCH_ASSOC);			// 獲取數據

			return $row;
		}
	}