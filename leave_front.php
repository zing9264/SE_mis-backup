<nav class="navbar   navbar-dark nav-bg">
    <div class="container">
        <h1  class=" col-12 small_title" >出差/請假審核</h1>
    </div>
</nav>

<div class="p-3 bg-white rounded shadow-lg forLimitingListWidth" >


    <div class="form-row pb-3 border-bottom border-gray">
        <div class="col-md-12 pt-3 mb-0">
            <button type="button" class="btn btn-info col-10" data-toggle="collapse" data-target="#leave_apply_collapse" onclick="window.location.href='index.php?tab=leave_apply'">申請</button>
        </div>
    </div>

    <?php

        foreach ($leave_list as $value) {
            ?>

            <div class="media text-muted pt-3 mb-0  border-bottom border-gray">
                <div
                    style="width:32px;height:32px;border-radius:5px;background-color: #fd7e14;margin-right: 10px;"></div>
                <p class="media-body">
                    <strong
                        class="d-block text-gray-dark"><?php echo $Staff->sid_get_name($_SESSION[md5("id")]); ?></strong>
                    <?php
                        echo $Mission->get_leave_type($value['category']);
                    ?>
                    <?php
                        if($value['state']==1){
                            echo '<span class="badge badge-warning">審核中</span>';
                        }
                        else if($value['state']==2){
                            echo '<span class="badge badge-success">核可</span>';
                        }
                        else if($value['state']==3){
                            echo '<span class="badge badge-danger">不核可</span>';
                        }
                    ?>
                </p>
                <button type="button" class="btn btn btn-dark" data-toggle="modal" data-target="#leaveFrontDetail_<?php echo $value['id'];?>">
                    更多資訊
                </button>
            </div>
            <?php
        }
    ?>
<!--
        <div class="media text-muted pt-3  mb-0  border-bottom border-gray">
            <div style= "width:32px;height:32px;border-radius:5px;background-color: #b21f2d;margin-right: 10px;" ></div>
            <p class="media-body">
                <strong class="d-block text-gray-dark">小熊維尼</strong>
                公差
                <span class="badge badge-danger">不核可</span>
            </p>
            <button type="button" class="btn btn btn-dark" data-toggle="modal" data-target="#travelFrontDetail">更多資訊</button>
        </div>

        <div class="media text-muted pt-3  mb-0  border-bottom border-gray">
            <div style= "width:32px;height:32px;border-radius:5px;background-color: #6610f2;margin-right: 10px;" ></div>
            <p class="media-body">
                <strong class="d-block text-gray-dark">小熊維尼</strong>
                事假
                <span class="badge badge-warning">審核中</span>
            </p>
            <button type="button" class="btn btn btn-dark" data-toggle="modal" data-target="#leaveFrontDetail">更多資訊</button>
        </div>
-->
</div>
