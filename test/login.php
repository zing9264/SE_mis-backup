<?php
include_once ("header.php");
session_start();
?>
<!DOCTYPE html>
<head>
    <title>登入 - 差勤系統</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css" crossorigin="anonymous">
    <script src="lib/jquery/jquery-3.3.1.min.js"  crossorigin="anonymous"></script>

    <script src="lib/bootstrap/js/bootstrap.bundle.js"  crossorigin="anonymous"></script>
    <link rel="icon" href="" type="image/x-icon">

</head>
<body class="no-gutters">
<div class="row" style="margin-top:3rem;">
    <div class="col-md-4 m-auto align-middle">
        <div class="well col-md-10">
            <?php
            if(isset($_SESSION[md5("username")]) && $_SESSION[md5("username")]!=""){
                echo "<h3>以登入</h3>";
            }
            else {
                ?>
                <form action="function/login/auth.php" method="post">
                    <h3>使用者登入</h3>
                    <div class="input-group input-group-md">
                        <span class="input-group-addon" id=""><i class="glyphicon glyphicon-user"
                                                                 aria-hidden="true"></i></span>
                        <input type="text" name="user" id="user" class="form-control" placeholder="使用者名稱"
                               aria-describedby="sizing-addon1">
                    </div>
                    <div class="input-group input-group-md">
                        <span class="input-group-addon" id="sizing-addon1"><i
                                class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" name="pwd" id="pws" class="form-control" placeholder="密碼"
                               aria-describedby="sizing-addon1">
                    </div>

                    <button type="submit" class="btn btn-success btn-block">
                        登入
                    </button>
                </form>
                <?php
            }
            ?>

        </div>
    </div>

</div>
</body>