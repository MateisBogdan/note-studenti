<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object files
include_once '../cfg/database.php';
include_once '../obiecte/student.php';
 if(isset($_POST['Submit']))
 {
	 $data=array(
	 'Nume'=>$_POST['nume'],
	 'Grupa'=>$_POST['Grupa'],
	 'cnp'=>$_POST['CNP'],
	 'Telefon'=>$_POST['telefon']
	 );
	 $jason=json_encode($data);
	echo $jason;
 }
$database = new Database();
$db = $database->getConnection();

$student= new Student($db);
$data= json_decode($jason); 
$student->nume=$data->Nume;
$student->grupa=$data->Grupa;
$student->cnp=$data->cnp;
$student->telefon=$data->Telefon;

if($student->create()){
	echo '{'.'\"message\": "Student was created."'.'}';
}
else{
    echo '{';
        echo '"message": "Student creation failed."';
    echo '}';
}
?>

