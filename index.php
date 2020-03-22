<?php
  include("php/db.php");
  include("include/head.php");
?>
    <!-- css -->
    <style>
      body{
        width: 100%;
        background-image: url("images/indexbg.gif");
        background-attachment:fixed;
        display: block;
        background: linear-gradient(
                      rgba(188, 180, 167, 0.4),
                      rgba(188, 180, 167, 0.4)),
                    url("images/indexbg.gif") center;
        background-size: cover;
        object-fit: cover;
      }
    </style>
    <link rel="stylesheet" href="./style/style.css">
    <title>index</title>
  </head>
  <body class="indexpage">
    <!--Header-->
    <?php include "include/header.php" ?>
    <!--Content-->
    <section class="index">
      <div class="index-text">
        <?php if(isset($_SESSION["id"])): ?>
          <h1><b>Hello <?php echo $_SESSION["username"]; ?> !</b></h1><br>
        <?php endif; ?>
          <p>Welcome to Junfei's blog!</p>
          <p>Start Chinese Art Tour Here.</p>
          <a href="blog.php">Read More</a>
      </div>
    </section>
    <!-- Footer -->
    <?php include "include/footer.php" ?>
  </body>
</html>
