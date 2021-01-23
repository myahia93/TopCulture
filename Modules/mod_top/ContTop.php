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
        if (isset($_SESSION['nom_utilisateur'])) {
            if (isset($_POST['nom_top']) && isset($_POST['theme'])) {
                $nomTop = addslashes(strip_tags($_POST['nom_top']));
                $theme = addslashes(strip_tags($_POST['theme']));
                $top = $this->modeleTop->modeleCreationTop($nomTop, $theme);
                if (!$top) {
                    $this->vueTop->vueAlertWarning("Le top : " . $nomTop . " existe déja");
                    $this->formCreationTop();
                } else {
                    $this->vueTop->vueAlertSucces("Le Top a été créé !");
                    $this->pageModifTop($nomTop);
                }
            }
        } else {
            $this->vueTop->vueAlertWarning("Connectez-vous pour pouvoir créer votre Top.");
            $this->formCreationTop();
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
            $val = $this->modeleTop->modeleAjouterOeuvre($idOeuvre, $idtop);
            if ($val) {
                $this->vueTop->vueAlertSucces("Ajout réussi");
            } else {
                $this->vueTop->vueAlertWarning("Un top peut comporter au maximun 10 éléments");
            }

            $this->pageModifTop($nomTop);
        }
    }

    public function supprimerOeuvre()
    {
        if (isset($_POST['idOeuvre']) && isset($_POST['idTop']) && isset($_POST['nomTop'])) {
            $idOeuvre = addslashes(strip_tags($_POST['idOeuvre']));
            $idtop = addslashes(strip_tags($_POST['idTop']));
            $nomTop = addslashes(strip_tags($_POST['nomTop']));
            $msg = $this->modeleTop->modeleSupprOeuvre($idOeuvre, $idtop);
            $this->vueTop->vueAlertSucces($msg);
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
            $infotop = $this->modeleTop->modeleInfoTop($idtop);
            $estAdmin = $this->modeleTop->modeleEstAdmin();
            $this->vueTop->vueAfficheTop($tab, $iduser, $idtop, $avis, $estAdmin, $infotop);
        } else {
            $tab = $this->modeleTop->modeleTopUtilisateur($idtopRecup, $iduserRecup);
            $avis = $this->modeleTop->modeleAfficheAvis($idtopRecup);
            $estAdmin = $this->modeleTop->modeleEstAdmin();
            $infotop = $this->modeleTop->modeleInfoTop($idtopRecup);
            $this->vueTop->vueAfficheTop($tab, $iduserRecup, $idtopRecup, $avis, $estAdmin, $infotop);
        }
    }

    //AVIS
    //creation
    public function creationAvis()
    {
        if (isset($_POST['avis']) && isset($_POST['idTop']) && $_POST['idUtilisateur']) {
            $idtop = addslashes(strip_tags($_POST['idTop']));
            $iduser = addslashes(strip_tags($_POST['idUtilisateur']));
            $avis = strip_tags($_POST['avis']);
            $msg = $this->modeleTop->modeleCreationAvis($idtop, $avis);
            if ($msg != null) {
                $this->vueTop->vueAlertWarning($msg);
            }
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
            $msg = $this->modeleTop->modeleSupprAvis($idAvis, $idtop);
            $this->vueTop->vueAlertSucces($msg);
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
            $avis = strip_tags($_POST['avis']);
            $iduser = addslashes(strip_tags($_POST['idUtilisateur']));
            $idtop = addslashes(strip_tags($_POST['idTop']));
            $msg = $this->modeleTop->modeleModifAvis($idAvis, $avis);
            $this->vueTop->vueAlertSucces($msg);
            $this->topCommu($idtop, $iduser);
        }
    }

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
                $msg = $this->modeleTop->modeleSignalerAvis($idAvis, $pseudo, $dateEnvoi, $idtop, $iduser);
                if ($msg) {
                    $this->vueTop->vueAlertSucces("Le message a été signaler");
                } else {
                    $this->vueTop->vueAlertWarning("Vous avez déjà signaler ce message");
                }
                $this->topCommu($idtop, $iduser);
            } else {
                $this->vueTop->vueAlertWarning("Vous devez être connecter pour pouvoir signalez un avis");
                $this->topCommu($idtop, $iduser);
            }
        }
    }


    //Affichage Page D'acceuil
    public function creationTopSimple()
    {
        $tab = $this->modeleTop->modeleListeTheme();
        $this->vueTop->vueCreationTopSimple($tab);
    }

    public function topCommuSimple()
    {
        $topCommu = $this->modeleTop->modeleTopCommuSimple();
        $this->vueTop->vueTopCommuSimple($topCommu);
    }

    //supression du top
    public function supprimeTop()
    {
        if (isset($_POST['idTop'])) {
            $idtop = addslashes(strip_tags($_POST['idTop']));
            $this->modeleTop->modeleSupprTop($idtop);
        }
    }
}