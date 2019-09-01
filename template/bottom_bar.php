<!--bottom_bar.php-->




<nav class="navbar fixed-bottom navbar-dark nav-bg "  style="z-index: 1035"  >
    <div class="container-fluid">


        <div class="collapse navbar-collapse " id="bottom_Nav_Content">
            <ul class="navbar-nav mr-auto" >
                <header class="masthead ">
                        <nav >
                            <div class="row nav  nav-masthead justify-content-center pr-2 pl-2" id="nav-collapse" role="tablist">
                                <button id="heading_announcement" class="nav-item nav-link col-4 col-lg-2" data-toggle="collapse" data-target="#announcement_list_collapse" onclick="window.location.href='index.php?tab=announcement_list'">
                                    <img src="./source/icon/announcement_white_18dp.png">
                                    <br>
                                    公告
                                </button>

                                <button  id="heading_record" class="nav-item nav-link col-4 col-lg-2 " data-toggle="collapse" data-target="#record_list_collapse" onclick="window.location.href='index.php?tab=record_list'">
                                    <img src="./source/icon/record_white_18dp.png">
                                    <br>
                                    紀錄
                                </button>
                                <button id="heading_punchcard" class="nav-item nav-link col-4 col-lg-2 "  data-toggle="collapse" data-target="#leave_front_collapse" onclick="window.location.href='index.php?tab=leave_front'">
                                    <img src="./source/icon/leave_white_18dp.png">
                                    <br>
                                    出差/請假
                                </button>
                                <button  id="heading_salary" class="nav-item nav-link col-4 col-lg-2 "  data-toggle="collapse" data-target="#salary_list_collapse" onclick="window.location.href='index.php?tab=salary_list'">
                                    <img src="./source/icon/salary_white_18dp.png">
                                    <br>
                                    薪資
                                </button>
                                <button id="headingpunchcard" class="nav-item nav-link col-4 col-lg-2 "  data-toggle="collapse" data-target="#complaint_list_collapse" onclick="window.location.href='index.php?tab=complaint_list'">
                                    <img src="./source/icon/report_white_18dp.png">
                                    <br>
                                    申訴
                                </button>
                                <button  id="headingrecord" class="nav-item nav-link col-4 col-lg-2 " data-toggle="collapse" data-target="#setting_list_collapse" onclick="window.location.href='index.php?tab=setting_list'">
                                    <img src="./source/icon/setting_white_18dp.png">
                                    <br>
                                    更多功能
                                </button>
                            </div>
                        </nav>
                </header>
            </ul>
        </div>
        <button id="heading_punchcard " class="nav-item nav-link col-9 "  data-toggle="collapse" data-target="#punchcard_collapse" >
                <img src="./source/icon/punchcard_white_18dp.png">  打卡
        </button>
        <button id="menu" class="navbar-toggler " type="button"  data-toggle="collapse" data-target="#bottom_Nav_Content"><!--.multi-collapse-->
                <span class="navbar-toggler-icon"></span>
        </button>

    </div>
</nav>

<script>
    $("button").click(function(){
        $("#bottom_Nav_Content").collapse( "hide" );
    });
</script>

<!--bottom_bar.php_end-->