<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json;");
 
// include database and object files
include_once '../cfg/database.php';
include_once '../obiecte/note.php';

$database = new Database();
$db = $database->getConnection();
 
 $nota = new Note($db);
 
 $stmt= $nota->read();
$num=$stmt->rowCount();

 if($num>0){
	 $note=array();
	 
	  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
       
     
        extract($row);
		$note_item=array(
		"ID"=>$ID,
		"materieID"=>$materieID,
		"Nota"=>$Nota,
		"studentID"=>	$studentID,	
		"NumeMaterie"=>$Nume,
		"NumeStudent"=>$NumeStudent
		);
		array_push($note,$note_item);
	  }
	  echo json_encode($note);
 }
	  else{
        
    echo json_encode(array("message" => "No grades have been found.")    );
}
  
?>