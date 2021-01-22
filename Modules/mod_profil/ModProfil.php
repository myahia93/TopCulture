<?php
if (!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');
?>
<?php

include_once "ContProfil.php";

class ModProfil
{
    private $contProfil;

    public function __construct()
    {
        if (isset($_GET['action'])) {
            $action = addslashes(strip_tags($_GET['action']));
        } else {
            $action = "affichage_profil";
        }

        $this->contProfil = new ContProfil();

        $this->determineAction($action);
    }

    public function determineAction($action)
    {
        switch ($action) {
            case "affichage_profil":
                $this->contProfil->affichageProfil();
                break;
            case "form_edition_profil":
                $this->contProfil->formEditionProfil();
                break;
            case "maj_profil":
                $this->contProfil->majProfil();
                break;
        }
    }
}