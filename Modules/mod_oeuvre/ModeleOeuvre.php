<?php

include_once "ConnexionBD.php";

class ModeleOeuvre extends ConnexionBD
{
    // FONCTION PRINCIPALE

    // fourni les éléments de l'oeuvre
    public function modelePageOeuvre($idOeuvre)
    {
        $requeteElmtsOeuvre = self::$bdd->prepare("SELECT * FROM oeuvre WHERE idOeuvre = ?");
        $requeteElmtsOeuvre->execute([$idOeuvre]);
        $result = $requeteElmtsOeuvre->fetch();

        return $result;
    }

    // permet de creer l'avis
    public function modeleDonnerUnAvis($oeuvre, $note, $avis, $titre)
    {
        //on recupere l'id de l'utilisateur
        $selectID = self::$bdd->prepare("SELECT idUtilisateur FROM utilisateur WHERE pseudo = ?;");
        $selectID->execute([$_SESSION['nom_utilisateur']]);
        $recupId = $selectID->fetch();
        $iduser = $recupId["idUtilisateur"];
        //On verife si l'utilisateur n'a pas deja donné son avis sur cette oeuvre
        $requeteVerif = self::$bdd->prepare("SELECT idAvis FROM avisoeuvre WHERE idUtilisateur = ? AND idOeuvre = ?");
        $requeteVerif->execute([$iduser, $oeuvre]);
        $resultVerif = $requeteVerif->fetchAll();

        if (empty($resultVerif)) {


            //création de l'avis général
            $requeteCreationAvis = self::$bdd->prepare("INSERT INTO avis(idUtilisateur) VALUES(?);");
            $requeteCreationAvis->execute([$iduser]);

            //création de l'avis sur l'oeuvre
            $idAvis = self::$bdd->lastInsertId();
            $date = date('Y-m-d');
            $pseudo = $_SESSION['nom_utilisateur'];


            try {
                $requeteCreationAvisOeuvre = self::$bdd->prepare("INSERT INTO avisoeuvre VALUES(?,?,?,?,?,?,?)");
                $requeteCreationAvisOeuvre->execute([$idAvis, $note, $avis, $date, $titre, $oeuvre, $iduser]);

                //Calcul de la note de l'oeuvre
                $requeteMoyenne = self::$bdd->prepare("SELECT AVG(note) FROM avisoeuvre WHERE idOeuvre = ?");
                $requeteMoyenne->execute([$oeuvre]);
                $result = $requeteMoyenne->fetch();

                //mise a jour de la nouvelle note
                $resultNote = $result[0];
                $requeteNote = self::$bdd->prepare("UPDATE oeuvre SET note = ? WHERE idOeuvre = ?");
                $requeteNote->execute([$resultNote, $oeuvre]);
                echo '<div class="container"><div class="alert alert-success text-center" role="alert">Votre avis a été pris en compte !</div></div>';
                //header("Location : index.php?module=oeuvre&action=affichage_oeuvre");
                return $oeuvre;

            } catch (PDOException $e) {
                echo "Echec de l'envoi de votre avis";
            }
        } else {
            echo '<div class="container"><div class="alert alert-warning text-center" role="alert">Vous avez déjà donner votre avis</div></div>';
            return $oeuvre;
        }
    }

    //fourni les élement permettant d'afficher les avis de l'oeuvre
    public function modeleAfficheAvis($oeuvre)
    {
        $idOeuvre = $oeuvre;
        $requeteAvis = self::$bdd->prepare("SELECT idAvis, note, critique, dateEnvoi, titreAvis, idOeuvre, idUtilisateur, pseudo FROM avisoeuvre NATURAL JOIN utilisateur WHERE idOeuvre = ? ORDER BY dateEnvoi DESC;");
        $requeteAvis->execute([$idOeuvre]);
        $result = $requeteAvis->fetchAll();

        return $result;
    }

    //vérifie si l'utilisateur est un admin ou non
    public function modeleEstAdmin()
    {
        if (isset($_SESSION['nom_utilisateur'])) {
            $reqVerifAdmin = self::$bdd->prepare("SELECT * FROM utilisateur WHERE pseudo = ? AND admin = 1");
            $reqVerifAdmin->execute([$_SESSION['nom_utilisateur']]);
            $result = $reqVerifAdmin->fetch();

            if (empty($result)) {
                return 0;
            } else {
                return 1;
            }
        } else {
            return 0;
        }
    }


    //FONCTION POUR LA MODIFICATION D'UN AVIS

    // permet de recupérer les élements d'un avis
    public function modeleElementAvis($avis)
    {
        $req = self::$bdd->prepare("SELECT * FROM avisoeuvre WHERE idAvis = ?");
        $req->execute([$avis]);
        $result = $req->fetch();

        return $result;
    }

    //permet l'update de l'avis
    public function modeleModifAvis($idAvis, $oeuvre, $note, $avis, $titre)
    {
        $date = date('Y-m-d');
        $reqModifAvis = self::$bdd->prepare("UPDATE avisoeuvre SET note = ?, critique = ?, dateEnvoi = ?, titreAvis = ? WHERE idAvis = ?;");
        $reqModifAvis->execute([$note, $avis, $date, $titre, $idAvis]);

        //Calcul de la note de l'oeuvre
        $requeteMoyenne = self::$bdd->prepare("SELECT AVG(note) FROM avisoeuvre WHERE idOeuvre = ?");
        $requeteMoyenne->execute([$oeuvre]);
        $result = $requeteMoyenne->fetch();

        //mise a jour de la nouvelle note
        $resultNote = $result[0];
        $requeteNote = self::$bdd->prepare("UPDATE oeuvre SET note = ? WHERE idOeuvre = ?");
        $requeteNote->execute([$resultNote, $oeuvre]);

        echo '<div class="container"><div class="alert alert-success text-center" role="alert">Vous avis a bien été modifer</div></div>';
    }

    //FONCTION POUR LA SUPPRESSION D'UN AVIS
    public function modeleSupprAvis($idAvis, $oeuvre)
    {
        $reqSupprAvisOeuvre = self::$bdd->prepare("DELETE FROM avisoeuvre WHERE idAvis = ?");
        $reqSupprAvisOeuvre->execute([$idAvis]);

        $reqSupprAvis = self::$bdd->prepare("DELETE FROM avis WHERE idAvis = ?");
        $reqSupprAvis->execute([$idAvis]);


        //Calcul de la note de l'oeuvre
        $requeteMoyenne = self::$bdd->prepare("SELECT AVG(note) FROM avisoeuvre WHERE idOeuvre = ?");
        $requeteMoyenne->execute([$oeuvre]);
        $result = $requeteMoyenne->fetch();

        //mise a jour de la nouvelle note
        $resultNote = $result[0];
        $requeteNote = self::$bdd->prepare("UPDATE oeuvre SET note = ? WHERE idOeuvre = ?");
        $requeteNote->execute([$resultNote, $oeuvre]);

        echo '<div class="container"><div class="alert alert-success text-center" role="alert">Cet avis a bien été supprimé</div></div>';
    }

    public function modeleSignalerAvis($idAvis, $pseudo, $dateEnvoi, $oeuvre, $idOeuvre)
    {
        //on recupere l'id de l'utilisateur
        $selectID = self::$bdd->prepare("SELECT idUtilisateur FROM utilisateur WHERE pseudo = ?;");
        $selectID->execute([$_SESSION['nom_utilisateur']]);
        $recupId = $selectID->fetch();
        $iduser = $recupId["idUtilisateur"];
        $date = date('Y-m-d');

        $message = "Signalement de l'avis $idAvis écrit par $pseudo datant du $dateEnvoi sur $oeuvre.";
        $type = 'signalAvis';

        //verification que l'utilsateur n'a pas déja signalez cette avis
        $reqVerif = self::$bdd->prepare("SELECT * FROM signalement WHERE message = ? AND idUtilisateur = ?;");
        $reqVerif->execute([$message, $iduser]);
        $result = $reqVerif->fetch();

        if (empty($result)) {
            $requeteSignal = self::$bdd->prepare("INSERT INTO signalement(typeSignalement, message, idUtilisateur, dateSignal, idOeuvre) VALUES(?,?,?,?,?);");
            $requeteSignal->execute([$type, $message, $iduser, $date, $idOeuvre]);
            echo '<div class="container"><div class="alert alert-success text-center" role="alert">Le message a été signaler</div></div>';
        } else {
            echo '<div class="container"><div class="alert alert-warning text-center" role="alert">Vous avez déjà signaler ce message</div></div>';
        }
    }
}