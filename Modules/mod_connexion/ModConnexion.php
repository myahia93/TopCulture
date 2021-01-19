<?php
if (!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');
?>
<?php

include_once "ContConnexion.php";

class ModConnexion
{
    private $contConnexion;

    public function __construct()
    {
        if (isset($_GET['action'])) {
            $action = addslashes(strip_tags($_GET['action']));
        } else {
            $action = "form_connexion";
        }

        $this->contConnexion = new ContConnexion();

        $this->determineAction($action);

    }

    public function determineAction($action)
    {
        switch ($action) {
            case "form_connexion":
                $this->contConnexion->formConnexion();
                break;
            case "se_connecte":
                $this->contConnexion->seConnecte();
                break;

            case "form_creation":
                $this->contConnexion->formCreationCompte();
                break;
            case "creation_compte":
                $this->contConnexion->creationCompte();
                break;
            case "deconnexion":
                $this->contConnexion->deconnexion();
        }
    }

}