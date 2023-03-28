<?php
require_once('config.php');
?>
<?php

if(isset($_POST)){

	$firstname 		= $_POST['firstname'];
	$lastname 		= $_POST['lastname'];
	$email 			= $_POST['email'];
	$phonenumber	= $_POST['phonenumber'];
	$password 		= sha1($_POST['password']);
    $dob            =$_POST['dob'];
    $age            =$_POST['age'];

		$sql = "INSERT INTO users (firstname, lastname, email, phonenumber, password, dob, age ) VALUES(?,?,?,?,?,?,?)";
		$stmtinsert = $db->prepare($sql);
		$result = $stmtinsert->execute([$firstname, $lastname, $email, $phonenumber, $password ,$dob ,$age]);
		if($result){
			echo 'Successfully saved.';

        //     $user_id = $db->lastInsertId();
        //     $_SESSION['user_id'] = $user_id;
        //     header("Location: ../profile/profile.php");
        // exit();

		}else{
			echo 'There were erros while saving the data.';
		}
}else{
	echo 'No data';
}