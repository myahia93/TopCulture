<?php
if (!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');
?>
<?php

include_once "ConnexionBD.php";

class ModeleSignalement extends ConnexionBD
{

    //Fonction pour l'affichage

    public function modeleEstAdmin()
    {
        if (isset($_SESSION['nom_utilisateur'])) {
            try {
                $reqVerifAdmin = self::$bdd->prepare("SELECT * FROM utilisateur WHERE pseudo = ? AND admin = 1");
                $reqVerifAdmin->execute([$_SESSION['nom_utilisateur']]);
                $result = $reqVerifAdmin->fetch();

                if (empty($result)) {
                    return 0; //utilisateur simple
                } else {
                    return 1; //admin
                }
            } catch (PDOException $e) {
            }
        } else {
            return 0; //non connecter
        }
    }

    public function modeleRecupSignalAvis()
    {
        try {
            $type = 'signalAvis';
            $req = self::$bdd->prepare("SELECT idSignalement, typeSignalement, message, dateSignal, idUtilisateur, idOeuvre, pseudo FROM signalement NATURAL JOIN utilisateur WHERE typeSignalement = ? ORDER BY dateSignal DESC");
            $req->execute([$type]);
            $result = $req->fetchAll();
            return $result;
        } catch (PDOException $e) {
        }
    }

    public function modeleRecupSignalAvisTop()
    {
        try {
            $type = 'signalAvisTop';
            $req = self::$bdd->prepare("SELECT idSignalement, typeSignalement, message, dateSignal, idUtilSignal, idUtilisateur, idTop, pseudo FROM signalement NATURAL JOIN utilisateur WHERE typeSignalement = ? ORDER BY dateSignal DESC");
            $req->execute([$type]);
            $result = $req->fetchAll();
            return $result;
        } catch (PDOException $e) {
        }
    }

    public function modeleRecupMessage()
    {
        try {
            $type = 'message';
            $req = self::$bdd->prepare("SELECT idSignalement, typeSignalement, message, dateSignal, idUtilisateur, idOeuvre, pseudo FROM signalement NATURAL JOIN utilisateur WHERE typeSignalement = ? ORDER BY dateSignal DESC");
            $req->execute([$type]);
            $result = $req->fetchAll();
            return $result;
        } catch (PDOException $e) {
        }
    }


    //Fonction pour la suppression des signalements

    public function modeleArchiveSignal($idSignal)
    {
        try {
            $req = self::$bdd->prepare("DELETE FROM signalement WHERE idSignalement = ?");
            $req->execute([$idSignal]);
            return "Le message a été archivé";
        } catch (PDOException $e) {
        }
    }

    //Fonction pour ecrire un message de signalement

    public function modeleCreationMessage($message)
    {
        try {
            //on recupere l'id de l'utilisateur
            $selectID = self::$bdd->prepare("SELECT idUtilisateur FROM utilisateur WHERE pseudo = ?;");
            $selectID->execute([$_SESSION['nom_utilisateur']]);
            $recupId = $selectID->fetch();
            $iduser = $recupId["idUtilisateur"];
            $date = date('Y-m-d');
            $type = 'message';
            $requeteSignal = self::$bdd->prepare("INSERT INTO signalement(typeSignalement, message, idUtilisateur, dateSignal) VALUES(?,?,?,?);");
            $requeteSignal->execute([$type, $message, $iduser, $date]);
            return "Le message a été envoyé";
        } catch (PDOException $e) {
        }
    }

}