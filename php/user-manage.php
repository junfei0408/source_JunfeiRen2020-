<?php
  include("user-control.php");
  include("../include/head.php");
 ?>
    <!-- css -->
    <link rel="stylesheet" href="../style/style.css">
    <title>Manage Users</title>
  </head>
  <body class="adminpage">
    <!--Header-->
    <?php include "../include/admin-header.php" ?>
    <!--Content-->
    <section>
      <aside>
        <h2><a href="dashboard.php">Dashboard</a></h2>
        <ul>
          <li><a href="user-manage.php">Manage Users</a>
            <ul>
              <li><a href="user-create.php">Add user</a></li>
            </ul>
          </li>
          <li><a href="blog-manage.php">Manage Blogs</a></li>
          <li><a href="#">Manage Messages</a></li>
        </ul>
      </aside>
      <article>
        <h2 class="page-title">Manage User</h2>
        <div class="success">
          <?php if(isset($_SESSION["message"])): ?>
            <div class="<?php echo $_SESSION["type"];?>">
              <li><?php echo $_SESSION["message"]; ?></li>
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
              <th>ID</th>
              <th>Username</th>
              <th class="hide">Email</th>
              <th colspan="2">Action</th>
            </thead>
            <tbody>
              <?php foreach ($admin_users as $key => $user): ?>
                <tr>
                  <td><?php echo $key + 1; ?></td>
                  <td><?php echo $user["username"]; ?></td>
                  <td class="hide"><?php echo $user["email"]; ?></td>
                  <td><a href="user-edit.php?id=<?php echo $user["id"]; ?>" class="edit">Edit</a></td>
                  <td><a href="user-manage.php?delete_id= <?php echo $user["id"]; ?>" class="delete">Delete</a></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </article>
    </section>
    <!-- Footer -->
    <?php include("../include/footer.php"); ?>
  </body>
</html>
