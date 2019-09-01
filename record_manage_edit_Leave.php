<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>編輯公告</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0 user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="source/img/LOGO.png">
    <!-- Bootstrap core CSS -->
    <link href="lib/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/index.css" rel="stylesheet">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="lib/jquery/jquery-3.3.1.min.js"></script>
    <script src="lib/popper/popper.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.js"></script>

</head>

<body>
<nav class="navbar   navbar-dark nav-bg">
    <div class="container text-center">
        <h1  class="small_title col-12" style="color: #f4f4ef">修改紀錄</h1>
    </div>
</nav>

<div class="p-3 bg-white rounded shadow-lg forLimitingListWidth " >
    <h3 class="border-bottom border-gray pb-2 mb-0">修改請假申請紀錄</h3>
    <div >
        <form>
            <div class="form-row align-items-center">
                <div class="form-group col-12">
                    <label for="record_type_1">假別</label>
                    <select class="custom-select custom-select-md" id="record_type_1" required>
                        <option value="1">事假</option>
                        <option value="2">公假</option>
                        <option value="3">病假</option>
                        <option value="4">婚假</option>
                        <option value="5">喪假</option>
                        <option value="6">休假</option>
                        <option value="7">生理假</option>
                        <option value="8">家庭照顧假</option>
                        <option value="9">產前假</option>
                        <option value="10">陪產假</option>
                        <option value="11">分娩假</option>
                        <option value="12">流產假</option>
                        <option value="13">慰勞假</option>
                    </select>
                </div>

                <div class="form-group col-12">
                    <label for="purposeForTrip_1">事由</label>
                    <textarea class="form-control" rows="3" id="purposeForTrip_1">尊敬的紋浩領導：本人因****原因，需請假*天，懇請領導予以批准。謝謝!
                    </textarea>
                </div>

                <div class="form-group col-12 col-lg-6">
                    <label for="beginTime_1">起日</label>
                    <input id="beginTime_1" class="form-control" type="datetime-local" value="2017-11-25T09:00" />
                </div>
                <div class="form-group col-12 col-lg-6">
                    <label for="finishTime_1">迄日</label>
                    <input id="finishTime_1" class="form-control" type="datetime-local" value="2017-11-25T17:30" />
                </div>
                <div class="form-group col-lg-3 col-6">

                    <label for="judge_1">核可狀態</label>
                    <select  id="judge_1"  class="form-control" >
                        <option selected>已核可</option>
                        <option >未核可</option>
                    </select>
                </div>
            </div>
            <div  class="modal-footer" >
                <button type="button" class="btn btn-secondary"  onclick="location.href='index.php?tab=record_target_member'">取消</button>
                <button type="submit" class="btn btn-primary" >送出修改</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>