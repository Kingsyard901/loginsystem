<!-- https://www.w3schools.com/css/css_navbar_horizontal.asp -->

<ul>
 <li><a href="home">Home</a></li>
 <li><a href="userlogin">Login</a></li>
 <li><a href="userregistration">Register</a></li>
 <li><a href="adminlogin">Admin Login</a></li>
 <li><a href="adminregistration">Admin Registration</a></li>
 <li><a href="user_profile">My Profile</a></li>
 <li style="float:right"><a class="active" href="logout">Logga ut (<?=$_SESSION['username']?>)</a></li>
</ul>
