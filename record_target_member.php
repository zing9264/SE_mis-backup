<script rel="script" type="application/javascript">
    function search() {
        window.location.href='index.php?<?php
                if(stripos($_SERVER['QUERY_STRING'],'record_date'))
                    echo substr($_SERVER['QUERY_STRING'],0,stripos($_SERVER['QUERY_STRING'],'record_date')-1).'&record_date='.$nd;
                else
                    echo $_SERVER['QUERY_STRING'].'&record_date='.$nd;
                ?>&record_date='+document.getElementById('record_searchDate').value;
    }
</script>
<div  style="color: #3c3a3d">
    <nav class="navbar navbar-dark  nav-bg">
        <button class="btn navbar-dark " style="border: 2rem" data-toggle="collapse" data-target="#record_manage_collapse" onclick="window.location.href='index.php?tab=record_manage'">&laquo;</button>
        <span style="color: #f4f4ef">差勤紀錄:<?php echo $Staff->sid_get_name($_GET['staff_id']);?></span>

    </nav>

    <div class="p-3 bg-white rounded shadow-lg forLimitingListWidth" style="margin-bottom: 68.45px ;margin-bottom:transparent">

        <nav>
            <form>
                <ul class="pagination justify-content-center">
                    <li class="page-item "><a class="page-link" href="index.php?<?php
                        if(stripos($_SERVER['QUERY_STRING'],'record_date'))
                            echo substr($_SERVER['QUERY_STRING'],0,stripos($_SERVER['QUERY_STRING'],'record_date')-1).'&record_date='.$ld;
                        else
                            echo $_SERVER['QUERY_STRING'].'&record_date='.$ld;
                        ?>">&laquo;</a></li>
                    <li>
                        <div class="input-group mb-2">
                            <input id="record_searchDate" class="form-control" type="month" value="<?php echo $record_date;?>" onchange="search()">
                        </div>
                    </li>
                    <li class="page-item"><a class="page-link" href="index.php?<?php
                        if(stripos($_SERVER['QUERY_STRING'],'record_date'))
                            echo substr($_SERVER['QUERY_STRING'],0,stripos($_SERVER['QUERY_STRING'],'record_date')-1).'&record_date='.$nd;
                        else
                            echo $_SERVER['QUERY_STRING'].'&record_date='.$nd;
                        ?>">&raquo;</a></li>
                </ul>
            </form>
        </nav>
        <?php
        foreach ($record_target_data_list as $value) {
            ?>

            <div class="media text-muted pt-3">
                <div style="width:32px;height:32px;border-radius:5px;background-color: <?php echo $Mission->echo_punchcard_state_color($value['state']);?>;margin-right: 10px;"></div>
                <!--綠色:上班，紅色:下班，天藍:出差，紫色:請假-->

                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                    <strong class="d-block text-gray-dark"><?php echo $Mission->echo_punchcard_state($value['state']);?></strong>
                    時間:<?=$value['time'];?>
                </p>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#record_target_MoreDetail_<?php echo $value['id'];?>">
                    更多
                </button>
            </div>

            <?php
        }
        if(0) {
            ?>


            <div class="media text-muted pt-3">
                <div
                    style="width:32px;height:32px;border-radius:5px;background-color: #3efd41;margin-right: 10px;"></div>
                <!--綠色:上班，紅色:下班，天藍:出差，紫色:請假-->
                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                    <strong class="d-block text-gray-dark">上班打卡</strong>
                    時間:2017/8/25 上午 8:35
                </p>
                <button type="button" class="btn btn-info" data-toggle="modal"
                        data-target="#record_manage_MoreDetail_1">更多
                </button>
                <!--跳到modalData/record_target_member_modal.php -->
            </div>

            <div class="media text-muted pt-3">
                <div
                    style="width:32px;height:32px;border-radius:5px;background-color: #c70700;margin-right: 10px;"></div>
                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                    <strong class="d-block text-gray-dark">下班打卡</strong>
                    時間:2017/12/25 下午 12:35
                </p>
                <button type="button" class="btn btn-info" data-toggle="modal"
                        data-target="#record_manage_MoreDetail_2">更多
                </button>
                <!--跳到modalData/record_target_member_modal.php -->
            </div>

            <div class="media text-muted pt-3">
                <div
                    style="width:32px;height:32px;border-radius:5px;background-color: #17c2f2;margin-right: 10px;"></div>
                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                    <strong class="d-block text-gray-dark">出差紀錄</strong>
                    開始:2017/11/25 上午 9:00
                    <br>
                    結束:2017/11/25 下午 5:30
                    <br>
                    <span class="badge badge-success">已核可</span>
                    <!--<span class="badge badge-warning">審核中</span>-->  <!--審核中則用此標籤-->
                </p>
                <button type="button" class="btn btn-info" data-toggle="modal"
                        data-target="#record_manage_MoreDetail_3">更多
                </button>
                <!--跳到modalData/record_target_member_modal.php -->
            </div>

            <div class="media text-muted pt-3">
                <div
                    style="width:32px;height:32px;border-radius:5px;background-color: #cd66f4;margin-right: 10px;"></div>
                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                    <strong class="d-block text-gray-dark">請假紀錄</strong>
                    開始:2017/01/25 上午 9:00
                    <br>
                    結束:2017/01/25 下午 5:30
                    <br>
                    <span class="badge badge-danger">不核可</span>
                </p>
                <button type="button" class="btn btn-info" data-toggle="modal"
                        data-target="#record_manage_MoreDetail_4">更多
                </button>
                <!--跳到modalData/record_target_member_modal.php -->
            </div>
            <?php
        }
        ?>

    </div>