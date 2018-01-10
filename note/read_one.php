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
$student = new Note($db);

$student->id=isset($_GET['id'])? $_GET['id']: die();

$student->readOne();


$student_data=array(
"id"=>$student->id,
"materieID"=>$student->materieID,
"Nota"=>$student->nota,
"studentID"=>$student->studentID,

);
print_r (json_encode($student_data));
?>