<?php
if (!$_SESSION) {
  header('Location: ../userlogin');
  exit();
}
?>
<h1>Enter your 6-digit code:</h1><br>
<div>
  <form action="./model/checkCode.php" method="POST">
    <input type="text" name="smsverificationinput">
    <button type="submit" name="submit">Verify me</button>
  </form>
</div>
