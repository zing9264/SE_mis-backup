
<script rel="script" type="application/javascript">
    function search() {
        window.location.href='index.php?tab=record_list&record_date='+document.getElementById('record_searchDate').value;
    }
</script>
<div  style="color: #3c3a3d">
    <nav class="navbar   navbar-dark nav-bg">
        <div class="container">
            <h1  class="col-12 small_title" style="color: #f4f4ef">差勤紀錄</h1>
        </div>
    </nav>

    <div class="p-3 bg-white rounded shadow-lg forLimitingListWidth" style="margin-bottom: 68.45px">

        <nav>
            <form>
                <ul class="pagination justify-content-center">
                    <li class="page-item "><a class="page-link" href="index.php?tab=record_list&record_date=<?php echo $ld;?>">&laquo;</a></li>
                    <li>
                        <div class="input-group mb-2">
                            <input id="record_searchDate" class="form-control" type="month" value="<?php echo $record_date;?>" onchange="search()">
                        </div>
                    </li>
                    <li class="page-item"><a class="page-link" href="index.php?tab=record_list&record_date=<?php echo $nd;?>">&raquo;</a></li>
                </ul>
            </form>
        </nav>
        <?php
            include_once "lib/Mission.php";
            /*
            if(isset($_GET['record_date']))$d=$_GET['record_date'];
            else $d=null;
            */

            foreach ($record_data_list as $value) {
                ?>

                <div class="media text-muted pt-3">
                    <div style="width:32px;height:32px;border-radius:5px;background-color: <?php echo $Mission->echo_punchcard_state_color($value['state']);?>;margin-right: 10px;"></div>
                    <!--綠色:上班，紅色:下班，天藍:出差，紫色:請假-->

                    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                        <strong class="d-block text-gray-dark"><?php echo $Mission->echo_punchcard_state($value['state']);?></strong>
                        時間:<?=$value['time'];?>
                    </p>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#record_MoreDetail_<?php echo $value['id'];?>">
                        更多
                    </button>
                </div>

                <?php
            }
        ?>
<!--
        <div class="media text-muted pt-3">
            <div style= "width:32px;height:32px;border-radius:5px;background-color: #c70700;margin-right: 10px;" ></div>
            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <strong class="d-block text-gray-dark">下班打卡</strong>
                時間:2017/12/25 下午 12:35
            </p>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#record_MoreDetail_02">更多</button>
        </div>

        <div class="media text-muted pt-3">
            <div style= "width:32px;height:32px;border-radius:5px;background-color: #17c2f2;margin-right: 10px;" ></div>
            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <strong class="d-block text-gray-dark">出差紀錄</strong>
                開始:2017/11/25  上午 9:00
                <br>
                結束:2017/11/25  下午 5:30
                <br>
                <span class="badge badge-success">核可</span>
                <!--<span class="badge badge-warning">審核中</span>-->  <!--審核中則用此標籤-->
        <!--
            </p>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#record_MoreDetail_03">更多</button>
        </div>

        <div class="media text-muted pt-3">
            <div style= "width:32px;height:32px;border-radius:5px;background-color: #cd66f4;margin-right: 10px;" ></div>
            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <strong class="d-block text-gray-dark">請假紀錄</strong>
                開始:2017/01/25  上午 9:00
                <br>
                結束:2017/01/25  下午 5:30
                <br>
                <span class="badge badge-danger">不核可</span>
            </p>
            <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#record_MoreDetail_04">更多</button>
        </div>
-->

        <small class="d-block text-right mt-3">

        </small>
</div>