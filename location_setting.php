<?php
    include_once "lib/Mission.php";
    if(!$location)$location=$Mission->get_GPS();
?>
<div  style="color: #3c3a3d">
    <nav class="navbar   navbar-dark nav-bg">
        <div class="container">
            <h1  class="small_title col-12" style="color: #f4f4ef">設定打卡位置</h1>
        </div>
    </nav>


    <div id="complaint_form" class="container" style="margin-bottom: 68.45px">
        <form method="post" action="function/mission/location_setting.php">
            <div class="form-row mt-3 mb-3">
                <div class="col-12">
                    <lable for="setting_latitude">緯度latitude(小數點後6位):</lable>
                    <div >
                        <input type="number" step="0.000001" class="form-control" id="setting_latitude" name="setting_latitude" min="-90.000000" max="90.000000" placeholder="-90.000000~90.000000" value="<?=$location['latitude'];?>" required>
                    </div>
                </div>
            </div>
            <div class="form-row mb-3">
                <div class="col-12">
                    <lable for="setting_longitude">經度longitude(小數點後6位):</lable>
                    <div>
                        <input type="number"  step="0.000001" class="form-control" id="setting_longitude" name="setting_longitude" min="-180.000000" max="180.000000" placeholder="-180.000000~180.000000" value="<?=$location['longitude'];?>" required>
                    </div>
                </div>
            </div>


            <div class="form-row mb-3">
                <div class="col-12">
                    <lable for="setting_size">範圍(公尺):</lable>
                    <div >
                        <input type="number" class="form-control" id="setting_size" name="setting_size" min="1" placeholder="10" value="<?=$location['size'];?>" required>
                    </div>
                </div>
            </div>

            <div class="form-group text-right">
                <button type="button" class="btn btn-lg btn-secondary" data-toggle="collapse" data-target="#setting_list_collapse" onclick="window.location.href='index.php?tab=setting_list'">取消</button>
                <button type="submit" class="btn btn-lg btn-primary">修改位置</button>
            </div>
        </form>
    </div>
</div>
