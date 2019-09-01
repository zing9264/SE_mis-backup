<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="source/img/LOGO.png">

    <title>薪水列表</title>

    <!-- Bootstrap core CSS -->
    <link href="lib/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/login.css" rel="stylesheet">

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="lib/jquery/jquery-3.3.1.min.js"></script>
    <script src="lib/popper/popper.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.js"></script>

</head>

<body>

<div style="padding:20px;margin:auto;width:90%">
    <div style="padding:1px 10px;margin:10px;">

        <button class="btn btn-secondary btn-sm disabled">2018</button>

        <div style="padding:10px 15px;margin:10px;">

            <div class="row" style="padding:10px 15px;">
                <h5><span class="badge badge-pill badge-info">2月</span></h5>

                <div class="alert alert-secondary" role="alert" style="padding:0px 10px;margin:0px 10px">
                    日數:20天  金額:35000元
                </div>
            </div>

            <div class="row" style="padding:10px 15px;">
                <h5><span class="badge badge-pill badge-info">1月</span></h5>

                <div class="alert alert-secondary" role="alert" style="padding:0px 10px;margin:0px 10px">
                    日數:20天  金額:35000元
                </div>

            </div>


        </div>

        <div style="margin:10px 0px;">

            <button class="btn btn-secondary btn-sm" data-toggle="collapse" href="#multicollapse2017" role="button" aria-expanded="false" aria-controls="multicollapse2017">
                2017
            </button>

        </div>

        <div class="collapse multi-collapse" id="multicollapse2017" style="padding:10px 15px;margin:10px;">

            <div class="row" style="padding:10px 15px;">
                <h5><span class="badge badge-pill badge-info">2月</span></h5>

                <div class="alert alert-secondary" role="alert" style="padding:0px 10px;margin:0px 10px">

                    <button type="button" class="btn btn-link" style="text-decoration:none;color:black" data-toggle="modal" data-target="#exampleModalCenter">
                        日數:20天  金額:35000元
                    </button>

                </div>

            </div>

            <div class="row" style="padding:10px 15px;">
                <h5><span class="badge badge-pill badge-info">1月</span></h5>

                <div class="alert alert-secondary" role="alert" style="padding:0px 10px;margin:0px 10px" >
                    <a href="salary_detail.php" style="text-decoration:none;color:black">日數:20天  金額:35000元</a>
                </div>
            </div>

        </div>


        <div style="margin:10px 0px;">

            <button class="btn btn-secondary btn-sm" data-toggle="collapse" href="#multicollapse2016" role="button" aria-expanded="false" aria-controls="multicollapse2016">
                2016
            </button>

        </div>

        <div class="collapse multi-collapse" id="multicollapse2016" style="padding:10px 15px;margin:10px;">

            <h5><span class="badge badge-pill badge-info">2月</span></h5>

            <h5><span class="badge badge-pill badge-info">1月</span></h5>

        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalTitle">2017年2月 薪資明細</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">基本薪資</div>
                            <div class="col-md-6">25000</div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">加班費</div>
                            <div class="col-md-6">5000</div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">交通津貼</div>
                            <div class="col-md-6">2000</div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">獎金</div>
                            <div class="col-md-6">3000</div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-6">總額</div>
                            <div class="col-md-6">35000</div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>