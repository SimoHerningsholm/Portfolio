<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	session_start();
	unset($_SESSION['brugerId']);
	echo "<script> window.location.replace('http://localhost/portfolio');</script>";
}
?>	
