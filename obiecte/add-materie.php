<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object files
include_once '../cfg/database.php';
include_once 'materii.php';
$database = new Database();
$db = $database->getConnection();
$materie= new Materii($db);

$data=json_decode(file_get_contents("php://input"));

$materie->nume=$data->nume;

if($materie->create()){
	echo"{\"message\":\"Materie was created\"}";
}
else{
	echo"{\"message\": \"Materie was not created.\"}";
}
