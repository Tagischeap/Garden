<?php

session_start();

if (isset($_POST['submit'])) {
  include 'dbh-inc.php';

  $user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
  $user_password = mysqli_real_escape_string($conn, $_POST['user_password']);

  //Error handlers
  //Check if inputs are empty
  if (empty($user_email) || empty($user_password)) {
    header("Location: ../index.php?login=empty");
    exit();
  } else {
    $sql = "SELECT * FROM users WHERE user_email = '$user_email'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck < 1) {
      header("Location: ../index.php?login=email");
      exit();
    } else {
      if ($row = mysqli_fetch_assoc($result)) {
        //De-Hashing password
        $hashedPasswordCheck = password_verify($user_password, $row['user_password']);
        if ($hashedPasswordCheck == false) {
          header("Location: ../index.php?login=password");
          exit();
        }elseif ($hashedPasswordCheck == true) {
          //Connects user to website
          $_SESSION['u_id'] = $row['user_id'];
          $_SESSION['u_name'] = $row['user_name'];
          $_SESSION['u_email'] = $row['user_email'];
          header("Location: ../index.php?login=success");
          exit();
        }
      }
    }
  }
} else {
  header("Location: ../index.php?login=error");
  exit();
}

?>
