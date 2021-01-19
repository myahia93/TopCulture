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
            $this->vueSignalement->vueAdmin($message, $signal);
        } else {
            $this->vueSignalement->vueUtilisateur();
        }
    }

    public function envoyerMessage()
    {
        if (isset($_POST['message'])) {
            $this->modeleSignalement->modeleCreationMessage(addslashes(strip_tags($_POST['message'])));
        }
        $this->affichagePageSignalement();
    }

    public function archiveSignal() {
        if (isset($_POST['idSignal'])) {
            $this->modeleSignalement->modeleArchiveSignal(addslashes(strip_tags($_POST['idSignal'])));
        }
        $this->affichagePageSignalement();
    }

}