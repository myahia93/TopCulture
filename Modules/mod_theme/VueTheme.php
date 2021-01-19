<?php
if (!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');
?>
<?php


class VueTheme
{
    // menu affichant les différents theme
    public function vueAfficheListeTheme($tab)
    {
        ?>
        <div class="container">
            <div class="titrePage mt-3 mb-4">
                <h1 class="text-center">Thèmes</h1>
            </div>
            <div class="themesPage">
                <div class="row">
                    <div class="col theme position-relative mb-5">
                        <div class="imgTheme">
                            <img class="mx-auto d-block" src="Ressources/imgThemes/fond_film.jpg" alt="">
                        </div>
                        <div class="boutonTheme position-absolute top-50 start-50 translate-middle">
                            <form action="index.php?module=theme&action=theme_selectionné" method="POST">
                                <input type="hidden" name="nomTheme" value="<?php echo $tab[0][0]; ?>">
                                <button type="submit">Voir</button>
                            </form>
                        </div>
                        <div class="bandeauTheme position-absolute bottom-0 start-50 translate-middle-x">
                            <h2 class="text-center">Film</h2>
                        </div>
                    </div>
                    <div class="col theme position-relative mb-5">
                        <div class="imgTheme">
                            <img class="mx-auto d-block" src="Ressources/imgThemes/fond_seriejpg.jpg" alt="">
                        </div>
                        <div class="boutonTheme position-absolute top-50 start-50 translate-middle">
                            <form action="index.php?module=theme&action=theme_selectionné" method="POST">
                                <input type="hidden" name="nomTheme" value="<?php echo $tab[3][0]; ?>">
                                <button type="submit">Voir</button>
                            </form>
                        </div>
                        <div class="bandeauTheme position-absolute bottom-0 start-50 translate-middle-x">
                            <h2 class="text-center">Séries</h2>
                        </div>
                    </div>
                    <div class="col theme position-relative mb-5">
                        <div class="imgTheme">
                            <img class="mx-auto d-block" src="Ressources/imgThemes/fond_jeux.jpg" alt="">
                        </div>
                        <div class="boutonTheme position-absolute top-50 start-50 translate-middle">
                            <form action="index.php?module=theme&action=theme_selectionné" method="POST">
                                <input type="hidden" name="nomTheme" value="<?php echo $tab[2][0]; ?>">
                                <button type="submit">Voir</button>
                            </form>
                        </div>
                        <div class="bandeauTheme position-absolute bottom-0 start-50 translate-middle-x">
                            <h2 class="text-center">Jeux Vidéos</h2>
                        </div>
                    </div>
                    <div class="col theme position-relative mb-5">
                        <div class="imgTheme">
                            <img class="mx-auto d-block" src="Ressources/imgThemes/fond_manga.jpg" alt="">
                        </div>
                        <div class="boutonTheme position-absolute top-50 start-50 translate-middle">
                            <form action="index.php?module=theme&action=theme_selectionné" method="POST">
                                <input type="hidden" name="nomTheme" value="<?php echo $tab[1][0]; ?>">
                                <button type="submit">Voir</button>
                            </form>
                        </div>
                        <div class="bandeauTheme position-absolute bottom-0 start-50 translate-middle-x">
                            <h2 class="text-center">Animes</h2>
                        </div>
                    </div>
                    <!--                <div class="col theme position-relative mb-5">-->
                    <!--                    <div class="imgTheme">-->
                    <!--                        <img class="mx-auto d-block" src="imgThemes/fond_cuisine.jpg" alt="">-->
                    <!--                    </div>-->
                    <!--                    <div class="boutonTheme position-absolute top-50 start-50 translate-middle">-->
                    <!--                        <form action="" method="post">-->
                    <!--                            <button type="submit">Voir</button>-->
                    <!--                        </form>-->
                    <!--                    </div>-->
                    <!--                    <div class="bandeauTheme position-absolute bottom-0 start-50 translate-middle-x">-->
                    <!--                        <h2 class="text-center">Cuisine</h2>-->
                    <!--                    </div>-->
                    <!--                </div>-->
                    <!--                <div class="col theme position-relative mb-5">-->
                    <!--                    <div class="imgTheme">-->
                    <!--                        <img class="mx-auto d-block" src="imgThemes/fond_foot.jpg" alt="">-->
                    <!--                    </div>-->
                    <!--                    <div class="boutonTheme position-absolute top-50 start-50 translate-middle">-->
                    <!--                        <form action="" method="post">-->
                    <!--                            <button type="submit">Voir</button>-->
                    <!--                        </form>-->
                    <!--                    </div>-->
                    <!--                    <div class="bandeauTheme position-absolute bottom-0 start-50 translate-middle-x">-->
                    <!--                        <h2 class="text-center">Football</h2>-->
                    <!--                    </div>-->
                    <!--                </div>-->
                </div>
            </div>
        </div>
        <?php
    }

    public function vueAfficheOeuvre($tab)
    {
        ?>

        <!-- Galerie films -->

        <div class="container">
            <div class="titrePage">
                <h1 class="text-center">Galerie films</h1>
            </div>
            <div class="galeriePage">
                <div class="imageGalerie">
                    <div class="row">
                        <?php foreach ($tab as $key => $value) { ?>
                            <div class="col galerie">

                                <form action="index.php?module=oeuvre&action=affichage_oeuvre" method="POST">
                                    <input type="hidden" name="idOeuvre" value="<?php echo $value['idOeuvre']; ?>">
                                    <button class="mx-auto d-block" type="submit"><img
                                                src="<?php echo $value['image']; ?>" alt=""></button>
                                    <div class="titreImageGalerie">
                                        <button class="mx-auto mt-3 d-block"
                                                type="submit"><?php echo $value['libelle']; ?></button>
                                    </div>
                                </form>

                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php

    }


    public function vueAfficheListeRecherche($tab, $recherche)
    {
        if (empty($tab)) {
            ?>
            <div class="container">
                <div class="titrePage">
                    <h1 class="text-center">Aucun résultats pour <?php echo $recherche; ?></h1>
                </div>
            </div>
            <?php
        } else {
            ?>
            <div class="container">
                <div class="titrePage">
                    <h1 class="text-center">Résultat pour : <?php echo $recherche; ?></h1>
                </div>
                <div class="galeriePage">
                    <div class="imageGalerie">
                        <div class="row">
                            <?php foreach ($tab as $key => $value) { ?>
                                <div class="col galerie">

                                    <form action="index.php?module=oeuvre&action=affichage_oeuvre" method="POST">
                                        <input type="hidden" name="idOeuvre"
                                               value="<?php echo $value['idOeuvre']; ?>">
                                        <button class="mx-auto d-block" type="submit"><img
                                                    src="<?php echo $value['image']; ?>" alt=""></button>
                                        <div class="titreImageGalerie">
                                            <button class="mx-auto mt-3 d-block"
                                                    type="submit"><?php echo $value['libelle']; ?></button>
                                        </div>
                                    </form>

                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }
}

?>