<nav class="navbar   navbar-dark nav-bg">
    <div class="container">
        <h1  class="small_title col-12" style="color: #f4f4ef">出差/請假申請</h1>
    </div>
</nav>

<div class="container mt-auto justify-content-center align-items-center" style="margin-bottom: 68.75px;">
    <form action="function/mission/apply_leave.php" method="post" enctype="multipart/form-data">
        <div class="form-row mb-3 mt-3">
            <div class="mb-3 col-md-offset-3 col-md-12">
                <lable for="leave_category">出差/假別：</lable>
                <select class="custom-select custom-select-md" id="leave_category" name="leave_category" required>
                    <optgroup label="請假">
                        <?php
                        include_once ("lib/Mission.php");
                        if(!isset($Mission))$Mission=new Mission();
                        foreach ($Mission->get_leave_type() as $index=>$value){
                            if(!($index & 128))echo '<option value="'.$index.'">'.$value.'</option>';
                        }
                        ?>
                    </optgroup>
                    <optgroup label="出差">
                        <?php
                        include_once ("lib/Mission.php");
                        if(!isset($Mission))$Mission=new Mission();
                        foreach ($Mission->get_leave_type() as $index=>$value){
                            if($index & 128)echo '<option value="'.$index.'">'.$value.'</option>';
                        }
                        ?>
                    </optgroup>
                </select>
            </div>
        </div>

        <div class="form-row mb-3">
            <div class="col-md-6">
                <lable for="leave_date_start">起日：</lable>
                <div >
                    <input type="datetime-local" class="form-control" id="date_start" placeholder="起日" name="date_start" value="2019-01-01T00:00:00" required>
                </div>
            </div>
            <div class="col-md-6">
                <lable for="leave_date_end">迄日：</lable>
                <div>
                    <input type="datetime-local" class="form-control" id="date_end" placeholder="迄日" name="date_end" value="2019-01-01T00:00:00" required>
                </div>
            </div>
        </div>

        <div class="form-group mb-3">
            <label for="leave_location">出差地點：</label>
            <input  type="text" class="form-control" id="leave_location" placeholder="地點" name="leave_location">
        </div>

        <div class="form-group mb-3">
            <label for="leave_reason">出差/請假事由：</label>
            <textarea style="height:175px;" class="form-control" id="leave_reason" placeholder="" name="leave_reason" required></textarea>
        </div>
        <div class="custom-file mb-3">
            <input type="file" class="custom-file-input" id="document" name="document" onchange="filenameupdate()">
            <label class="custom-file-label" for="document" id="document_labal">相關證明文件：</label>
        </div>
        <div class="form-group text-right">
            <button class="btn btn-lg btn-primary">確認申請</button>
        </div>
    </form>
</div>
<script rel="script" type="application/javascript">
    function filenameupdate() {
        document.getElementById('document_labal').innerHTML=document.getElementById('document').files[0]['name'];
    }
</script>