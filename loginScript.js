function genLoginMenu()
{
	var contentHeader = $("<header></header>");
	contentHeader.addClass("contentHeaders");
	contentHeader.text("Logged in menu");
	var startSideBtn = $("<input />")
	startSideBtn.attr("class","btn btn-secondary text-dark loginMenuBtn");
	startSideBtn.attr("type", "button");
	startSideBtn.attr("value", "start side");
	var redigerSideBtn = $("<input />")
	redigerSideBtn.attr("class","btn btn-secondary text-dark loginMenuBtn");
	redigerSideBtn.attr("type", "button");
	redigerSideBtn.attr("value", "Rediger");
	var gaesteBogBtn = $("<input />")
	gaesteBogBtn.attr("class","btn btn-secondary text-dark loginMenuBtn");
	gaesteBogBtn.attr("type", "button");
	gaesteBogBtn.attr("value", "Gæstebog");
	var lamaVoteringBtn = $("<input />")
	lamaVoteringBtn.attr("class","btn btn-secondary text-dark loginMenuBtn");
	lamaVoteringBtn.attr("type", "button");
	lamaVoteringBtn.attr("value", "Lama votering");
	var contentArticle = $("<article></article>");
	contentArticle.addClass("contentArticles");
	var loggedInMenuWrapper = $("<div></div>");
	loggedInMenuWrapper.attr("id", "loggedInMenuWrapper");
	loggedInMenuWrapper.append(startSideBtn);
	loggedInMenuWrapper.append(redigerSideBtn);
	loggedInMenuWrapper.append(gaesteBogBtn);
	loggedInMenuWrapper.append(lamaVoteringBtn);
	contentArticle.append(loggedInMenuWrapper);
	$("#pageAsideContent").prepend(contentArticle);
	$("#pageAsideContent").prepend(contentHeader);
}
$(document).ready(function() {
	$('#mainContentHeader').text('Login side');
	$('#mainContentArticle').load('loginPage.php');
	$('#asideContentHeaderOne').text('Log ud');
	$('#asideContentArticleOne').load('logout.php');
	genLoginMenu();
	$("#row02").remove();
});