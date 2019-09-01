<?php
    include_once "header.php";
?>

<!DOCTYPE html>
<html lang="zh-TW">
    <head>
        <meta charset="UTF-8">
        <title>主頁</title>
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


    </head>

    <body  class="text-center">
    <!--最下方導覽條-->
   <?php include_once("template/bottom_bar.php");?>


    <div >
        <?php
            include_once "lib/Mission.php";
            include_once "lib/Salary.php";
            $leave_list=$Mission->get_leave_list_by_id($_SESSION[md5("id")]);
            $leave_unchecked_data=$Mission->get_leave_list_unckecked();
            $salary_list=$Salary->get_salary_list($_SESSION[md5('id')]);
        ?>
            <!--頁底放punchcard-->
           <?php require("punchcard_list.php");?>

            <!--存放modal(互動視窗)-->
            <?php include_once("modal_data.php");?>

            <!--摺頁各選單 七個按鈕內容-->
          <?php include_once("template/collapse_data.php");?>


    </div>
    </body>
</html>