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
    <form method="post" action="SubmitActions/kontaktAction.php">
	<div id="formHeadWrapper">
            <div class="form-group" id="formHeader">
		Kontaktformular
            </div>
	</div>
	<div id="formBodyWrapper">
            <div class="form-group">
		<input type="text" class="form-control" placeholder="Navn" name="navn" />
            </div>
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Email" name="email" />
            </div>
            <div class="form-group">
		<input type="text" class="form-control" placeholder="Emne" name="emne" />
            </div>
            <div class="form-group">
		<textarea rows="5" cols="60" class="form-control" placeholder="Besked" name="besked"></textarea>
            </div>
            <input type="submit" class="btn btn-secondary text-dark" value="Send" />
	</div>
    </form>
</div>
</br>