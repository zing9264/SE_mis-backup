<nav class="navbar   navbar-dark nav-bg">
    <div class="container" style="padding: 2px !important;">
        <h1  class="small_title col-12" style="color: #f4f4ef">薪資管理</h1>
    </div>
</nav>



<div class="p-3 bg-white rounded shadow-lg forLimitingListWidth" style="margin-bottom: 68.45px" >

    <!--<h6 class="border-bottom border-gray pb-2 mb-0">薪資審核列表</h6>-->

    <div class="border-bottom border-gray pb-2 mb-0">
        <h6>薪資審核列表</h6>

        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <?php
                    if($Staff->check_permission('personnal')) {
                        echo '<button type="button" class="btn btn-secondary btn-sm" data-toggle="collapse" data-target="#salary_input_list_collapse" onclick="window.location.href=\'index.php?tab=salary_input_list\';">本薪設定</button> ';
                        echo '<a type="button" class="btn btn-secondary btn-sm" href="function/salary/salary_output.php">薪資輸出</a>';
                    }
                ?>

            </div>
            <div class="col-2"></div>
        </div>
    </div>
    <!--
    <div class="pb-2 mb-0 row">
        <div class="col-3"></div>
        <div class="col-6">薪資審核列表</div>
        <div class="col-3"></div>
        <div class="col-1"></div>

        <div class="col-3">
            <button type="button" class="btn btn-secondary btn-sm" data-toggle="collapse" data-target="#salary_input_list_collapse">本薪設定</button>
            <button type="button" class="btn btn-secondary btn-sm" >薪資輸出</button>
        </div>

    </div>
    -->

    <form>
        <?php
        include_once "lib/Salary.php";
        if($Staff->check_permission('personnal')){
            $salary_list=$Salary->get_salary_list_unckecked();
            foreach ($salary_list as $value) {
                ?>
                <div class="media text-muted pt-3  pb-3  border-bottom border-gray">
                    <div class="col-1"></div>
                    <div class="media-body col-11">
                        <strong class="d-block text-gray-dark"><?php echo $Staff->sid_get_name($value['staff_id']);?></strong>
                        <?php echo $value['year']?>年 <?php echo $value['month']?>月薪資 <?php echo $Salary->salary_calcute($value['id'])?>元
                    </div>
                    <button type="button" class="btn btn-info" onclick="self.location.href='salary_detail.php?salary_id=<?php echo $value['id'];?>'">詳細資訊
                    </button>
                </div>
                <?php
            }
        }
        if($Staff->check_permission('accountant')){
            $salary_list=$Salary->get_salary_list_ckecked();
            foreach ($salary_list as $value) {
                ?>
                <div class="media text-muted pt-3  pb-3  border-bottom border-gray">
                    <div class="col-1"></div>
                    <div class="media-body col-11">
                        <strong class="d-block text-gray-dark"><?php echo $Staff->sid_get_name($value['staff_id']);?></strong>
                        <?php echo $value['year']?>年 <?php echo $value['month']?>月薪資 <?php echo $Salary->salary_calcute($value['id'])?>元
                        <?php
                        if($value['state']==1)echo '<span class="badge badge-danger">未審核</span>';
                        else if($value['state']==2)echo '<span class="badge badge-success">已核可</span>';
                        ?>
                    </div>
                    <button type="button" class="btn btn-info" onclick="self.location.href='salary_detail_accountant.php?salary_id=<?php echo $value['id'];?>'">詳細資訊
                    </button>
                </div>
                <?php
            }
        }

        ?>
<!--
        <div class="media text-muted pt-3  pb-3  border-bottom border-gray">
            <div class="col-1"></div>
            <div class="media-body col-11">
                    <strong class="d-block text-gray-dark">小熊維尼</strong>
                    2018 2月薪資   27100元
                    <span class="badge badge-danger">未審核</span>
            </div>
            <button type="button" class="btn btn-info" onclick="self.location.href='salary_detail.php'">詳細資訊</button>
        </div>

        <div class="media text-muted pt-3  pb-3  border-bottom border-gray">
            <div class="col-1"></div>
            <div class="media-body col-11">
                <strong class="d-block text-gray-dark">小熊維尼</strong>
                2018 1月薪資   27100元
                <span class="badge badge-danger">未審核</span>
            </div>
            <button type="button" class="btn btn-info" onclick="self.location.href='salary_detail.php'">詳細資訊</button>
        </div>

        <div class="media text-muted pt-3  pb-3  border-bottom border-gray">
            <div class="col-1"></div>
            <div class="media-body col-11">
                <strong class="d-block text-gray-dark">小熊維尼</strong>
                2017 12月薪資   27100元
                <span class="badge badge-success">已核可</span>
            </div>
            <button type="button" class="btn btn-info" onclick="self.location.href='salary_detail.php'">詳細資訊</button>
        </div>

    </form>
    -->
<!--
    <div class="border-bottom border-gray pb-2 mb-0 row">
        <div class="col-2"></div>
        <div class="col-8">
            <button type="button" class="btn btn-secondary btn-sm" data-toggle="collapse" data-target="#salary_input_list_collapse">本薪設定</button>
            <button type="button" class="btn btn-secondary btn-sm" >薪資輸出</button>
        </div>
        <div class="col-2"></div>
    </div>

    <div class="media text-muted pt-3">
        <div style= "width:32px;height:32px;border-radius:5px;background-color: #fd7e14;margin-right: 10px;" ></div>
        <p class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">XXX</strong>
            2018 2月薪資   27100元
            <span class="badge badge-danger">未審核</span>
        </p>

        <button type="button" class="btn btn-info" onclick="self.location.href='salary_detail.php'">詳細資訊</button>
    </div>

    <div class="media text-muted pt-3">
        <div style= "width:32px;height:32px;border-radius:5px;background-color: #b21f2d;margin-right: 10px;" ></div>
        <p class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">XXX</strong>
            2018 1月薪資   27100元
            <span class="badge badge-success">已核可</span>
        </p>
        <button type="button" class="btn btn-info">詳細資訊</button>
    </div>

    <div class="media text-muted pt-3">
        <div style= "width:32px;height:32px;border-radius:5px;background-color: #6610f2;margin-right: 10px;" ></div>
        <p class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">小標題</strong>
            內文
        </p>
        <button type="button" class="btn btn-info">詳細資訊</button>
    </div>

    <div class="media text-muted pt-3">
        <div style= "width:32px;height:32px;border-radius:5px;background-color: #f45644;margin-right: 10px;" ></div>
        <p class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">小標題</strong>
            內文
        </p>
        <button type="button" class="btn btn-info">詳細資訊</button>
    </div>

    <div class="media text-muted pt-3">
        <div style= "width:32px;height:32px;border-radius:5px;background-color: #f78454;margin-right: 10px;" ></div>
        <p class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">小標題</strong>
            內文
        </p>
        <button type="button" class="btn btn-info">詳細資訊</button>
    </div>

    <div class="media text-muted pt-3">
        <div style= "width:32px;height:32px;border-radius:5px;background-color: #fd3214;margin-right: 10px;" ></div>
        <p class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">小標題</strong>
            內文
        </p>
        <button type="button" class="btn btn-info">詳細資訊</button>
    </div>

    <div class="media text-muted pt-3">
        <div style= "width:32px;height:32px;border-radius:5px;background-color: #fd7e14;margin-right: 10px;" ></div>
        <p class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">小標題</strong>
            內文
        </p>
        <button type="button" class="btn btn-info">詳細資訊</button>
    </div>

    <div class="media text-muted pt-3">
        <div style= "width:32px;height:32px;border-radius:5px;background-color: #fd7e14;margin-right: 10px;" ></div>
        <p class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">小標題</strong>
            內文
        </p>
        <button type="button" class="btn btn-info">詳細資訊</button>
    </div>

    <div class="media text-muted pt-3">
        <div style= "width:32px;height:32px;border-radius:5px;background-color: #b21f2d;margin-right: 10px;" ></div>
        <p class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">小標題</strong>
            內文
        </p>
        <button type="button" class="btn btn-info">詳細資訊</button>
    </div>

    <div class="media text-muted pt-3">
        <div style= "width:32px;height:32px;border-radius:5px;background-color: #6610f2;margin-right: 10px;" ></div>
        <p class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">小標題</strong>
            內文
        </p>
        <button type="button" class="btn btn-info">詳細資訊</button>
    </div>

    <div class="media text-muted pt-3">
        <div style= "width:32px;height:32px;border-radius:5px;background-color: #f45644;margin-right: 10px;" ></div>
        <p class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">小標題</strong>
            內文
        </p>
        <button type="button" class="btn btn-info">詳細資訊</button>
    </div>

    <div class="media text-muted pt-3">
        <div style= "width:32px;height:32px;border-radius:5px;background-color: #f78454;margin-right: 10px;" ></div>
        <p class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">小標題</strong>
            內文
        </p>
        <button type="button" class="btn btn-info">詳細資訊</button>
    </div>

    <div class="media text-muted pt-3">
        <div style= "width:32px;height:32px;border-radius:5px;background-color: #fd3214;margin-right: 10px;" ></div>
        <p class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">小標題</strong>
            內文
        </p>
        <button type="button" class="btn btn-info">詳細資訊</button>
    </div>

    <div class="media text-muted pt-3">
        <div style= "width:32px;height:32px;border-radius:5px;background-color: #fd7e14;margin-right: 10px;" ></div>
        <p class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">小標題</strong>
            內文
        </p>
        <button type="button" class="btn btn-info">詳細資訊</button>
    </div>

    <div class="media text-muted pt-3">
        <div style= "width:32px;height:32px;border-radius:5px;background-color: #fd7e14;margin-right: 10px;" ></div>
        <p class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">小標題</strong>
            內文
        </p>
        <button type="button" class="btn btn-info">詳細資訊</button>
    </div>

    <div class="media text-muted pt-3">
        <div style= "width:32px;height:32px;border-radius:5px;background-color: #b21f2d;margin-right: 10px;" ></div>
        <p class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">小標題</strong>
            內文
        </p>
        <button type="button" class="btn btn-info">詳細資訊</button>
    </div>

    <div class="media text-muted pt-3">
        <div style= "width:32px;height:32px;border-radius:5px;background-color: #6610f2;margin-right: 10px;" ></div>
        <p class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">小標題</strong>
            內文
        </p>
        <button type="button" class="btn btn-info">詳細資訊</button>
    </div>

    <div class="media text-muted pt-3">
        <div style= "width:32px;height:32px;border-radius:5px;background-color: #f45644;margin-right: 10px;" ></div>
        <p class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">小標題</strong>
            內文
        </p>
        <button type="button" class="btn btn-info">詳細資訊</button>
    </div>

    <div class="media text-muted pt-3">
        <div style= "width:32px;height:32px;border-radius:5px;background-color: #f78454;margin-right: 10px;" ></div>
        <p class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">小標題</strong>
            內文
        </p>
        <button type="button" class="btn btn-info">詳細資訊</button>
    </div>

    <div class="media text-muted pt-3">
        <div style= "width:32px;height:32px;border-radius:5px;background-color: #fd3214;margin-right: 10px;" ></div>
        <p class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">小標題</strong>
            內文
        </p>
        <button type="button" class="btn btn-info">詳細資訊</button>
    </div>

    <div class="media text-muted pt-3">
        <div style= "width:32px;height:32px;border-radius:5px;background-color: #fd7e14;margin-right: 10px;" ></div>
        <p class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">小標題</strong>
            內文
        </p>
        <button type="button" class="btn btn-info">詳細資訊</button>
    </div>

    <div class="media text-muted pt-3">
        <div style= "width:32px;height:32px;border-radius:5px;background-color: #fd7e14;margin-right: 10px;" ></div>
        <p class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">小標題</strong>
            內文
        </p>
        <button type="button" class="btn btn-info">詳細資訊</button>
    </div>

    <div class="media text-muted pt-3">
        <div style= "width:32px;height:32px;border-radius:5px;background-color: #b21f2d;margin-right: 10px;" ></div>
        <p class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">小標題</strong>
            內文
        </p>
        <button type="button" class="btn btn-info">詳細資訊</button>
    </div>

    <div class="media text-muted pt-3">
        <div style= "width:32px;height:32px;border-radius:5px;background-color: #6610f2;margin-right: 10px;" ></div>
        <p class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">小標題</strong>
            內文
        </p>
        <button type="button" class="btn btn-info">詳細資訊</button>
    </div>

    <div class="media text-muted pt-3">
        <div style= "width:32px;height:32px;border-radius:5px;background-color: #f45644;margin-right: 10px;" ></div>
        <p class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">小標題</strong>
            內文
        </p>
        <button type="button" class="btn btn-info">詳細資訊</button>
    </div>

    <div class="media text-muted pt-3">
        <div style= "width:32px;height:32px;border-radius:5px;background-color: #f78454;margin-right: 10px;" ></div>
        <p class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">小標題</strong>
            內文
        </p>
        <button type="button" class="btn btn-info">詳細資訊</button>
    </div>

    <div class="media text-muted pt-3">
        <div style= "width:32px;height:32px;border-radius:5px;background-color: #fd3214;margin-right: 10px;" ></div>
        <p class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">小標題</strong>
            內文
        </p>
        <button type="button" class="btn btn-info">詳細資訊</button>
    </div>

    <div class="media text-muted pt-3">
        <div style= "width:32px;height:32px;border-radius:5px;background-color: #fd7e14;margin-right: 10px;" ></div>
        <p class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">小標題</strong>
            內文
        </p>
        <button type="button" class="btn btn-info">詳細資訊</button>
    </div>
-->


</div>
