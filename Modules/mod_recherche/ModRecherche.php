<?php

include_once "ContRecherche.php";

class ModRecherche
{

    private $contRecherche;

    public function __construct()
    {
//        if (isset($_GET['action'])) {
//            $action = addslashes(strip_tags($_GET['action']));
//        } else {
//            $action = "search";
//        }

        $this->contRecherche = new ContRecherche();
        $this->contRecherche->testAjax();
//        $this->determineAction($action);
    }

//    public function determineAction($action)
//    {
//        switch ($action) {
//            case "search":
//                $this->contRecherche->testAjax();
//                break;
//        }
//    }

}