<?php
include "header.php";
if(!isset($_GET['staff_id']))
    echo '<script rel="script" type="application/javascript">alert("資料錯誤!");window.location.href="index.php?tab=staff_list";</script>';
else{
    $sid=$_GET['staff_id'];
    $data=$Staff->get_profile($sid);
    if($data==0)
        echo '<script rel="script" type="application/javascript">alert("查無資料!");window.location.href="index.php?tab=staff_list";</script>';
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>資料編輯</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    <script src="lib/jquery/jquery-3.3.1.min.js"></script>
    <script src="lib/popper/popper.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.js"></script>
    <link href="css/index.css" rel="stylesheet">
</head>
<body>
<div>
    <nav class="navbar   navbar-dark nav-bg text-center" >
        <div class="container">
            <h1  class="small_title col-12" style="color: #f4f4ef">修改資料</h1>
        </div>
    </nav>
</div>
<div class="mt-auto mb-auto container">
    <h2>基本資料</h2>
</div>
<div class="container mt-auto mb-auto">
    <form method="post" action="function/staff/edit_staff.php?staff_id=<?php echo $sid;?>" enctype="multipart/form-data">

        <div class="form-row">
            <div class="col-md-4 mb-auto">
                <label for="account">帳號 :</label>
                <!--<input type="text" id="account" class="form-control" name="account" placeholder="Enter account" required>-->
                <p class="col-6"><?php echo $Staff->sid_get_username($sid);?></p>
            </div>
            <div class="col-md-4 mb-3">
                <label for="name">姓名:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name" value="<?php echo $data['name'];?>" required>
            </div>
            <div class="col-md-2 m-2 ">
                <lable for="position_plus">職等</lable>
                <select class="custom-select custom-select-lg h-50" id="position_plus" name="position_plus">
                    <option value="1" <?php if($data['position_plus']==1)echo "selected";?>>一</option>
                    <option value="2" <?php if($data['position_plus']==2)echo "selected";?>>二</option>
                    <option value="3" <?php if($data['position_plus']==3)echo "selected";?>>三</option>
                    <option value="4" <?php if($data['position_plus']==4)echo "selected";?>>四</option>
                    <option value="5" <?php if($data['position_plus']==5)echo "selected";?>>五</option>
                    <option value="6" <?php if($data['position_plus']==6)echo "selected";?>>六</option>
                    <option value="7" <?php if($data['position_plus']==7)echo "selected";?>>七</option>
                    <option value="8" <?php if($data['position_plus']==8)echo "selected";?>>八</option>
                    <option value="9" <?php if($data['position_plus']==9)echo "selected";?>>九</option>
                    <option value="10" <?php if($data['position_plus']==10)echo "selected";?>>十</option>
                    <option value="11" <?php if($data['position_plus']==11)echo "selected";?>>十一</option>
                    <option value="12" <?php if($data['position_plus']==12)echo "selected";?>>十二</option>
                    <option value="13" <?php if($data['position_plus']==13)echo "selected";?>>十三</option>
                    <option value="14" <?php if($data['position_plus']==14)echo "selected";?>>十四</option>
                </select>
            </div>
        </div>
        <!--
        <div class="form-row">
            <div class="col-md-2 mb-3">
                <lable for="position">職位</lable>
                <select class="custom-select custom-select-lg mb-3" id="position">
                    <option value="1">員工</option>
                    <option value="2">人事</option>
                    <option value="3">主管</option>
                    <option value="4">訪客</option>
                </select>
            </div>

        </div>
        -->
        <div class="form-group">
            <label for="birthday">生日:</label>
            <input type="date" class="form-control" id="birthday" placeholder="Enter your birthday" name="birthday" value="<?php echo $data['birthday'];?>">
        </div>
        <div class="form-group">
            <label for="ID">身分證字號:</label>
            <input type="text" class="form-control" id="ID" placeholder="Enter your ID" name="ID" required value="<?php echo $data['ID'];?>">
        </div>
        <div class="form-group">
            <label for="hometown">戶籍：</label>
            <input type="text" class="form-control" id="hometown" placeholder="Enter your hometown" name="hometown" required value="<?php echo $data['hometown'];?>">
        </div>
        <div class="form-group">
            <label for="address">住址:</label>
            <input type="text" class="form-control" id="address" placeholder="Enter your address" name="address" required value="<?php echo $data['address'];?>">
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="phone_home">家用電話：</label>
                <input type="tel" class="form-control" id="phone_home" placeholder="Your phone_home" name="phone_home" value="<?php echo $data['phone_home'];?>">
            </div>
            <div class="col-md-4 mb-3">
                <label for="phone">手機：</label>
                <input type="tel" class="form-control" id="phone" placeholder="Your phone" name="phone" required value="<?php echo $data['phone'];?>">
            </div>
            <!--
            <div class="col-md-4 mb-3">
                <label for="phone2">手機2(if you have)：</label>
                <input type="tel" class="form-control" id="phone2" placeholder="Your phone2" name="phone_2">
            </div>
            !-->
        </div>
        <div class="form-group">
            <label for="Email">Email：</label>
            <input type="email" class="form-control" id="Email" placeholder="Enter your Email" name="Email" required value="<?php echo $data['Email'];?>">
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="emergency_contact">緊急聯絡人：</label>
                <input type="text" class="form-control" id="emergency_contact" placeholder="姓名" name="emergency_contact" required value="<?php echo $data['emergency_contact'];?>">
            </div>
            <div class="col-md-4 mb-3">
                <label for="relationship">關係：</label>
                <input type="text" class="form-control" id="emergency_relationship" placeholder="關係" name="emergency_relationship" required value="<?php echo $data['emergency_relationship'];?>">
            </div>
            <div class="col-md-4 mb-3">
                <label for="emergency_phone">手機：</label>
                <input type="tel" class="form-control" id="emergency_phone" placeholder="phone number" name="emergency_phone" required value="<?php echo $data['emergency_phone'];?>">
            </div>
        </div>
        <div class="form-group">
            <label for="detail">重大記事：</label>
            <textarea class="form-control" id="detail" placeholder="Some thing happen before?" name="detail"><?php echo $data['detail'];?></textarea>
        </div>
        <div class="custom-file mb-3">
            <input type="file" class="custom-file-input" id="custom_photo" name="custom_photo" value="<?php echo $data['custom_photo'];?>">
            <label class="custom-file-label" for="customPhoto">照片</label>
        </div>

        <div class="form-group text-right">
            <button type="button" class="btn btn-lg btn-secondary" onclick="location.href='index.php?tab=staff_list'">取消修改</button>
            <button class="btn btn-lg btn-primary">確認修改</button>
        </div>
    </form>
</div>