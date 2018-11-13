<?php

if (isset($_POST['submit'])) {
  include_once 'dbh-inc.php';

  $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
  $user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
  $user_password = mysqli_real_escape_string($conn, $_POST['user_password']);

  //Error handlers
  //Check for empty fields
  if (empty($user_name) || empty($user_email) || empty($user_password)){
    header("Location: ../register.php?register=empty");
    exit();
  } else {
    //Checl if input characters are valid
    if (!preg_match("/^[a-zA-Z]*$/", $user_name)) {
      header("Location: ../register.php?register=invalid");
      exit();
    } else {
      //Check if Email is valid
      if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../register.php?register=email");
        exit();
      } else {
        $sql = "SELECT * FROM users WHERE user_email='$user_email'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0) {
          header("Location: ../register.php?register=taken");
          exit();
        } else {
          //Hashing the password
          $hashedPwd = password_hash($user_password,PASSWORD_DEFAULT);
          //Insert the user into the database
          $sql = "INSERT INTO users (user_name, user_email, user_password)
                    VALUES ('$user_name', '$user_email', '$hashedPwd');"
          ;
          mysqli_query($conn, $sql);
          header("Location: ../register.php?register=success");
          exit();
        }
      }
    }
  }
} else {
  header("Location: ../register.php");
  exit();
}
