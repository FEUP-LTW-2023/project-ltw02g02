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
    <h2>SIGN UP</h2>
    <form action="../actions/register.action.php" method="post">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required placeholder="Enter full name">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required placeholder="Enter username">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required placeholder="Enter email">
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required placeholder="Enter password">
      <input type="submit" value="Sign Up">
      <footer>
        <p class="message">Already have an account? <a href="../pages/login.php">Log in</a></p>
      </footer>
    </form>
  </div>
    <?php } ?>

<?php function output_createTicket($departments) { ?>
  <div class="container">
    <h2>Create a New Ticket</h2>
    <form action="../actions/createTicket.action.php" method="post">
              <label for="department">Choose a department:</label>
              <select id="department" name="department">
                  <option value='' selected></option>
                  <?php foreach ($departments as $department) { ?>
                  <option value="<?=$department['depart_id']?>"><?=htmlentities($department['depart_name'])?></option>
                  <?php } ?>
              </select> 
              <label for="subject">Subject:</label>
              <input type="text" id="subject" name="subject" required>
              <label for="description">Description:</label>
              <textarea id="description" name="description" rows="5" cols="60" required></textarea>
              <input type="submit" value="Create">
    </form>
  </div>
  <?php } ?>