<?php
  include("php/user-control.php");
  $blogs = connTable("blog",["published"=>1]);
  include("include/head.php");

 ?>
    <!-- css-->
    <link rel="stylesheet" href="./style/style.css">
    <title>blog</title>
  </head>
  <body class="blogpage">
    <!--Header-->
    <?php include ("include/header.php"); ?>
    <!--Content-->
    <section class="blog-welcome">
      <!--login message-->
      <div class="success">
        <?php if(isset($_SESSION["message"])): ?>
          <div class="msg <?php echo $_SESSION["type"]; ?>">
            <li><?php echo $_SESSION["message"]; ?></li>
            <?php
              unset($_SESSION["message"]);
              unset($_SESSION["type"]);
             ?>
          </div>
        <?php endif; ?>
      </div>
      <!--page welcome-->
      <div>
        <h1>
          <?php if(isset($_SESSION["id"])): ?>
          Hello <?php echo $_SESSION["username"]; ?> !<br>
          <?php endif; ?>
          Welcome to Junfei's blog!
        </h1>
      </div>
    </section>
    <section class="blog-main">
      <article>
        <h3><b><i> Resent Posts</i></b></h3>
        <?php foreach ($blogs as $blog): ?>
          <div class="blog-post">
            <div class="blog-text">
              <h2 class="blog-post-title"><a href="single.php?id=<?php echo $blog['id']; ?>"><?php echo $blog["title"]; ?></a></h2>
              <p><i class="far fa-user"><?php echo $blog["username"]; ?></i></p>
              <p class="blog-post-meta"><i class="far fa-calendar"><?php echo " " . $blog["posttime"]; ?></i></p>
              <p class="post-content"><?php echo html_entity_decode(substr($blog["content"], 0, 150) . "..."); ?></p>
              <a href="single.php?id=<?php echo $blog['id']; ?>">Read More</a>
            </div>
            <div class="blog-img">
              <img src="<?php echo "images/" . $blog["image"]; ?>" alt="blogbild">
            </div>
          </div>
        <?php endforeach; ?>
      </article>
      <aside>
        <div>
          <h4 class="video-page-title"><a href = "javascript:void(0)" onclick ="videoOpen()">Appreciation</a></h4>
          <h4 class="video-mobil-title">Appreciation</h4>
          <div class="video">
            <iframe width="100%" height="180" src="images/A Panorama of Rivers and Mountains.mp4" frameborder="0"></iframe>
          </div>
          <!-- open video in a float window -->
          <div id="videoplay" class="video-window">
            <h3>Appreciation : A Panorama of Rivers and Mountains
              <a href = "javascript:void(0)" onclick = "videoClose()"><i class="fas fa-times-circle"></i></a>
            </h3>
            <div onclick ="videoOpen()">
              <iframe width="100%" height="380" src="images/A Panorama of Rivers and Mountains.mp4" frameborder="0" allowfullscreen></iframe>
            </div>
          </div>
          <div id="videobg"></div>
        </div>
        <div>
          <h4>Biography</h4>
          <p>Enjoy the culture!</p>
          <p>Art, Travel, Plants, Food, Lifestyle</p>
        </div>
        <div>
          <h4>Contact</h4>
          <p><b>Junfei Ren</b></p>
          <p>Telephone : 0735601078</p>
          <p>E-mail : ppxiaoemo0408@gmail.com</p>
          <p>
            <a href="https://www.facebook.com/profile.php?id=100008263301787"; target="_blank"><i class="fab fa-facebook-square"></i></a>
            <a href="https://www.instagram.com/junfei0408/?hl=zh-cn"; target="_blank"><i class="fab fa-instagram"></i></a>
          </p>
        </div>
      </aside>
    </section>
    <!-- Footer -->
    <?php include("include/footer.php") ?>
    <script type="text/javascript">
      function videoOpen(){
        document.getElementById("videoplay").style.display="block";
        document.getElementById("videobg").style.display="block";
      }
      function videoClose(){
        document.getElementById("videoplay").style.display="none";
        document.getElementById("videobg").style.display="none";
      }
    </script>
  </body>
</html>
