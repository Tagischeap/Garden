<?php
session_start();
 ?>
<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <header>
      <nav>
        <div class = "main-wrapper">
          <ul>
            <li><a href="index.php">Index</a></li>
          </ul>
          <div class="nav-login">
            <?php
              if (isset($_SESSION['u_id'])) {
                echo '
                
                Welcome ' . $_SESSION['u_name'] . '

                <form action="includes/logout-inc.php" method="POST">
                  <button type="submit" name="submit">Logout</button>
                </form>

                ';
              } else {
                echo '

                <form action="includes/login-inc.php" method="POST">
                  <input type="text" name="user_email" placeholder="Email">
                  <input type="password" name="user_password" placeholder="Password">
                  <button type="submit" name="submit">Login</button>
                </form>
                <a href="register.php">Register</a>

                ';
              }
            ?>
          </div>
        </div>
      </nav>
    </header>
<!-- https://youtu.be/xb8aad4MRx8?t=1h21m28s -->
