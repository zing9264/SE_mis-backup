<nav class="navbar   navbar-dark nav-bg">
    <div class="container">
        <h1  class="small_title col-12" style="color: #f4f4ef">人員管理列表</h1>
    </div>
</nav>

<div class="list-group container col-md-8 col-md-offset-2" style="width: 90%;margin-bottom: 68.75px">
    <button class="mt-auto mb-auto list-group-item list-group-item-action flex-column align-items-center text-center" data-toggle="collapse" data-target="#staff_add_collapse" onclick="window.location.href='index.php?tab=staff_add'">
        <p style="font-size:1.5rem">新增人員</p>
    </button>
    <?php
    include_once "lib/Staff.php";
    $staff_data=$Staff->get_the_list();
    foreach ($staff_data as $value) {
        ?>
        <a href="staff_edit.php?staff_id=<?php echo $value['staff_id'];?>"
           class="mt-auto mb-auto list-group-item list-group-item-action flex-column align-items-start">
            <img src="source/img/head.jpg" style="height: 80px" class="float-left mr-3 ml-0">
            <p>姓名：<?php echo $value['name'];?></p><!-- Post name here !-->
            <p>職位：<?php echo $Staff->get_title($value['staff_id']);?></p><!-- Post position here !-->
        </a>

        <?php
    }
    /*
    <a href="staff_edit.php" class="mt-auto mb-auto list-group-item list-group-item-action flex-column align-items-start">
        <img src="source/img/head.jpg" style="height: 80px" class="float-left mr-3 ml-0">
        <p>姓名：</p><!-- Post name here !-->
        <p>職位：</p><!-- Post position here !-->
    </a>

    <a href="#" class="mt-auto mb-auto list-group-item list-group-item-action flex-column align-items-start">
        <img src="source/img/head.jpg" style="height: 80px" class="float-left mr-3 ml-0">
        <p>姓名：</p><!-- Post name here !-->
        <p>職位：</p><!-- Post position here !-->
    </a>
    <a href="#" class="mt-auto mb-auto list-group-item list-group-item-action flex-column align-items-start">
        <img src="source/img/head.jpg" style="height: 80px" class="float-left mr-3 ml-0">
        <p>姓名：</p><!-- Post name here !-->
        <p>職位：</p><!-- Post position here !-->
    </a>
    <a href="#" class="mt-auto mb-auto list-group-item list-group-item-action flex-column align-items-start">
        <img src="source/img/head.jpg" style="height: 80px" class="float-left mr-3 ml-0">
        <p>姓名：</p><!-- Post name here !-->
        <p>職位：</p><!-- Post position here !-->
    </a>
    <a href="#" class="mt-auto mb-auto list-group-item list-group-item-action flex-column align-items-start">
        <img src="source/img/head.jpg" style="height: 80px" class="float-left mr-3 ml-0">
        <p>姓名：</p><!-- Post name here !-->
        <p>職位：</p><!-- Post position here !-->
    </a>
    <a href="#" class="mt-auto mb-auto list-group-item list-group-item-action flex-column align-items-start">
        <img src="source/img/head.jpg" style="height: 80px" class="float-left mr-3 ml-0">
        <p>姓名：</p><!-- Post name here !-->
        <p>職位：</p><!-- Post position here !-->
    </a>
    <a href="#" class="mt-auto mb-auto list-group-item list-group-item-action flex-column align-items-start">
        <img src="source/img/head.jpg" style="height: 80px" class="float-left mr-3 ml-0">
        <p>姓名：</p><!-- Post name here !-->
        <p>職位：</p><!-- Post position here !-->
    </a>
    <a href="#" class="mt-auto mb-auto list-group-item list-group-item-action flex-column align-items-start">
        <img src="source/img/head.jpg" style="height: 80px" class="float-left mr-3 ml-0">
        <p>姓名：</p><!-- Post name here !-->
        <p>職位：</p><!-- Post position here !-->
    </a>
    <a href="#" class="mt-auto mb-auto list-group-item list-group-item-action flex-column align-items-start">
        <img src="source/img/head.jpg" style="height: 80px" class="float-left mr-3 ml-0">
        <p>姓名：</p><!-- Post name here !-->
        <p>職位：</p><!-- Post position here !-->
    </a>
    */
    ?>
    <div class="container mb-auto mt-auto" style="margin-bottom:20px">
        <button class="btn btn-lg btn-outline-secondary" data-toggle="collapse" data-target="#setting_list_collapse" onclick="window.location.href='index.php?tab=setting_list'">返回</button>
    </div>

</div>
