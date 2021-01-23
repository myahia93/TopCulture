<?php
if (!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');
?>
<?php


class VueRecherche
{

    public function vueAutoComp($tab)
    {
        foreach ($tab as $key => $value) {
            ?>
            <div>
                <a href="#"
                   class="list-group-item list-group-item-action border-1"><?php echo $value['libelle']; ?></a>
            </div>
            <?php
        }
    }

}