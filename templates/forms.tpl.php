<?php
    declare(strict_types = 1);
?>


<?php function output_login() { ?>
        <div class="container">
          <form class="login_form" action="../actions/login.action.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login">
            <footer>
              <p class="message">Don't have an account? <a href="../pages/register.php">Sign up</a></p>
            </footer>
          </form>
        </div>
    <?php } ?>

<?php function output_register() { ?>
  <div class="container">
    <h1>SIGN UP</h1>
    <form action="../actions/register.action.php" method="post">
      <label for="name">Name</label>
      <input type="text" id="name" name="name" required placeholder="Enter full name">
      <label for="username">Username</label>
      <input type="text" id="username" name="username" required placeholder="Enter username">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" required placeholder="Enter email">
      <label for="password">Password</label>
      <input type="password" id="password" name="password" required placeholder="Enter password">
      <input type="submit" value="Sign Up">
      <footer>
        <p class="message">Already have an account? <a href="../pages/login.php">Log in</a></p>
      </footer>
    </form>
  </div>
    <?php } ?>

    