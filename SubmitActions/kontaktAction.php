<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    include("../DataBind/KontaktBesked");
    $conn = mysqli_connect("localhost", "root", "", "PortfolioDB");
    $KontaktBesked = new KontaktBesked($_POST["navn"], $_POST["email"], $_POST["emne"], $_POST["besked"]);
    $KontaktBesked->Opret($conn);
    mysqli_close($conn);
}
?>
