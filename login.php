<?php
  include("php/user-control.php");
  include("include/head.php");
 ?>
    <link rel="stylesheet" href="./style/style.css">
    <title>login</title>
  </head>
  <body class="loginpage">
    <!--Header-->
    <?php include "include/header.php" ?>
    <!--Content-->
    <div class="container" id="logincontent">
      <form action = "login.php" method = "post">
        <h1>Login</h1>
        <?php if(count($errors) > 0):?>
        <div class="error alart alert-danger">
          <?php foreach ($errors as $error): ?>
            <li><?php echo "$error"; ?> </li>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>
        Username or Email:
        <input type="text" name="username" value="<?php echo $username; ?>" class="form-control form-control-lg"><br>
        Password:
        <input type="password" name="password" value="<?php echo $password; ?>" class="form-control form-control-lg"><br>

        <input type="submit" name="login_user" value="Login" class="form-control form-control-lg">
        <p class="text-center">Not yet a member? <a href="register.php">Register Here</a></p>
      </form>
    </div>
    <!-- Footer -->
    <?php include("include/footer.php"); ?>
  </body>
</html>
