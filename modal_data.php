
<!-- Modal START -->

<!--薪資互動視窗  底部彈出選單->薪資 -->
<?php if(isset($_GET['tab']) && strstr($_GET['tab'],"salary")!=null)require("modalData/salary_modal.php");?>

<!-- 出差請假審核 底部彈出選單->更多功能->出差請假審核 -->
<?php if(isset($_GET['tab']) && strstr($_GET['tab'],"leave")!=null)require("modalData/leave_manage_modal.php");?>

<!--一般職員用紀錄清單  底部彈出選單->紀錄 -->
<?php if(isset($_GET['tab']) && strstr($_GET['tab'],"record")!=null)require("modalData/record_list_modal.php");?>

<!--人事用管理紀錄清單  底部彈出選單->更多功能->差勤紀錄管理->查詢紀錄 -->
<?php if($Staff->check_permission('personnal') && (isset($_GET['tab']) && strstr($_GET['tab'],"record")!=null))require("modalData/record_target_member_modal.php");?>

<!--管理公告區 底部彈出選單->更多功能->公告管理 -->
<?php if($Staff->check_permission('personnal') && (isset($_GET['tab']) && strstr($_GET['tab'],"announcement")!=null))require("modalData/announcement_manage_modal.php");?>

<!-- Modal END -->
