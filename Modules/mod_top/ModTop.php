<?php
if (!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');
?>
<?php

include_once "ContTop.php";

class ModTop
{

    private $contTop;

    public function __construct()
    {
        if (isset($_GET['action'])) {
            $action = addslashes(strip_tags($_GET['action']));
        } else {
            $action = "form_creationTop";
        }

        $this->contTop = new ContTop();

        $this->determineAction($action);
    }

    public function determineAction($action)
    {
        switch ($action) {
            case "form_creationTop":
                $this->contTop->formCreationTop();
                break;
            case "creation_top":
                $this->contTop->creationTop();
                break;
            case "ajouter_oeuvre":
                $this->contTop->ajouterOeuvre();
                break;
            case "suppr_oeuvre":
                $this->contTop->supprimerOeuvre();
                break;
            case "mon_top":
                $this->contTop->redirectionMonTop();
                break;
            case "top_commu":
                $this->contTop->topCommu(null, null);
                break;
            case "creation_avis":
                $this->contTop->creationAvis();
                break;
            case "suppr_avis":
                $this->contTop->supprimeAvis();
                break;
            case "form_modif_avis":
                $this->contTop->formModifAvis();
            case "modif_avis":
                $this->contTop->modifAvis();
                break;
            case "signal_avis":
                $this->contTop->signalAvis();
            case "form_creationTopSimple":
                $this->contTop->creationTopSimple();
                break;
            case "top_recent":
                $this->contTop->topCommuSimple();
                break;
        }
    }

}