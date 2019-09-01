<nav class="navbar navbar-dark  nav-bg">
    <div class="container-fluid" style="padding: 2px !important;">
        <div class="row"></div>
        <button class="ml-4 btn navbar-dark" data-toggle="collapse" data-target="#salary_manage_list_collapse" onclick="location.href='index.php?tab=salary_manage_list'">&laquo;</button>

        <h1  class="small_title col-9" style="color: #f4f4ef">本薪設定</h1>
        <div class="col-1"></div>
    </div>
</nav>


<div class="p-3 bg-white rounded shadow-lg forLimitingListWidth"  style="margin-bottom: 68.75px" >
    <h6 class="border-bottom border-gray pb-2 mb-0">本薪設定</h6>

    <form action="function/salary/salary_base_setting.php" method="post">
        <?php
        include_once "lib/Salary.php";
        foreach ($Salary->get_base_list() as $key=>$value) {
            ?>
            <div class="media text-muted pt-3  mb-0  border-bottom border-gray">
                <div class="media-body">
                    <p><strong class="d-block text-gray-dark"><?php echo $Staff->sid_get_name($key);?></strong></p>
                    <div class="row">
                        <!--
                        <div class="form-group col-5">
                            <select class="form-control">
                                <option>日薪</option>
                                <option>月薪</option>
                            </select>
                        </div>
                        -->
                        <div class="form-group col-6">
                            <input type="number" class="form-control" id="salary" name="salary_<?php echo $key;?>" placeholder="金額" value="<?php echo $value['base'];?>">
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>

        <!--
        <div class="media text-muted pt-3  mb-0  border-bottom border-gray">
            <div class="media-body">
                <p><strong class="d-block text-gray-dark">小熊維尼</strong></p>
                <div class="row">
                    <div class="form-group col-5">
                        <select class="form-control">
                            <option>日薪</option>
                            <option>月薪</option>
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <input type="number" class="form-control" id="salary" placeholder="金額">
                    </div>
                </div>
            </div>
        </div>

        <div class="media text-muted pt-3  mb-0  border-bottom border-gray">
            <div class="media-body">
                <p><strong class="d-block text-gray-dark">小熊維尼</strong></p>
                <div class="row">
                    <div class="form-group col-5">
                        <select class="form-control">
                            <option>日薪</option>
                            <option>月薪</option>
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <input type="number" class="form-control" id="salary" placeholder="金額">
                    </div>
                </div>
            </div>
        </div>
        -->

        <div class="media-body" style="margin:10px;">
            <button type="submit" class="btn btn-primary btn-lg" >確認</button>
        </div>

    </form>
</div>
