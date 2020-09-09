<!DOCTYPE html>
<html>
    <head>
        <title> Portfolio forside </title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
	<link rel="stylesheet" href="styles/personalStyle.css" />
        <link rel="stylesheet" href="styles/bootstrap.min.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="contents.js"></script>
        <?php 
            session_start();
            if(isset($_SESSION["brugerId"]) && $_SESSION["brugerId"] != null && $_SESSION["brugerId"] > 0)
            {
                echo "<script src='loginScript.js'></script>";
            }
        ?>
    </head>
    <body>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
            <a class="navbar-brand" id="navLogo" href="index.php">Simon HC Portfolio</a>
            <ul class="navbar-nav" id="navLinks">
                <li class="nav-item">
                   <a class="nav-link">CV</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link">Projekter</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link">Kontakt</a>
                </li>
            </ul>
        </nav>
	<div class="container-fluid" id="pageWrapper">
        <div class="row">
            <div class="col-sm-12" id="pageHeader">header</div>
        </div>
	<div class="row" id="row02">
            <div class="col-sm-4">
		<header class="contentHeaders"> Første projekt </header>
                <article class="contentArticles">
		Det er nu muligt at downloade svaret på de første C# øvelser jeg har lavet i skolepraktikken.
		Der vil komme flere projekter løbende.
		</article>
		</div>
		<div class="col-sm-4">
		<header class="contentHeaders"> Siden er oppe </header>
                <article class="contentArticles">
		Siden er omsider kommet op og køre. Nu venter der bare at den bliver
		evalueret af min instruktør. Der skulle dog ikke være det store problem på den konto
		da vi må erkende at denne hjemmeside er den flotteste der er skabt i verdenshistorien.
		</article>
                </div>
		<div class="col-sm-4">
                <header class="contentHeaders"> Kage </header>
                <article class="contentArticles">
		Siden begyndelsen af tid stod det skrevet i stenene at jeg godt kunne lide kage.
		</article>
                </div>
            </div>
        <div class="row">
            <div class="col-sm-9" id="pageMainContent">
            <header class="contentHeaders" id="mainContentHeader"> Portfolio </header>
            <article class="contentArticles" id="mainContentArticle">
            Velkommen til Simon HC Portfolio hjemmesiden. Denne hjemmeside har til formål at præsentere mig samt de projekter
            jeg laver i SKPen. Derudover er der på kontaktsiden mulighed for hurtigt at tage kontakt til mig gennem en
            kontaktformular hvis der skulle være behov for dette. <br /><br />
            <b>Venlig hilsen Simon Hylleberg Christensen</b>
            <br /><br />
            <img src="Billeder/begin.jfif" width="500" height="300" />
            </article>
	</div>
        <div class="col-sm-3" id="pageAsideContent">
            <header class="contentHeaders" id="asideContentHeaderOne"> Login </header>
            <article class="contentArticles" id="asideContentArticleOne">
                <form method="post" action="SubmitActions/loginAction.php">
                    <div class="form-group">
			<input type="text" class="form-control" placeholder="Navn" name="brugernavn" />
                    </div>
                    <div class="form-group">
			<input type="password" class="form-control" placeholder="Kodeord" name="kodeord" />
                    </div>
			<input id="loginBtn" type="submit" class="btn btn-secondary text-dark" value="Login" />
			<input id="opretBtn" type="button" class="btn btn-secondary text-dark" value="Opret" />
                    </form>
                    <div id="loginErrorMsg"></div>
            </article>
	</div>
	</div>
        <div class="row">
            <div class="col-sm-12 fixed-bottom" id="pageFooter">Copyright &#169 Simon HC Portfolio</div>
        </div>
        </div>
    </body>
</html>