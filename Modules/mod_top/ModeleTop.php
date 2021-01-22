<?php
if (!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');
?>
<?php

include_once "ConnexionBD.php";

class ModeleTop extends ConnexionBD
{

    //Fonction pour la création du top
    public function modeleListeTheme()
    {
        try {
            $selectTheme = self::$bdd->prepare("SELECT * FROM theme;");
            $selectTheme->execute();
            $result = $selectTheme->fetchAll();

            return $result;
        } catch (PDOException $e) {
        }
    }

    public function modeleCreationTop($nomTop, $theme)
    {
        if (isset($_SESSION['nom_utilisateur'])) {
            try {
                //on recupere l'id de l'utilisateur
                $selectID = self::$bdd->prepare("SELECT idUtilisateur FROM utilisateur WHERE pseudo = ?;");
                $selectID->execute([$_SESSION['nom_utilisateur']]);
                $recupId = $selectID->fetch();
                $iduser = $recupId["idUtilisateur"];


                //on vérifie que l'utilisateur na pas deja de top ayant ce nom
                $selectNomTop = self::$bdd->prepare("SELECT nomTop FROM top WHERE nomTop = ? AND idUtilisateur = ? AND idTheme = ? ");
                $selectNomTop->execute([$nomTop, $iduser, $theme]);
                $recupNomTop = $selectNomTop->fetch();
                if (empty($recupNomTop["nomTop"])) {
                    try {
                        $requeteCreationTop = self::$bdd->prepare("INSERT INTO top(nomTop, idUtilisateur, idTheme) VALUES(:nomTop, :idUtilisateur, :idTheme)");
                        $requeteCreationTop->bindParam(':nomTop', $nomTop);
                        $requeteCreationTop->bindParam(':idUtilisateur', $iduser);
                        $requeteCreationTop->bindParam(':idTheme', $theme);
                        $requeteCreationTop->execute();
                        //$requeteCreationTop->execute([$nomTop, $iduser, $this->theme]);
                        echo '<div class="container"><div class="alert alert-success text-center" role="alert"> Le Top a été créé !</div></div>';
                        return true; //ajout
                    } catch (PDOException $e) {
                        echo "Echec création du top";
                    }
                } else {
                    echo '<div class="container"><div class="alert alert-warning text-center" role="alert"> le top ' . $theme . ' : ' . $nomTop . ' existe déjà</div></div>';
                    return false;
                }
            } catch (PDOException $e) {
            }
        } else {
            echo '<div class="container"><div class="alert alert-warning text-center" role="alert">Connectez-vous pour pouvoir créer votre Top.</div></div>';
            return false;
        }
    }

    //Fonction pour l'affichage
    public function modeleRecupIdTop($top)
    {
        try {
            //on récupère l'id du top
            $recupTop = self::$bdd->prepare("SELECT idTop FROM top WHERE nomTop = ?");
            $recupTop->execute([$top]);
            $result = $recupTop->fetch();
            $idTop = $result[0];
            return $idTop;
        } catch (PDOException $e) {
        }
    }

    public function modeleListeOeuvre($top)
    {
        try {
            //on récupère le theme
            $recupTheme = self::$bdd->prepare("SELECT idTheme FROM top WHERE idTop = ?");
            $recupTheme->execute([$top]);
            $theme = $recupTheme->fetch();
            $idTheme = $theme[0];

            $selectOeuvre = self::$bdd->prepare("SELECT idOeuvre, libelle, image FROM oeuvre WHERE idTheme = ? AND idOeuvre NOT IN (SELECT idOeuvre_composer FROM composer WHERE idTop_composer = ?) ORDER BY libelle ASC");
            $selectOeuvre->execute([$idTheme, $top]);
            $result = $selectOeuvre->fetchAll();

            return $result;
        } catch (PDOException $e) {
        }
    }

    public function modeleInfoTop($idtop)
    {
        try {
            $selectTop = self::$bdd->prepare("SELECT nomTop, idUtilisateur, idTheme, pseudo FROM top NATURAL JOIN utilisateur WHERE idTop = ?;");
            $selectTop->execute([$idtop]);
            $result = $selectTop->fetch();
            return $result;
        } catch (PDOException $e) {
        }
    }

    public function modeleMonTop($idtop)
    {
        try {
            $selectTop = self::$bdd->prepare("SELECT * FROM oeuvre NATURAL JOIN composer WHERE idOeuvre = idOeuvre_composer AND idTop_composer = ? ORDER BY position;");
            $selectTop->execute([$idtop]);
            $result = $selectTop->fetchAll();
            return $result;
        } catch (PDOException $e) {
        }
    }

    //Fonction permmettant d'ajouter une oeuvre de son top
    public function modeleAjouterOeuvre($idOeuvre, $idTop)
    {

        $reqPosition = self::$bdd->prepare("SELECT count(*) FROM composer WHERE idTop_composer = ?");
        $reqPosition->execute([$idTop]);
        $result = $reqPosition->fetch();

        if (!empty($result)) {
            $position = $result[0] + 1;
        } else {
            $position = 1;
        }
        if ($position <= 10) {
            try {
                $requeteAjoutOeuvre = self::$bdd->prepare("INSERT INTO composer VALUES(?,?,?)");
                $requeteAjoutOeuvre->execute([$idTop, $idOeuvre, $position]);
                echo '<div class="container"><div class="alert alert-success text-center" role="alert">Ajout réussi</div></div>';
            } catch (PDOException $e) {
            }
        } else {
            echo '<div class="container"><div class="alert alert-warning text-center" role="alert">Un top peut comporter au maximun 10 éléments</div></div>';
        }
    }

    //Fonction permmettant de suppr une oeuvre de son top
    public function modeleSupprOeuvre($idOeuvre, $idTop)
    {
        try {
            $requetePosition = self::$bdd->prepare("SELECT position FROM composer WHERE idOeuvre_composer = ? AND idTop_composer = ?");
            $requetePosition->execute([$idOeuvre, $idTop]);
            $result = $requetePosition->fetch();
            $position = $result[0];
            $requeteupdate = self::$bdd->prepare("UPDATE composer SET position = position-1 WHERE idTop_composer = ? AND position > ?");
            $requeteupdate->execute([$idTop, $position]);
            $requeteSuppr = self::$bdd->prepare("DELETE FROM composer WHERE idOeuvre_composer = ? AND idTop_composer = ?");
            $requeteSuppr->execute([$idOeuvre, $idTop]);
            echo '<div class="container"><div class="alert alert-success text-center" role="alert">Suppression réussi</div></div>';
        } catch (PDOException $e) {
        }
    }

    //A FAIRE
    public function modeleTopEnregistre()
    {

    }


    //fonction pour les tops de la communauté
    public function modeleTopCommu()
    {
        try {
            $req = self::$bdd->prepare("SELECT idTop, nomTop, idUtilisateur, idTheme, pseudo, nom FROM utilisateur NATURAL JOIN top NATURAL JOIN theme;");
            $req->execute();
            return $req;
        } catch (PDOException $e) {
        }
    }

    //fonction pour les tops de la communauté
    public function modeleTopCommuSimple()
    {
        try {
            $req = self::$bdd->prepare("SELECT idTop, nomTop, idUtilisateur, idTheme, pseudo, nom FROM utilisateur NATURAL JOIN top NATURAL JOIN theme ORDER BY idTop Limit 20;");
            $req->execute();
            return $req;
        } catch (PDOException $e) {
        }
    }

    public function modeleTopUtilisateur($idTop, $iduser)
    {
        try {
            $req = self::$bdd->prepare("SELECT idOeuvre, libelle, image, nomTop, idTheme, idUtilisateur, pseudo FROM oeuvre NATURAL JOIN composer NATURAL JOIN top NATURAL JOIN utilisateur WHERE idOeuvre = idOeuvre_composer AND idTop_composer = ? AND idUtilisateur = ? ORDER BY position;");
            $req->execute([$idTop, $iduser]);
            $result = $req->fetchAll();
            return $result;
        } catch (PDOException $e) {
        }
    }

    //vérifie si l'utilisateur est un admin ou non
    public function modeleEstAdmin()
    {
        if (isset($_SESSION['nom_utilisateur'])) {
            try {
                $reqVerifAdmin = self::$bdd->prepare("SELECT * FROM utilisateur WHERE pseudo = ? AND admin = 1");
                $reqVerifAdmin->execute([$_SESSION['nom_utilisateur']]);
                $result = $reqVerifAdmin->fetch();

                if (empty($result)) {
                    return 0;
                } else {
                    return 1;
                }
            } catch (PDOException $e) {
            }
        } else {
            return 0;
        }
    }


    //fonction avis
    public function modeleCreationAvis($idtop, $avis)
    {
        try {
            //on recupere l'id de l'utilisateur
            $selectID = self::$bdd->prepare("SELECT idUtilisateur FROM utilisateur WHERE pseudo = ?;");
            $selectID->execute([$_SESSION['nom_utilisateur']]);
            $recupId = $selectID->fetch();
            $iduser = $recupId["idUtilisateur"];
            //On verife si l'utilisateur n'a pas deja donné son avis sur ce top
            $requeteVerif = self::$bdd->prepare("SELECT idAvis FROM avistop WHERE idUtilisateur = ? AND idTop = ?");
            $requeteVerif->execute([$iduser, $idtop]);
            $resultVerif = $requeteVerif->fetchAll();

            if (empty($resultVerif)) {


                //création de l'avis général
                $requeteCreationAvis = self::$bdd->prepare("INSERT INTO avis(idUtilisateur) VALUES(?);");
                $requeteCreationAvis->execute([$iduser]);

                //création de l'avis sur l'oeuvre
                $idAvis = self::$bdd->lastInsertId();
                $date = date('Y-m-d');


                try {
                    $requeteCreationAvisTop = self::$bdd->prepare("INSERT INTO avistop VALUES(?,?,?,?,?)");
                    $requeteCreationAvisTop->execute([$idAvis, $avis, $date, $idtop, $iduser]);
                    return $idtop;

                } catch (PDOException $e) {
                    echo "Echec de l'envoi de votre avis";
                }
            } else {
                echo '<div class="container"><div class="alert alert-warning text-center" role="alert">Vous avez déjà donner votre avis</div></div>';
                return $idtop;
            }
        } catch (PDOException $e) {
        }
    }

    //fourni les élement permettant d'afficher les avis de l'oeuvre
    public function modeleAfficheAvis($idTop)
    {
        try {
            $idtop = $idTop;
            $requeteAvis = self::$bdd->prepare("SELECT idAvis, critique, dateEnvoi,  idTop, idUtilisateur, pseudo FROM avistop NATURAL JOIN utilisateur WHERE idTop = ? ORDER BY dateEnvoi DESC;");
            $requeteAvis->execute([$idtop]);
            $result = $requeteAvis->fetchAll();

            return $result;
        } catch (PDOException $e) {
        }
    }

    //suppression
    //FONCTION POUR LA SUPPRESSION D'UN AVIS
    public function modeleSupprAvis($idAvis, $idtop)
    {
        try {
            $reqSupprAvisOeuvre = self::$bdd->prepare("DELETE FROM avisTop WHERE idAvis = ?");
            $reqSupprAvisOeuvre->execute([$idAvis]);

            $reqSupprAvis = self::$bdd->prepare("DELETE FROM avis WHERE idAvis = ?");
            $reqSupprAvis->execute([$idAvis]);

            echo '<div class="container"><div class="alert alert-success text-center" role="alert">Cet avis a bien été supprimé</div></div>';
        } catch (PDOException $e) {
        }
    }

    //modification
    // permet de recupérer les élements d'un avis
    public function modeleElementAvis($avis)
    {
        try {
            $req = self::$bdd->prepare("SELECT * FROM avistop WHERE idAvis = ?");
            $req->execute([$avis]);
            $result = $req->fetch();

            return $result;
        } catch (PDOException $e) {
        }
    }

    //permet l'update de l'avis
    public function modeleModifAvis($idAvis, $avis)
    {
        try {
            $date = date('Y-m-d');
            $reqModifAvis = self::$bdd->prepare("UPDATE avistop SET critique = ?, dateEnvoi = ? WHERE idAvis = ?;");
            $reqModifAvis->execute([$avis, $date, $idAvis]);
            echo '<div class="container"><div class="alert alert-success text-center" role="alert">Vous avis a bien été modifer</div></div>';
        } catch (PDOException $e) {
        }
    }


    //signalement
    public function modeleSignalerAvis($idAvis, $pseudo, $dateEnvoi, $idtop)
    {
        try {
            //on recupere l'id de l'utilisateur
            $selectID = self::$bdd->prepare("SELECT idUtilisateur FROM utilisateur WHERE pseudo = ?;");
            $selectID->execute([$_SESSION['nom_utilisateur']]);
            $recupId = $selectID->fetch();
            $iduser = $recupId["idUtilisateur"];
            $date = date('Y-m-d');

            $message = "Signalement de l'avis $idAvis écrit par $pseudo datant du $dateEnvoi sur le top numero $idtop.";
            $type = 'signalAvisTop';

            //verification que l'utilsateur n'a pas déja signalez cette avis
            $reqVerif = self::$bdd->prepare("SELECT * FROM signalement WHERE message = ? AND idUtilisateur = ?;");
            $reqVerif->execute([$message, $iduser]);
            $result = $reqVerif->fetch();

            if (empty($result)) {
                $requeteSignal = self::$bdd->prepare("INSERT INTO signalement(typeSignalement, message, idUtilisateur, dateSignal, idUtilSignal, idTop) VALUES(?,?,?,?,?,?);");
                $requeteSignal->execute([$type, $message, $iduser, $date, $iduser, $idtop]);
                echo '<div class="container"><div class="alert alert-success text-center" role="alert">Le message a été signaler</div></div>';
            } else {
                echo '<div class="container"><div class="alert alert-warning text-center" role="alert">Vous avez déjà signaler ce message</div></div>';
            }
        } catch (PDOException $e) {
        }
    }

    //supprime top
    public function modeleSupprTop($idtop)
    {
        $req1 = self::$bdd->prepare("DELETE FROM signalement WHERE idTop = ?");
        $req1->execute([$idtop]);
        $req2 = self::$bdd->prepare("DELETE FROM avistop WHERE idTop = ?");
        $req2->execute([$idtop]);
        $req3 = self::$bdd->prepare("DELETE FROM composer WHERE idTop_composer = ?");
        $req3->execute([$idtop]);
        $reqSupprTop = self::$bdd->prepare("DELETE FROM top WHERE idTop = ?");
        $reqSupprTop->execute([$idtop]);
        header('Location: index.php?module=profil&action=affichage_profil');


//        $req = self::$bdd->prepare("SELECT * FROM composer WHERE idTop_composer = ?");
//        $req->execute([$idtop]);
//        $result = $req->fetch();
//        if (!empty($result)) {
//            $reqVideTop = self::$bdd->prepare("DELETE FROM composer WHERE idTop_composer = ?");
//            $reqVideTop->execute([$idtop]);
//        }
//        $reqVideTop = self::$bdd->prepare("DELETE FROM composer NATURAL JOIN top NATURAL JOIN avistop NATURAL JOIN Signalement WHERE idTop_composer = ?");
//        $reqVideTop->execute([$idtop]);
//        try {
//            $reqSupprTop = self::$bdd->prepare("DELETE FROM top WHERE idTop = ?");
//            $reqSupprTop->execute([$idtop]);
//            header('Location: index.php?module=profil&action=affichage_profil');
//        } catch (PDOException $e) {
//        }
    }
}