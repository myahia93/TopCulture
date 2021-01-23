<?php
if (!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');
?>
<?php

include_once "ConnexionBD.php";

class ModeleProfil extends ConnexionBD
{

    public function modeleProfilUtilisateurs()
    {
        try {
            $requeteUtilisateur = self::$bdd->prepare("SELECT * FROM utilisateur WHERE pseudo = ?;");
            $requeteUtilisateur->execute([$_SESSION['nom_utilisateur']]);
            $result = $requeteUtilisateur->fetch();

            return $result;
        } catch (PDOException $e) {
        }
    }

    public function modeleListeTop()
    {
        try {
            //on recupere l'id de l'utilisateur
            $selectID = self::$bdd->prepare("SELECT idUtilisateur FROM utilisateur WHERE pseudo = ?;");
            $selectID->execute([$_SESSION['nom_utilisateur']]);
            $recupId = $selectID->fetch();
            $iduser = $recupId["idUtilisateur"];

            //on récupere tout les nom des top de l'utilisateur
            $requeteTop = self::$bdd->prepare("SELECT * FROM top NATURAL JOIN theme WHERE idUtilisateur = ?");
            $requeteTop->execute([$iduser]);
            $result = $requeteTop->fetchAll();

            return $result;
        } catch (PDOException $e) {
        }
    }

    public function modeleMajProfil($description)
    {
        try {
            $reqMaj = self::$bdd->prepare("UPDATE utilisateur SET description = ?, WHERE pseudo = ?");
            $reqMaj->execute([$description, $_SESSION['nom_utilisateur']]);
        } catch (PDOException $e) {
        }
    }
}