<?php 
Class Databind 
{
	function __construct($conn) 
	{
		$this->conn = $conn;
	}
	private $conn;
	public function loadProfil($id) 
	{
		include("ORM/Bruger.php");
		include("ORM/Profil.php");
		$loadBrugerData = new Bruger();
		$brugerDataArr = $loadBrugerData->queryLoginInfo($this->conn, $id);
		$loadProfilData = new Profil();
		$profilDataArr = $loadProfilData->queryProfil($this->conn, $brugerDataArr[0]);
		if($brugerDataArr != false && $profilDataArr != false)
		{
			return array($brugerDataArr, $profilDataArr);
		}
		else
		{
			return false;
		}
	}
	public function updateMail($gammel, $ny, $bekræft)
	{
		include("ORM/Bruger.php");
		include("ORM/Profil.php");
		$brugerObj = new bruger();
		$profilId = brugerObj->queryProfilId($conn, $_SESSION["brugerId"]);
	}
}
?>
