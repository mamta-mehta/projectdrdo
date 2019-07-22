 <?php
$servername = 'localhost';
$username = 'root';
$password = '';
$db='myproject';

// Create connection
$db = new mysqli($servername, $username, $password,$db) ;
//$conn = mysqli_connect($servername, $username, $password);

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "yess";
?>
