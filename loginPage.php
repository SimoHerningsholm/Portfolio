<style>
#formWrapper {
	width:25%;
	margin:auto;
	border-radius: 5px 5px 5px 5px;
}
#formHeadWrapper {
	
}
#formBodyWrapper {
	padding-top:0%;
}
#formHeader {
	padding-top:10px;
	padding-bottom:10px;
	padding-left:10px;
	font-weight:bold;
	background-color:#5C6770;
	border-radius: 5px;
	border-radius: 5px 5px 5px 5px;
}
#profilTable {
	width:100%;
	margin:auto;
}
.profilMeta {
	width:40%;
	font-weight:bold;
	padding-top:10px;
	padding-bottom:10px;
	padding-left:10px;
	
}
.profilData {
	width:60%;
	padding-top:10px;
	padding-bottom:10px;
	padding-left:10px;
}
.profilRows:nth-child(odd) {
	background-color: #abb4ba;
}
.profilRows:nth-child(even) {
	background-color: #8F9BA3;
}
</style>
<?php 
session_start();
if(!isset($_SESSION["brugerId"]) || $_SESSION["brugerId"] == null)
{
    header("location: http://localhost/portfolio/");
}
else 
{
    include("DataBind/LoadProfil.php");
    $conn = mysqli_connect("localhost", "root", "", "PortfolioDB");
    $loadProfil = new LoadProfil($_SESSION["brugerId"]);
    $profilData = $loadProfil->load($conn);
    $_SESSION["profilId"] = $profilData[0][0];
    if($profilData == false)
    {
        echo "Der er opstået en fejl";//eventuelt skal den redirecte
    }
}
?>
<div id="formWrapper">
    <div id="formHeader">
    Din profil
    </div>
    <div id="formBody">
	<table id="profilTable">
            <tr class="profilRows">
                <td class="profilMeta">Brugernavn:</td>
                <td class="profilData"><?php echo $profilData[0][1] ?></td>
            </tr>
            <tr class="profilRows">
                <td class="profilMeta">Email:</td>
                <td class="profilData"><?php echo $profilData[1][0] ?></td>
            </tr>
            <tr class="profilRows">
                <td class="profilMeta">Fornavn:</td>
                <td class="profilData"><?php echo $profilData[1][1] ?></td>
            </tr>
            <tr class="profilRows">
                <td class="profilMeta">Efternavn:</td>
                <td class="profilData"><?php echo $profilData[1][2] ?></td>
            </tr>
            <tr class="profilRows">
                <td class="profilMeta">Telefon:</td>
                <td class="profilData"><?php echo $profilData[1][3] ?></td>
            </tr>
            <tr class="profilRows">
                <td class="profilMeta">Postnummer:</td>
                <td class="profilData"><?php echo $profilData[1][4] ?></td>
            </tr>
	</table>
    </div>
</div>
<script>
	$(".loginMenuBtn").eq(0).click(function(){
		$(".contentHeaders").eq(0).text("Din side");
		$(".contentArticles").eq(0).load("loginPage.php");
	});
	$(".loginMenuBtn").eq(1).click(function(){
		$(".contentHeaders").eq(0).text("Din side");
		$(".contentArticles").eq(0).load("redigerProfil.php");
	});
	$(".loginMenuBtn").eq(2).click(function(){
		$(".contentHeaders").eq(0).text("Din side");
		$(".contentArticles").eq(0).load("Gaestebog.php");
	});
	$(".loginMenuBtn").eq(3).click(function(){
		$(".contentHeaders").eq(0).text("Din side");
		$(".contentArticles").eq(0).load("loginPage.php");
	});
        $(document).ready(function() 
        {
            if(typeof(Storage) !== "undefined")
            {
                if(localStorage.getItem("retMailCompleteMsg") == "true")
                {
                    $(".contentArticles").eq(0).load("redigerProfil.php");
                }
                
                if(localStorage.getItem("retMailErrMsg") == "true")
                {
                    $(".contentArticles").eq(0).load("redigerProfil.php");
                }
            }
        });

</script>