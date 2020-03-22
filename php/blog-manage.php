<?php
  include("blog-control.php");
  include("../include/head.php");
 ?>
    <!-- css -->
    <link rel="stylesheet" href="../style/style.css">
    <title>Manage Blogs</title>
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
        <h2 >Manage Blogs</h2>
        <!--visa post blog success-->
        <div class="success">
          <?php if(isset($_SESSION["message"])): ?>
            <div class="msg <?php echo $_SESSION["type"]; ?>">
              <p><?php echo $_SESSION["message"]; ?></p>
              <?php
                unset($_SESSION["message"]);
                unset($_SESSION["type"]);
               ?>
            </div>
          <?php endif; ?>
        </div>
        <div class="admintable">
          <table>
            <thead>
              <th>No.</th>
              <th>Title</th>
              <th class="hide">Auther</th>
              <th colspan="3">Action</th>
            </thead>
            <tbody>
              <?php foreach ($blogs as $key => $blog): ?>
                <tr>
                  <td><?php echo $key + 1; ?></td>
                  <td><?php echo $blog["title"]; ?></td>
                  <td class="hide">Junfei</td>
                  <td><a href="blog-edit.php?id=<?php echo $blog["id"]; ?>" class="edit">Edit</a></td>
                  <td><a href="blog-manage.php?delete_id=<?php echo $blog["id"]; ?>" class="delete">Delete</a></td>
                  <?php if ($blog["published"]): ?>
                    <td class="hide"> Published </td>
                  <?php endif; ?>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>

      </article>
    </section>
    <!-- Footer -->
    <?php include "../include/footer.php" ?>
  </body>
</html>
