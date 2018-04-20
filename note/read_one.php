<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
 include_once '../cfg/database.php';
include_once '../obiecte/note.php';
$database = new Database();
$db = $database->getConnection();
$nota = new Note($db);

$nota->id=isset($_GET['id'])? $_GET['id']: die();

$nota->readOne();


$note_data=array(
"id"=>$nota->id,
"materieID"=>$nota->materieID,
"Nota"=>$nota->nota,
"studentID"=>$nota->studentID,

);
print_r (json_encode($note_data));
?>