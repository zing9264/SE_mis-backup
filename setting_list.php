<div  style="color: #3c3a3d">
    <nav class="navbar   navbar-dark nav-bg">
        <div class="container">
            <h1  class="small_title col-12" style="color: #f4f4ef">更多功能</h1>
        </div>
    </nav>

    <div class="container-fluid" style="margin-bottom: 68.45px ;margin-bottom:transparent">

        <?php
        if($Staff->check_permission('personnal')|| $Staff->check_permission('manager') || $Staff->check_permission('accountant')) {
        ?>

        <div class="row pt-3">
            <div class="col-1"></div>
            <div class="col-10">
                <button type="button" class="btn btn-info  btn-block" data-toggle="collapse"
                        data-target="#announcement_manage_collapse" onclick="window.location.href='index.php?tab=announcement_manage'">公告管理
                </button>
            </div>
            <div class="col-1"></div>
        </div>
        <?php
        }
        if($Staff->check_permission('personnal')) {
            ?>
            <div class="row pt-3">
                <div class="col-1"></div>
                <div class="col-10">
                    <button type="button" class="btn btn-info  btn-block" data-toggle="collapse"
                            data-target="#staff_list_collapse" onclick="window.location.href='index.php?tab=staff_list'">人員管理
                    </button>
                </div>
                <div class="col-1"></div>
            </div>
            <?php
        }
        if($Staff->check_permission('manager')) {
            ?>


            <div class="row pt-3">
                <div class="col-1"></div>
                <div class="col-10">
                    <button type="button" class="btn btn-info  btn-block" data-toggle="collapse"
                            data-target="#power_manage_collapse" onclick="window.location.href='index.php?tab=power_manage'">權限管理
                    </button>
                </div>
                <div class="col-1"></div>
            </div>
            <?php
        }
        if($Staff->check_permission('personnal')) {
            ?>

            <div class="row pt-3">
                <div class="col-1"></div>
                <div class="col-10">
                    <button type="button" class="btn btn-info  btn-block" data-toggle="collapse"
                            data-target="#leave_manage_list_collapse" onclick="window.location.href='index.php?tab=leave_manage_list'">請假/出差審核
                    </button>
                </div>
                <div class="col-1"></div>
            </div>
            <?php
        }
        if($Staff->check_permission('personnal')) {
            ?>

        <div class="row pt-3">
            <div class="col-1"></div>
            <div class="col-10">
                <button type="button" class="btn btn-info  btn-block" data-toggle="collapse"
                        data-target="#record_manage_collapse" onclick="window.location.href='index.php?tab=record_manage'">差勤記錄管理
                </button>
            </div>
            <div class="col-1"></div>
        </div>
        <?php
        }
        if($Staff->check_permission('personnal')|| $Staff->check_permission('manager') || $Staff->check_permission('accountant')){
            ?>


            <div class="row pt-3">
                <div class="col-1"></div>
                <div class="col-10">
                    <button type="button" class="btn btn-info  btn-block" data-toggle="collapse"
                            data-target="#complaint_manage_collapse" onclick="window.location.href='index.php?tab=complaint_manage'">申訴管理
                    </button>
                </div>
                <div class="col-1"></div>
            </div>
            <?php
        }

        if($Staff->check_permission('personnal') || $Staff->check_permission('accountant')) {
            ?>

            <div class="row pt-3">
                <div class="col-1"></div>
                <div class="col-10">
                    <button type="button" class="btn btn-info  btn-block" data-toggle="collapse"
                            data-target="#salary_manage_list_collapse" onclick="window.location.href='index.php?tab=salary_manage_list'">薪資管理
                    </button>
                </div>
                <div class="col-1"></div>
            </div>
            <?php
        }

        if($Staff->check_permission('manager')) {
            ?>
            <div class="row pt-3">
                <div class="col-1"></div>
                <div class="col-10">
                    <button type="button" class="btn btn-info  btn-block" data-toggle="collapse"
                            data-target="#location_setting_collapse" onclick="window.location.href='index.php?tab=location_setting'">設定打卡位置
                    </button>
                </div>
                <div class="col-1"></div>
            </div>
            <?php
        }
        ?>

        <div class="row pt-3">
            <div class="col-1"></div>
            <div class="col-10 ">
                <button type="button" class="btn btn-info  btn-block" onclick="location.href='edit_password.php'">修改密碼</button>
            </div>
            <div class="col-1"></div>
        </div>


        <div class="row pt-3">
            <div class="col-1"></div>
            <div class="col-10">
                <a type="button" class="btn btn-danger btn-block" href="function/login/logout.php">登出</a>
            </div>
            <div class="col-1"></div>
        </div>

    </div>
</div>

