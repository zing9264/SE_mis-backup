<div id="data_view" >
    <!--NAV 底部選單-->
    <div  ><!--按一次打卡鈕使其他的頁面消失-->
        <div class="collapse <?php if(isset($_GET['tab']) && $_GET['tab']=='punchcard_list')echo 'show';elseif (!isset($_GET['tab']))echo 'show'?>" id="punchcard_collapse" data-parent="#data_view">
        </div>
    </div>
    <!--公告按鈕-->
    <?php
    if(isset($_GET['tab']) && $_GET['tab']=='announcement_list') {
        ?>
        <div>
            <div class="collapse <?php if (isset($_GET['tab']) && $_GET['tab'] == 'announcement_list') echo 'show'; ?>"
                 id="announcement_list_collapse" data-parent="#data_view">
                <div class="fixed-center"> <!--fixed-center:蓋住打卡又能滾動-->
                    <?php
                    require("announcement_list.php");
                    ?>
                </div>
            </div>
        </div>
        <?php
    }
    ?>

    <?php
    if(isset($_GET['tab']) && $_GET['tab']=='record_list') {
        ?>
        <!--差勤紀錄-->
        <div>
            <div class="collapse  <?php if (isset($_GET['tab']) && $_GET['tab'] == 'record_list') echo 'show'; ?> "
                 id="record_list_collapse" data-parent="#data_view">
                <div class="fixed-center">
                    <?php
                    require("record_list.php");
                    ?>
                </div>
            </div>
        </div>
        <?php
    }
    ?>

    <?php
    if(isset($_GET['tab']) && $_GET['tab']=='leave_front') {
        ?>
        <!--請假/出差 - 前導頁面-->
        <div>
            <div class="collapse <?php if (isset($_GET['tab']) && $_GET['tab'] == 'leave_front') echo 'show'; ?>"
                 id="leave_front_collapse" data-parent="#data_view">
                <div class="fixed-center">
                    <?php
                    require("leave_front.php");
                    ?>
                </div>
            </div>
        </div>
        <?php
    }
    ?>

    <?php
    if(isset($_GET['tab']) && $_GET['tab']=='leave_apply') {
        ?>
        <!--請假/出差申請-->
        <div>
            <div class="collapse <?php if (isset($_GET['tab']) && $_GET['tab'] == 'leave_apply') echo 'show'; ?>"
                 id="leave_apply_collapse" data-parent="#data_view">
                <div class="fixed-center">
                    <?php
                    require("leave_apply.php");
                    ?>
                </div>
            </div>
        </div>
        <?php
    }
    ?>

    <?php
    if(isset($_GET['tab']) && $_GET['tab']=='salary_list') {
        ?>
        <!--薪資-->
        <div>
            <div class="collapse <?php if (isset($_GET['tab']) && $_GET['tab'] == 'salary_list') echo 'show'; ?>"
                 id="salary_list_collapse" data-parent="#data_view">
                <div class="fixed-center">
                    <?php
                    require("salary_list.php");
                    ?>
                </div>
            </div>
        </div>
        <?php
    }
    ?>

    <?php
    if(isset($_GET['tab']) && $_GET['tab']=='complaint_list') {
        ?>
        <!--申訴-->
        <div>
            <div class="collapse <?php if (isset($_GET['tab']) && $_GET['tab'] == 'complaint_list') echo 'show'; ?>"
                 id="complaint_list_collapse" data-parent="#data_view">
                <div class="fixed-center">
                    <?php
                    require("complaint_list.php");
                    ?>
                </div>
            </div>
        </div>
        <?php
    }
    ?>

    <?php
    if(isset($_GET['tab']) && $_GET['tab']=='setting_list'){
    ?>
    <!--更多資訊-->
    <div >
        <div class="collapse <?php if(isset($_GET['tab']) && $_GET['tab']=='setting_list')echo 'show';?>" id="setting_list_collapse"  data-parent="#data_view">
            <div class="fixed-center">
                <?php
                require("setting_list.php");
                ?>
            </div>
        </div>
    </div>
    <?php
    }
    ?>

    <!--更多設定底下的選單setting setting setting-->


    <?php
    if($Staff->check_permission('personnal')) {
        if (isset($_GET['tab']) && $_GET['tab'] == 'staff_list') {
            ?>
            <!--人員管理-->
            <div>
                <div class="collapse <?php if (isset($_GET['tab']) && $_GET['tab'] == 'staff_list') echo 'show'; ?>"
                     id="staff_list_collapse" data-parent="#data_view">
                    <div class="fixed-center">
                        <?php
                        require("staff_list.php");
                        ?>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>

        <?php
        if (isset($_GET['tab']) && $_GET['tab'] == 'staff_add') {
            ?>
            <!--人員新增-->
            <div>
                <div class="collapse <?php if (isset($_GET['tab']) && $_GET['tab'] == 'staff_add') echo 'show'; ?>"
                     id="staff_add_collapse" data-parent="#data_view">
                    <div class="fixed-center">
                        <?php
                        require("staff_add.php");
                        ?>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    if($Staff->check_permission('manager')) {
        if (isset($_GET['tab']) && $_GET['tab'] == 'power_manage') {
            ?>


            <!--權限設定-->
            <div>
                <div class="collapse <?php if (isset($_GET['tab']) && $_GET['tab'] == 'power_manage') echo 'show'; ?>"
                     id="power_manage_collapse" data-parent="#data_view">
                    <div class="fixed-center">
                        <?php
                        require("power_manage.php");
                        ?>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    if($Staff->check_permission('personnal') || $Staff->check_permission('accountant')) {
        if (isset($_GET['tab']) && $_GET['tab'] == 'salary_manage_list') {
            ?>


            <!--薪資管理-->
            <div>
                <div
                    class="collapse <?php if (isset($_GET['tab']) && $_GET['tab'] == 'salary_manage_list') echo 'show'; ?>"
                    id="salary_manage_list_collapse" data-parent="#data_view">
                    <div class="fixed-center">
                        <?php
                        require("salary_manage_list.php");
                        ?>
                    </div>
                </div>
            </div>
            <?php
        }
    }
        if($Staff->check_permission('personnal')) {
            if (isset($_GET['tab']) && $_GET['tab'] == 'salary_input_list') {
                ?>
                <!--本薪設定-->
                <div>
                    <div
                        class="collapse <?php if (isset($_GET['tab']) && $_GET['tab'] == 'salary_input_list') echo 'show'; ?>"
                        id="salary_input_list_collapse" data-parent="#data_view">
                        <div class="fixed-center">
                            <?php
                            require("salary_input_list.php");
                            ?>
                        </div>
                    </div>
                </div>
                <?php
            }
    }
    if($Staff->check_permission('personnal')|| $Staff->check_permission('manager') || $Staff->check_permission('accountant')) {
        if (isset($_GET['tab']) && $_GET['tab'] == 'announcement_manage') {
            ?>

            <!--公告管理-->
            <div>
                <div
                    class="collapse <?php if (isset($_GET['tab']) && $_GET['tab'] == 'announcement_manage') echo 'show'; ?>"
                    id="announcement_manage_collapse" data-parent="#data_view">
                    <div class="fixed-center">
                        <?php
                        require("announcement_manage.php");
                        ?>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    if($Staff->check_permission('personnal')) {
        if (isset($_GET['tab']) && $_GET['tab'] == 'record_manage') {
            ?>

            <!--差勤紀錄管理-->
            <div>
                <div class="collapse <?php if (isset($_GET['tab']) && $_GET['tab'] == 'record_manage') echo 'show'; ?>"
                     id="record_manage_collapse" data-parent="#data_view">
                    <div class="fixed-center">
                        <?php
                        require("record_manage.php");
                        ?>
                    </div>
                </div>
            </div>
            <?php
        }
        if (isset($_GET['tab']) && $_GET['tab'] == 'record_target_member') {
            ?>

            <!--差勤特定人員目標-->
            <div>
                <div
                    class="collapse <?php if (isset($_GET['tab']) && $_GET['tab'] == 'record_target_member') echo 'show'; ?>"
                    id="record_target_member_collapse" data-parent="#data_view">
                    <div class="fixed-center">
                        <?php
                        require("record_target_member.php");
                        ?>
                    </div>
                </div>
            </div>
            <?php
        }
        if (isset($_GET['tab']) && $_GET['tab'] == 'leave_manage_list') {
            ?>

            <!--請假/出差核准-->
            <div>
                <div
                    class="collapse <?php if (isset($_GET['tab']) && $_GET['tab'] == 'leave_manage_list') echo 'show'; ?>"
                    id="leave_manage_list_collapse" data-parent="#data_view">
                    <div class="fixed-center">
                        <?php
                        require("leave_manage_list.php");
                        ?>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    if($Staff->check_permission('personnal') || $Staff->check_permission('manager') || $Staff->check_permission('accountant')) {
        if (isset($_GET['tab']) && $_GET['tab'] == 'complaint_manage') {
            ?>

            <!--申訴管理檢視-->
            <div>
                <div
                    class="collapse <?php if (isset($_GET['tab']) && $_GET['tab'] == 'complaint_manage') echo 'show'; ?>"
                    id="complaint_manage_collapse" data-parent="#data_view">
                    <div class="fixed-center">
                        <?php
                        require("complaint_manage.php");
                        ?>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    if($Staff->check_permission('manager')) {
        if (isset($_GET['tab']) && $_GET['tab'] == 'location_setting') {
            ?>


            <!--設定打卡位置-->
            <div>
                <div
                    class="collapse <?php if (isset($_GET['tab']) && $_GET['tab'] == 'location_setting') echo 'show'; ?>"
                    id="location_setting_collapse" data-parent="#data_view">
                    <div class="fixed-center">
                        <?php
                        require("location_setting.php");
                        ?>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    ?>


</div>