 <?php
   include("user-control.php");
   $blogs = connTable("blog",["published"=>1]);
   //dd($blogs);
   include("../include/head.php");
  ?>
    <!-- css -->
    <link rel="stylesheet" href="../style/style.css">
    <title>Admin Dashboard</title>
  </head>
  <body class="adminpage">
    <!--Header-->
    <?php include "../include/admin-header.php" ?>
    <!--Content-->
    <section>
      <aside>
        <h2>Dashboard</h2>
        <ul>
          <li><a href="blog-manage.php">Manage Blogs</a></li>
          <li><a href="user-manage.php">Manage Users</a></li>
          <li><a href="#">Manage Messages</a></li>
        </ul>
      </aside>
      <article>
        <h2><a href="../blog.php">My Blog</a></h2>
        <div class="success">
          <!--visa login blog success-->
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
        <div class="dashboard">
            <?php foreach ($blogs as $blog): ?>
              <div class="admin-dash">
                <h3><a href="../single.php?id=<?php echo $blog['id']; ?>"><?php echo $blog["title"]; ?></a></h3>
                <i class="far fa-calendar"> <?php echo $blog["posttime"]; ?> </i>
                <p class="post-content"> <?php echo html_entity_decode(substr($blog["content"],0,150) . "..."); ?> </p>
              </div>
            <?php endforeach; ?>
        </div>
      </article>
    </section>
    <!-- Footer -->
    <?php include ("../include/footer.php"); ?>
  </body>
</html>
