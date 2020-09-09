<?php
Class Postnummer {
	private $postNummer;
	private $byNavn;
	public function setPostnummer($val)
	{
		$this->postNummer = $val;
	}
	public function getPostnummer()
	{
		return $this->postNummer;
	}
	public function setBynavn($val)
	{
		$this->byNavn = $val;
	}
	public function getBynavn()
	{
		return $this->byNavn;
	}
	public function insert($conn) 
	{
		$sql = "INSERT INTO postnummer (Postnummer, Bynavn) VALUES ('" . $this->postNummer . "', '" . $this->byNavn . "');";
		if (mysqli_query($conn, $sql)) 
		{
		 $last_id = mysqli_insert_id($conn);
		 echo "success";
		}
		else
		{
		  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
	public function update() 
	{
	}
	public function del() 
	{
	}
	public function select() 
	{
	}
}
 ?>