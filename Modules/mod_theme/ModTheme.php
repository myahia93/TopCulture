<?php
if (!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');
?>
<?php

include_once "ContTheme.php";

class ModTheme
{
    private $contTheme;

    public function __construct()
    {
        if (isset($_GET['action'])) {
            $action = addslashes(strip_tags($_GET['action']));
        } else {
            $action = "menu_theme";
        }

        $this->contTheme = new ContTheme();

        $this->determineAction($action);
    }

    public function determineAction($action)
    {
        switch ($action) {
            case "menu_theme":
                $this->contTheme->afficheListeTheme();
                break;
            case "theme_selectionné":
                $this->contTheme->selectionTheme();
                break;
            case "recherche_oeuvre":
                $this->contTheme->afficheRechercheOeuvre();
                break;
            case "recherche_mieux_note":
                $this->contTheme->afficheRechercheLesMieuxNote();
                break;
        }
    }

}