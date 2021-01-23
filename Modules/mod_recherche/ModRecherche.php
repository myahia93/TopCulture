<?php
if (!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');
?>
<?php

include_once "ContRecherche.php";

class ModRecherche
{

    private $contRecherche;

    public function __construct()
    {
        $this->contRecherche = new ContRecherche();
        $this->contRecherche->barreDeRechercheAjax();
    }

}