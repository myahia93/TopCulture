<?php
if (!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');
?>
<?php

include_once "ContTuto.php";

class ModTuto
{
    private $contTuto;

    public function __construct()
    {
        $this->contTuto = new ContTuto();

        $this->contTuto->affichagePageTuto();
    }
}