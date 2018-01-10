<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
include_once '../cfg/database.php';
include_once '../obiecte/note.php';
$database = new Database();
$db = $database->getConnection();
$nota = new Note($db);
$data= json_decode(file_get_contents("php://input"));

$nota-> id=$data->ID;

$nota->studentID=$data->stdID;
$nota->nota=$data->nota;
$nota->materieID=$data->matID;


if($nota->update()){
		echo"{\"message\": \"Nota  was updated.\"}";
}
else{
		echo"{\"message\": \"Nota was not updated.\"}";
}
