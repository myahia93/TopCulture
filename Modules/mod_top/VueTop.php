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
                                <input type="hidden" name="idUtilisateur"
                                       value="<?php echo $value['idUtilisateur']; ?>">
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
                <!--                <div class="boutonsPageTop mb-3">-->
                <!--                    <button type="button" class="btn btn-outline-success">Enregistrer</button>-->
                <!--                    <button type="button" class="btn btn-outline-danger">Supprimer</button>-->
                <!--                </div>-->
                <div class="tableClassement">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                        <tr>
                            <th data-type="number">Classement</th>
                            <th>Vignette</th>
                            <th>Libellé</th>
                            <th>Supprimer</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($listeTop as $key => $value) { ?>
                            <tr>
                                <td></td>
                                <td><img src="<?php echo $value['image']; ?>" alt="Image Vignette"></td>
                                <td>
                                    <button type="button" type="submit" value="Submit"
                                            class="btn btn-primary"><?php echo $value['libelle']; ?>
                                    </button>
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
    public function vueAfficheTop($tab)
    {
        ?>
        <!-- TEST AFICHE TOP UTILISATEUR -->
        <div class="container">
            <div class="sectionClassement">
                <!--                <div class="boutonsPageTop mb-3">-->
                <!--                    <button type="button" class="btn btn-outline-success">Enregistrer</button>-->
                <!--                    <button type="button" class="btn btn-outline-danger">Supprimer</button>-->
                <!--                </div>-->
                <div class="tableClassement">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                        <tr>
                            <th data-type="number">Classement</th>
                            <th>Vignette</th>
                            <th>Libellé</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($tab as $key => $value) { ?>
                            <tr class="ui-state-disabled">
                                <td></td>
                                <td><img src="<?php echo $value['image']; ?>" alt="Image Vignette"></td>
                                <td>
                                    <button type="button" type="submit" value="Submit"
                                            class="btn btn-primary"><?php echo $value['libelle']; ?>
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php

    }

    //FONCTION ALERT
    public function vueAlertSucces($texte)
    {
        echo '<div class="container"><div class="alert alert-success text-center" role="alert">' . $texte . ' </div></div>';
    }

    public function vueAlertWarning($texte)
    {
        echo '<div class="container"><div class="alert alert-warning text-center" role="alert">' . $texte . ' </div></div>';
    }
}