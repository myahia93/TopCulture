<?php
if (!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');
?>
<?php


class VueOeuvre
{
    public function vuePageOeuvre($result, $avis, $admin)
    {
        ?>
        <!-- Section présentation du film -->

        <div class="container">
            <!--            <div class="titrePage">-->
            <!--                <h1 class="text-center">Films</h1>-->
            <!--            </div>-->
            <div class="sectionPresentationFilm">
                <div class="row">
                    <div class="presentationFilm col-xxl-5 col-xl-5 col-lg-5 col-md-12 col-sm-12 mx-auto my-2">
                        <div class="imageFilm mx-auto">
                            <img src="<?php echo $result['image']; ?>" alt="<?php echo $result['image']; ?>">
                        </div>
                        <div class="titreFilm my-1 mx-auto">
                            <div class="titre text-center">
                                <p><?php echo $result['libelle']; ?></p>
                            </div>
                        </div>
                        <div class="texteNote my-1">
                            <p class="text-center mb-1">Note:</p>
                        </div>
                        <div class="noteGlobale">
                            <p class="text-center"> <?php if (!isset($result['note'])) {
                                    echo "Non Noté";
                                } else {
                                    echo $result['note'];
                                } ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section commentaires -->

            <div class="sectionCommentaires">
                <h2 class="my-3">Commentaires :</h2>

                <?php
                foreach ($avis as $key => $value) {
                    ?>
                    <div class="commentaire">
                        <div class="titreCom">
                            <h3><?php echo $value['titreAvis'] ?></h3>
                        </div>
                        <div class="comUtilisateur">
                            <p><?php echo $value['critique'] ?></p>
                        </div>
                        <div class="noteUtilisateur">
                            <p style="display: inline-block; color: #212529;">Note : </p>
                            <p style="display: inline-block; color: #1E8449; font-size: 30px;"><?php echo $value['note'] ?></p>
                        </div>
                        <div class="infoUtilisateur">
                            <h5 style="display: inline-block;">Par </h5>
                            <p style="display: inline-block;"
                               id="nomPrenomUtili"><?php echo $value['pseudo'] ?></p>
                            <h5 style="display: inline-block;"> le </h5>
                            <p style="display: inline-block;" id="date"><?php echo $value['dateEnvoi'] ?></p>
                        </div>
                        <div class="boutonSignalement" style="text-align : right;">
                            <?php if (isset($_SESSION['nom_utilisateur']) && $_SESSION['nom_utilisateur'] == $value['pseudo']) { ?>
                                <form class="d-inline-block" action="index.php?module=oeuvre&action=form_modif_avis"
                                      method="POST">
                                    <input type="hidden" name="idAvis" value="<?php echo $value['idAvis'] ?>">
                                    <button type="submit" class="btn btn-success btn-lg ">Modifier</button>
                                </form>
                                <form class="d-inline-block" action="index.php?module=oeuvre&action=suppr_avis"
                                      method="POST">
                                    <input type="hidden" name="idAvis" value="<?php echo $value['idAvis'] ?>">
                                    <input type="hidden" name="idOeuvre" value="<?php echo $result['idOeuvre']; ?>">
                                    <button type="submit" class="btn btn-danger btn-lg ">Supprimer</button>
                                </form>
                            <?php } else if ($admin == 1) { ?>
                                <form class="d-inline-block" action="index.php?module=oeuvre&action=suppr_avis"
                                      method="POST">
                                    <input type="hidden" name="idAvis" value="<?php echo $value['idAvis'] ?>">
                                    <input type="hidden" name="idOeuvre" value="<?php echo $result['idOeuvre']; ?>">
                                    <button type="submit" class="btn btn-danger btn-lg ">Supprimer</button>
                                </form>
                            <? } else { ?>
                                <form action="index.php?module=oeuvre&action=signal_avis" method="POST">
                                    <input type="hidden" name="idAvis" value="<?php echo $value['idAvis'] ?>">
                                    <input type="hidden" name="pseudo" value="<?php echo $value['pseudo'] ?>">
                                    <input type="hidden" name="dateEnvoi" value="<?php echo $value['dateEnvoi'] ?>">
                                    <input type="hidden" name="idOeuvre" value="<?php echo $result['idOeuvre']; ?>">
                                    <input type="hidden" name="libelle" value="<?php echo $result['libelle']; ?>">
                                    <button type="submit" class="btn btn-warning btn-lg  ">Signaler</button>
                                </form>
                            <? } ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>

            <!-- Section formulaire -->

            <div class="sectionFormulaire">
                <h2 class="my-3">Écrivez un commentaire :</h2>

                <div class="container">
                    <button type="button" class="btn btn-success btn-lg mb-5" data-toggle="collapse"
                            data-target="#demo">Envoyer un commentaire
                    </button>
                    <div id="demo" class="collapse">

                        <div class="formuaire mb-4">
                            <form action="index.php?module=oeuvre&action=creation_avis" method="POST">
                                <input type="hidden" value="<?php echo $result['idOeuvre']; ?>" name="oeuvre">
                                <div class="noteClient">
                                    <label for="name">Votre note : </label>
                                    <input type="number" name="note" id="noteClient" min="1" max="10" required>
                                </div>
                                <div class="titreAvis mt-3">
                                    <label for="name">Titre : </label>
                                    <textarea name="titre" id="titreAvis" rows="1" cols="50" required></textarea>
                                </div>
                                <div class="espaceCom mb-2">
                                    <label for="commentaire">Votre Avis :</label>
                                    <textarea name="avis" id="" rows="8" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-success btn-lg">Envoyer</button>
                            </form>
                        </div>

                    </div>
                </div>

            </div>

        </div>


        <?php
    }

    public function vueFormModifAVis($result)
    {
        ?>
        <div class="container">
            <div class="sectionFormulaire">
                <h2 class="my-3">Modifiez votre avis :</h2>
                <div class="formuaire mb-4">
                    <form action="index.php?module=oeuvre&action=modif_avis" method="POST">
                        <input type="hidden" value="<?php echo $result['idOeuvre']; ?>" name="oeuvre">
                        <input type="hidden" value="<?php echo $result['idAvis']; ?>" name="idAvis">
                        <div class="noteClient">
                            <label for="name">Votre note : </label>
                            <input type="number" name="note" id="noteClient" value="<?php echo $result['note']; ?>"
                                   min="1"
                                   max="10" required>
                        </div>
                        <div class="titreAvis mt-3">
                            <label for="name">Titre : </label>
                            <textarea name="titre" id="titreAvis" rows="1" cols="50"
                                      required><?php echo $result['titreAvis']; ?></textarea>
                        </div>
                        <div class="espaceCom mb-2">
                            <label for="commentaire">Votre Avis :</label>
                            <textarea name="avis" id="" rows="8" required><?php echo $result['critique']; ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-success btn-lg">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
        <?php
    }


    //FONCTION ALERT
    public function vueAlertSucces($texte)
    {
        echo '
<div class="container">
    <div class="alert alert-success text-center" role="alert">' . $texte . '</div>
</div>';
    }

    public function vueAlertWarning($texte)
    {
        echo '
<div class="container">
    <div class="alert alert-warning text-center" role="alert">' . $texte . '</div>
</div>';
    }
}