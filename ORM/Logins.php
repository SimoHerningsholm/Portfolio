<?php
Class Logins 
{
	private $id;
	private $brugerId;
	private $forsøgStatus;
	private $tid;
	
	public function setId($val)
	{
		$this->id = $val;
	}
	public function getId()
	{
		return $this->id;
	}
	public function setBrugerId($val)
	{
		$this->brugerId = $val;
	}
	public function getBrugerId()
	{
		return $this->brugerId;
	}
	public function setForsøgStatus($val) 
	{
		$this->forsøgStatus = $val;
	}
	public function getForsøgStatus() 
	{
		return $this->forsøgStatus;
	}
	public function setTid($val)
	{
		$this->tid = $val;
	}
	public function getTid()
	{
		return $this->tid;
	}
	public function insert($conn)
	{
		$sql = "INSERT INTO logins (BrugerId, ForsøgStatus, Tid) VALUES ('" . $this->brugerId . "', '" . $this->forsøgStatus . "', '" . $this->tid . "');";
		mysqli_query($conn, $sql);
	}
}
 ?>