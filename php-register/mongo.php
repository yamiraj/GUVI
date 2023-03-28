<?php
  
 require 'registration.php';

$client = new MongoDB\Driver\Manager("mongodb://localhost:27017");


$firstname 		= $_POST['firstname'];
$lastname 		= $_POST['lastname'];
$email 			= $_POST['email'];
$phonenumber	= $_POST['phonenumber'];
$password 		= sha1($_POST['password']);
$dob            =$_POST['dob'];
$age            =$_POST['age'];

$database = $client->selectDatabase('useraccounts');
if ($database) {
    $collection = $database->myCollection;
} else {
    echo "Failed to connect to database";
    exit();
}


// $insertResult = $collection->insertOne([
//     'firstname' => $firstname,
//     'lastname' => $lastname,
//     'email' => $email,
//     'phonenumber' => $phonenumber,
//     'password' => $password,
//     'dob' => $dob,
//     'age' => $age
// ]);

// if ($insertResult->getInsertedCount() === 1) {
//     echo "Data inserted successfully!";
// } else {
//     echo "Failed to insert data";
// }

function insert_user($firstname, $lastname, $email, $phonenumber, $password, $dob, $age){
    try {
        $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
        $bulk = new MongoDB\Driver\BulkWrite;
        $doc = ['firstname' => $firstname,
                'lastname' => $lastname,
                'email' => $email,
                'phonenumber' => $phonenumber,
                'password' => $password,
                'dob' => $dob,
                'age' => $age];
        $bulk->insert($doc);
        $result = $manager->executeBulkWrite('useraccounts.myCollection', $bulk);
        return $result;
    } catch (MongoDB\Driver\Exception\Exception $e) {
        die("Error encountered: ".$e);
    }
}
