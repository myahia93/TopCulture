<?php
if (!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');
?>
<?php

include_once "ModeleTop.php";
include_once "VueTop.php";

class ContTop
{

    private $modeleTop;
    private $vueTop;

    public function __construct()
    {
        $this->modeleTop = new ModeleTop();
        $this->vueTop = new VueTop();
    }

    public function formCreationTop()
    {
        $tab = $this->modeleTop->modeleListeTheme();
        $topCommu = $this->modeleTop->modeleTopCommu();
        $this->vueTop->vueCreationTop($tab, $topCommu);
    }

    public function creationTop()
    {
        if (isset($_POST['nom_top']) && isset($_POST['theme'])) {
            $nomTop = addslashes(strip_tags($_POST['nom_top']));
            $theme = addslashes(strip_tags($_POST['theme']));
            $top = $this->modeleTop->modeleCreationTop($nomTop, $theme);
            if (!$top) {
                $this->formCreationTop();
            } else {
                $this->pageModifTop($nomTop);
            }
        }
    }

    public function redirectionMonTop()
    {
        if (isset($_POST['nomTop'])) {
            $nomTop = addslashes(strip_tags($_POST['nomTop']));
            $this->pageModifTop($nomTop);
        }
    }

    public function pageModifTop($nomtop)
    {
        $idtop = $this->modeleTop->modeleRecupIdTop($nomtop);
        $listeTop = $this->modeleTop->modeleMonTop($idtop);
        $tab = $this->modeleTop->modeleListeOeuvre($idtop);
        $this->vueTop->vueModifTop($tab, $nomtop, $idtop, $listeTop);
    }

    public function ajouterOeuvre()
    {
        if (isset($_POST['idOeuvre']) && isset($_POST['idTop']) && isset($_POST['nomTop'])) {
            $idOeuvre = addslashes(strip_tags($_POST['idOeuvre']));
            $idtop = addslashes(strip_tags($_POST['idTop']));
            $nomTop = addslashes(strip_tags($_POST['nomTop']));
            $this->modeleTop->modeleAjouterOeuvre($idOeuvre, $idtop);
            $this->pageModifTop($nomTop);
        }
    }

    public function supprimerOeuvre()
    {
        if (isset($_POST['idOeuvre']) && isset($_POST['idTop']) && isset($_POST['nomTop'])) {
            $idOeuvre = addslashes(strip_tags($_POST['idOeuvre']));
            $idtop = addslashes(strip_tags($_POST['idTop']));
            $nomTop = addslashes(strip_tags($_POST['nomTop']));
            $this->modeleTop->modeleSupprOeuvre($idOeuvre, $idtop);
            $this->pageModifTop($nomTop);
        }
    }

    public function topCommu()
    {
        if (isset($_POST['idTop']) && $_POST['idUtilisateur']) {
            $idtop = addslashes(strip_tags($_POST['idTop']));
            $iduser = addslashes(strip_tags($_POST['idUtilisateur']));
            $tab = $this->modeleTop->modeleTopUtilisateur($idtop, $iduser);
            $this->vueTop->vueAfficheTop($tab);
        }
    }
}