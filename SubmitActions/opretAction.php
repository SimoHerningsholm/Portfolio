<?php
if($_SERVER["REQUEST_METHOD"] == "POST") 
{
    opret();
}
function opret() {
    include("../DataBind/OpretBruger.php");
    $conn = mysqli_connect("localhost", "root", "", "PortfolioDB");
    $opretBruger = new OpretBruger($_POST["brugernavn"], $_POST["kodeord"], $_POST["email"]);
    $opret = $opretBruger->opret($conn);
    mysqli_close($conn);
    switchAction($opret);
}
function switchAction($opret) 
{
    switch($opret) 
    {
        case "mailOgPassFormat": produceError("mailOgPassFormat");
        break;
        case "passFormat": produceError("passFormat");
        break;
        case "mailFormat": produceError("mailFormat");
        break;
        case "mailBrugerOptaget": produceError("mailBrugerOptaget");
        break;
        case "brugernavnOptaget": produceError("brugernavnOptaget");
        break;
        case "mailOptaget": produceError("mailOptaget");
        break;
        default: produceSuccess($opret);
        break;
    }
}
function produceSuccess($brugerId) 
{
    session_start();
    $_SESSION["brugerId"] = $brugerId;
    echo "<script> window.location.replace('http://localhost/portfolio');</script>";
}
function produceError($errorType)
{
    echo "<script>";
    echo "localStorage.setItem('opretErrMsg', 'true');";
    echo "localStorage.setItem('" . $errorType . "', 'true');";
    echo "window.location.replace('http://localhost/portfolio');";
    echo "</script>";
}
?>