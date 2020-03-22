<?php
  include("php/blog-control.php");
  if (isset($_GET["id"])){
    $blog = selectOne("blog", ["id" => $_GET["id"]]);
  }
  include("include/head.php");
 ?>
    <link rel="stylesheet" href="./style/style.css">
    <title><?php echo $blog["title"]; ?> | Junfei</title>
  </head>
  <body class="singlepage">
    <!--Header-->
    <?php include("include/header.php"); ?>
    <!--Content-->
    <section>
      <h1><?php echo $blog["title"]; ?></h1>
      <article>
        <div>
          <img src="<?php echo "images/" . $blog["image"]; ?>" alt="blogbild">
        </div>
        <div>
          <i class="far fa-calendar"> <?php echo $blog["posttime"]; ?></i>
        </div>
        <div>
          <p><?php echo html_entity_decode($blog["content"]); ?></p>
          <p><a href="blog.php">Back to Blog</a></p>
        </div>
      </article>
    </section>
    <!-- Footer -->
    <?php include("include/footer.php"); ?>
  </body>
</html>
