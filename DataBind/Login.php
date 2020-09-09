<?php
class Login {
    function __construct($brugernavn, $password)
    {
        $this->brugernavn = $brugernavn;
        $this->password = $password;
    }
    private $brugernavn;
    private $password;
    public function checkBruger($conn) {
        include("../ORM/Bruger.php");
        $checkBruger = new Bruger($conn);
        $checkBruger->setBrugernavn($this->brugernavn);
        $checkBruger->setPassword($this->password);
        $brugerStatus = $checkBruger->queryLogin($conn);
        if($brugerStatus != false)
        {
            $this->RegistrerLogin($brugerStatus);
            return $brugerStatus;
        }
        else 
        {
            return false;
        }
    }
    private function RegistrerLogin($brugerId) {
        include("../ORM/Logins.php");
        $loginForsøg = new Logins();
        $loginForsøg->setBrugerId($brugerId);
        $loginForsøg->setForsøgStatus(true);
        $loginForsøg->setTid(date('Y-m-d H:i:s'));
        $loginForsøg->insert(mysqli_connect("localhost", "root", "", "PortfolioDB"));
    }
}