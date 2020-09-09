<?php
class KontaktBesked {
    function __construct($navn, $email, $emne, $besked)
    {
        $this->navn = $navn;
        $this->email = $email;
        $this->emne = $emne;
        $this->besked = $besked;
    }
    private $navn;
    private $email;
    private $emne;
    private $besked;
    
    public function Opret($conn) {
        include("../ORM/Kontakt.php");
        $kontakt = new Kontakt($conn);
        $kontakt->setNavn($this->navn);
        $kontakt->setEmail($this->email);
        $kontakt->setEmne($this->emne);
        $kontakt->setBesked($this->besked);
        $kontakt->insert();
    }
}
