<?php
include("connection.php");
$con=mysqli_connect("localhost","root","","myproject");
mysqli_select_db($con,"myproject");

if(isset($_REQUEST["submit"]))
{
    $user=$_REQUEST["user"];
    $pass=$_REQUEST["pass"];
  $query= mysqli_query( $con,"select * from sender where user='$user' && pass='$pass'");
  $rowcount= mysqli_num_rows($query);
  if($rowcount==true)
  {
  echo "valid user";
  }
  else
  {
  	echo "invalid user";
  }
}


?> <html>
<head>
  <meta charset="utf-8">
  <title>transparent login form</title>
  <link rel="stylesheet"href="style.css">
<body>
<form method="post"><div class="login-box">
  <h1>LOG-IN</h1>
  <div class="textbox">
    <i class="fa fa-user" aria-hidden="true"></i>
    <input type="text" placeholder="Username" name="user" value="">
  </div>
  <div class="textbox">
    <i class="fa fa-lock" aria-hidden="true"></i>
    <input type="password" placeholder="Password" name="pass" value="">
  </div>
  <!--<input class="btn" type="button" name="" value="login">-->
  <input type="submit" value="login" name="submit">
</div>
</form>
</body>
</html>