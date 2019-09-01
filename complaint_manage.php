<div  style="color: #3c3a3d">
    <nav class="navbar   navbar-dark nav-bg">
        <div class="container">
            <h1  class="small_title col-12" style="color: #f4f4ef">申訴管理</h1>
        </div>
    </nav>

    <div class=" p-3 bg-white rounded shadow-lg forLimitingListWidth" id="data_complaint" style="margin-bottom: 68.45px ;margin-bottom:transparent"><!--設定底邊是為了不被NAV_BOTTOM蓋到-->
<!--
        <nav>
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
        </nav>
-->
		<?php
		include('function/complaint/complaint_manage.php');
		?>
<!--		
        <div class="accordion" id="complaint">

            <div class="card">
                <div class="card-header">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12" id="complaint_title_1" data-toggle="collapse" data-target="#complaint_content_1">
                                <a href="#complaint_title_1" >
                                   申訴第一條
                                </a>
                            </div>
                            <div class="col-12">
                                <span style="font-size: 0.5rem">2018-10-09</span>
                                <span style="font-size: 0.5rem">申訴人:小熊維尼</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="complaint_content_1" class="collapse" data-parent="#complaint">
                    <div class="card-body">
                        申訴內容1   申訴內容1 申訴內容1  申訴內容1 申訴內容1  申訴內容1 申訴內容1  申訴內容1 申訴內容1  申訴內容1 申訴內容1  申訴內容1 申訴內容1  申訴內容1 申訴內容1
                        <div class="col-12 mt-4">
                            <button class="btn btn-danger">
                                已處理
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12" id="complaint_title_2" data-toggle="collapse" data-target="#complaint_content_2">
                                <a href="#complaint_title_2" >
                                    申訴第二條
                                </a>
                            </div>
                            <div class="col-12">
                                <span style="font-size: 0.5rem">2018-10-09</span>
                                <span style="font-size: 0.5rem">申訴人:小熊維尼</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="complaint_content_2" class="collapse" data-parent="#complaint">
                    <div class="card-body">
                        申訴內222
                        <div class="col-12 mt-4">
                            <button class="btn btn-danger">
                                已處理
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12" id="complaint_title_3" data-toggle="collapse" data-target="#complaint_content_3">
                                <a href="#complaint_title_3" >
                                    申訴第3條
                                </a>
                            </div>
                            <div class="col-12">
                                <span style="font-size: 0.5rem">2018-10-09</span>
                                <span style="font-size: 0.5rem">申訴人:小熊維尼</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="complaint_content_3" class="collapse" data-parent="#complaint">
                    <div class="card-body">
                        申訴內33333
                        <div class="col-12 mt-4">
                            <button class="btn btn-danger">
                                已處理
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>-->	<!--collpase div-->

    </div><!--white div-->

</div><!--complaint div-->