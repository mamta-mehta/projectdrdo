<?php
include("connection.php");
$con=mysqli_connect("localhost","root","","myproject");
mysqli_select_db($con,"myproject");

if(isset($_REQUEST["submit"]))
{
    $phone=$_REQUEST["phone"];
  $query= mysqli_query( $con,"select * from maint where phone='$phone'");
  $rowcount= mysqli_num_rows($query);
  if($rowcount==true)
  {
  echo "connection established";
  }
  else
  {
    echo "enter a valid phone";
  }
}


?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
</head>
<body>

<h3>Contact Form</h3>

<div class="container">
  <form method="post">
    <label for="fname">PHONE NUMBER</label>
    <input type="text" id="fname" name="phone" placeholder="enter the number to make a call..">
     <label for="data">TYPE OF DATA</label>
    <select id="data" name="data">
      <option value="text">Text</option>
      <option value="image">Image</option>
      <option value="voicecall">Voicecall</option>
      <option value="video">Video</option>
    </select>

    <label for="subject">Subject</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:150px"></textarea>

    <input type="submit" value="Submit" name="submit">
  </form>
</div>

</body>
</html>