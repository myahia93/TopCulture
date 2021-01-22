<?php

//include_once "ConnexionBD.php";
//
//class Recherche extends ConnexionBD
//{
//
////if (isset($_POST['rechercheOeuvre'])) {
////
////    $Name = $_POST['rechercheOeuvre'];
////    $requeteElmtsOeuvre = self::$bdd->prepare("SELECT libelle FROM oeuvre WHERE libelle LIKE '%$Name%' LIMIT 5");
////    $requeteElmtsOeuvre->execute();
////    $result = $requeteElmtsOeuvre->fetchAll();
////}
//
//    public function __construct()
//    {
//        if (isset($_POST['rechercheText'])) {
//            $inpText = $_POST['rechercheText'];
//            $requeteElmtsOeuvre = self::$bdd->prepare("SELECT idOeuvre, libelle FROM oeuvre WHERE libelle LIKE '%?%' LIMIT 5");
//            $requeteElmtsOeuvre->execute([$inpText]);
//            $result = $requeteElmtsOeuvre->fetchAll();
//            if (!empty($result)) {
//                foreach ($result as $key => $value) {
//                    echo "<a href=\'' class =\'list-group-item list-group-item-action border-1\'>" . $value['libelle'] . "</a>";
//                }
//            } else {
//                echo "<p class='list-group-item border1'>Aucun résultat</p>";
//            }
//        }
//    }
//}

echo 'ok';

?>