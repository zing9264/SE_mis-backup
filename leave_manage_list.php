<nav class="navbar   navbar-dark nav-bg">
    <div class="container">
        <h1  class=" col-12 small_title" >出差/請假審核</h1>
    </div>
</nav>

<div class="p-3 bg-white rounded shadow-lg forLimitingListWidth" >
    <h6 class="border-bottom border-gray pb-2 mb-0">出差/請假審核表</h6>

    <?php
    include_once "lib/Staff.php";
    include_once "lib/Mission.php";

    foreach ($leave_unchecked_data as $value) {

        ?>
        <div class="media text-muted pt-3 mb-0  border-bottom border-gray">
            <div style="width:32px;height:32px;border-radius:5px;background-color: #fd7e14;margin-right: 10px;"></div>
            <p class="media-body">
                <strong class="d-block text-gray-dark"><?php echo $Staff->sid_get_name($value['staff_id']);?></strong>
                <?php
                $Mission->get_leave_type($value['category']);
                ?>
                <span class="badge badge-warning">審核中</span>
            </p>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#leaveDetail_<?php echo $value['id'];?>">更多資訊</button>
        </div>
        <?php
    }
    ?>
    <!--
        <div class="media text-muted pt-3 mb-0  border-bottom border-gray">
            <div style= "width:32px;height:32px;border-radius:5px;background-color: #fd7e14;margin-right: 10px;" ></div>
            <p class="media-body">
                <strong class="d-block text-gray-dark">小熊維尼</strong>
                事假
                <span class="badge badge-success">核可</span>
            </p>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#leaveDetail">更多資訊</button>
        </div>

        <div class="media text-muted pt-3  mb-0  border-bottom border-gray">
            <div style= "width:32px;height:32px;border-radius:5px;background-color: #b21f2d;margin-right: 10px;" ></div>
            <p class="media-body">
                <strong class="d-block text-gray-dark">小熊維尼</strong>
                公差
                <span class="badge badge-danger">不核可</span>
            </p>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#travelDetail">更多資訊</button>
        </div>

        <div class="media text-muted pt-3  mb-0  border-bottom border-gray">
            <div style= "width:32px;height:32px;border-radius:5px;background-color: #6610f2;margin-right: 10px;" ></div>
            <p class="media-body">
                <strong class="d-block text-gray-dark">小熊維尼</strong>
                事假
                <span class="badge badge-warning">審核中</span>
            </p>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#leaveDetail">更多資訊</button>
        </div>

        <div class="media text-muted pt-3  mb-0  border-bottom border-gray">
            <div style= "width:32px;height:32px;border-radius:5px;background-color: #f45644;margin-right: 10px;" ></div>
            <p class="media-body">
                <strong class="d-block text-gray-dark">小熊維尼</strong>
                事假
                <span class="badge badge-warning">審核中</span>
            </p>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#leaveDetail">更多資訊</button>
        </div>

        <div class="media text-muted pt-3  mb-0  border-bottom border-gray">
            <div style= "width:32px;height:32px;border-radius:5px;background-color: #f78454;margin-right: 10px;" ></div>
            <p class="media-body">
                <strong class="d-block text-gray-dark">小熊維尼</strong>
                事假
                <span class="badge badge-warning">審核中</span>
            </p>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#leaveDetail">更多資訊</button>
        </div>
        <div class="media text-muted pt-3  mb-0  border-bottom border-gray">
            <div style= "width:32px;height:32px;border-radius:5px;background-color: #6610f2;margin-right: 10px;" ></div>
            <p class="media-body">
                <strong class="d-block text-gray-dark">小熊維尼</strong>
                事假
                <span class="badge badge-warning">審核中</span>
            </p>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#leaveDetail">更多資訊</button>
        </div>
-->



    <a href="" class="d-block text-right mt-3">更多</a>

</div>
