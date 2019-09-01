<?php
include_once "header.php";
?>

<?php

	$id=$_GET['id'];

	include_once("lib/Announcement.php");
	$Announcement = new Announcement();
	$row=$Announcement->fetch_one($id);			// 獲取數據

?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>編輯公告</title>
    <!--        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0 user-scalable=no">
    -->        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="source/img/LOGO.png">
    <!-- Bootstrap core CSS -->
    <link href="lib/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/index.css" rel="stylesheet">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="lib/jquery/jquery-3.3.1.min.js"></script>
    <script src="lib/popper/popper.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script rel="script" type="application/javascript">
        function time_domain() {
            if(<?php if($row['etime']!='2037-12-31 23:59:59')echo 1;else echo 0;?>){
                document.getElementById('announcement_Edit_setTimeLimited').checked=true;
                document.getElementById('announcement_Edit_startTime').disabled=false;
                document.getElementById('announcement_Edit_endTime').disabled=false;
            }
        }
        
        function limit_time_check() {
            if(document.getElementById('announcement_Edit_setTimeLimited').checked){
                document.getElementById('announcement_Edit_startTime').disabled=false;
                document.getElementById('announcement_Edit_endTime').disabled=false;
            }
            else{
                document.getElementById('announcement_Edit_startTime').disabled=true;
                document.getElementById('announcement_Edit_endTime').disabled=true;
            }
        }
    </script>

</head>

<body class="text-center" onload="time_domain()">
<nav class="navbar   navbar-dark nav-bg">
    <div class="container text-center">
        <h1  class="small_title col-12" style="color: #f4f4ef">編輯公告</h1>
    </div>
</nav>

<div class="p-3 bg-white rounded shadow-lg forLimitingListWidth " >
    <h3 class="border-bottom border-gray pb-2 mb-0">編輯公告</h3>

    <form action="function/announcement_manage/edit_save.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id?>" />
        <div class="modal-body">
            <div class="form-group">
                <label for="announcement_Edit_title_1">標題</label>
                <input id=type="text" class="form-control" name="title" id="announcement_Edit_title_1" value="<?php echo $row['title'];?>">
            </div>
            <div class="form-group">
                <label for="announcement_Edit_textarea">內容</label>
                <textarea class="form-control" name="content" id="announcement_Edit_textarea_1" rows="10" ><?php echo $row['content'];?></textarea>
            </div>

            <div class=" col-12 mb-2" style="border-bottom: 1px solid #e9ecef">
            </div>

            <div class="form-check col-12 text-left ml-3">
                <input class="form-check-input" type="checkbox" name="check" value="true" id="announcement_Edit_setTimeLimited" onclick="limit_time_check()">
                <label class="form-check-label " for="announcement_Edit_setTimeLimited">
                    限時公告
                </label>
            </div>

            <div class="form-group  col-12 col-xl-6">
                <label for="announcement_Edit_startTime" >開始時間</label>
                <input type="datetime-local" class="form-control" name="startTime" disabled id="announcement_Edit_startTime"  value="<?php if($row['etime']!='2037-12-31 23:59:59')echo date("Y-m-d\TH:i",strtotime($row['stime']))?>">
            </div>

            <div class="form-group col-12 col-xl-6">
                <label for="announcement_Edit_endTime" >結束時間</label>
                <input type="datetime-local" class="form-control" name="endTime"  id="announcement_Edit_endTime" disabled value="<?php if($row['etime']!='2037-12-31 23:59:59')echo date("Y-m-d\TH:i",strtotime($row['etime']))?>">
            </div>



        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary"  onclick="location.href='index.php?tab=announcement_manage'">取消</button>
            <button type="submit" class="btn btn-primary" >編輯完成</button>
        </div>
    </form>
</div>
</body>

</html>