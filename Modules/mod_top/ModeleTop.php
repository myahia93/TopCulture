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

    public function modeleMonTop($idtop)
    {
        try {
            $selectTop = self::$bdd->prepare("SELECT * FROM oeuvre NATURAL JOIN composer WHERE idOeuvre = idOeuvre_composer AND idTop_composer = ?;");
            $selectTop->execute([$idtop]);
            $result = $selectTop->fetchAll();
            return $result;
        } catch (PDOException $e) {
        }
    }

    //Fonction permmettant d'ajouter une oeuvre de son top
    public function modeleAjouterOeuvre($idOeuvre, $idTop)
    {
        try {
            $requeteAjoutOeuvre = self::$bdd->prepare("INSERT INTO composer VALUES(?,?)");
            $requeteAjoutOeuvre->execute([$idTop, $idOeuvre]);
            echo '<div class="container"><div class="alert alert-success text-center" role="alert">Ajout réussi</div></div>';
        } catch (PDOException $e) {
        }
    }

    //Fonction permmettant de suppr une oeuvre de son top
    public function modeleSupprOeuvre($idOeuvre, $idTop)
    {
        try {
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

    public function modeleTopUtilisateur($idTop, $iduser)
    {
        try {
            $req = self::$bdd->prepare("SELECT idOeuvre, libelle, image, nomTop, idTheme, idUtilisateur, pseudo FROM oeuvre NATURAL JOIN composer NATURAL JOIN top NATURAL JOIN utilisateur WHERE idOeuvre = idOeuvre_composer AND idTop_composer = ? AND idUtilisateur = ?;");
            $req->execute([$idTop, $iduser]);
            $result = $req->fetchAll();
            return $result;
        } catch (PDOException $e) {
        }
    }
}