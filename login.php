<?php
    include_once ("header.php");
    if($_login==1)header("Location:index.php");
    if(isset($_POST['post'])){
        if(isset($_POST['inputAccount']) && isset($_POST['inputPassword'])) {
            $Login_state = $Staff->login($_POST['inputAccount'], $_POST['inputPassword']);

            if($Staff->login_auth()!=null){
                header("Location:index.php");
                exit;
            }
            else{
                echo "<script rel='script' type='application/javascript' >alert('登入失敗!');</script>";
            }

        }
        else{
            echo "<script rel='script' type='application/javascript' >alert('權限錯誤!');</script>";
        }
    }
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="source/img/LOGO.png">

        <title>登入 - 差勤系統</title>

        <!-- Bootstrap core CSS -->
        <link href="lib/bootstrap/css/bootstrap.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/login.css" rel="stylesheet">


    </head>

    <body class="text-center">


    <div  class="container d-flex p-3 h-100 mx-auto flex-column">
        <div class="mt-auto mb-auto" >
        <p class="mx-auto logo">差勤系統</p>
        </div>
        <div class="">
        <form class="form-signin" action="" method="post">
                <h3 class="h-3 mb-3 font-weight-normal" id="titleSignin">登入</h3>
                <label for="inputAccount" class="sr-only">Account</label>
                <input type="text" id="inputAccount" name="inputAccount" class="form-control" placeholder="Account" required autofocus>
                <label for="inputPassword" class="sr-only ">Password</label>
                <input type="password" id="inputPassword" name="inputPassword" class="form-control mt-2" placeholder="Password" required>
                <button class="btn btn-lg btn-color" type="submit" >login</button>
                <input type="hidden" name="post" value="1">
        </form>
        </div>
        <div class="mt-auto"></div>
    </div>
    </body>
</html>
