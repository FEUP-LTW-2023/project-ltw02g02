<?php
    declare(strict_types = 1);
?>

<?php function output_profile($edit) { 
  if ($edit) {?>
  <div class="container">
  <h2>Edit Profile</h2>
  <form action="../actions/editProfile.action.php" method="post">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" value=<?=htmlentities($_SESSION['user_name'])?>>
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" value=<?=htmlentities($_SESSION['username'])?>>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" value=<?=htmlentities($_SESSION['email'])?>>
      <!-- <label for="email">Adress:</label>
      <input type="email" id="email" name="email" value="123 Main St, Anytown USA"> -->
      <div class="profile-buttons">
        <input type="submit" value="Save Changes">
        <a href="../pages/profile.php">Cancel</a>
      </div>
  </form>
  <?php } else { ?>
  <div class="container">
  <h2>Welcome, <?=htmlentities($_SESSION['user_name'])?></h2>
    <div class="profile-info">
      <p><strong>Name:</strong> <?=htmlentities($_SESSION['user_name'])?></p>
      <p><strong>Username:</strong> <?=htmlentities($_SESSION['username'])?></p>
      <p><strong>Email:</strong> <?=htmlentities($_SESSION['email'])?></p>
      <!-- <p><strong>Address:</strong> 123 Main St, Anytown USA</p> -->
    </div>
    <div class="profile-buttons">
      <a href="../pages/profile.php?edit" class="profile-btn">Edit Profile</a>
      <!-- <button><a href="?edit">Change Password</a></button> -->
      <a href="../actions/logout.action.php">Logout</a>
    </div>
</div>
  <?php } ?>
<?php } ?>