<?php
class LoadProfil {
    function __construct($brugerId)
    {
        $this->brugerId = $brugerId;
    }
    private $brugerId;
    public function load($conn) 
    {
        $brugerInfo = $this->loadBrugerInfo($conn);
        $profilInfo = $this->loadProfilInfo($conn, $brugerInfo[0]);
        if($brugerInfo == false || $profilInfo == false)
        {
            return false;
        }
        else 
        {
            return array($brugerInfo, $profilInfo);
        }
    }
    private function loadBrugerInfo($conn)
    {
        include("ORM/Bruger.php");
        $loadBruger = new Bruger($conn);
        $loadBruger->setId($this->brugerId);
        return $loadBruger->queryProfil();
    }
    private function loadProfilInfo($conn, $profilId)
    {
        include("ORM/Profil.php");
        $loadProfil = new Profil($conn);
        $loadProfil->setId($profilId);
        return $loadProfil->queryProfil();
    }
}
