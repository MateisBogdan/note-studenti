<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json;");
 
// include database and object files
include_once '../cfg/database.php';
include_once '../obiecte/materii.php';

$database = new Database();
$db = $database->getConnection();
 
 $materie = new Materii($db);
 
 $stmt= $materie->read();
$num=$stmt->rowCount();

 if($num>0){
	 $materii=array();
	 
	  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
       
       //$row['name'] to
        // just $name only
        extract($row);
		$materie_item=array(
		"ID"=>$ID,
		"Nume"=>$Nume
	
		);
		array_push($materii,$materie_item);
	  }
	  echo json_encode($materii);
 }
	  else{
        
    echo json_encode(array("message" => "No subjects have been found.")    );
}
  
?>