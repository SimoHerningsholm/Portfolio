<?php
Class Profil {
        function __construct($conn)
        {
            $this->connection = $conn;
        }
        private $connection;
        private $id;
	private $fornavn;
	private $efternavn;
	private $email;
	private $telefon;
	private $postNummer;

	public function setId($val) 
	{
            $this->id = $val;
	}
	public function getId()
	{
            return $this->id;
	}        
	public function setFornavn($val) 
	{
            $this->fornavn = $val;
	}
	public function getFornavn()
	{
            return $this->fornavn;
	}
	public function setEfternavn($val) 
	{
            $this->efternavn = $val;
	}
	public function getEfternavn() 
	{
            return $this->efternavn;
	}	
	public function setEmail($val)
	{
            $this->email = $val;
	}
	public function getEmail()
	{
            return $this->email;
	}
	public function setTelefon($val) 
	{
            $this->telefon = $val;
	}
	public function getTelefon() 
	{
            return $this->telefon;
	}
	public function setPostnummer($val) 
	{
            $this->postNummer = $val;
	}
	public function getPostnummer() 
	{
            return $this->postNummer;
	}
	public function insert()
	{
            $sql = "INSERT INTO profil (Fornavn, Efternavn, Email, Telefon, Postnummer) VALUES ('" . $this->fornavn . "', '" . $this->efternavn . "', '" . $this->email . "', '" . $this->telefon . "', '" . $this->postNummer . "');";
            if (mysqli_query($this->connection, $sql)) 
            {
		return mysqli_insert_id($this->connection);
            }
            else 
            {
                echo false;
            }
	}
        public function updateMail() {
            $sql = "UPDATE profil SET Profil.Email = '" . $this->email ."' WHERE Profil.Id = '". $this->id ."';";
            if (mysqli_query($this->connection, $sql)) 
            {
                return "udført";
            }
            else 
            {
                return false;
            }
        }
	public function queryProfil()
	{
            $sql = "SELECT Fornavn, Efternavn, Email, Telefon, Postnummer FROM profil WHERE Id = '" . $this->id . "'";
            $result = mysqli_query($this->connection, $sql);
            if (mysqli_num_rows($result) > 0)
            {
            	$result = mysqli_fetch_assoc($result);
		return array($result["Email"], $result["Fornavn"], $result["Efternavn"], $result["Telefon"], $result["Postnummer"]);
            }
            else 
            {
            	return false;
            }
	}
        public function queryIdFromMail()
        {
            $sql = "SELECT Id FROM profil WHERE Email = '" . $this->email . "'";
            $result = mysqli_query($this->connection, $sql);
            if (mysqli_num_rows($result) > 0)
            {
		return mysqli_fetch_assoc($result)["Id"];
            }
            else 
            {
            	return false;
            }
        }
        public function queryMailFromId() 
        {
            $sql = "SELECT Email FROM profil WHERE Id = '" . $this->id . "';";
            $result = mysqli_query($this->connection, $sql);
            if (mysqli_num_rows($result) > 0)
            {
                return mysqli_fetch_assoc($result)["Email"];
            }
            else
            {
                return false;
            }
        }
}
 ?> 