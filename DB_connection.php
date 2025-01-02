<?php  

$sName = "localhost";
$uName = "root";
$pass  = "";
// $db_name = "teaching_learning";
$db_name = "learning_teaching";

try {
	$conn = new PDO("mysql:host=$sName;dbname=$db_name", $uName, $pass);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
	echo "Connection failed: ". $e->getMessage();
	exit;
}