<?php
include_once "header.php";
include_once ('lib/Salary.php');
if($Staff->check_permission('personnal')){
    if(isset($_GET['salary_id'])){
        $salary_date=$Salary->get_salary_date($_GET['salary_id']);
        if($salary_date['state']!=0){
            header("Location:index.php?tab=salary_manage_list");
            exit;
        }
    }
    else{
        header("Location:index.php");
        exit;
    }
}
else{
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
        <script rel="script" type="application/javascript">
            var salary=parseInt(<?php echo $salary_date['salary'];?>);
            var sub=parseInt(<?php echo $Salary->sub_sum($salary_date['id']);?>);
            function change() {

                position_add        =parseInt(document.getElementById('position_add').value);
                profession_add      =parseInt(document.getElementById('profession_add').value);
                area_add            =parseInt(document.getElementById('area_add').value);
                other_add           =parseInt(document.getElementById('other_add').value);
                mutual_funds        =parseInt(document.getElementById('mutual_funds').value);
                resignation_reserve  =parseInt(document.getElementById('resignation_reserve').value);
                bonus               =parseInt(document.getElementById('bonus').value);
                add_sum=document.getElementById('add_sum').innerHTML=salary+position_add+profession_add+area_add+other_add;
                sub_sum=document.getElementById('sub_sum').innerHTML=mutual_funds+resignation_reserve+sub;
                document.getElementById('sum').innerHTML=add_sum-sub_sum+bonus;

            }
        </script>

    </head>


    <body class="text-center">
        <form action="function/salary/salary_send.php?salary_id=<?php echo $salary_date['id'];?>" method="post">
            <h2><?php echo $salary_date['year']."年 ".$salary_date['month']."月";?></h2>

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
                    <td><input type="number" class="form-control" placeholder="金額" name="position_add" id="position_add" value="<?php echo $salary_date['position_add'];?>" onchange="change();"></td>
                    <td><input type="number" class="form-control" placeholder="金額" name="profession_add" id="profession_add" value="<?php echo $salary_date['profession_add'];?>" onchange="change();"></td>
                    <td><input type="number" class="form-control" placeholder="金額" name="area_add" id="area_add" value="<?php echo $salary_date['area_add'];?>" onchange="change();"></td>
                    <td><input type="number" class="form-control" placeholder="金額" name="other_add" id="other_add" value="<?php echo $salary_date['other_add'];?>" onchange="change();"></td>
                    <td style="color:red;">0</td>
                    <td style="color:red;"><?php echo $Salary->LI($salary_date['salary']);?></td>
                    <td style="color:red;"><?php echo $Salary->HI($salary_date['salary']);?></td>
                    <!--
                    <td style="color:red;">250</td>
                    <td style="color:red;">250</td>
                    -->
                    <td style="color:red;"><input type="number" class="form-control" placeholder="金額" name="mutual_funds" id="mutual_funds" value="<?php echo $salary_date['mutual_funds'];?>" onchange="change();"></td>
                    <td style="color:red;"><input type="number" class="form-control" placeholder="金額" name="resignation_reserve" id="resignation_reserve" value="<?php echo $salary_date['resignation_reserve'];?>" onchange="change();"></td>
                    <td><span id="add_sum"><?php echo $Salary->should_sum($salary_date['id']);?></td>
                    <td style="color:red;" ><span id="sub_sum"><?php echo $Salary->sub_sum($salary_date['id']);?></span></td>
                    <td><input type="number" class="form-control" placeholder="金額" name="bonus" id="bonus" value="<?php echo $salary_date['bonus'];?>" onchange="change();"></td>
                    <td><span id="sum"><?php echo $Salary->salary_calcute($salary_date['id']);?></span></td>
                </tr>

                </tbody>
            </table>

            </div>
            <button type="button" class="btn btn-primary" onclick="self.location.href='index.php?tab=salary_manage_list'">返回</button>
            <button type="submit" class="btn btn-secondary">確認送出</button>
        </form>
    </body>



</html>