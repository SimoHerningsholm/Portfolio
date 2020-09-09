<?php
class Kontakt {
    public function __construct($conn) {
        $this->connection = $conn;
    }
   private $navn;
   private $email;
   private $emne;
   private $besked;
   private $connection;
   public function getNavn() {
       return $this->navn;
   }
   public function setNavn($val) {
        $this->navn = $val;
   }
   public function getEmail() {
       return $this->email;
   }
   public function setEmail($val) {
        $this->email = $val;
   }
   public function getEmne() {
       return $this->emne;
   }
   public function setEmne($val) {
        $this->emne = $val;
   }
   public function getBesked() {
       return $this->besked;
   }
   public function setBesked($val) {
        $this->besked = $val;
   }
   public function insert() 
   {
        $sql = "INSERT INTO kontakt (navn, email, emne, besked) VALUES ('" . $this->navn. "', '" . $this->email . "', '" . $this->emne . "', '" . $this->besked . "');";
	if (mysqli_query($this->connection, $sql)) 
        {
            return mysqli_insert_id($this->connection);
	}
        else 
	{
            return "Error: " . $sql . "<br>" . mysqli_error($this->connection);
	}
   }
   public function update() {
   }
   
   public function select() {  
   }
   
   public function delete() {
   }
}
