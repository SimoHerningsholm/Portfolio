<?php 
class Valider {
	public function validerOptagetVal($felt, $tabel, $val, $conn) 
	{
		$sql = "SELECT " . $felt . " FROM " . $tabel . " WHERE ". $felt ." = '" . $val . "';";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0)
		{
			return "optaget"; 
		}
		else
		{
			return "ledig";
		}
	}
	public function validerLoginForsøg($brugerNavn, $passWord, $conn)
	{
		$sql = "SELECT Id FROM bruger WHERE Brugernavn = '" . $brugerNavn . "' AND Password = '" . $passWord . "';";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) == 1)
		{
			return array(mysqli_fetch_assoc($result)["Id"], "match");
		}
		else
		{
			$sql = "SELECT Id FROM bruger WHERE Brugernavn = '" . $brugerNavn . "';";
			$result = mysqli_query($conn, $sql);
			if(mysqli_num_rows($result) == 1)
			{
				return array(mysqli_fetch_assoc($result)["Id"], "noMatch");
			}
			else
			{
				$resArr = array(0, "noMatch");
				return "noMatch";
			}
		}
	}
	public function validerEmailFormat($mail)
	{
		if(!filter_var($mail, FILTER_VALIDATE_EMAIL))
		{
			return "invalid";
		}
		else 
		{
			return "godkendt";
		}
	}
	public function validerEmail($mail) 
	{
		
	}
	public function validerPasswordFormat($password)
	{
		$uppercase = preg_match('@[A-Z]@', $password);
		$lowercase = preg_match('@[a-z]@', $password);
		$number    = preg_match('@[0-9]@', $password);
		if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) 
		{
			return "invalid";
		}
		else
		{
			return "godkendt";
		}
	}
}
?>
	