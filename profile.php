<?php require("./template/header.php"); ?>

<div class="container-fluid">
  <div class="row no-gutters">

    <div class="col-md-2">
      <div class="nav">
        <div class="nav-logo">
          <a href="/"><img src="assets/img/site-logo.png"></a>
        </div>
        <ul class="nav-list">
          <li><a href="./index.php" class="home">Home</a></li>
          <li><a href="./profile.php" class="profile">Profile</a></li>
          <li><a href="./works.php" class="works">Works</a></li>
          <li><button class="gallery">Gallery</button></li>
          <li><a href="./contact.php" class="contact">Contact</a></li>
        </ul>
        <!-- ハンバーガーメニュ―内部 768以上で非表示-->
        <ul class="smp-nav-list">
          <div class="smp-nav-btn-inactive">></div>
          <li><a href="./index.php" class="home">Home</a></li>
          <li><a href="./profile.php" class="profile">Profile</a></li>
          <li><a href="./works.php" class="works">Works</a></li>
          <li><button class="gallery">Gallery</button></li>
          <li><a href="./contact.php" class="contact">Contact</a></li>
        </ul>
        <!-- ハンバーガーボタン(ハンバーガーメニュー起爆剤) 687以下で表示 -->
        <div class="smp-nav-trigger profile-smp-nav-trigger" href="#">
          <!-- ←ハンバーガーボタン -->
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>

    <div class="col-md-10 smp-home-main">
     <div class="main">
      <div class="row no-gutters">
       <div class="col-12 profile-area-wrapper">
        <div class="profile-area">
         <h1>PROFILE</h1>
         <div class="profile-area-icon">
          <a href="https://twitter.com/WebDeveloperKei" target="blank">
            <img src="./assets/img/twitter-icon.png" alt="ツイッターアイコン">
          </a>
          <a href="https://github.com/webdeveloperkei" target="blank">
            <img src="./assets/img/github-icon.png" alt="GitHubアイコン">
          </a>
        </div>
        <div class="profile-area-image">
         <img src="assets/img/profile-image.jpeg">

                    <!-- <a href="" class="translate-btn">
                      <img src="./assets/img/translate-icon.png" alt="翻訳アイコン">
                    </a> -->
                  </div>

                  <div class="profile-area-description">
                    <p>
                     I'm a designer & front-end developer based in Tokyo, designing user-friendly interfaces with simplicity in mind for clients in Japan.<br><br>

                     On the digital side, using HTML5, CSS3 and JavaScript I can create anything from a small static site, to a custom theme built for Wordpress. <br><br>All projects are produced with SEO in mind making sure you have a great foundation to build on when it comes to being found in Google. <br><br>I build sites that do not just look good on your desktop PC, but are also fully responsive so it looks and works great on all tablet devices and phones too.<br><br><span><img src="./assets/img/arrow-right-icon.png"><span><a href="#Skill" class="skill">What I Can Do</a>
                     </p>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>