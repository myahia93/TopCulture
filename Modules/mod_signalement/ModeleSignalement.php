<?php

include_once "ConnexionBD.php";

class ModeleSignalement extends ConnexionBD
{

    //Fonction pour l'affichage

    public function modeleEstAdmin()
    {
        if (isset($_SESSION['nom_utilisateur'])) {
            $reqVerifAdmin = self::$bdd->prepare("SELECT * FROM utilisateur WHERE pseudo = ? AND admin = 1");
            $reqVerifAdmin->execute([$_SESSION['nom_utilisateur']]);
            $result = $reqVerifAdmin->fetch();

            if (empty($result)) {
                return 0; //utilisateur simple
            } else {
                return 1; //admin
            }
        } else {
            return 0; //non connecter
        }
    }

    public function modeleRecupSignalAvis()
    {
        $type = 'signalAvis';
        $req = self::$bdd->prepare("SELECT idSignalement, typeSignalement, message, dateSignal, idUtilisateur, idOeuvre, pseudo FROM signalement NATURAL JOIN utilisateur WHERE typeSignalement = ? ORDER BY dateSignal DESC");
        $req->execute([$type]);
        $result = $req->fetchAll();
        return $result;
    }

    public function modeleRecupMessage()
    {
        $type = 'message';
        $req = self::$bdd->prepare("SELECT idSignalement, typeSignalement, message, dateSignal, idUtilisateur, idOeuvre, pseudo FROM signalement NATURAL JOIN utilisateur WHERE typeSignalement = ? ORDER BY dateSignal DESC");
        $req->execute([$type]);
        $result = $req->fetchAll();
        return $result;

    }


    //Fonction pour la suppression des signalements

    public function modeleArchiveSignal($idSignal)
    {
        $req = self::$bdd->prepare("DELETE FROM signalement WHERE idSignalement = ?");
        $req->execute([$idSignal]);
        echo '<div class="container"><div class="alert alert-success text-center" role="alert">Le message a été archivé</div></div>';
    }

    //Fonction pour ecrire un message de signalement

    public function modeleCreationMessage($message)
    {
        if (isset($_SESSION['nom_utilisateur'])) {
            //on recupere l'id de l'utilisateur
            $selectID = self::$bdd->prepare("SELECT idUtilisateur FROM utilisateur WHERE pseudo = ?;");
            $selectID->execute([$_SESSION['nom_utilisateur']]);
            $recupId = $selectID->fetch();
            $iduser = $recupId["idUtilisateur"];
            $date = date('Y-m-d');
            $type = 'message';

            $requeteSignal = self::$bdd->prepare("INSERT INTO signalement(typeSignalement, message, idUtilisateur, dateSignal) VALUES(?,?,?,?);");
            $requeteSignal->execute([$type, $message, $iduser, $date]);
            echo '<div class="container"><div class="alert alert-success text-center" role="alert">Le message a été envoyé</div></div>';
        } else {
            echo '<div class="container"><div class="alert alert-warning text-center" role="alert">Connectez-vous pour pouvoir envoyé un message</div></div>';
        }


    }

}