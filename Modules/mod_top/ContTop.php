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


    //AFFICHAGE TOP
    public function topCommu($idtopRecup, $iduserRecup)
    {
        if (isset($_POST['idTop']) && $_POST['idUtilisateur']) {
            $idtop = addslashes(strip_tags($_POST['idTop']));
            $iduser = addslashes(strip_tags($_POST['idUtilisateur']));
            $tab = $this->modeleTop->modeleTopUtilisateur($idtop, $iduser);
            $avis = $this->modeleTop->modeleAfficheAvis($idtop);
            $estAdmin = $this->modeleTop->modeleEstAdmin();
            $this->vueTop->vueAfficheTop($tab, $iduser, $idtop, $avis, $estAdmin);
        } else {
            $tab = $this->modeleTop->modeleTopUtilisateur($idtopRecup, $iduserRecup);
            $avis = $this->modeleTop->modeleAfficheAvis($idtopRecup);
            $estAdmin = $this->modeleTop->modeleEstAdmin();
            $this->vueTop->vueAfficheTop($tab, $iduserRecup, $idtopRecup, $avis, $estAdmin);
        }
    }

    //AVIS
    //creation
    public function creationAvis()
    {
        if (isset($_POST['avis']) && isset($_POST['idTop']) && $_POST['idUtilisateur']) {
            $idtop = addslashes(strip_tags($_POST['idTop']));
            $iduser = addslashes(strip_tags($_POST['idUtilisateur']));
            $avis = addslashes(strip_tags($_POST['avis']));
            $this->modeleTop->modeleCreationAvis($idtop, $avis);
            $this->topCommu($idtop, $iduser);
        }
    }

    //suppression
    public function supprimeAvis()
    {
        if (isset($_POST['idAvis']) && isset($_POST['idTop']) && $_POST['idUtilisateur']) {
            $idtop = addslashes(strip_tags($_POST['idTop']));
            $idAvis = addslashes(strip_tags($_POST['idAvis']));
            $iduser = addslashes(strip_tags($_POST['idUtilisateur']));
            $this->modeleTop->modeleSupprAvis($idAvis, $idtop);
            $this->topCommu($idtop, $iduser);
        }

    }

    //modification
    public function formModifAvis()
    {
        if (isset($_POST['idAvis']) && $_POST['idUtilisateur']) {
            $idAvis = $this->modeleTop->modeleElementAvis(strip_tags($_POST['idAvis']));
            $iduser = addslashes(strip_tags($_POST['idUtilisateur']));
            $this->vueTop->vueFormModifAVis($idAvis, $iduser);
        }
    }

    public function modifAvis()
    {
        if (isset($_POST['idAvis']) && isset($_POST['avis']) && isset($_POST['idUtilisateur']) && isset($_POST['idAvis'])) {
            $idAvis = addslashes(strip_tags($_POST['idAvis']));
            $avis = addslashes(strip_tags($_POST['avis']));
            $iduser = addslashes(strip_tags($_POST['idUtilisateur']));
            $idtop = addslashes(strip_tags($_POST['idTop']));
            $this->modeleTop->modeleModifAvis($idAvis, $avis);
            $this->topCommu($idtop, $iduser);
        }
    }


    //signalement
    //Signalement
    public function signalAvis()
    {
        if (isset($_POST['idAvis']) && isset($_POST['pseudo']) && isset($_POST['dateEnvoi']) & isset($_POST['idUtilisateur']) & isset($_POST['idTop'])) {
            $idAvis = addslashes(strip_tags($_POST['idAvis']));
            $pseudo = addslashes(strip_tags($_POST['pseudo']));
            $dateEnvoi = addslashes(strip_tags($_POST['dateEnvoi']));
            $iduser = addslashes(strip_tags($_POST['idUtilisateur']));
            $idtop = addslashes(strip_tags($_POST['idTop']));
            if (isset($_SESSION['nom_utilisateur'])) {
                $this->modeleTop->modeleSignalerAvis($idAvis, $pseudo, $dateEnvoi, $idtop, $iduser);
                $this->topCommu($idtop, $iduser);
            } else {
                echo '<div class="container"><div class="alert alert-warning" role="alert">Vous devez être connecter pour pouvoir signalez un avis</div></div>';
                $this->topCommu($idtop, $iduser);
            }
        }
    }
}