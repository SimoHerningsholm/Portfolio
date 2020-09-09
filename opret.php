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
    <form id="opretForm" method="post" action="SubmitActions/opretAction.php">
        <div id="formHeadWrapper">
            <div class="form-group" id="formHeader">
                Opret bruger
            </div>
        </div>
        <div id="formBodyWrapper">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Brugernavn" name="brugernavn" autofocus />
            </div>
            <div id="passInput01FormGroup" class="form-group">
                <input id="passInput01" type="password" onfocus="pass01Focus()" class="form-control" placeholder="Kodeord" name="kodeord" />
            </div>
            <div id="mailInput01FormGroup" class="form-group">
                <input id="mailInput01" type="email" onfocus="mail01Focus()" class="form-control"  placeholder="Email" name="email" />
            </div>
            <input type="button" onclick="clientSideCheck()" id="opretBtn" class="btn btn-secondary text-dark" value="Opret" />
        </div>
    </form>
    <div id="errorMsg">
    </div>
</div>
</br>
<script>
if (typeof(Storage) !== "undefined")
{
    if(localStorage.getItem("opretErrMsg") == 'true')
    {	
	if(localStorage.getItem("mailOgPassFormat") == 'true')
	{
            $("#errorMsg").append("<p>Indtastet mail har forkert format.</p>");
            $("#errorMsg").append("<p>Password skal indeholde mindst 1 stort bogstav og 1 mindst tal og 8 karakterer.</p>");
            localStorage.removeItem("mailOgPassFormat");
	}
	
	if(localStorage.getItem("passFormat") == 'true')
	{
            $("#errorMsg").append("<p>Password skal indeholde mindst 1 stort bogstav og 1 mindst tal og 8 karakterer.</p>");
            localStorage.removeItem("passFormat");
	}
	
	if(localStorage.getItem("mailFormat") == 'true')
	{
            $("#errorMsg").append("<p>Indtastet mail har forkert format.</p>");
            localStorage.removeItem("mailFormat");
	}
	
	if(localStorage.getItem("mailBrugerOptaget") == 'true')
	{
            $("#errorMsg").append("<p>Indtastet brugernavn er allerede i brug.</p>");
            $("#errorMsg").append("<p>Indtastet mail er allerede i brug.</p>");
            localStorage.removeItem("mailBrugerOptaget");
	}
        
        if(localStorage.getItem("brugernavnOptaget") == 'true')
	{
            $("#errorMsg").append("<p>Indtastet brugernavn er allerede i brug.</p>");
            localStorage.removeItem("brugernavnOptaget");
	}
        
        if(localStorage.getItem("mailOptaget") == 'true')
	{
            $("#errorMsg").append("<p>Indtastet mail er allerede i brug.</p>");
            localStorage.removeItem("mailOptaget");
	}
	localStorage.removeItem("opretErrMsg");
    }
}
var validPass = false;
var validMail = false;
var passControlLoaded = false;
var mailControlLoaded = false;
var emptyPassLoaded = false;
var emptyMailLoaded = false;
var passMissMatch = false;
var mailMissMatch = false;
function pass01Focus() 
{
	if(passControlLoaded == false)
	{
            passControlLoaded = true;
            $("#passInput01FormGroup").after("<div class='form-group'><input id='passInput02' type='password' onblur='pass02blur()' class='form-control' placeholder='Bekræft kodeord' name='bekraeftkodeord' /></div>");
	}
}
function pass02blur() 
{
	if(($("#passInput01").val().length < 3 || $("#passInput02").val().length < 3) && emptyPassLoaded == false)
	{
		$("#errorMsg").append("<p>Indtast password på mindst 4 karakterer</p>");
		emptyPassLoaded = true;
	}
	else if($("#passInput01").val().length > 3  && $("#passInput02").val().length > 3)
	{
		emptyPassLoaded = false;
		if($("#passInput01").val() != $("#passInput02").val())
		{
			if(passMissMatch == false)
			{
				$("#errorMsg").append("<p>Passwords matcher ikke</p>");
				passMissMatch = true;
			}
			validPass = false;
		}
		else
		{
			validPass = true;
		}
	}
}
function mail01Focus() 
{
	if(mailControlLoaded == false)
	{
		mailControlLoaded = true;
		$("#mailInput01FormGroup").after("<div class='form-group'><input id='mailInput02' type='email' onblur='mail02blur()' class='form-control' placeholder='Bekræft email' name='bekraeftemail' /></div>");
	}
}
function mail02blur() 
{
	if(($("#mailInput01").val().length < 4|| $("#mailInput02").val().length < 4) && emptyMailLoaded == false)
	{
		$("#errorMsg").append("<p>Indtast mail på mere end 4 karakterer i hvert felt<p>");
		emptyMailLoaded = true;
	}
	else if($("#mailInput01").val().length > 4 && $("#mailInput02").val().length > 4)
	{
		emptyMailLoaded = false;
		if($("#mailInput01").val() != $("#mailInput02").val())
		{
			if(mailMissMatch == false)
			{
				$("#errorMsg").append("<p>Mails matcher ikke</p>");
				mailMissMatch = true;
			}
		}
		else
		{
			validMail = true;
		}
	}
}
function clientSideCheck() 
{
	if(validPass == true && validMail == true)
	{
		document.getElementById("opretForm").submit();
	}
	else if(validPass == true && validMail == false)
	{
		$("#errorMsg").text("Mail bekræftelse gik ikke igennem");
	}
	else if(validPass == false && validMail == true)
	{
		$("#errorMsg").text("Password bekræftelse gik ikke igennem");
	}
	else 
	{
		$("#errorMsg").text("Mail og password bekræftelse gik ikke igennem");
	}
}
</script>