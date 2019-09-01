<?php
    include_once "header.php";
    include_once ('lib/Mission.php');
    include_once ('lib/Staff.php');
    if($Staff->check_permission('personnal')){
        if(isset($_GET['staff_id']) && isset($_GET['record_id'])){
            $punchcard_record=$Mission->get_target_record($_GET['record_id'],$Staff->sid_get_username($_GET['staff_id']));
        }
        else{
            header("Location:index.php?".substr($_SERVER['QUERY_STRING'],0,stripos($_SERVER['QUERY_STRING'],'record_id')-1));
            exit;
        }
    }
    else{
        header("Location:index.php?".substr($_SERVER['QUERY_STRING'],0,stripos($_SERVER['QUERY_STRING'],'record_id')-1));
        exit;
    }
?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>編輯公告</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0 user-scalable=no">
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

</head>

<body>

<nav class="navbar   navbar-dark nav-bg">
    <div class="container text-center">
        <h1  class="small_title col-12" style="color: #f4f4ef">修改紀錄</h1>
    </div>
</nav>

<div class="p-3 bg-white rounded shadow-lg forLimitingListWidth " >
    <h3 class="border-bottom border-gray pb-2 mb-0">修改打卡紀錄</h3>
    <div>
        <form method="post" action="function/punchcard/punchcard_edit.php?<?php echo $_SERVER['QUERY_STRING'];?>">
            <div class="form-group">
                <label for="record_type_1">類別:</label>
                <select  id="record_type_1" name="record_type_1"  class="form-control">
                    <option value="1">上班打卡</option>
                    <option value="2" <?php if($punchcard_record['state']==2)echo 'selected';?>>下班打卡</option>
                    <option value="128" <?php if($punchcard_record['state']==128)echo 'selected';?>>出差打卡</option>
                </select>
            </div>
            <div class="form-group">
                <label id="beginTime_label_1" for="beginTime_1">打卡時間:</label>
                <input id="beginTime_1" name="beginTime_1" class="form-control" type="datetime-local" value="<?php echo date("Y-m-d\TH:i:s",strtotime($punchcard_record['time']))?>" />
            </div>

            <div class="form-group">
                <label for="record_Gps_1">GPS紀錄</label>
                <input id="record_Gps_1" name="record_Gps_1" class="form-control" value="<?php echo $punchcard_record['latitude']."，".$punchcard_record['longitude'];?>"/>
            </div>
            <div  class="modal-footer" >
                <button type="button" class="btn btn-secondary"  onclick="location.href='index.php?<?php echo substr($_SERVER['QUERY_STRING'],0,stripos($_SERVER['QUERY_STRING'],'record_id')-1);?>'">取消</button>
                <button type="submit" class="btn btn-primary" >送出修改</button>
            </div>
        </form>
    </div>
</div>
</body>

</html>


