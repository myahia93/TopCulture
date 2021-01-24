<?php
if (!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');
?>
<?php

include_once "ConnexionBD.php";

class ModeleConnexion extends ConnexionBD
{
    public function modeleSeConnecte($nomUtilisateur, $mdp)
    {
        if ($nomUtilisateur != "" && $mdp != "") {
            try {
                //verifie le mdp hashé
                $selectMdp = self::$bdd->prepare("SELECT mot_de_passe FROM utilisateur WHERE pseudo = ?");
                $selectMdp->execute(array($nomUtilisateur));
                $mdpHash = $selectMdp->fetch();
                if (!empty($mdpHash)) {
                    $mdpCorrect = password_verify($mdp, $mdpHash["mot_de_passe"]);

                    if ($mdpCorrect) {
                        try {
                            $requeteVerif = self::$bdd->prepare("SELECT * FROM utilisateur WHERE pseudo = ? AND mot_de_passe = ?;");
                            $requeteVerif->execute(array($nomUtilisateur, $mdpHash["mot_de_passe"]));
                            $reponse = $requeteVerif->fetchAll(PDO::FETCH_COLUMN);


                            if (!empty($reponse)) {
                                $_SESSION['nom_utilisateur'] = $nomUtilisateur;
                                return null;
                                header("Location: index.php?module=acceuil");

                            } else {
                                return 1;
                            }
                        } catch (PDOException $e) {
                        }
                    } else {
                        return 2;
                    }
                } else {
                    return 3;
                }
            } catch (PDOException $e) {
            }
        }
    }

    public function modeleCreationCompte($nomUtilisateur, $mdp, $remdp)
    {
        if (strlen($nomUtilisateur) > 5 && $mdp !== " " && $remdp !== " ") {

            //verifie que le pseudo choisi n'existe pas
            $selectNomUser = self::$bdd->prepare("SELECT idUtilisateur FROM utilisateur WHERE pseudo = ?");
            $selectNomUser->execute([$nomUtilisateur]);

            $resultNom = $selectNomUser->fetchAll();

            if (empty($resultNom)) {

                if ($mdp == $remdp) { // vérifie que les 2 mots de passe sont similaires
                    $mdp_hache = password_hash($mdp, PASSWORD_DEFAULT);
                    $date = date('Y-m-d');
                    try {
                        $requeteAjoutUtilisateur = self::$bdd->prepare('INSERT INTO utilisateur(pseudo, mot_de_passe, date_creation, admin) VALUES (:pseudo, :mot_de_passe, :date_creation, 0)');
                        $requeteAjoutUtilisateur->bindParam(':pseudo', $nomUtilisateur);
                        $requeteAjoutUtilisateur->bindParam(':mot_de_passe', $mdp_hache);
                        $requeteAjoutUtilisateur->bindParam(':date_creation', $date);
                        $requeteAjoutUtilisateur->execute();
                        return null;

                    } catch (PDOException $e) {
                    }
                } else {
                    return "Attention : les mots de passes ne correspondent pas";
                }
            } else {
                return "Le pseudo " . $nomUtilisateur . " est déjà pris";
            }
        } else {
            return "Attention : nom utilisateur trop petit";
        }
    }

    public function modeleDeconnexion()
    {
        $_SESSION = array();
        session_destroy();
        header("Location: index.php?module=acceuil");
    }
}