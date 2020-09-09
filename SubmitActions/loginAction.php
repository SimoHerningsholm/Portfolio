<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    include("../DataBind/Login.php");
    $login = new Login($_POST["brugernavn"], $_POST["kodeord"]);
    $brugerId = $login->checkBruger(mysqli_connect("localhost", "root", "", "PortfolioDB"));
    if($brugerId != false)
    {
        session_start();
        $_SESSION["brugerId"] = $brugerId;
        echo "<script> window.location.replace('http://localhost/portfolio');</script>";
    }
    else 
    {
        echo "den ramte false";
    }
}
?>