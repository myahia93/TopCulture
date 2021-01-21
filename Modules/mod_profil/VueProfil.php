<?php
if (!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');
?>
<?php


class VueProfil
{

    public function vueAffichageProfil($tab, $top)
    {
        ?>
        <div class="container">
            <div class="titrePage my-4">
                <h1 class="text-center">Profil</h1>
            </div>
            <div class="row">
                <div class="col sectionImageProfil position-relative col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-4">
                    <img class="mx-auto d-block" src="Ressources/Page_D_Acceuil/profil.png" alt="">
                    <div class="pseudoUtilisateur position-absolute bottom-0 start-50 translate-middle-x">
                        <p><?php echo $tab['pseudo']; ?></p>
                    </div>
                </div>
                <div class="col sectionDescription position-relative col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-4">
                    <div class="description mb-4">
                        <h2>Description :</h2>
                        <div class="paragrapheDescription">
                            <p>Ut vestibulum, eros vitae volutpat interdum, urna sapien hendrerit purus, at lobortis
                                tellus lectus a nulla. Donec dictum orci at bibendum luctus. Suspendisse non gravida
                                leo, ac vehicula nibh. Mauris nec lacus eu neque dignissim elementum vitae vel metus.
                                Vivamus risus erat, mattis a ornare et, tempor a orci. Mauris gravida maximus nibh,
                                accumsan sodales odio interdum vel. Praesent sem ligula, finibus vitae venenatis quis,
                                viverra eu purus. Pellentesque dignissim nulla vel lectus maximus interdum. Suspendisse
                                et ex id tellus scelerisque ultricies eget id augue. Sed felis orci, egestas at sapien
                                at, hendrerit varius ipsum. Integer accumsan neque non quam hendrerit dignissim. In
                                facilisis tellus mollis aliquam lobortis. Suspendisse potenti.</p>
                        </div>
                    </div>
                    <div class="niveau">
                        <div class="textNiveau d-inline-block">
                            <h2>Niveau :</h2>
                            <p>Vous êtes niveau : </p>
                        </div>
                        <div class="niveauUtilisateur d-inline-block">
                            <p><?php echo $tab['niveau']; ?></p>
                        </div>
                    </div>
                    <div class="membre">
                        <div class="textMembre d-inline-block">
                            <h2>Membre depuis le : </h2>
                            <p><?php echo $tab['date_creation']; ?></p>
                        </div>
                    </div>
                    <div class="boutonEdition">
                        <button type="button" class="btn btn-success btn-lg">Éditer mon profil</button>
                    </div>
                </div>
            </div>
            <div class="sectionTops mb-4">
                <div class="titreTop">
                    <h2 class="text-center">Vos Top</h2>
                </div>
                <?php foreach ($top as $key => $value) { ?>
                    <div class="top mb-3">
                        <div class="titreTop">
                            <h3>Titre :</h3>
                            <!--                            <p>Nulla mollis commodo auctor.</p>-->
                            <form class="d-inline-block" action="index.php?module=top&action=mon_top"
                                  method="POST">
                                <input type="hidden" name="nomTop" value="<?php echo $value['nomTop']; ?>">
                                <button type="submit"
                                        class="btn btn-info btn-lg "><?php echo $value['nomTop']; ?></button>
                            </form>
                        </div>
                        <div class="themeTop">
                            <h3>Thème : </h3>
                            <p><?php echo $value['nom']; ?></p>
                        </div>
                    </div>
                    <div class="top mb-3">
                        <div class="col-4 d-inline-block text-center ">
                            <h4 style="color: rgb(153, 40, 40); font-weight: bold;"> Titre : </h4>
                            <form action="" method="post">
                                <button type="submit" class="btn btn-success btn-lg">The best</button>
                            </form>
                        </div>
                        <div class="col-4 d-inline-block text-center">
                            <h4 style="color: rgb(153, 40, 40); font-weight: bold;">Thème : </h4>
                            <form action="" method="post">
                                <button type="submit" class="btn btn-success btn-lg">FILM</button>
                            </form>
                        </div>
                        <div class="col-3 d-inline-block text-center ">
                            <button type="submit" class="btn btn-danger btn-lg ">Supprimer</button>
                        </div>
                    </div>
                <?php } ?>
            </div>

        </div>
        <?php

    }

}