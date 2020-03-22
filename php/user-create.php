<?php
  include("user-control.php");
  include("../include/head.php");
 ?>
    <!-- css -->
    <link rel="stylesheet" href="../style/style.css">
    <title>Add User</title>
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
        <form class="adminform" action="user-create.php" method="post">
          <h2>Add User</h2>
          <?php if(count($errors) > 0):?>
            <div class="error alart alert-danger">
              <?php foreach ($errors as $error): ?>
                <li><?php echo "$error"; ?> </li>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
          Name: <br>
          <input type="text" name="username" value="<?php echo $username; ?>"><br>
          Email: <br>
          <input type="email" name="email" value="<?php echo $email; ?>"><br>
          Password: <br>
          <input type="password" name="password" value="<?php echo $password; ?>"><br>
          Password Confirmation: <br>
          <input type="password" name="passwordconfirm" value="<?php echo $passwordconfirm; ?>"><br>
          <?php if (isset($admin) && $admin == 1): ?>
            Admin:<br>
            <input type="checkbox" name="admin" value="" checked><br>
          <?php else: ?>
            Admin:<br>
            <input type="checkbox" name="admin" value=""><br>
          <?php endif; ?>
          <input type="submit" name="create-admin" value="Add user"><br>
        </form>
      </article>
    </section>
    <!-- Footer -->
    <?php include ("../include/footer.php"); ?>
  </body>
</html>
