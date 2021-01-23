<?php
if (!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');
?>
<?php

include_once "ModeleSignalement.php";
include_once "VueSignalement.php";

class ContSignalement
{

    private $modeleSignalement;
    private $vueSignalement;

    public function __construct()
    {
        $this->modeleSignalement = new ModeleSignalement();
        $this->vueSignalement = new VueSignalement();
    }

    public function affichagePageSignalement()
    {
        $admin = $this->modeleSignalement->modeleEstAdmin();
        if ($admin == 1) {
            $message = $this->modeleSignalement->modeleRecupMessage();
            $signal = $this->modeleSignalement->modeleRecupSignalAvis();
            $signalTop = $this->modeleSignalement->modeleRecupSignalAvisTop();
            $this->vueSignalement->vueAdmin($message, $signal, $signalTop);
        } else {
            $this->vueSignalement->vueUtilisateur();
        }
    }

    public function envoyerMessage()
    {
        if (isset($_POST['message'])) {
            if (isset($_SESSION['nom_utilisateur'])) {
                $msg = $this->modeleSignalement->modeleCreationMessage(addslashes(strip_tags($_POST['message'])));
                $this->vueSignalement->vueAlertSucces($msg);
            } else {
                $this->vueSignalement->vueAlertWarning("Connectez-vous pour pouvoir envoyé un message");
            }
        }
        $this->affichagePageSignalement();
    }

    public function archiveSignal()
    {
        if (isset($_POST['idSignal'])) {
            $msg = $this->modeleSignalement->modeleArchiveSignal(addslashes(strip_tags($_POST['idSignal'])));
            $this->vueSignalement->vueAlertSucces($msg);
        }
        $this->affichagePageSignalement();
    }

}