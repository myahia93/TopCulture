<?php
if (!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');
?>
<?php

include_once "ModeleProfil.php";
include_once "VueProfil.php";

class ContProfil
{
    private $modeleProfil;
    private $vueProfil;

    public function __construct()
    {
        $this->modeleProfil = new ModeleProfil();
        $this->vueProfil = new VueProfil();
    }

    public function affichageProfil()
    {
        $tab = $this->modeleProfil->modeleProfilUtilisateurs();
        $top = $this->modeleProfil->modeleListeTop();
        $this->vueProfil->vueAffichageProfil($tab, $top);
    }

    public function formEditionProfil()
    {
//        $this->modeleProfil->modeleListeTop();
    }

    public function majProfil()
    {
//        $this->modeleProfil
        $this->affichageProfil();
    }
}