<?php
if (!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');
?>
<?php

include_once "ModeleOeuvre.php";
include_once "VueOeuvre.php";

class ContOeuvre
{
    private $modeleOeuvre;
    private $vueOeuvre;

    public function __construct()
    {
        $this->modeleOeuvre = new ModeleOeuvre();
        $this->vueOeuvre = new VueOeuvre();
    }

    public function affichagePageOeuvre($oeuvre)
    {
        if (isset($_POST['idOeuvre'])) {
            $idOeuvre = addslashes(strip_tags($_POST['idOeuvre']));
        } else {
            $idOeuvre = $oeuvre;
        }
        if ($idOeuvre != null) {
            $avis = $this->modeleOeuvre->modeleAfficheAvis($idOeuvre);
            $tab = $this->modeleOeuvre->modelePageOeuvre($idOeuvre);
            $estAdmin = $this->modeleOeuvre->modeleEstAdmin();
            $this->vueOeuvre->vuePageOeuvre($tab, $avis, $estAdmin);
        }
    }

    public function creationAvis()
    {
        if (isset($_POST['avis']) && isset($_POST['note']) && isset($_POST['oeuvre']) && isset($_POST['titre'])) {
            $oeuvre = addslashes(strip_tags($_POST['oeuvre']));
            $note = addslashes(strip_tags($_POST['note']));
            $avis = strip_tags($_POST['avis']);
            $titre = strip_tags($_POST['titre']);
            if (isset($_SESSION['nom_utilisateur'])) {
                $msg = $this->modeleOeuvre->modeleDonnerUnAvis($oeuvre, $note, $avis, $titre);
                if ($msg) {
                    $this->vueOeuvre->vueAlertSucces("Votre avis a été pris en compte !");
                } else {
                    $this->vueOeuvre->vueAlertWarning("Vous avez déjà donner votre avis");
                }
                $this->affichagePageOeuvre($oeuvre);
            } else {
                $this->vueOeuvre->vueAlertWarning("Connectez-vous pour pouvoir donner votre avis !");
                $this->affichagePageOeuvre($oeuvre);
            }
        }
    }

    // Modification
    public function formModifAvis()
    {
        if (isset($_POST['idAvis'])) {
            $idAvis = $this->modeleOeuvre->modeleElementAvis(strip_tags($_POST['idAvis']));
            $this->vueOeuvre->vueFormModifAVis($idAvis);
        }
    }

    public function modifAvis()
    {
        if (isset($_POST['idAvis']) && isset($_POST['avis']) && isset($_POST['note']) && isset($_POST['oeuvre']) && isset($_POST['titre'])) {
            $idAvis = addslashes(strip_tags($_POST['idAvis']));
            $oeuvre = addslashes(strip_tags($_POST['oeuvre']));
            $note = addslashes(strip_tags($_POST['note']));
            $avis = strip_tags($_POST['avis']);
            $titre = strip_tags($_POST['titre']);
            $this->modeleOeuvre->modeleModifAvis($idAvis, $oeuvre, $note, $avis, $titre);
            $this->affichagePageOeuvre($oeuvre);
        }
    }

    //Suppression
    public function supprimeAvis()
    {
        if (isset($_POST['idAvis']) && isset($_POST['idOeuvre'])) {
            $oeuvre = addslashes(strip_tags($_POST['idOeuvre']));
            $idAvis = addslashes(strip_tags($_POST['idAvis']));
            $this->modeleOeuvre->modeleSupprAvis($idAvis, $oeuvre);
            $this->affichagePageOeuvre($oeuvre);
        }

    }

    //Signalement
    public function signalAvis()
    {

        if (isset($_POST['idAvis']) && isset($_POST['pseudo']) && isset($_POST['dateEnvoi']) & isset($_POST['libelle']) & isset($_POST['idOeuvre'])) {
            $idAvis = addslashes(strip_tags($_POST['idAvis']));
            $pseudo = addslashes(strip_tags($_POST['pseudo']));
            $dateEnvoi = addslashes(strip_tags($_POST['dateEnvoi']));
            $oeuvre = addslashes(strip_tags($_POST['libelle']));
            $idOeuvre = addslashes(strip_tags($_POST['idOeuvre']));
            if (isset($_SESSION['nom_utilisateur'])) {
                $this->modeleOeuvre->modeleSignalerAvis($idAvis, $pseudo, $dateEnvoi, $oeuvre, $idOeuvre);
                $this->affichagePageOeuvre($oeuvre);
            } else {
                echo '<div class="container"><div class="alert alert-warning" role="alert">Vous devez être connecter pour pouvoir signalez un avis</div></div>';
                $this->affichagePageOeuvre($oeuvre);
            }
        }
    }

    //AJAX
    public function testAjax()
    {
        $this->modeleOeuvre->modeleTestAjax();
    }
}