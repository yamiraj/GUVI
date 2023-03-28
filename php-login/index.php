<?php
session_start();

if(!isset($_SESSION['userlogin'])){
    header("Location: login.php");
}

if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION);
    header("Location: login.php");
}

$firstname = $_SESSION['userlogin']['firstname'];
$lastname = $_SESSION['userlogin']['lastname'];
$email = $_SESSION['userlogin']['email'];
$phonenumber = $_SESSION['userlogin']['phonenumber'];
$dob = $_SESSION['userlogin']['dob'];
$age = $_SESSION['userlogin']['age'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>User Profile</title>
  <link rel="stylesheet" type="text/css" href="../css-profile/styles.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
  

  <div class="user-info">
<center><h1>Welcome, <?php echo $firstname . " " . $lastname; ?></h1><hr></center>  
    <label>Email:</label>
    <div class="user-data"><?php echo $email; ?></div>

    <label>Phone Number:</label>
    <div class="user-data"><?php echo $phonenumber; ?></div>

    <label>Date of Birth:</label>
    <div class="user-data"><?php echo $dob; ?></div>

    <label>Age:</label>
    <div class="user-data"><?php echo $age; ?></div>

    <a href="index.php?logout=true" class="logout">Logout</a>
  </div>
</body>
</html>
