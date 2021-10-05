<?php
// Page for viewing all registered users in db, if current user is admin or super_admin
if ($_SESSION['userType'] != 'super_admin') {
  header('Location: ./page404');
  exit();
}
?>

<h1>View all users</h1>
<div>
  <!-- Present which role user is logged in as. -->
  <h3>Du är inloggad som: <?php
    if ($_SESSION['userType'] == 'super_admin') {
      echo 'Super Administrator (Superuser)';
    } else if ($_SESSION[userType] == 'admin') {
      echo 'Administrator';
    }
  ?></h3>
</div>

<!-- Below -->
<!-- fetch all users from DB -->
<!-- Data will be searchable and sortable -->
