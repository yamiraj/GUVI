<?php
session_start();
require_once('config.php');

$uname = $_POST['username'];
$password = $_POST['password'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "useraccounts";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users WHERE email = '$uname';";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

  $user = $result->fetch_assoc();
  //var_dump($user);
	if(isset($user)){
		$_SESSION['userlogin'] = $user;
		echo '1';
	}else{
		echo 'There no user for that combo';		
	}
    
}else{
	echo 'There were errors while connecting to database.'.$sql;
}
$conn->close();

