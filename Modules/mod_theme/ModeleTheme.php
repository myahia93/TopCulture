<?php
if (!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');
?>
<?php

include_once "ConnexionBD.php";

class ModeleTheme extends ConnexionBD
{

    public function modeleListeTheme()
    {
        try {
            $selectTheme = self::$bdd->prepare("SELECT nom FROM theme");
            $selectTheme->execute();
            $result = $selectTheme->fetchAll();

            return $result;
        } catch (PDOException $e) {
        }
    }

    //Permet de selectionner le theme courant pour ensuite afficher les oeuvre de ce theme
    public function modeleSelectionTheme($theme)
    {
        try {
            //Premièrement on récupère l'id du theme actuel
            $selectID = self::$bdd->prepare("SELECT idTheme FROM theme WHERE nom = ?;");
            $selectID->execute([$theme]);
            $recupId = $selectID->fetch();
            $id = $recupId["idTheme"]; //id du theme actuel

            //Affichage des oeuvres du themes
            $selectOeuvre = self::$bdd->prepare("SELECT idOeuvre, libelle, image FROM oeuvre WHERE idTheme = ? ORDER BY libelle ASC");
            $selectOeuvre->execute([$id]);
            $result = $selectOeuvre->fetchAll();

            return $result;
        } catch (PDOException $e) {
        }
    }

    public function modeleListeRecherche($recherche)
    {
        try {
            $selectOeuvre = self::$bdd->prepare("SELECT idOeuvre, libelle, image FROM oeuvre WHERE libelle LIKE '%$recherche%' ORDER BY libelle ASC");
            $selectOeuvre->execute();
            $result = $selectOeuvre->fetchAll();
            return $result;
        } catch (PDOException $e) {
        }
    }

    public function modeleListeMieuxNote()
    {
        try {
            $selectOeuvre = self::$bdd->prepare("SELECT idOeuvre, libelle, image FROM oeuvre ORDER BY note DESC Limit 20");
            $selectOeuvre->execute();
            $result = $selectOeuvre->fetchAll();
            return $result;
        } catch (PDOException $e) {
        }
    }


}