<?php
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
$nota->ID=$data->ID;

if($nota->delete()){
	echo"{\"message\": \"Nota deleted.\"}";
}
else{
	echo"{\"message\": \"Nota failed to delete.\"}";
	
}
?>