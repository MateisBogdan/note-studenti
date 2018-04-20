<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
 include_once '../cfg/database.php';
include_once '../obiecte/materii.php';
$database = new Database();
$db = $database->getConnection();
$materie = new Materii($db);

$materie->id=isset($_GET['id'])? $_GET['id']: die();

$materie->readOne();


$materie_data=array(
"id"=>$materie->id,
"nume"=>$materie->nume,
);
print_r (json_encode($materie_data));
?>