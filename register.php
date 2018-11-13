<?php
  include 'header.php';
?>

    <section class="main-container">
      <div class="main-wrapper">
        <h2>Register</h2>
        <form class="register-form" action="includes/register-inc.php" method="POST">
          <input type="text" name="user_name" placeholder="Display Name">
          <input type="text" name="user_email" placeholder="Email">
          <input type="password" name="user_password" placeholder="Password">
          <button type="submit" name="submit">Submit</button>
        </form>
      </div>
    </section>

<?php
  include 'footer.php';
?>
