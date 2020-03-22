<?php
  include("php/user-control.php");
  include("include/head.php");
 ?>
    <link rel="stylesheet" href="./style/style.css">
    <title>register</title>
  </head>
  <body class="loginpage">
    <!--Header-->
    <?php include "include/header.php" ?>
    <!--Content-->
    <div class="container">
      <form action = "register.php" method = "post">
        <h1>Register</h1>
        <!-- validation error -->
        <?php if(count($errors) > 0): ?>
          <div class="error alart alert-danger">
            <?php foreach ($errors as $error): ?>
              <li><?php echo "$error"; ?> </li>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
        Username:
        <input type="text" name="username" value="<?php echo $username; ?>" class="form-control form-control-lg"><br>
        Email:
        <input type="email" name="email" value="<?php echo $email; ?>" class="form-control form-control-lg"><br>
        Password:
        <input type="password" name="password" value="<?php echo $password; ?>" class="form-control form-control-lg"><br>
        Confirm Password:
        <input type="password" name="passwordconfirm" value="<?php echo $passwordconfirm; ?>" class="form-control form-control-lg"><br>
        <input type="submit" name="reg_user" value="register" class="form-control form-control-lg">
        <p class="text-center">Already a member? <a href="login.php">Login</a></p>
      </form>
    </div>
    <!-- Footer -->
    <?php include("include/footer.php"); ?>
  </body>
</html>
