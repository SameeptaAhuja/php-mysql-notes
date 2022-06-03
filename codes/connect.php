<?php
$servername = "localhost/lab6"; 
$port_no = 3306; // Port number for Windows 
$username = 'user1';
$password = 'demo';
$myDB = 'lab5'; 

try { 
	 $conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
	// $conn = new PDO("mysql:host=$servername;dbname=$myDB",$username,$password);
	// set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	echo "Connection Successfully";
} catch(PDOException $e){
	echo "Connection failed : ".$e->getMessage();
}
?>