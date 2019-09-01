<?php
include_once "header.php";
include_once ('lib/Mission.php');
include_once ('lib/Staff.php');
if($Staff->check_permission('personnal')){
    $staff_list=$Staff->get_the_list();
}
else{
    header("Location:index.php");
    exit;
}
?>
<script rel="script" type="application/javascript">
    function go_to_record(id=0) {
        if(id==0)id=document.getElementById('selectMemberName').value;
        location.href='index.php?tab=record_target_member&staff_id='+id;
    }
</script>

<nav class="navbar   navbar-dark nav-bg">
    <div class="container" style="padding: 2px !important;">
        <h1  class="small_title col-12" style="color: #f4f4ef">差勤紀錄管理</h1>
    </div>
</nav>


<div class="p-3 bg-white rounded shadow-lg forLimitingListWidth" style="margin-bottom: 68.75px">

    <div class="list-group container col-md-8 col-md-offset-2" style="width: 90%;">
        <h6 class="border-bottom border-gray pb-2 mb-0">選擇職員</h6>  <!--直接選擇-->
        <form class="form-inline">
            <div class="form-group ml-2 mr-2 mt-2 mb-2">
                <label for="memberSelect" class="sr-only">職員名稱:</label>
                <select id="selectMemberName" class="form-control" style="width: 10rem" id="memberSelect">
                    <?php
                    foreach ($staff_list as $value){
                        echo '<option value="'.$value["staff_id"].'">'.$value['name'].'</option>';
                    }
                    ?>
                </select>
            </div>
            <!--     <button type="submit"class="btn btn-primary mb-2 mt-2">查詢紀錄</button>  -->
            <button type="button" class="btn btn-primary mb-2 mt-2"  onclick="go_to_record();" >查詢紀錄</button>
        </form>

    </div>

    <h6 class="border-bottom border-gray pb-2 mt-3 mb-0">人員列表</h6>

    <div class="list-group container col-md-8 col-md-offset-2" style="width: 90%;">
        <?php
        foreach ($staff_list as $value) {
            ?>
            <btn class="mt-auto mb-auto list-group-item list-group-item-action flex-column align-items-start"
                 data-toggle="collapse" data-target="#record_target_member_collapse" onclick="go_to_record(<?php echo $value['staff_id'];?>);">
                <img src="https://via.placeholder.com/295X412" style="height: 100px" class="float-left mr-3 ml-0">
                <p>姓名：<?php echo $value['name'];?></p><!-- Post name here !-->
                <p>職位：<?php echo $Staff->get_title($value['staff_id']);?></p><!-- Post position here !-->
            </btn>
            <?php
        }
        ?>

    </div>



</div>