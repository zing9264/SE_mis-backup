<nav class="navbar   navbar-dark nav-bg">
    <div class="container" style="padding: 2px !important;">
        <h1  class="small_title col-12" style="color: #f4f4ef">權限管理</h1>
    </div>
</nav>


<div class="list-group container col-md-8 col-md-offset-2" style="width: 90%;margin-bottom: 68.75px">
    <form action="function/staff/power_update.php" method="post">
        <?php
        include_once "lib/Staff.php";
        $staff_data=$Staff->get_the_list();
        $i=1;
        foreach ($staff_data as $value) {

            ?>
            <a class="mt-auto mb-auto list-group-item flex-column align-items-start">
                <img src="source/img/head.jpg" style="height: 100px" class="float-left mr-3 ml-0">
                <p style="font-size:2rem">姓名： <?php echo $value['name'];?></p><!-- Post name here !-->
                <select class="custom-select custom-select-lg mb-3" id="position_<?php echo $i;?>" name="position_<?php echo $i;?>">
                    <option value="1">員工</option>
                    <option value="2" <?php if($Staff->sid_get_permission($value['staff_id']) & 2)echo 'selected';?>>人事</option>
                    <option value="3" <?php if($Staff->sid_get_permission($value['staff_id']) & 4)echo 'selected';?>>會計</option>
                    <option value="4" <?php if($Staff->sid_get_permission($value['staff_id']) & 8)echo 'selected';?>>主管</option>
                </select>
            </a>
            <input type="hidden" name="sid_<?php echo $i;?>" value="<?php echo $value['staff_id'];?>">
            <?php
            $i++;
        }
        ?>
        <div class="mt-auto mb-auto container col-md-8 col-md-offset-2">
            <center>
                <button type="button" class="btn btn-lg btn-secondary" data-toggle="collapse" data-target="#setting_list_collapse" onclick="location.href='index.php?tab=setting_list'">取消變更</button>
                <button class="btn btn-lg btn-primary">確認變更</button>
            </center>
        </div>
    </form>
</div>
