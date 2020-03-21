<?php require_once("./header.php"); ?>

<body>
    <div class="container-fluid">
        <div class="row no-gutters">
            <div class="col-md-2">
                <div class="nav">
                    <div class="nav-logo">
                        <a href="/"><img src="assets/img/site-logo.png"></a>
                    </div>
                    <ul class="nav-list">
                        <li><a href="" class="home">Home</a></li>
                        <li><a href="#Profile" class="profile">Profile</a></li>
                        <li><a href="#Works" class="works">Works</a></li>
                        <li><a href="#Gallery" class="gallery">Gallery</a></li>
                        <li><a href="#Contact" class="contact">Contact</a></li>
                    </ul>
                    <!-- ハンバーガーメニュ―内部 768以上で非表示-->
                    <ul class="smp-nav-list">
                        <div class="smp-nav-btn-inactive">></div>
                        <li><a href="" class="home">Home</a></li>
                        <li><a href="#Profile" class="profile">Profile</a></li>
                        <li><a href="#Works" class="works">Works</a></li>
                        <li><a href="#Gallery" class="gallery">Gallery</a></li>
                        <li><a href="#Contact" class="contact">Contact</a></li>
                    </ul>
                    <!-- ハンバーガーボタン(ハンバーガーメニュー起爆剤) 687以下で表示 -->
                    <div class="smp-nav-trigger" href="#">
                        <!-- ←ハンバーガーボタン -->
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>

            <div class="col-md-10 smp-home-main">
                <div class="main">
                    <div class="home-main-video">
                        <video preload="auto" autoplay playsinline muted poster="assets/img/drawing-name.png" id="myname">
                            <source src="assets/mov/drawing-name.mp4">
                            <source src="assets/mov/drawing-name.ogv">
                            <source src="assets/mov/drawing-name.webm">
                            <img src="assets/img/drawing-name.png" alt="Kei Funatsuya">
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>