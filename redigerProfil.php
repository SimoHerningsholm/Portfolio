<style>
#formWrapper {
	width:35%;
	margin:auto;
	margin-top:20px;
	background-color: #abb4ba;
	border-radius: 5px 5px 5px 5px;
}
#formHeadWrapper {
}
#formBodyWrapper {
	padding:10px;
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

</style>
<div id="formWrapper">
    <div id="formHeadWrapper">
	<div class="form-group" id="formHeader">
            Rediger bruger
	</div>
    </div>
    <div id="formBodyWrapper">
	<div class="form-group">
            <input type="button" id="retMailBtn" class="form-control btn btn-secondary text-dark" value="Ret mail" />
	</div>
	<div class="form-group">
            <input type="button" id="retPassBtn" class="form-control btn btn-secondary text-dark" value="Ret Password" />
	</div>
	<div class="form-group">
            <input type="button" id="retProfilBtn" class="form-control btn btn-secondary text-dark" value="Rediger profil" />
	</div>
    </div>
    <div id="errorMsg"></div>
</div>
<script>
$(document).ready(function() 
{
    $("#retMailBtn").click(function() {
	genRetMailCont();
    })
    $("#retPassBtn").click(function() {
	genRetPassCont();
    })
    $("#retProfilBtn").click(function() {
	genRetProfilCont();
    })
    if(typeof(Storage) !== "undefined")
    {
        if(localStorage.getItem("retMailCompleteMsg") == "true")
        {
            localStorage.removeItem("retMailCompleteMsg");
            genRetMailCont();
            $("#errorMsg").append("Mail opdateret successfuldt");
        }
        
        if(localStorage.getItem("retMailErrMsg") == "true")
        {
            localStorage.removeItem("retMailErrMsg");
            genRetMailCont();
            if(localStorage.getItem("fejlNyGammel") == "true")
            {
                $("#errorMsg").append("Gammel mail forkert og ny mail ikke ens i de to felter.");
                localStorage.removeItem("fejlNyGammel");
            }
            
            if(localStorage.getItem("fejlGammel") == "true")
            {
                $("#errorMsg").append("Gammel mail forkert");
                localStorage.removeItem("fejlGammel");
            }
            
            if(localStorage.getItem("fejlNy") == "true")
            {
                $("#errorMsg").append("ny mail ikke ens i de to felter");
                localStorage.removeItem("fejlNy");
            }
            
            if(localStorage.getItem("ukendtFejl") == "true")
            {
                $("#errorMsg").append("der er opstået en ukendt fejl");
                localStorage.removeItem("fejlNy");
            }
        }
    }
});
function genFelt(name, att2type, att2Val, type, clas) {
    var formGroupDiv = $("<div> </div>");
	formGroupDiv.addClass("form-group");
	var formGroupInputNyMail = $("<input />");
	formGroupInputNyMail.attr("name", name);
	formGroupInputNyMail.attr("type", type);
	formGroupInputNyMail.attr(att2type, att2Val);
	formGroupInputNyMail.addClass(clas);
	formGroupDiv.append(formGroupInputNyMail);
	return formGroupDiv;
}
function genFeltWithId(name, att2type, att2Val, type, clas, id) {
    var formGroupDiv = $("<div> </div>");
	formGroupDiv.addClass("form-group");
	var formGroupInputNyMail = $("<input />");
	formGroupInputNyMail.attr("name", name);
	formGroupInputNyMail.attr("type", type);
	formGroupInputNyMail.attr(att2type, att2Val);
	formGroupInputNyMail.attr("id", id);
	formGroupInputNyMail.addClass(clas);
	formGroupDiv.append(formGroupInputNyMail);
	return formGroupDiv;
}
function genFeltWithHandler(name, att2type, att2Val, type, clas, funk) {
    var formGroupDiv = $("<div> </div>");
	formGroupDiv.addClass("form-group");
	var formGroupInputNyMail = $("<input />");
	formGroupInputNyMail.on("click", funk);
	formGroupInputNyMail.attr("name", name);
	formGroupInputNyMail.attr("type", type);
	formGroupInputNyMail.attr(att2type, att2Val);
	formGroupInputNyMail.addClass(clas);
	formGroupDiv.append(formGroupInputNyMail);
	return formGroupDiv;
}
function genRetMailCont() {
	$("#formBodyWrapper").empty();
	var retMailForm = $("<form> </form>")
	retMailForm.attr("action", "SubmitActions/retMailAction.php");
	retMailForm.attr("method", "post");
	var formGroupDiv01 = genFelt("gammelMail", "placeholder", "indtast gammel mail", "email", "form-control");
	var formGroupDiv02 = genFelt("nyMail", "placeholder", "indtast ny mail", "email", "form-control");
	var formGroupDiv03 = genFelt("nyMailBekraeft", "placeholder", "bekræft ny mail", "email", "form-control");
	var formGroupDiv04 = genFelt("redigerMailSubmit", "value", "Rediger email" , "submit", "form-control btn btn-secondary text-dark");
	retMailForm.append(formGroupDiv01);
	retMailForm.append(formGroupDiv02);
	retMailForm.append(formGroupDiv03);
	retMailForm.append(formGroupDiv04);
	$("#formBodyWrapper").append(retMailForm);
}
function genRetPassCont() {
	$("#formBodyWrapper").empty();
	var formGroupDiv01 = genFelt("placeholder", "Indtast nyt password", "password", "form-control");
	var formGroupDiv02 = genFelt("placeholder", "bekræft nyt password", "password", "form-control");
	var formGroupDiv03 = genFelt("value", "Rediger password" , "button", "form-control btn btn-secondary text-dark");
	$("#formBodyWrapper").append(formGroupDiv01);
	$("#formBodyWrapper").append(formGroupDiv02);
	$("#formBodyWrapper").append(formGroupDiv03);
}
function genRetProfilCont() {
	$("#formBodyWrapper").empty();
	var formGroupDiv01 = genFelt("placeholder", "Fornavn", "text", "form-control");
	var formGroupDiv02 = genFelt("placeholder", "Efternavn", "text", "form-control");
	var formGroupDiv03 = genFelt("placeholder", "Telefon", "text", "form-control");
	var formGroupDiv04 = genFelt("placeholder", "Postnummer", "text", "form-control");
	var formGroupDiv05 = genFelt("value", "Rediger profil" , "button", "form-control btn btn-secondary text-dark");
	$("#formBodyWrapper").append(formGroupDiv01);
	$("#formBodyWrapper").append(formGroupDiv02);
	$("#formBodyWrapper").append(formGroupDiv03);
	$("#formBodyWrapper").append(formGroupDiv04);
	$("#formBodyWrapper").append(formGroupDiv05);
}
</script>