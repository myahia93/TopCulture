<?php
if (!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');
?>
<?php

include_once "ModeleConnexion.php";
include_once "VueConnexion.php";

class ContConnexion
{
    private $modeleConnexion;
    private $vueConnexion;

    public function __construct()
    {
        $this->modeleConnexion = new ModeleConnexion();
        $this->vueConnexion = new VueConnexion();
    }

    public function formConnexion()
    {
        $this->vueConnexion->vueFormConnexion();
    }

    public function seConnecte()
    {
        if (isset($_POST['nom_utilisateur']) && isset($_POST['mot_de_passe'])) {
            $nomUtilisateur = addslashes(strip_tags($_POST['nom_utilisateur']));
            $mdp = addslashes(strip_tags($_POST['mot_de_passe']));
            $verif = $this->modeleConnexion->modeleSeConnecte($nomUtilisateur, $mdp);
            if ($verif != null) {
                switch ($verif) {
                    case 1:
                        $this->vueConnexion->vueAlertWarning("Mot de passe ou utilisateur incorrecte");
                        break;
                    case 2:
                        $this->vueConnexion->vueAlertWarning("Mot de passe incorrecte");
                        break;
                    case 3:
                        $this->vueConnexion->vueAlertWarning("Utilisateur innexistant");
                        break;
                }
                $this->formConnexion();
            }
        }
    }

    public function formCreationCompte()
    {
        $this->vueConnexion->vueFormCreation();
    }

    public function creationCompte()
    {
        if (isset($_POST['nom_utilisateur']) && isset($_POST['mot_de_passe']) && isset($_POST['re_mot_de_passe'])) {
            $nomUtilisateur = addslashes(strip_tags($_POST['nom_utilisateur']));
            $mdp = addslashes(strip_tags($_POST['mot_de_passe']));
            $remdp = addslashes(strip_tags($_POST['re_mot_de_passe']));
            $verif = $this->modeleConnexion->modeleCreationCompte($nomUtilisateur, $mdp, $remdp);
            if ($verif != null) {
                $this->vueConnexion->vueAlertWarning($verif);
                $this->formCreationCompte();
            } else {
                $this->vueConnexion->vueAlertSucces("Votre compte a été créer !");
                $this->formConnexion();
            }
        }

    }

    public function deconnexion()
    {
        $this->modeleConnexion->modeleDeconnexion();
    }

}