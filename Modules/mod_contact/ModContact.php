<?php
if (!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');
?>
<?php

include_once "ContContact.php";

class ModContact
{
    private $contContact;

    public function __construct()
    {
        $this->contContact = new ContContact();

        $this->contContact->affichagePageAPropos();
    }
}