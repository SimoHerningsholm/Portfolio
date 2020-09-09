<html>
	<head>
	    <title> Portfolio forside </title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
		<link rel="stylesheet" href="styles/personalStyle.css" />
        <link rel="stylesheet" href="styles/bootstrap.min.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script>
		$(document).ready(function(){
			var contentHeader = $("<header></header>");
			contentHeader.addClass("contentHeaders");
			contentHeader.text("Logged in menu");
			var startBtn = $("<input />")
			startBtn.attr("class","btn btn-secondary text-dark loginMenuBtn");
			startBtn.attr("type", "button");
			startBtn.attr("value", "klik");
			var contentArticle = $("<article></article>");
			contentArticle.addClass("contentArticles");
			var loggedInMenuWrapper = $("<div></div>");
			loggedInMenuWrapper.attr("id", "loggedInMenuWrapper");
			loggedInMenuWrapper.append(startBtn);
			contentArticle.append(loggedInMenuWrapper);
			$("body").append(contentHeader);
			$("body").append(contentArticle);
		});
		/*
		<header class="contentHeaders"> Menu </header>
		<article class="contentArticles">
			<div id="loggedInMenuWrapper">
				<input type="button" class="btn btn-secondary text-dark loginMenuBtn" value="Startside" />
				<input type="button" class="btn btn-secondary text-dark loginMenuBtn" value="Rediger" />
				<input type="button" class="btn btn-secondary text-dark loginMenuBtn" value="Gæstebog" />
				<input type="button" class="btn btn-secondary text-dark loginMenuBtn" value="Lama votering" />
			</div>
		</article>
		*/
		</script>
	</head>
	<body>
	
	</body>
</html>
