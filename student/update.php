<?php
// required headers
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

$student-> id=$data->ID;

$student->nume=$data->nume;
$student->grupa=$data->Grupa;
$student->cnp=$data->CNP;
$student->telefon=$data->telefon;

if($student->update()){
		echo"{\"message\": \"Student  was updated.\"}";
}
else{
		echo"{\"message\": \"Student was not updated.\"}";
}
