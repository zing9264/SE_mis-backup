<!--發布新公告-->
<script rel="script" type="application/javascript">

    function time_check() {
        if(document.getElementById('announcement_New_setTimeLimited').checked){
            document.getElementById('announcement_New_startTime').disabled=false;
            document.getElementById('announcement_New_endTime').disabled=false;
        }
        else{
            document.getElementById('announcement_New_startTime').disabled=true;
            document.getElementById('announcement_New_endTime').disabled=true;
        }
    }

</script>

<div class="modal fade" id="announcement_New" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="NewAnnouncementTitle">發布新公告</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form action="function/announcement_manage/new_save.php" method="post" enctype="multipart/form-data">
                <div class="modal-body form-row">
                    <div class="form-group col-12">
                        <label for="announcement_New_title" >標題</label>
                        <input type="text" class="form-control" name="title" id="announcement_New_title" >
                    </div>

                    <div class="form-group col-12">
                        <label for="announcement_New_textarea">內容</label>
                        <textarea class="form-control" name="content" id="announcement_New_textarea" rows="10"></textarea>
                    </div>

                    <div class=" col-12 mb-2" style="border-bottom: 1px solid #e9ecef">
                    </div>

                    <div class="form-check col-12 text-left ml-3">
                        <input class="form-check-input" type="checkbox" name="check" onclick="time_check()" id="announcement_New_setTimeLimited">
                        <label class="form-check-label" for="announcement_New_setTimeLimited">
                            限時公告
                        </label>
                    </div>

                    <div class="form-group  col-12 col-xl-6">
                        <label for="announcement_New_startTime" >開始時間</label>
                        <input type="datetime-local" class="form-control" name="startTime"  id="announcement_New_startTime" disabled >
                    </div>

                    <div class="form-group col-12 col-xl-6">
                        <label for="announcement_New_endTime" >結束時間</label>
                        <input type="datetime-local" class="form-control" name="endTime"  id="announcement_New_endTime" disabled>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-primary" >發布</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--設定時段 未使用-->
<!--
<div class="modal fade" id="announcement_setTime" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">設定公告時段</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form action="" method="" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="announcement_ID" hidden >公告編號</label>
                        <input type="text" class="form-control" id="announcement_ID" value="" readonly hidden >
                    </div>

                    <div class="form-group">
                        <label for="announcement_setTime_title">公告標題</label>
                        <input type="text" class="form-control"  id="announcement_setTime_title" value="" readonly >
                    </div>


                    <div class="form-group">
                        <label for="announcement_startTime" >開始時間</label>
                        <input type="datetime-local" class="form-control" name="startTime" id="announcement_startTime" >
                    </div>

                    <div class="form-group">
                        <label for="announcement_endTime" >結束時間</label>
                        <input type="datetime-local" class="form-control" name="endTime" id="announcement_endTime" >
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-primary">送出</button>
                </div>
            </form>
        </div>
    </div>
</div>

-->

