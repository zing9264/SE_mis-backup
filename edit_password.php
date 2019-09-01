<?php
    include_once "header.php";
    function show_message($message){
        echo '<script rel="script" type="application/javascript">alert("'.$message.'")</script>';
    }
    if(isset($_POST["submit"]) && $_POST["submit"]==1){
        $result=$Staff->change_password($_POST["old_password"],$_POST["new_password"]);
        switch ($result){
            case 0:
                show_message("修改成功!");
                break;
            case 1:
                show_message("Error 1 : password incorrect");
                break;
            case 2:
                show_message("Error 2 : password salt verify failed");
                break;
            case 3:
                show_message("Error 3 : Update table `staff` failed");
                break;
            default:
                show_message("Error 999 : Undefined error");
                break;
        }
    }
?>

<!doctype html>
<html xmlns="http://www.w3.org/1999/html">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="source/img/LOGO.png">

        <title>修改密碼</title>

        <!-- Bootstrap core CSS -->
        <link href="lib/bootstrap/css/bootstrap.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/login.css" rel="stylesheet">

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="lib/jquery/jquery-3.3.1.min.js"></script>
        <script src="lib/popper/popper.min.js"></script>
        <script src="lib/bootstrap/js/bootstrap.js"></script>
        <script rel="script" type="application/javascript">
            function check_second_pw() {
                var pw=document.getElementById("new_password");
                var pw_s=document.getElementById("compare_password");
                if(pw.value!=pw_s.value) {
                    alert("兩次密碼輸入不一致!");
                    pw.value="";
                    pw_s.value="";
                    return;
                }
                else {
                    if(confirm("確定修改?")) {
                        document.getElementById("pw_form").submit();
                    }
                }
            }
        </script>

    </head>

    <body class="text-center">
    <div class="container">
        <form method="post" action="" id="pw_form" name="pw_form" autocomplete="off">
            <div class="form-row mb-3">
                <div class="col-2"></div>
                <div class="col-8">
                    <lable for="old_password">確認舊密碼</lable>
                    <div >
                        <input type="password" class="form-control" id="old_password" name="old_password" placeholder="舊密碼" required>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>

            <div class="form-row mb-3">
                <div class="col-2"></div>
                <div class="col-8">
                    <lable for="new_password">設定新密碼</lable>
                    <div >
                        <input type="password" class="form-control" id="new_password" name="new_password" placeholder="新密碼" required>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>

            <div class="form-row mb-3">
                <div class="col-2"></div>
                <div class="col-8">
                    <lable for="compare_password">再一次輸入新密碼</lable>
                    <div>
                        <input type="password" class="form-control" id="compare_password" name="compare_password" placeholder="確認新密碼" required>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>

            <input type="hidden" name="submit" value="1">

            <div>
                <button type="button" class="btn btn-secondary btn-lg text-white mr-5"  onclick="location.href='index.php?tab=setting_list'">返回</button>
                <button onclick="check_second_pw()" class="btn btn-lg btn-dark text-white">送出修改</button>
            </div>
        </form>



    </div>

    </body>

</html>