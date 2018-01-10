<?php class Materii{

   private $conn;
    private $table_name = "materii";
	
	public $id;
	public $nume;
	
		public function __construct($database){
        $this->conn = $database;
    }
		function read(){
		$query= "SELECT * FROM ". $this->table_name;
	
	$stmt = $this->conn->prepare($query);
 
    
  $stmt->execute();
 
    return $stmt;
	}
	function readOne(){
		$query="SELECT * FROM ". $this->table_name. " WHERE ID=?";
		
		$statement=$this->conn->prepare($query);
		$statement->bindParam(1,$this->id);
		$statement->execute();
		
		$row=$statement->fetch(PDO::FETCH_ASSOC);
		$this->nume=$row['Nume'];
	
	}
	function create(){
		 $query = "INSERT INTO
                " . $this->table_name . "
            SET Nume=:nume ";
			$stmt=$this->conn->prepare($query);
			
			$this->nume=htmlspecialchars(strip_tags($this->nume));
			 $stmt->bindParam(":nume", $this->nume);
			 if($stmt->execute()){
				 return true;
			 }
			 return false;
}


}
	?>