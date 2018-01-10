<?php 
class Student{
 
    // database connection and table name
    private $conn;
    private $table_name = "students";
	
	  public $id;
    public $nume;
	public $grupa;
	public $cnp;
	public $telefon;
	public function __construct($database){
        $this->conn = $database;
    }
	function read(){
		$query= "SELECT * FROM students";
	
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
		$this->grupa=$row['Grupa'];
		$this->cnp=$row['CNP'];
		$this->telefon=$row['Telefon'];
		
		
	}
	
	function create(){
		 $query = "INSERT INTO
                " . $this->table_name . "
            SET
                Nume=:name, Grupa=:Grupa, CNP=:cnp, Telefon=:telefon";
				 $stmt = $this->conn->prepare($query);
				 print_r($this);
				$this->nume=htmlspecialchars(strip_tags($this->nume));
				$this->grupa=htmlspecialchars(strip_tags($this->grupa));
				$this->cnp=htmlspecialchars(strip_tags($this->cnp));
				$this->telefon=htmlspecialchars(strip_tags($this->telefon));
				 $stmt->bindParam(":name", $this->nume);
				  $stmt->bindParam(":Grupa", $this->grupa);
				   $stmt->bindParam(":cnp", $this->cnp);
				    $stmt->bindParam(":telefon", $this->telefon);
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
	function update(){
		$query="UPDATE ". $this->table_name." SET Nume=:nume, Grupa=:grupa, CNP=:cnp, Telefon=:telefon WHERE ID=:id";
		$statement= $this->conn->prepare($query);
				
				$this->nume=htmlspecialchars(strip_tags($this->nume));
				$this->grupa=htmlspecialchars(strip_tags($this->grupa));
				$this->cnp=htmlspecialchars(strip_tags($this->cnp));
				$this->telefon=htmlspecialchars(strip_tags($this->telefon));
				$this->id=htmlspecialchars(strip_tags($this->id));
				$statement->bindParam(":nume",$this->nume);
				 $statement->bindParam(":grupa",$this->grupa);
				 $statement->bindParam(":cnp",$this->cnp);
				 $statement->bindParam(":telefon",$this->telefon);
				 $statement->bindParam(":id",$this->id);
				 if($statement->execute()){
					 return true;
				 }
				 return false;
	}
}
	
	?>