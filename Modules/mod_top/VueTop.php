<?php
if (!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');
?>
<?php

class VueTop
{
    public function vueCreationTop($tab, $topCommu)
    {
        ?>
        <div class="container">
            <div class="titrePage mt-3 mb-4">
                <h1 class="text-center">Crée ton Top !</h1>
            </div>
            <div class="topPage">
                <div class="row">
                    <button type="button" class="btn btn-success btn-lg mx-auto mb-5" style="width: 150px;"
                            data-toggle="collapse" data-target="#demo">Créer un Top
                    </button>
                    <div id="demo" class="collapse">
                        <div class=" bande_horizontale  mx-auto mb-5">
                            <div class="text-center mt-4 mb-2">
                                <form action="index.php?module=top&action=creation_top" method="POST">
                                    <div class="top mx-auto mb-5">
                                        <label><b>Nom du top</b></label>
                                        <input type="text" size="30" maxlength="50" class="form-control"
                                               placeholder="Entrer le nom du top"
                                               name="nom_top" required>
                                    </div>
                                    <div class="top mx-auto mb-5">
                                        <label><b>Thème</b></label>
                                        <select name='theme'>
                                            <?php foreach ($tab as $key => $value) { ?>
                                                <option value="<?php echo $value['idTheme']; ?>"><?php echo $value['nom']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="top mx-auto mb-5">
                                        <button type="submit" class="btn btn-danger btn-lg ">Créer le top</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="sectionCommentaires ">
                <h2 class="my-3"> Top des internautes :</h2>
                <?php foreach ($topCommu as $key => $value) { ?>
                    <div class="commentaire">

                        <div class="col-4 d-inline-block text-center ">
                            <h4 style="color: rgb(153, 40, 40); font-weight: bold;"> Utilisateur : </h4>
                            <p style="font-size:20px ;"> <?php echo $value['pseudo']; ?></p>
                        </div>
                        <div class="col-4 d-inline-block text-center">
                            <h4 style="color: rgb(153, 40, 40); font-weight: bold;">Nom du Top : </h4>
                            <form action="index.php?module=top&action=top_commu" method="POST">
                                <input type="hidden" name="idUtilisateur"
                                       value="<?php echo $value['idUtilisateur']; ?>">
                                <input type="hidden" name="idTop" value="<?php echo $value['idTop']; ?>">
                                <button type="submit"
                                        class="btn btn-success btn-lg"><?php echo $value['nomTop']; ?></button>
                                <!--A REVOIR-->
                            </form>
                        </div>
                        <div class="col-3 d-inline-block text-center">
                            <h4 style="color: rgb(153, 40, 40); font-weight: bold;">Thème du Top : </h4>
                            <form action="index.php?module=theme&action=theme_selectionné" method="POST">
                                <input type="hidden" name="nomTheme" value="<?php echo $value['nom']; ?>">
                                <button type="submit" class="btn btn-info btn-lg"><?php echo $value['nom']; ?></button>
                            </form>
                        </div>
                    </div>
                <?php } ?>
            </div>

        </div>
        <?php

    }

    public function vueModifTop($tab, $nomTop, $idtop, $listeTop)
    {
        ?>

        <!-- Page classement tops -->

        <div class="container">
            <div class="titrePage">
                <h1 class="text-center"><?php echo $nomTop; ?></h1>
            </div>
            <div class="sectionClassement">
                <div class="boutonsPageTop mb-3">
<!--                    <form action="index.php?module=top&action=top_commu" method="post">-->
                    <!--                        <input type="hidden" name="idUtilisateur"-->
                    <!--                               value="--><?php //echo $tab['idUtilisateur'];
                    ?><!--">-->
                    <!--                        <input type="hidden" name="idTop" value="--><?php //echo $idtop;
                    ?><!--">-->
                    <!--                        <button type="submit" class="btn btn-outline-success">Enregistrer</button>-->
                    <!--                    </form>-->
                    <!--                    <button type="button" class="btn btn-outline-danger">Supprimer</button>-->
                </div>
                <div class="tableClassement">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                        <tr>
                            <th data-type="number">Classement</th>
                            <th>Affiche</th>
                            <th>Nom</th>
                            <th>Supprimer</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($listeTop as $key => $value) { ?>
                            <tr>
                                <td></td>
                                <td><img src="<?php echo $value['image']; ?>" alt="Image Vignette"></td>
                                <td>
                                    <form action="index.php?module=oeuvre&action=affichage_oeuvre" method="POST">
                                        <input type="hidden" name="idOeuvre" value="<?php echo $value['idOeuvre']; ?>">
                                        <button type="submit" value="Submit"
                                                class="btn btn-dark"><?php echo $value['libelle']; ?>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form action="index.php?module=top&action=suppr_oeuvre" method="POST">
                                        <input type="hidden" name="nomTop" value="<?php echo $nomTop; ?>">
                                        <input type="hidden" name="idTop" value="<?php echo $idtop; ?>">
                                        <input type="hidden" name="idOeuvre" value="<?php echo $value['idOeuvre']; ?>">
                                        <button type="submit" class="btn btn-outline-danger">X</button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="sectionImages">
                <h2 class="text-center">Cliquez pour ajouter au classement !</h2>
                <div class="row mx-auto">
                    <?php foreach ($tab as $key => $value) { ?>
                        <div class="col">
                            <div class="galerieImgCarrousel">
                                <div class="boxCarrousel my-3">
                                    <form action="index.php?module=top&action=ajouter_oeuvre" method="POST">
                                        <input type="hidden" name="nomTop" value="<?php echo $nomTop; ?>">
                                        <input type="hidden" name="idTop" value="<?php echo $idtop; ?>">
                                        <input type="hidden" name="idOeuvre" value="<?php echo $value['idOeuvre']; ?>">
                                        <div class="imgCarrousel">
                                            <button class="mx-auto d-block" type="submit"><img
                                                        src="<?php echo $value['image']; ?>" alt="">
                                            </button>
                                        </div>
                                        <div class="titreImgCarrousel">
                                            <button class="mx-auto my-3 d-block"
                                                    type="submit"><?php echo $value['libelle']; ?></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <?php

    }

//fonction affichage d'un top d'un autre utilisateur
    public function vueAfficheTop($tab, $iduser, $idtop, $avis, $admin, $infotop)
    {
        ?>
        <!-- TEST AFICHE TOP UTILISATEUR -->
        <div class="container">
            <div class="titrePage mt-3 mb-4">
                <h1 class="text-center" style="text-transform: uppercase"><?php echo $infotop['nomTop']; ?></h1>
                <h2 class="text-center">Par <?php echo $infotop['pseudo']; ?></h2>
            </div>
            <div class="sectionClassement">
                <?php if (isset($_SESSION['nom_utilisateur']) && $_SESSION['nom_utilisateur'] == $infotop['pseudo']) { ?>
                    <div class="boutonsPageTop mb-3">
                        <form class="d-inline-block" action="index.php?module=top&action=mon_top"
                              method="POST">
                            <input type="hidden" name="nomTop" value="<?php echo $infotop['nomTop']; ?>">
                            <button type="submit" class="btn btn-outline-success">Modifier</button>
                        </form>
                        <!--                                    <button type="button" class="btn btn-outline-danger">Supprimer</button>-->
                    </div>
                <?php } ?>
                <div class="tableClassement">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                        <tr>
                            <th data-type="number">Classement</th>
                            <th>Affiche</th>
                            <th>Nom</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($tab as $key => $value) { ?>
                            <tr class="ui-state-disabled">
                                <td></td>
                                <td><img src="<?php echo $value['image']; ?>" alt="Image Vignette"></td>
                                <td>
                                    <form action="index.php?module=oeuvre&action=affichage_oeuvre" method="POST">
                                        <input type="hidden" name="idOeuvre" value="<?php echo $value['idOeuvre']; ?>">
                                        <button type="submit" value="Submit"
                                                class="btn btn-dark"><?php echo $value['libelle']; ?>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>


            <!-- Section commentaires -->

            <div class="sectionCommentaires">
                <h2 class="my-3">Commentaires :</h2>

                <?php
                foreach ($avis as $key => $value) {
                    ?>
                    <div class="commentaire">
                        <div class="comUtilisateur">
                            <p><?php echo $value['critique'] ?></p>
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
                                <form class="d-inline-block" action="index.php?module=top&action=form_modif_avis"
                                      method="POST">
                                    <input type="hidden" name="idAvis" value="<?php echo $value['idAvis'] ?>">
                                    <input type="hidden" value="<?php echo $iduser; ?>" name="idUtilisateur">
                                    <button type="submit" class="btn btn-success btn-lg ">Modifier</button>
                                </form>
                                <form class="d-inline-block" action="index.php?module=top&action=suppr_avis"
                                      method="POST">
                                    <input type="hidden" name="idAvis" value="<?php echo $value['idAvis'] ?>">
                                    <input type="hidden" name="idTop" value="<?php echo $idtop; ?>">
                                    <input type="hidden" value="<?php echo $iduser; ?>" name="idUtilisateur">
                                    <button type="submit" class="btn btn-danger btn-lg ">Supprimer</button>
                                </form>
                            <?php } else if ($admin == 1) { ?>
                                <form class="d-inline-block" action="index.php?module=top&action=suppr_avis"
                                      method="POST">
                                    <input type="hidden" name="idAvis" value="<?php echo $value['idAvis'] ?>">
                                    <input type="hidden" name="idTop" value="<?php echo $idtop; ?>">
                                    <input type="hidden" value="<?php echo $iduser; ?>" name="idUtilisateur">
                                    <button type="submit" class="btn btn-danger btn-lg ">Supprimer</button>
                                </form>
                            <? } else { ?>
                                <form action="index.php?module=top&action=signal_avis" method="POST">
                                    <input type="hidden" name="idAvis" value="<?php echo $value['idAvis'] ?>">
                                    <input type="hidden" name="pseudo" value="<?php echo $value['pseudo'] ?>">
                                    <input type="hidden" name="dateEnvoi" value="<?php echo $value['dateEnvoi'] ?>">
                                    <input type="hidden" name="idTop" value="<?php echo $idtop; ?>">
                                    <input type="hidden" value="<?php echo $iduser; ?>" name="idUtilisateur">
                                    <button type="submit" class="btn btn-warning btn-lg  ">Signaler</button>
                                </form>
                            <? } ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <?php if (isset($_SESSION['nom_utilisateur']) && $_SESSION['nom_utilisateur'] != $infotop['pseudo']) { ?>
                <!-- Section formulaire -->

                <div class="sectionFormulaire">
                    <h2 class="my-3">Écrivez un commentaire :</h2>

                    <div class="container">
                        <button type="button" class="btn btn-success btn-lg mb-5" data-toggle="collapse"
                                data-target="#demo">Envoyer un commentaire
                        </button>
                        <div id="demo" class="collapse">
                            <div class="formuaire mb-4">
                                <form action="index.php?module=top&action=creation_avis" method="POST">
                                    <input type="hidden" value="<?php echo $iduser; ?>" name="idUtilisateur">
                                    <input type="hidden" value="<?php echo $idtop; ?>" name="idTop">
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
            <?php } ?>
        </div>
        <?php

    }

    public function vueFormModifAVis($result, $iduser)
    {
        ?>
        <div class="container">
            <div class="sectionFormulaire">
                <h2 class="my-3">Modifiez votre avis :</h2>
                <div class="formuaire mb-4">
                    <form action="index.php?module=top&action=modif_avis" method="POST">
                        <input type="hidden" value="<?php echo $result['idTop']; ?>" name="idTop">
                        <input type="hidden" value="<?php echo $result['idAvis']; ?>" name="idAvis">
                        <input type="hidden" value="<?php echo $iduser; ?>" name="idUtilisateur">
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

//VUE SIMPLE POUR PAGE ACCEUIL
    public function vueCreationTopSimple($tab)
    {
        ?>
        <div class="container">
            <div class="titrePage mt-3 mb-4">
                <h1 class="text-center">Crée ton Top !</h1>
            </div>
            <div class="topPage">
                <div class="row">
                    <div class=" bande_horizontale  mx-auto mb-5">
                        <div class="text-center mt-4 mb-2">
                            <form action="index.php?module=top&action=creation_top" method="POST">
                                <div class="top mx-auto mb-5">
                                    <label><b>Nom du top</b></label>
                                    <input type="text" size="30" maxlength="50" class="form-control"
                                           placeholder="Entrer le nom du top"
                                           name="nom_top" required>
                                </div>
                                <div class="top mx-auto mb-5">
                                    <label><b>Thème</b></label>
                                    <select name='theme'>
                                        <?php foreach ($tab as $key => $value) { ?>
                                            <option value="<?php echo $value['idTheme']; ?>"><?php echo $value['nom']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="top mx-auto mb-5">
                                    <button type="submit" class="btn btn-danger btn-lg ">Créer le top</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <?php
    }

    public function vueTopCommuSimple($topcommu)
    {
        ?>
        <div class="container">
            <div class="titrePage mt-3 mb-4">
                <h1 class="text-center">Les tops les plus récent</h1>
            </div>
            <div class="sectionCommentaires ">
                <h2 class="my-3"> Top des internautes :</h2>
                <?php foreach ($topcommu as $key => $value) { ?>
                    <div class="commentaire">

                        <div class="col-4 d-inline-block text-center ">
                            <h4 style="color: rgb(153, 40, 40); font-weight: bold;"> Utilisateur : </h4>
                            <p style="font-size:20px ;"> <?php echo $value['pseudo']; ?></p>
                        </div>
                        <div class="col-4 d-inline-block text-center">
                            <h4 style="color: rgb(153, 40, 40); font-weight: bold;">Nom du Top : </h4>
                            <form action="index.php?module=top&action=top_commu" method="POST">
                                <input type="hidden" name="idUtilisateur"
                                       value="<?php echo $value['idUtilisateur']; ?>">
                                <input type="hidden" name="idTop" value="<?php echo $value['idTop']; ?>">
                                <button type="submit"
                                        class="btn btn-success btn-lg"><?php echo $value['nomTop']; ?></button>
                                <!--A REVOIR-->
                            </form>
                        </div>
                        <div class="col-3 d-inline-block text-center">
                            <h4 style="color: rgb(153, 40, 40); font-weight: bold;">Thème du Top : </h4>
                            <form action="index.php?module=theme&action=theme_selectionné" method="POST">
                                <input type="hidden" name="nomTheme" value="<?php echo $value['nom']; ?>">
                                <button type="submit" class="btn btn-info btn-lg"><?php echo $value['nom']; ?></button>
                            </form>
                        </div>
                    </div>
                <?php } ?>
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