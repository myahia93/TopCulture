<?php
if (!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');
?>
<?php

include_once "VueContact.php";

class ContContact
{
    private $vueContact;

    public function __construct()
    {
        $this->vueContact = new vueContact();
    }

    public function affichagePageAPropos() {
        $this->vueContact->vuePageAPropos();
    }

}