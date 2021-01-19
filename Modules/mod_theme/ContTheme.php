<?php

include_once "ModeleTheme.php";
include_once "VueTheme.php";

class ContTheme
{
    private $modeleTheme;
    private $vueTheme;

    public function __construct()
    {
        $this->modeleTheme = new ModeleTheme();
        $this->vueTheme = new VueTheme();
    }

    public function afficheListeTheme()
    {
        $tab = $this->modeleTheme->modeleListeTheme();
        $this->vueTheme->vueAfficheListeTheme($tab);
    }

    public function selectionTheme()
    {
        if (isset($_POST['nomTheme'])) {
            $theme = addslashes(strip_tags($_POST['nomTheme']));
            $tabOeuvre = $this->modeleTheme->modeleSelectionTheme($theme);
            $this->vueTheme->vueAfficheOeuvre($tabOeuvre);
        }
    }

    public function afficheRechercheOeuvre()
    {
        if (isset($_POST['recherche'])) {
            $recherche = addslashes(strip_tags($_POST['recherche']));
            $tab = $this->modeleTheme->modeleListeRecherche($recherche);
            $this->vueTheme->vueAfficheListeRecherche($tab, $recherche);
        }
    }


}