  <header>
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="logo">
        <a href="index.php"><img src="./images/Logo.png" alt=""></a>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="menu collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="blog.php">BLog</a></li>
          <!-- dropdown -->
          <?php if(isset($_SESSION["id"])): ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="index.php" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user"></i>
                <?php echo $_SESSION["username"]; ?>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <?php if($_SESSION["admin"]): ?>
                  <a class="dropdown-item" href="<?php echo "php/dashboard.php"; ?>">Dashboard</a>
                <?php endif; ?>
                <a class="dropdown-item" href="<?php echo "logout.php"; ?>">Logout</a>
              </div>
            </li>
          <?php else: ?>
            <li class="nav-item"><a class="nav-link" href="<?php echo "register.php"; ?>">Register</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo "login.php"; ?>">Login</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </nav>
  </header>
