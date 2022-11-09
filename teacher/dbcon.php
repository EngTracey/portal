
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portal";
//$servername = "localhost";
//$username = "freightz_globtorch";
//$password = "freightz_globtorch";
//$dbname = "freightz_globtorch";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>