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
                            <p><?php if ($tab['description'] != null) {
                                    echo $tab['description'];
                                } else { ?>
                                    Editez le profil pour pouvoir ajouter une description.
                                <?php } ?></p>
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
                    <form action="index.php?module=profil&action=form_edition_profil" method="post">
                        <input type="hidden" name="description"
                               value="<?php echo $tab['description']; ?>">
                        <div class="boutonEdition">
                            <button type="submit" class="btn btn-success btn-lg">Éditer mon profil</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="sectionTops mb-4">
                <div class="titreTop">
                    <h2 class="text-center">Vos Top</h2>
                </div>
                <?php foreach ($top as $key => $value) { ?>
                    <!--                    <div class="top mb-3">-->
                    <!--                        <div class="titreTop">-->
                    <!--                            <h3>Titre :</h3>-->
                    <!--
                                            <form class="d-inline-block" action="index.php?module=top&action=mon_top"-->
                    <!--                                  method="POST">-->
                    <!--                                <input type="hidden" name="nomTop" value="--><?php //echo $value['nomTop']; ?><!--">-->
                    <!--                                <button type="submit"-->
                    <!--                                        class="btn btn-info btn-lg ">--><?php //echo $value['nomTop']; ?><!--</button>-->
                    <!--                            </form>-->
                    <!--                        </div>-->
                    <!--                        <div class="themeTop">-->
                    <!--                            <h3>Thème : </h3>-->
                    <!--                            <p>--><?php //echo $value['nom']; ?><!--</p>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <div class="top mb-3">
                        <div class="col-4 d-inline-block text-center mb-3">
                            <h4 style="color: rgb(153, 40, 40); font-weight: bold;"> Titre : </h4>
                            <form action="index.php?module=top&action=top_commu" method="post">
                                <input type="hidden" name="idUtilisateur"
                                       value="<?php echo $value['idUtilisateur']; ?>">
                                <input type="hidden" name="idTop" value="<?php echo $value['idTop']; ?>">
                                <button type="submit"
                                        class="btn btn-dark btn-lg"><?php echo $value['nomTop']; ?></button>
                            </form>
                        </div>
                        <div class="col-4 d-inline-block text-center">
                            <h4 style="color: rgb(153, 40, 40); font-weight: bold;">Thème : </h4>
                            <form action="index.php?module=theme&action=theme_selectionné" method="post">
                                <input type="hidden" name="nomTheme" value="<?php echo $value['nom']; ?>">
                                <button type="submit"
                                        class="btn btn-dark btn-lg"><?php echo $value['nom']; ?></button>
                            </form>
                        </div>
                        <div class="col-3 d-inline-block text-center">
                            <form action="index.php?module=top&action=suppr_top" method="post">
                                <input type="hidden" name="idTop" value="<?php echo $value['idTop']; ?>">
                                <button type="submit" class="btn btn-danger btn-lg ">Supprimer</button>
                            </form>
                        </div>
                    </div>
                <?php } ?>
            </div>

        </div>
        <?php

    }

    public function vueEditerProfil($description)
    {
        ?>
        <!-- Page édition profil -->

        <div class="container">
            <div class="titrePage my-4">
                <h1 class="text-center"> Éditer Profil</h1>
            </div>
            <div class="row">
                <div class="col sectionDescription position-relative col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-4">
                    <div class="descriptionProfil mb-4">
                        <form action="index.php?module=profil&action=maj_profil" method="POST">
                            <div class="espaceCom mx-auto">
                                <label for="commentaire"><h2> Changer la description :</h2></label>
                            </div>

                            <textarea name="description" id="" rows="5"><?php echo $description; ?></textarea>

                            <div class="boutonEdition">
                                <button type="submit" class="btn btn-success btn-lg">Mettre à jour mon profil</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

}