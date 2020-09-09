function genDynaContent(header) 
{
	var flexSpaceHeader = $("<div></div>");
	flexSpaceHeader.attr("id", "flexSpaceHeader");
	flexSpaceHeader.click(function() {
		dynamiskContentOuterWrapper.remove();
	})
	
	var dynaFlexRow01 = $("<div></div>");
	dynaFlexRow01.attr("id", "dynaFlexRow01");
	dynaFlexRow01.append(flexSpaceHeader);
	
	var flexSpaceConts1 = $("<div></div>");
	flexSpaceConts1.addClass("flexSpaceConts");
	flexSpaceConts1.click(function() {
		dynamiskContentOuterWrapper.remove();
	})
	
	var flexSpaceConts2 = $("<div></div>");
	flexSpaceConts2.addClass("flexSpaceConts");
	flexSpaceConts2.click(function() {
		dynamiskContentOuterWrapper.remove();
	})
	
	var span1 = $("<span></span>");
	span1.text(header);
	var span2 = $("<span></span>");
	span2.text(" X");
	span2.addClass("exitSpan");
	span2.click(function() {
		dynamiskContentOuterWrapper.remove();
	})
	
	var header = $("<header></header>");
	header.addClass("dynaContentHeaders");
	header.append(span1);
	header.append(span2);
	
	var article = $("<article></article>");
	article.addClass("contentArticles");
	article.addClass("dynaContentArticles");
	
	var flexContPrime = $("<div></div>");
	flexContPrime.attr("id", "flexContPrime");
	flexContPrime.append(header);
	flexContPrime.append(article);
	
	var dynaFlexRow02 = $("<div></div>");
	dynaFlexRow02.attr("id", "dynaFlexRow02");
	dynaFlexRow02.append(flexSpaceConts1);
	dynaFlexRow02.append(flexContPrime);
	dynaFlexRow02.append(flexSpaceConts2);
	
	var flexSpaceFooter = $("<div></div>");
	flexSpaceFooter.attr("id", "flexSpaceFooter");
	flexSpaceFooter.click(function() {
		dynamiskContentOuterWrapper.remove();
	})
	
	var dynaFlexRow03 = $("<div></div>");
	dynaFlexRow03.attr("id", "dynaFlexRow03");
	dynaFlexRow03.append(flexSpaceFooter);
	
	var dynamiskContentOuterWrapper = $("<div></div>");
	dynamiskContentOuterWrapper.attr("id", "DynamiskContentOuterWrapper");
	dynamiskContentOuterWrapper.append(dynaFlexRow01);
	dynamiskContentOuterWrapper.append(dynaFlexRow02);
	dynamiskContentOuterWrapper.append(dynaFlexRow03);
	$("body").prepend(dynamiskContentOuterWrapper);
}
$(document).ready(function() 
{
	$(".nav-link").eq(0).click(function(){
            $("#DynamiskContentOuterWrapper").remove();
            genDynaContent("CV");
            $(".dynaContentArticles").eq(0).load("CV.php");
	});
	$(".nav-link").eq(1).click(function(){
            $("#DynamiskContentOuterWrapper").remove();
            genDynaContent("Projekter");
            $(".dynaContentArticles").eq(0).load("Projekter.php");
	});
	$(".nav-link").eq(2).click(function(){
            $("#DynamiskContentOuterWrapper").remove();
            genDynaContent("Kontakt");
            $(".dynaContentArticles").eq(0).load("Kontakt.php");
	});
	$("#opretBtn").click(function(){
            $("#DynamiskContentOuterWrapper").remove();
            genDynaContent("Opret");
            $(".dynaContentArticles").eq(0).load("Opret.php");
	});
	if(typeof(Storage) !== "undefined")
	{
            if(localStorage.getItem("filledKontakt") == "kontakt")
            {
                localStorage.removeItem("filledKontakt");
            }
            if(localStorage.getItem("opretErrMsg") == 'true')
            {
                genDynaContent("Opret");
                $(".dynaContentArticles").eq(0).load("opret.php");
            }
            if(localStorage.getItem("loginError") == 'true')
            {
                $("#loginErrorMsg").text("Forkert brugernavn eller password");
                localStorage.removeItem("loginError");
            }
	}
});