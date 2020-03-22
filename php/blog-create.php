<?php
  include("blog-control.php");
  include("../include/head.php");
 ?>
    <!-- css -->
    <link rel="stylesheet" href="../style/style.css">
    <title>Post blog</title>
  </head>
  <body class="adminpage">
    <!--Header-->
    <?php include "../include/admin-header.php" ?>
    <!--Content-->
    <section>
      <aside>
        <h2><a href="dashboard.php">Dashboard</a></h2>
        <ul>
          <li><a href="blog-manage.php">Manage Blogs</a>
            <ul>
              <li><a href="blog-create.php">Post Blog</a></li>
            </ul>
          </li>
          <li><a href="user-manage.php">Manage Users</a></li>
          <li><a href="#">Manage Messages</a></li>
        </ul>
      </aside>
      <article>
        <form class="adminform" action="blog-create.php" method="post" enctype="multipart/form-data">
          <h2>Post Blog</h2>
          <?php if(count($errors) > 0):?>
            <div class="error alart alert-danger">
              <?php foreach ($errors as $error): ?>
                <li><?php echo "$error"; ?> </li>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
          Title: <br>
          <input type="text" name="title" value="<?php echo $title; ?>" placeholder="Title"><br>
          Post Blog: <br>
          <textarea name="content" rows="8" cols="80" value="<?php echo $content; ?>" placeholder="Blog contant"></textarea><br>
          Image: <br>
          <input type="file" name="image" value="<?php echo $image; ?>" multiple="multiple"><br>
          Publish: <br>
          <input type="checkbox" name="published"><br>
          <input type="submit" name="add-blog" value="Post Blog"><br>
        </form>
      </article>
    </section>
    <!-- Footer -->
    <?php include "../include/footer.php" ?>
  </body>
</html>
