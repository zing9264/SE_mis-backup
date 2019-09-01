

<nav class="navbar   navbar-dark nav-bg">
    <div class="container">
        <h1  class="small_title col-12" style="color: #f4f4ef">薪資查詢</h1>
    </div>
</nav>

    <div class="container-fluid" style="padding:20px;margin-bottom: 68.45px ;margin-bottom:transparent;">
        <div>
            <?php
                include_once "lib/Salary.php";
                $year=0;
                foreach ($salary_list as $value){
            if ($year == 0) {
                $year = $value['year'];
                echo '<button class="btn btn-secondary btn-block btn-sm disabled">' . $year . '</button><div style="padding:10px 15px;margin:10px;">';

            }
            else if($year != $value['year']){
                echo '</div>';
                $year = $value['year'];
            ?>
                <div style="margin:10px 0px;">

                    <button class="btn btn-secondary btn-sm btn-block" data-toggle="collapse"
                            data-target="#multicollapse<?php echo $value['year'];?>" role="button" aria-expanded="false"
                            aria-controls="multicollapse<?php echo $value['year'];?>">
                        <?php echo $value['year'];?>
                    </button>

                </div>

                <div class="collapse " id="multicollapse<?php echo $value['year'];?>" style="padding:10px 15px;margin:10px;">
                <?php
                }
            ?>
                <div style="padding:10px 15px;margin:10px;">

                    <div class="row" style="padding:10px 15px;">
                        <h5><span class="badge badge-pill badge-info"><?php echo $value['month'];?>月</span></h5>

                        <div class="bg-secondary rounded" style="padding:0px 10px;margin:0px 10px">

                            <button type="button" class="btn btn-link text-white" style="text-decoration:none;color:black"
                                    data-toggle="modal" data-target="#exampleModalCenter<?php echo $value['id'];?>">
                                金額:<?php echo $Salary->salary_calcute($value['id']);?>元
                            </button>

                        </div>
                    </div>
                </div>
                <?php
                }
            ?>
<!--
                <button class="btn btn-secondary btn-block btn-sm disabled">2018</button>
            <div style="padding:10px 15px;margin:10px;">

                <div class="row" style="padding:10px 15px;">
                    <h5><span class="badge badge-pill badge-info">2月</span></h5>

                    <div  class="bg-secondary rounded" style="padding:0px 10px;margin:0px 10px">

                        <button type="button" class="btn btn-link text-white" style="text-decoration:none;color:black" data-toggle="modal" data-target="#exampleModalCenter">
                            日數:20天  金額:35000元
                        </button>

                    </div>
                </div>

                <div class="row" style="padding:10px 15px;">
                    <h5><span class="badge badge-pill badge-info">1月</span></h5>

                    <div  class="bg-secondary rounded" style="padding:0px 10px;margin:0px 10px">

                        <button type="button" class="btn btn-link text-white" style="text-decoration:none;color:black" data-toggle="modal" data-target="#exampleModalCenter">
                            日數:20天  金額:35000元
                        </button>

                    </div>

                </div>


            </div>

            <div style="margin:10px 0px;">

                <button class="btn btn-secondary btn-sm btn-block" data-toggle="collapse" data-target="#multicollapse2017" role="button" aria-expanded="false" aria-controls="multicollapse2017">
                    2017
                </button>

            </div>

            <div class="collapse " id="multicollapse2017" style="padding:10px 15px;margin:10px;">

                <div class="row" style="padding:10px 15px;">
                    <h5><span class="badge badge-pill badge-info">2月</span></h5>

                    <div  class="bg-secondary rounded" style="padding:0px 10px;margin:0px 10px">

                        <button type="button" class="btn btn-link text-white" style="text-decoration:none;color:black" data-toggle="modal" data-target="#exampleModalCenter">
                            日數:20天  金額:35000元
                        </button>

                    </div>

                </div>

                <div class="row" style="padding:10px 15px;">
                    <h5><span class="badge badge-pill badge-info">1月</span></h5>

                    <div class="bg-secondary rounded" style="padding:0px 10px;margin:0px 10px" >
                        <button type="button" class="btn btn-link text-white" style="text-decoration:none;color:black" data-toggle="modal" data-target="#exampleModalCenter">
                            日數:20天  金額:35000元
                        </button>
                    </div>
                </div>

            </div>

            <div style="margin:10px 0px;">

                <button class="btn btn-secondary btn-sm btn-block" data-toggle="collapse" data-target="#multicollapse2016" role="button" aria-expanded="false" aria-controls="multicollapse2016">
                    2016
                </button>

            </div>

            <div class="collapse" id="multicollapse2016" style="padding:10px 15px;margin:10px;">

                <div class="row" style="padding:10px 15px;">
                    <h5><span class="badge badge-pill badge-info">2月</span></h5>

                    <div class="bg-secondary rounded" style="padding:0px 10px;margin:0px 10px" >
                        <button type="button" class="btn btn-link text-white" style="text-decoration:none;color:black" data-toggle="modal" data-target="#exampleModalCenter">
                            日數:20天  金額:35000元
                        </button>
                    </div>
                </div>

                <div class="row" style="padding:10px 15px;">
                    <h5><span class="badge badge-pill badge-info">1月</span></h5>

                    <div class="bg-secondary rounded" style="padding:0px 10px;margin:0px 10px" >
                        <button type="button" class="btn btn-link text-white" style="text-decoration:none;color:black" data-toggle="modal" data-target="#exampleModalCenter">
                            日數:20天  金額:35000元
                        </button>
                    </div>
                </div>
-->
            </div>

        </div>
    </div>

