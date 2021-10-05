<!-- User registration form. -->
<h1>Please fill out the registration.</h1>
<div>
  <form action="./model/db_user_registration.php" method="POST">

    <label for="userfirst">First name:</label>
    <input type="text" name="userfirst"><br><br>

    <label for="userlast">Last name:</label>
    <input type="text" name="userlast"><br><br>

    <label for="usersemail">Email:</label>
    <input type="text" name="usersemail"><br><br>

    <label for="usersname">Username:</label>
    <input type="text" name="usersname"><br><br>

    <label for="userspassword">Password:</label>
    <input type="password" name="userspassword"><br><br>

  <!-- Repeat your password -->
    <!-- <label for="password">My Password:</label>
    <input type="password" id="password" name="password"><br><br> -->

    <!-- <label for="countrycodenr">Country Code:</label>
    <input type="text" name="countrycodenr"><br><br> -->

    <label for="mobilenr">Cellphone number:</label>
    <input type="text" name="mobilenr" placeholder="Example: +46731234567"><br><br>

    <label for="profiletext">Short description of myself:</label>
    <input type="text" name="profiletext"><br><br>

    Choose User Level: <select name="user_role">
      <option value="user" selected="selected">Standard user</option>
      <option value="admin">Standard Admin</option>
      <option value="super_admin">Superuser Admin</option>
    </select>
    <br><br>

   <input type="submit" value="Submit">
  </form>
</div>
