<?php
include_once "header.php";
include_once ('lib/Salary.php');
if($Staff->check_permission('accountant')) {
    if (isset($_GET['salary_id'])) {
        $salary_date = $Salary->get_salary_date($_GET['salary_id']);
    } else {
        header("Location:index.php?tab=salary_manage_list");
        exit;
    }
}
else {
    header("Location:index.php");
    exit;
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

        <title>薪水明細</title>

        <!-- Bootstrap core CSS -->
        <link href="lib/bootstrap/css/bootstrap.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/login.css" rel="stylesheet">

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="lib/jquery/jquery-3.3.1.min.js"></script>
        <script src="lib/popper/popper.min.js"></script>
        <script src="lib/bootstrap/js/bootstrap.js"></script>

    </head>


    <body class="text-center">
    <div style="padding:15px;margin:15px;" class="table-responsive">

    <table class="table table-bordered" align="center">
        <thead>
        <tr class="table-secondary">
            <th colspan="3">基本資料</th>
            <th colspan="4">應發金額</th>
            <th colspan="5">代扣</th>
            <th rowspan="2" style="vertical-align: middle;">應發合計</th>
            <th rowspan="2" style="vertical-align: middle;">代扣合計</th>
            <th rowspan="2" style="vertical-align: middle;">獎金</th>
            <th rowspan="2" style="vertical-align: middle;">實發金額</th>
        </tr>

        <tr class="table-secondary">
            <th scope="col" style="vertical-align: middle;">職稱</th>
            <th scope="col" style="vertical-align: middle;">姓名</th>
            <!--<th scope="col" style="vertical-align: middle;">職等</th>-->
            <th scope="col" style="vertical-align: middle;">本俸</th>
            <th scope="col" style="vertical-align: middle;">職務加給</th>
            <th scope="col" style="vertical-align: middle;">專業加給</th>
            <th scope="col" style="vertical-align: middle;">地域加給</th>
            <th scope="col" style="vertical-align: middle;">其他</th>
            <th scope="col" style="vertical-align: middle;">公保費</th>
            <th scope="col" style="vertical-align: middle;">勞保費</th>
            <th scope="col" style="vertical-align: middle;">健保費</th>
            <!--
            <th scope="col" style="vertical-align: middle;">退撫金(機關)</th>
            <th scope="col" style="vertical-align: middle;">退撫金(個人)</th>
            -->
            <th scope="col" style="vertical-align: middle;">互助金</th>
            <th scope="col" style="vertical-align: middle;">離職儲金</th>
        </tr>
        </thead>
        <tbody>
        <tr class="table-light">
            <td scope="row"><?php echo $Staff->get_title($salary_date['staff_id']);?></td>
            <td><?php echo $Staff->sid_get_name($salary_date['staff_id']);?></td>
            <!--<td>一</td>-->
            <td><?php echo$salary_date['salary'];?></td>
            <td><?php echo $salary_date['position_add'];?></td>
            <td><?php echo $salary_date['profession_add'];?></td>
            <td><?php echo $salary_date['area_add'];?></td>
            <td><?php echo $salary_date['other_add'];?></td>
            <td style="color:red;">0</td>
            <td style="color:red;"><?php echo $Salary->LI($salary_date['salary']);?></td>
            <td style="color:red;"><?php echo $Salary->HI($salary_date['salary']);?></td>
            <td style="color:red;"><?php echo $salary_date['mutual_funds'];?></td>
            <td style="color:red;"><?php echo $salary_date['resignation_reserve'];?></td>
            <td><?php echo $Salary->should_sum($salary_date['id']);?></td>
            <td style="color:red;" ><?php echo $Salary->sub_sum($salary_date['id']);?></td>
            <td><?php echo $salary_date['bonus'];?></td>
            <td><?php echo $Salary->salary_calcute($salary_date['id']);?></td>
        </tr>

        </tbody>
    </table>

    </div>
    <button type="button" class="btn btn-primary" onclick="self.location.href='index.php?tab=salary_list'">返回</button>
    <a href="function/salary/salary_verify.php?salary_id=<?php echo $salary_date['id'];?>&state=0" class="btn btn-danger">不核可</a>
    <a href="function/salary/salary_verify.php?salary_id=<?php echo $salary_date['id'];?>&state=2" class="btn btn-secondary">核可</a>


    </body>



</html>