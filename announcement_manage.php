<div  style="color: #3c3a3d">
    <nav class="navbar   navbar-dark nav-bg">
        <div class="container">
            <h1  class="small_title col-12" style="color: #f4f4ef">公告管理</h1>
        </div>
    </nav>

    <div class="announcement p-3 bg-white rounded shadow-lg forLimitingListWidth" id="data_announcement" style="margin-bottom: 68.45px ;margin-bottom:transparent"> <!--設定底邊是為了不被NAV_BOTTOM蓋到-->

        <small class="d-block text-center mt-0 mb-3">
            <!-- Button trigger modal 這邊要到 modalData裡面去修改-->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#announcement_New">
                發布新公告
            </button>
        </small>

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
		include('function/announcement_manage/announcement_manage.php');
		?>
		<!--
        <div class="card">
            <div class="card-header" >
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12" id="announcement_title_1" data-toggle="collapse" data-target="#announcement_1">
                            <a href="#announcement_title_1" >
                                公告第一條 一號公告第一條 一號公告第一條 一號公告第一條
                            </a>
                        </div>
                        <div class="col-12">
                            <span style="font-size: 0.5rem">2018-10-09</span>
                        </div>
                        <div class="col-12">
                            <button style="border: none" class="badge badge-info" data-toggle="modal" data-target="#announcement_Edit">編輯</button>
                            <button style="border: none" class="badge badge-danger">刪除</button>
                            <button style="border: none" class="badge badge-success">置頂</button>
                            <button style="border: none" class="badge badge-primary">讚(100)</button>
                            <button style="border: none" class="badge badge-warning">舉報</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="announcement_1" class="collapse">
                <div class="card-body">
                    <div class="card-text">
                     公告一號的內容 公告一號的內容 公告一號的內容 公告一號的內容 公告一號的內容 公告一號的內容 公告一號的內容 公告一號的內容 公告一號的內容 公告一號的內容 公告一號的內容 公告一號的內容 公告一號的內容 公告一號的內容 公告一號的內容 公告一號的內容
                    公告一號的內容 公告一號的內容 公告一號的內容 公告一號的內容 公告一號的內容 公告一號的內容 公告一號的內容 公告一號的內容 公告一號的內容 公告一號的內容 公告一號的內容 公告一號的內容 公告一號的內容 公告一號的內容 公告一號的內容 公告一號的內容
                    </div>
                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-header" >
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12" id="announcement_title_2" data-toggle="collapse" data-target="#announcement_2">
                            <a href="#announcement_title_2" >
                                公告第二則
                            </a>
                        </div>
                        <div class="col-12">
                            <span style="font-size: 0.5rem">2018-10-09</span>
                        </div>
                        <div class="col-12">
                            <button style="border: none" class="badge badge-info" data-toggle="modal" data-target="#announcement_Edit">編輯</button>
                            <button style="border: none" class="badge badge-danger">刪除</button>
                            <button style="border: none" class="badge badge-success">置頂</button>
                            <button style="border: none" class="badge badge-primary">讚(100)</button>
                            <button style="border: none" class="badge badge-warning">舉報</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="announcement_2" class="collapse">
                <div class="card-body">
                    <div class="card-text">
                        我是第二則 我是第二則 我是第二則 我是第二則 我是第二則 我是第二則 我是第二則 我是第二則 我是第二則 我是第二則 我是第二則 我是第二則 我是第二則 我是第二則 我是第二則 我是第二則 我是第二則 我是第二則 我是第二則 我是第二則
                    </div>
                </div>
            </div>
        </div>
		-->
    </div><!--整個公告折頁的區間 id="data_announcement" -->
</div>