<?php class Note{

   private $conn;
    private $table_name = "note";
	
	public $id;
	public $studentID;
	public $nota;
	public $materieID;
	
		public function __construct($database){
        $this->conn = $database;
    }
	function readOne(){
	$query="SELECT * FROM ".$this->table_name." WHERE ID=?";
	
		$statement=$this->conn->prepare($query);
		$statement->bindParam(1,$this->id);
		$statement->execute();
		$row=$statement->fetch(PDO::FETCH_ASSOC);
		$this->materieID=$row['materieID'];
		$this->nota=$row['nota'];
		$this->studentID=$row['studentID'];
	}
	function read(){
		$query= "SELECT n.ID,n.studentID,n.materieID,n.Nota,m.Nume,s.Nume AS NumeStudent FROM note n INNER JOIN students s ON s.ID=n.studentID INNER JOIN materii m ON m.ID=n.materieID";
	
	$stmt = $this->conn->prepare($query);
 
    
  $stmt->execute();
 
    return $stmt;
	}
	function create(){
		 $query = "INSERT INTO
                " . $this->table_name . "
            SET
                studentID=:stdID, Nota=:nota, materieID=:matID";
				 $stmt = $this->conn->prepare($query);
				 
				$this->studentID=htmlspecialchars(strip_tags($this->studentID));
				$this->nota=htmlspecialchars(strip_tags($this->nota));
				$this->materieID=htmlspecialchars(strip_tags($this->materieID));
				
				 $stmt->bindParam(":stdID", $this->studentID);
				  $stmt->bindParam(":nota", $this->nota);
				   $stmt->bindParam(":matID", $this->materieID);
					if($stmt->execute()){
        return true;
    }
 
    return false;
     
	}
	function delete(){
		$query = "DELETE FROM ". $this->table_name . " WHERE ID = ?";
		$statement= $this-> conn->prepare($query);
		
		$this->id=htmlspecialchars(strip_tags($this->ID));
		
		$statement-> bindParam(1,$this->id);
		
		if($statement->execute()){
			return true;
			
				}
				return false;
	}
}
	?>