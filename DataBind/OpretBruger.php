<?php
class OpretBruger {
    function __construct($brugernavn, $password, $email)
    {
        $this->brugernavn = $brugernavn;
        $this->password = $password;
        $this->email = $email;
    }
    private $brugernavn;
    private $password;
    private $email;
    public function opret($conn) 
    {
        $validMail = $this->validEmailFormat($this->email);
        $validPass = $this->validPasswordFormat($this->password);
        if($this->wrongFormatReturnOptions($validPass, $validMail) != "korrekt")
        {
            return $this->wrongFormatReturnOptions($validPass, $validMail);
        }
        else 
        {        
            include("../ORM/Profil.php");
            include("../ORM/Bruger.php");
            $opretProfilObj = new Profil($conn);
            $opretBrugerObj = new Bruger($conn);
            $opretProfilObj->setEmail($this->email);
            $opretBrugerObj->setBrugernavn($this->brugernavn);
            if($this->optagetReturnOptions($opretProfilObj, $opretBrugerObj) != "korrekt")
            {
                return $this->optagetReturnOptions($opretProfilObj, $opretBrugerObj);
            }
            else 
            {
                return $this->opretBruger($opretBrugerObj, $this->opretProfil($opretProfilObj));
            }
        }
    }
    private function opretProfil($opretProfilObj)
    {
        $opretProfilObj->setFornavn("");
        $opretProfilObj->setEfternavn("");
        $opretProfilObj->setTelefon("");
        $opretProfilObj->setPostnummer("0000");
        return $opretProfilObj->insert();
    }
    private function opretBruger($opretBrugerObj, $profilId)
    {
        $opretBrugerObj->setProfilId($profilId);
        $opretBrugerObj->setPassword($this->password);
        $opretBrugerObj->setOpretDato(date('Y-m-d H:i:s'));
        return $opretBrugerObj->insert();
    }
    private function validEmailFormat($mail)
    {
	if(!filter_var($mail, FILTER_VALIDATE_EMAIL))
	{
            return false;
	}
	else 
	{
            return true;
	}
    }
    private function validPasswordFormat($password)
    {
	$uppercase = preg_match('@[A-Z]@', $password);
	$lowercase = preg_match('@[a-z]@', $password);
	$number    = preg_match('@[0-9]@', $password);
	if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) 
	{
            return false;
	}
	else
	{
            return true;
	}
    }
    private function wrongFormatReturnOptions($pass, $mail)
    {
        if($mail == false && $pass == false)
        {
           return "mailOgPassFormat";
        }
        else if($mail == true && $pass == false)
        {
            return "passFormat";
        }
        else if($mail == false && $pass == true)
        {
            return "mailFormat";
        }
        else 
        {
            return "korrekt";
        }
    }
    private function optagetReturnOptions($profilObj, $brugerObj) 
    {
        if($profilObj->queryIdFromMail() != false && $brugerObj->queryIdFromBrugernavn() != false)
        {
            return "mailBrugerOptaget";
        }
        else if($profilObj->queryIdFromMail() != true && $brugerObj->queryIdFromBrugernavn() != false)
        {
            return "brugernavnOptaget";
        }
        else if($profilObj->queryIdFromMail() != false && $brugerObj->queryIdFromBrugernavn() != true) 
        {
            return "mailOptaget";
        }
        else 
        {
            return "korrekt";
        }
    }
}
