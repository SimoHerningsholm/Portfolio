<?php
if($_SERVER["REQUEST_METHOD"] == "POST") 
{
    retMail();
}
function retMail()
{
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "PortfolioDB");
    include("../DataBind/RetMail.php");
    $retMail = new RetMail($_SESSION["profilId"], $_POST["gammelMail"], $_POST["nyMail"], $_POST["nyMailBekraeft"]);
    switch($retMail->ret($conn))
    {
        case "fejlNyGammel": produceError("fejlNyGammel");
        break;
        case "fejlGammel": produceError("fejlGammel");
        break;
        case "fejlNy": produceError("fejlNy");
        break;
        case "udført": produceSuccess();
        break;
        default: produceError("ukendtFejl");
        break;
    }
    mysqli_close($conn);
}
function produceSuccess() 
{
    echo "localStorage.setItem('retMailCompleteMsg', 'true');";
    echo "<script> window.location.replace('http://localhost/portfolio');</script>";
}
function produceError($errorType)
{
    echo "<script>";
    echo "localStorage.setItem('retMailErrMsg', 'true');";
    echo "localStorage.setItem('" . $errorType . "', 'true');";
    echo "window.location.replace('http://localhost/portfolio');";
    echo "</script>";
}
 ?>