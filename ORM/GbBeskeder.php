<?php
Class GbBeskeder {
	private $id;
	private $brugerId;
	private $emne;
	private $besked;
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
	public function setEmne($val)
	{
		$this->emne = $val;
	}
	public function getEmne() 
	{
		return $this->emne;
	}
	public function setBesked($val)
	{
		$this->besked = $val;
	}
	public function getBesked()
	{
		return $this->besked;
	}
	public function setTid($val) 
	{
		$this->tid = $val;
	}
	public function getTid()
	{
		return $this->tid;
	}
}
 ?>