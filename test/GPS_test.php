<?php
function GetIP(){
    if(!empty($_SERVER["HTTP_CLIENT_IP"])){
        $cip = $_SERVER["HTTP_CLIENT_IP"];
    }
    elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
        $cip = $_SERVER["HTTP_X_FORWARDED_FOR"];
    }
    elseif(!empty($_SERVER["REMOTE_ADDR"])){
        $cip = $_SERVER["REMOTE_ADDR"];
    }
    else{
        $cip = "無法取得IP位址！";
    }
    return $cip;
}
echo GetIP();
?>
<!DOCTYPE html>
<head>
    <title>登入 - 差勤系統</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css" crossorigin="anonymous">
    <script src="lib/jquery/jquery-3.1.1.min.js"  crossorigin="anonymous"></script>
    <!--
    <script src="lib/js/tether.min.js"  crossorigin="anonymous"></script>
    -->
    <script src="lib/bootstrap/js/bootstrap.bundle.js"  crossorigin="anonymous"></script>
    <link rel="icon" href="" type="image/x-icon">
    <script>

        if( navigator.geolocation ) {
            alert("GPS已被定位....千萬不可以動手!!!");
// 支援GPS地理定位
            navigator.geolocation.getCurrentPosition( geoYes, geoNo);
        }
        else {
            alert("目前GPS無法定位....趕快補刀吧!!!");
        }

        function geoYes(evt){
//alert(evt);
            str = "緯度" + evt.coords.latitude;
            str += "<br />經度" + evt.coords.longitude;
            str += "<br />精確度" + evt.coords.accuracy;
            str += "<br />IP" + "<?php echo GetIP();?>";
            //str += "<br />Host" + request.getRemoteHost();
// str += 等於=> str = str+....
            document.getElementById("posStr").innerHTML=str;

            var a = "https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1828.5719117231972!2d"+evt.coords.longitude+"!3d"+evt.coords.latitude+"!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1szh-TW!2stw!4v1538656104567";
            alert(a);
            document.getElementById("map").src = a;
        }
        function geoNo(evt){
            alert("GPS取得失敗");
        }

        var watchID;
        function startGPS(){
            watchID = navigator.geolocation.watchPosition( geoYes, geoNo);
            document.getElementById("watchStr").innerHTML="GPS正在監控中...";
        }
        function stopGPS(){
            navigator.geolocation.clearWatch( watchID );
            document.getElementById("watchStr").innerHTML="GPS停止監控中...";
        }
        </script>
</head>
<body>
    <div class="container">
        <div class="m-3 bg-danger h-auto">

        </div>
    </div>
    <div class="row" style="margin-top:3rem;">
        <div class="col-md-4 m-auto align-middle">
            <div class="well col-md-10">
                <h3>使用者登入</h3>
                <div class="input-group input-group-md">
                    <span class="input-group-addon" id=""><i class="glyphicon glyphicon-user" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" placeholder="使用者名稱" aria-describedby="sizing-addon1">
                </div>
                <div class="input-group input-group-md">
                    <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-lock"></i></span>
                    <input type="password" class="form-control" placeholder="密碼" aria-describedby="sizing-addon1">
                </div>

                <button type="submit" class="btn btn-success btn-block">
                    登入
                </button>
                <h1>定位資訊 </h1>
                <p id="posStr">111222</p>
                <p id="watchStr">監控狀態</p>
                <p>
                    <input type="button" value="啟動GPS更新" onClick="startGPS();">
                    <input type="button" value="停止GPS更新" onClick="stopGPS();">
                </p>
                <p>當啟動GPS更新,不用聯網也可持續更新!!!<br>
                    只要網頁開著!</p>
                <hr>
                <iframe src="" id="map" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                <p id="google_geo"></p>
                <button type="button" class="btn btn-success btn-block" onclick="geoYes()">
            </div>
        </div>

    </div>
</body>