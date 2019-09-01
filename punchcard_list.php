<?php
    $location=$Mission->get_GPS();
    $state=$Mission->punchcard_state();
    $state_y=$Mission->punchcard_state_y();
    if($state_y==2)echo '<script rel="script" type="application/javascript">alert("昨日差勤紀錄異常，請向人事確認打卡紀錄!")</script>';
?>
<nav class="navbar   navbar-dark nav-bg">
    <div class="container">
        <h1  class="small_title col-12" style="color: #f4f4ef">打卡系統</h1>
    </div>
</nav>

<!-- Get Time -->
<script language="JavaScript">
    function ShowTime(){
        var NowDate=new Date();
        var h=NowDate.getHours();
        var m=NowDate.getMinutes();
        var s=NowDate.getSeconds();
        var showtime=document.getElementById('showbox1');
        showtime.innerHTML = '時間：'+h+'時'+m+'分'+s+'秒';
        setTimeout('ShowTime()',1000);
    }
</script>

<!-- Get Location -->
<script type="text/javascript" src="http://code.google.com/apis/gears/gears_init.js"></script>

<script language="JavaScript">
    function ShowGPS() {
        var latitude=0,longitude=0,accuracy;
        var loca_la,loca_lo,loca_d;
        var show_location=document.getElementById('showbox2');
        function store_position(position) {
            document.getElementById('latitude').value=latitude=position.coords.latitude;
            document.getElementById('longitude').value=longitude=position.coords.longitude;
            document.getElementById('state').value=<?php echo $state;?>;
            accuracy=position.coords.accuracy/100;
            loca_la=<?=$location['latitude'];?>;
            loca_lo=<?=$location['longitude'];?>;
            loca_d=<?=$location['size'];?>;
            show_location.innerHTML = position.coords.latitude+' ,     '+position.coords.longitude+' ,    '+position.coords.accuracy;
            document.getElementById('map').src="https://maps.google.com.tw/maps?f=q&hl=zh-TW&geocode=&q="+latitude+","+longitude+"&z=16&output=embed&t=p";

            var d=1/111000;

            if(<?php echo $state;?>!=128 && !((latitude>=loca_la-d*(accuracy+loca_d) && latitude<=loca_la+d*(accuracy+loca_d)) && (longitude>=loca_lo-d*(accuracy+loca_d) && longitude<=loca_lo+d*(accuracy+loca_d)))){
                document.getElementById('punchcard_bnt').innerHTML="<p>不在工作範圍中</p>";
            }/**/
            else if(<?php echo $state;?>==1){
                document.getElementById('punchcard_bnt').innerHTML='<button href="#" class="btn btn-lg btn-secondary" id="PunchTimeCardBtn" onclick="check()">上班</button>';
            }
            else if(<?php echo $state;?>==2){
                document.getElementById('punchcard_bnt').innerHTML='<button href="#" class="btn btn-lg btn-secondary" id="PunchTimeCardBtn" onclick="check()">下班</button>';
            }
            else if(<?php echo $state;?>==128){
                document.getElementById('punchcard_bnt').innerHTML='<button href="#" class="btn btn-lg btn-secondary" id="PunchTimeCardBtn" onclick="check()">公差</button>';
            }

        }
        if(navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(store_position);
        }
        else{
            show_location.innerHTML = '地點：無法抓取位置';
        }
        setTimeout('ShowGPS()',60000);
    }

</script>

<!-- Get IP Address -->

<body onload="ShowTime();ShowGPS()">
    <div class="container d-flex p-3 h-100 mx-auto flex-column" >
        <div class="mx-2 my-2" id="showbox1"></div>
        <div class="mx-2 my-2">
            <?= "IP: {$_SERVER['REMOTE_ADDR']}"?>
        </div>
        <div class="mt-auto mb-auto container">
            <iframe id="map" src="" width="75%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <span class="mx-2 my-2">地點</span>
        <form id="gps_form" method="post" action="function/punchcard/punchcard.php">
            <div class="mx-2 my-2" id="showbox2"></div>
            <input type="hidden" id="latitude" name="latitude">
            <input type="hidden" id="longitude" name="longitude">
            <input type="hidden" id="ip" name="ip">
            <input type="hidden" id="state" name="state">
            <p class="lead mx-2 my-2" id="punchcard_bnt">

            </p>
        </form>
        <div style="margin-bottom: 6rem"></div>

    </div>



</body>




