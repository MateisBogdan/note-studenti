<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../cfg/database.php';
include_once '../obiecte/student.php';
$database = new Database();
$db = $database->getConnection();
$student = new Student($db);
$data= json_decode(file_get_contents("php://input"));
$student->ID=$data->ID;

if($student->delete()){
	echo"{\"message\": \"Student  deleted.\"}";
}
else{
	echo"{\"message\": \"Student failed to delete.\"}";
	
}
?>