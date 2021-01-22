<?php

include_once "ModeleRecherche.php";
include_once "VueRecherche.php";

class ContRecherche
{

    private $modeleRecherche;
    private $vueRecherche;

    public function __construct()
    {
        $this->modeleRecherche = new ModeleRecherche();
        $this->vueRecherche = new VueRecherche();
    }

    public function testAjax()
    {
        if (isset($_GET['oeuvre'])) {
            $oeuvre = (string) trim($_GET['oeuvre']);
            $tab = $this->modeleRecherche->modeleAutoComp($oeuvre);
            $this->vueRecherche->vueTestAjax($tab);
        }
    }
}