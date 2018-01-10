<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json;");
 
// include database and object files
include_once '../cfg/database.php';
include_once '../obiecte/note.php';

$database = new Database();
$db = $database->getConnection();
 
 $student = new Note($db);
 
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
		"materieID"=>$materieID,
		"Nota"=>$Nota,
		"studentID"=>	$studentID,	
		"NumeMaterie"=>$Nume,
		"NumeStudent"=>$NumeStudent
		);
		array_push($students,$student_item);
	  }
	  echo json_encode($students);
 }
	  else{
        
    echo json_encode(array("message" => "No grades have been found.")    );
}
  
?>