<?php
if (!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');
?>
<?php

include_once "ContSignalement.php";

class ModSignalement
{

    private $contSignalement;

    public function __construct()
    {
        if (isset($_GET['action'])) {
            $action = addslashes(strip_tags($_GET['action']));
        } else {
            $action = "page_signalement";
        }

        $this->contSignalement = new contSignalement();
        $this->determineAction($action);
    }

    public function determineAction($action)
    {
        switch ($action) {
            case "page_signalement":
                $this->contSignalement->affichagePageSignalement();
                break;
            case "envoi_message":
                $this->contSignalement->envoyerMessage();
                break;
            case "suppr_signal":
                $this->contSignalement->archiveSignal();
                break;
        }
    }
}
