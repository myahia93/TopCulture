<?php
if (!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');
?>
<?php

include_once "ContOeuvre.php";

class ModOeuvre
{
    private $contOeuvre;

    public function __construct()
    {
        if (isset($_GET['action'])) {
            $action = addslashes(strip_tags($_GET['action']));
        } else {
            $action = "affichage_oeuvre";
        }

        $this->contOeuvre = new ContOeuvre();
        $this->determineAction($action);
    }

    public function determineAction($action)
    {
        switch ($action) {
            case "affichage_oeuvre":
                $this->contOeuvre->affichagePageOeuvre(null);
                break;
            case "creation_avis":
                $this->contOeuvre->creationAvis();
                break;
            case "form_modif_avis":
                $this->contOeuvre->formModifAvis();
                break;
            case "modif_avis":
                $this->contOeuvre->modifAvis();
                break;
            case "suppr_avis" :
                $this->contOeuvre->supprimeAvis();
                break;
            case "signal_avis":
                $this->contOeuvre->signalAvis();
                break;
        }
    }
}