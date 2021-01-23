<?php
if (!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');
?>
<?php

include_once "ConnexionBD.php";

class ModeleRecherche extends ConnexionBD
{
    public function modeleAutoComp($oeuvre)
    {
        try {
            $reqRecherche = self::$bdd->prepare("SELECT libelle FROM oeuvre WHERE libelle LIKE '%$oeuvre%' ORDER BY libelle ASC LIMIT 5");
            $reqRecherche->execute();
            $result = $reqRecherche->fetchAll();
            return $result;
        } catch (PDOException $e) {
        }
    }
}