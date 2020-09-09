<?php
class RetMail {
    function __construct($profilId, $gammelMail, $nyMail, $nyMailBekraeft)
    {
        $this->profilId = $profilId;
        $this->gammelMail = $gammelMail;
        $this->nyMail = $nyMail;
        $this->nyMailBekraeft = $nyMailBekraeft;
    }
    private $profilId;
    private $gammelMail;
    private $nyMail;
    private $nyMailBekraeft;
    public function ret($conn)
    {
        include("../ORM/Profil.php");
        $nuværendeProfil = new Profil($conn);
        $nuværendeProfil->setId($this->profilId);
        $tjekFejl = $this->tjekSamletFejl($this->tjekNyMail(), $this->tjekGammelMail($nuværendeProfil));
        if($tjekFejl != "korrekt")
        {
            return $tjekFejl;
        }
        else
        {
            $nuværendeProfil->setEmail($this->nyMail);
            return $nuværendeProfil->updateMail();
        }
    }
    private function tjekGammelMail($profilObj) 
    {
        if($profilObj->queryMailFromId() == $this->gammelMail)
        {
            return true;
        }
        else 
        {
            return false;
        }
    }
    private function tjekNyMail() 
    {
        if($this->nyMail == $this->nyMailBekraeft)
        {
            return true;
        }
        else 
        {
            return false;
        }
    }
    private function tjekSamletFejl($nyMail, $gammelMail)
    {
        if($nyMail == false && $gammelMail == false)
        {
            return "fejlNyGammel";
        }
        else if($nyMail == true && $gammelMail == false)
        {
            return "fejlGammel";
        }
        else if($nyMail == false && $gammelMail == true)
        {
            return "fejlNy";
        }
        else 
        {
            return "korrekt";
        }
    }
}
