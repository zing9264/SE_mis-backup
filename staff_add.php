
<!--最下方導覽條-->
<?php //include_once("template/bottom_bar.php");?>
<div>
    <nav class="navbar   navbar-dark nav-bg text-center" >
        <div class="container">
            <h1  class="small_title col-12" style="color: #f4f4ef">新增人員</h1>
        </div>
    </nav>
</div>
<div id="main" class="pt-4 mb-5 pb-5">
    <div class="mt-auto mb-auto container">
        <h2>基本資料</h2>
    </div>
    <div class="container mt-auto mb-auto">


        <form method="post" action="function/staff/edit_staff.php" enctype="multipart/form-data">

            <div class="form-row">
                <div class="col-md-4 mb-auto">
                    <label for="account">帳號</label>
                    <input type="text" id="account" class="form-control" name="account" placeholder="Enter account" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="name">姓名:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name" required>
                </div>
                <div class="col-md-2 m-2 ">
                    <lable for="position_plus">職等</lable>
                    <select class="custom-select custom-select-lg h-50" id="position_plus" name="position_plus">
                        <option value="1">一</option>
                        <option value="2">二</option>
                        <option value="3">三</option>
                        <option value="4">四</option>
                        <option value="5">五</option>
                        <option value="6">六</option>
                        <option value="7">七</option>
                        <option value="8">八</option>
                        <option value="9">九</option>
                        <option value="10">十</option>
                        <option value="11">十一</option>
                        <option value="12">十二</option>
                        <option value="13">十三</option>
                        <option value="14">十四</option>
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
                <input type="date" class="form-control" id="birthday" placeholder="Enter your birthday" name="birthday">
            </div>
            <div class="form-group">
                <label for="ID">身分證字號:</label>
                <input type="text" class="form-control" id="ID" placeholder="Enter your ID" name="ID" required>
            </div>
            <div class="form-group">
                <label for="hometown">戶籍：</label>
                <input type="text" class="form-control" id="hometown" placeholder="Enter your hometown" name="hometown" required>
            </div>
            <div class="form-group">
                <label for="address">住址:</label>
                <input type="text" class="form-control" id="address" placeholder="Enter your address" name="address" required>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="phone_home">家用電話：</label>
                    <input type="tel" class="form-control" id="phone_home" placeholder="Your phone_home" name="phone_home">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="phone">手機：</label>
                    <input type="tel" class="form-control" id="phone" placeholder="Your phone" name="phone" required>
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
                <input type="email" class="form-control" id="Email" placeholder="Enter your Email" name="Email" required>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="emergency_contact">緊急聯絡人：</label>
                    <input type="text" class="form-control" id="emergency_contact" placeholder="姓名" name="emergency_contact" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="relationship">關係：</label>
                    <input type="text" class="form-control" id="emergency_relationship" placeholder="關係" name="emergency_relationship" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="emergency_phone">手機：</label>
                    <input type="tel" class="form-control" id="emergency_phone" placeholder="phone number" name="emergency_phone" required>
                </div>
            </div>
            <div class="form-group">
                <label for="detail">重大記事：</label>
                <textarea class="form-control" id="detail" placeholder="Some thing happen before?" name="detail"></textarea>
            </div>
            <div class="custom-file mb-3">
                <input type="file" class="custom-file-input" id="custom_photo" name="custom_photo" required>
                <label class="custom-file-label" for="customPhoto">照片</label>
            </div>
            <div class="form-group text-right">
                <button type="button" class="btn btn-lg btn-secondary" data-toggle="collapse" data-target="#staff_list_collapse" onclick="window.location.href='index.php?tab=staff_list'" >取消</button>
                <button class="btn btn-lg btn-primary">確認新增</button>
            </div>
        </form>
    </div>
</div>