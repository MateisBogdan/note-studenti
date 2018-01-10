<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json;");
 
// include database and object files
include_once '../cfg/database.php';
include_once '../obiecte/materii.php';

$database = new Database();
$db = $database->getConnection();
 
 $student = new Materii($db);
 
 $stmt= $student->read();
$num=$stmt->rowCount();

 if($num>0){
	 $students=array();
	 
	  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
       
       //$row['name'] to
        // just $name only
        extract($row);
		$student_item=array(
		"ID"=>$ID,
		"Nume"=>$Nume
	
		);
		array_push($students,$student_item);
	  }
	  echo json_encode($students);
 }
	  else{
        
    echo json_encode(array("message" => "No subjects have been found.")    );
}
  
?>