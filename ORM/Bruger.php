<?php 
Class Bruger {
    	function __construct($conn)
        {
            $this->connection = $conn;
        }
        private $id;
	private $profilId;
	private $brugernavn;
	private $password;
	private $opretDato;
        private $connection;
        public function setId($val)
        {
            $this->id = $val;
        }
        public function getId()
        {
            return $this->id;
        }
        public function setProfilId($val)
        {
            $this->profilId = $val;
        }
        public function getProfilId()
        {
            return $this->profilId;
        }
	public function setBrugernavn($val)
	{
            $this->brugernavn = $val;
	}
	public function getBrugernavn()
	{
            return $this->brugernavn;
	}
	public function setPassword($val) 
	{
            $this->password = $val;
	}
	public function getPassword() 
	{
            return $this->password;
	}
	public function setOpretDato($val) 
	{
		$this->opretDato = $val;
	}
	public function getOpretDato()
	{
		return $this->opretDato;
	}
	public function insert() 
	{
            $sql = "INSERT INTO Bruger (ProfilId, Brugernavn, Password, Opretdato) VALUES ('" . $this->profilId . "', '" . $this->brugernavn . "', '" . $this->password . "', '" . $this->opretDato . "');";
            if (mysqli_query($this->connection, $sql)) 
            {
                return mysqli_insert_id($this->connection);
            }
            else 
            {
                return false;
            }
	}
	public function queryLogin() 
	{
            $sql = "SELECT Id FROM bruger WHERE Brugernavn = '" . $this->brugernavn . "' AND Password = '" . $this->password . "';";
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
	public function queryProfil()
	{
            $sql = "SELECT ProfilId, Brugernavn FROM bruger WHERE Id = '" . $this->id . "';";
            $result = mysqli_query($this->connection, $sql);
            if (mysqli_num_rows($result) > 0)
            {
                $result = mysqli_fetch_assoc($result);
                return array($result["ProfilId"], $result["Brugernavn"]);
            }
            else 
            {
                return false;
            }
	}
        public function queryIdFromBrugernavn()
        {
            $sql = "SELECT Id FROM bruger WHERE Brugernavn = '" . $this->brugernavn . "';";
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
            $sql = "SELECT profil.Email AS Email FROM bruger INNER JOIN Profil on Profil.Id = bruger.ProfilId WHERE bruger.Id = '" . $this->id . "';";
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