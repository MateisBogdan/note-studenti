<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
 include_once '../cfg/database.php';
include_once '../obiecte/student.php';
$database = new Database();
$db = $database->getConnection();
$student = new Student($db);

$student->id=isset($_GET['id'])? $_GET['id']: die();

$student->readOne();


$student_data=array(
"id"=>$student->id,
"nume"=>$student->nume,
"Grupa"=>$student->grupa,
"CNP"=>$student->cnp,
"Telefon"=>$student->telefon
);
print_r (json_encode($student_data));
?>