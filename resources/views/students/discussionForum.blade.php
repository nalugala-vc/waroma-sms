<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Group Discussions Room</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alumni+Sans+Inline+One&family=Inter:wght@300;700&family=Josefin+Sans&family=Just+Another+Hand&family=Karla&family=Lobster+Two&family=Metal+Mania&family=Pacifico&family=Poppins&family=Roboto+Condensed:ital,wght@0,300;0,700;1,400&family=Rubik+Marker+Hatch&display=swap" rel="stylesheet">
    <link rel='stylesheet' type='text/css' media='screen' href='/css/discussion.css'>
</head>

<body>
   <div class="main" id="main">
    <div class="pic">
        <p>see what your collegues are up to</p>
        <h2>GROUP DISCUSSION FORUM</h2>
        <img src="/images/Group-Video.png" alt="">
    </div>
    <div class="credentials">
        <div class="logo">
            <img src="/images/logo.png" alt="">
            <h2>aroma</h2>
        </div>
        <h3>ENTER CREDENTIALS</h3>
        <div class="inp">
            <input type="text" name="" id="app_id" placeholder="App id">
        </div>
        <div class="inp">
            <input type="password" name="" id="token" placeholder="Token">
        </div>
        <div class="join-btn">
            <button id="join-btn">Join Discussion</button>
        </div>
    </div>
   </div>

    <div id="stream-wrapper">
        <div id="video-streams"></div>

        <div id="stream-controls" style="display:none ;">
            <button id="leave-btn">Leave Stream</button>
            <button id="mic-btn">Mic On</button>
            <button id="camera-btn">Camera on</button>
        </div>
    </div>

</body>
 <script src="https://download.agora.io/sdk/release/AgoraRTC_N.js"></script>
<!--<script src="AgoraRTC_N-4.13.0.js"></script>-->
<script src='/js/video.js'></script>

</html>