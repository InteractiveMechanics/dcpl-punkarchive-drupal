<!DOCTYPE html>
<html>
<head>
    <title>DCPL Mix</title>

    <!-- STYLESHEETS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="./css/main.css">

    <!-- jPLAYER scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="./js/audioplayer.js"></script>
</head>
<body style="position:initial; background: #222">
    <div id="cwrap">
        <div id="nowPlay">
            <!--<h3 id="npAction">Paused:</h3>-->
            <div style="color:white;" id="npTitle"></div>
            <div style="color:white;" id="npBand"></div>
        </div> <!-- end nowPlay -->
        <div id="audiowrap">
            <div id="audio0">
	            <audio id="audio1">
                    Your browser does not support the HTML5 Audio Tag.
                </audio>
                <div class="album-cover-placeholder-big">
                    <a style="color:white;" id="playButton" onclick="document.getElementById('audio1').play()"><i class="fa fa-play fa-2x"></i></a>
                    <a style="color:white;" id="pauseButton" onclick="document.getElementById('audio1').pause()"><i class="fa fa-pause fa-2x"></i></a>
                    <img class="album-image" width="100" height="100"  />
            </div> <!-- END AUDIO0 -->
            </div>
            <div id="extraControls">
                <button id="btnNext" style="background-color:#acd156; border-color:#80a91f;" class="ctrlbtn"><i class="fa fa-forward fa-2x"></i></button>
            </div>
        </div>
    </div>
</body>
</html>

