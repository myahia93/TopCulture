<?php
if (!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');
?>
<?php

include_once "VueTuto.php";

class ContTuto
{
    private $vueTuto;

    public function __construct()
    {
        $this->vueTuto = new vueTuto();
    }

    public function affichagePageTuto()
    {
        $this->vueTuto->vuePageTuto();
    }

}