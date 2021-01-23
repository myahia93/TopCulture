<?php
if (!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');
?>
<?php


class VueSignalement
{

    public function vueUtilisateur()
    {
        ?>

        <!-- PAGE SIGNALEMENT USER -->

        <div class="container">
            <div class="titrePage my-4">
                <h1 class="text-center"> Envoyez un message aux administrateurs !</h1>
            </div>
            <div class="row">
                <div class="col sectionDescription position-relative col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-4">
                    <form action="index.php?module=signalement&action=envoi_message" method="POST">
                        <div class="descriptionProfil mb-4">
                            <div class="espaceCom mx-auto">
                                <label for="commentaire"><h2> Veuillez écrire votre réponse :</h2></label>
                            </div>
                            <textarea name="message" id="" rows="5" required></textarea>
                            <div class="boutonEnvoyerSignaler mt-2">
                                <button type="submit" class="btn btn-success btn-lg">Envoyer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php

    }

    public function vueAdmin($message, $signal, $signalTop)
    {
        ?>
        <!-- PAGE SIGNALEMENT ADMIN-->


        <div class="container">
            <div class="titrePage my-4">
                <h1 class="text-center">Signalements des utilisateurs</h1>
            </div>
            <div class="row">
                <div class="sectionFSignalement">
                    <h2 class="my-3 text-center">Liste des messages :</h2>
                    <div class="test text-center">
                        <p>
                            <a class="btn btn-<?php if (!empty($message)) { ?>danger<?php } else { ?>success<?php } ?> text-center"
                               data-toggle="collapse" href="#collapseExample"
                               role="button" aria-expanded="false" aria-controls="collapseExample">
                                Messages des utilisateurs
                            </a>
                            <button class="btn btn-<?php if (!empty($signal)) { ?>danger<?php } else { ?>success<?php } ?> text-center"
                                    type="button" data-toggle="collapse"
                                    data-target="#collapseExample2" aria-expanded="false"
                                    aria-controls="collapseExample">
                                Signalment des avis des oeuvres
                            </button>
                            <button class="btn btn-<?php if (!empty($signalTop)) { ?>danger<?php } else { ?>success<?php } ?> text-center"
                                    type="button" data-toggle="collapse"
                                    data-target="#collapseExample3" aria-expanded="false"
                                    aria-controls="collapseExample">
                                Signalment des avis des tops
                            </button>
                        </p>
                    </div>
                    <div class="collapse" id="collapseExample">
                        <div class="sectionCommentaires">
                            <h2 class="my-3">Messages :</h2>

                            <?php foreach ($message as $key => $value) { ?>
                                <div class="commentaire">
                                    <div class="comUtilisateur">
                                        <p><?php echo $value['message']; ?></p>
                                    </div>
                                    <div class="infoUtilisateur">
                                        <h5 style="display: inline-block;">Par </h5>
                                        <p style="display: inline-block;"
                                           id="nomPrenomUtili"><?php echo $value['pseudo']; ?></p>
                                        <h5 style="display: inline-block;"> le </h5>
                                        <p style="display: inline-block;"
                                           id="date"><?php echo $value['dateSignal']; ?></p>
                                    </div>
                                    <div class="boutonArchiver" style="text-align : right;">
                                        <form class="d-inline-block"
                                              action="index.php?module=signalement&action=suppr_signal" method="POST">
                                            <input type="hidden" name="idSignal"
                                                   value="<?php echo $value['idSignalement'] ?>">
                                            <button type="submit" class="btn btn-danger btn-lg ">Archiver</button>
                                        </form>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="collapse" id="collapseExample2">
                        <div class="sectionCommentaires">
                            <h2 class="my-3">Signalements des avis sur les oeuvres :</h2>
                            <?php foreach ($signal as $key => $value) { ?>
                                <div class="commentaire">
                                    <div class="comUtilisateur">
                                        <p><?php echo $value['message']; ?></p>
                                    </div>
                                    <div class="infoUtilisateur">
                                        <h5 style="display: inline-block;">Par </h5>
                                        <p style="display: inline-block;"
                                           id="nomPrenomUtili"><?php echo $value['pseudo']; ?></p>
                                        <h5 style="display: inline-block;"> le </h5>
                                        <p style="display: inline-block;"
                                           id="date"><?php echo $value['dateSignal']; ?></p>
                                    </div>
                                    <div class="boutonArchive" style="text-align : right;">
                                        <form class="d-inline-block"
                                              action="index.php?module=signalement&action=suppr_signal" method="POST">
                                            <input type="hidden" name="idSignal"
                                                   value="<?php echo $value['idSignalement'] ?>">
                                            <button type="submit" class="btn btn-danger btn-lg ">Archiver</button>
                                        </form>
                                        <form class="d-inline-block"
                                              action="index.php?module=oeuvre&action=affichage_oeuvre" method="POST">
                                            <input type="hidden" name="idOeuvre"
                                                   value="<?php echo $value['idOeuvre'] ?>">
                                            <button type="submit" class="btn btn-success btn-lg ">Accéder à la page
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="collapse" id="collapseExample3">
                        <div class="sectionCommentaires">
                            <h2 class="my-3">Signalements des avis sur les Tops:</h2>
                            <?php foreach ($signalTop as $key => $value) { ?>
                                <div class="commentaire">
                                    <div class="comUtilisateur">
                                        <p><?php echo $value['message']; ?></p>
                                    </div>
                                    <div class="infoUtilisateur">
                                        <h5 style="display: inline-block;">Par </h5>
                                        <p style="display: inline-block;"
                                           id="nomPrenomUtili"><?php echo $value['pseudo']; ?></p>
                                        <h5 style="display: inline-block;"> le </h5>
                                        <p style="display: inline-block;"
                                           id="date"><?php echo $value['dateSignal']; ?></p>
                                    </div>
                                    <div class="boutonArchive" style="text-align : right;">
                                        <form class="d-inline-block"
                                              action="index.php?module=signalement&action=suppr_signal" method="POST">
                                            <input type="hidden" name="idSignal"
                                                   value="<?php echo $value['idSignalement'] ?>">
                                            <button type="submit" class="btn btn-danger btn-lg ">Archiver</button>
                                        </form>
                                        <form class="d-inline-block" action="index.php?module=top&action=top_commu"
                                              method="POST">
                                            <input type="hidden" name="idUtilisateur"
                                                   value="<?php echo $value['idUtilSignal']; ?>">
                                            <input type="hidden" name="idTop" value="<?php echo $value['idTop']; ?>">
                                            <button type="submit" class="btn btn-success btn-lg ">Accéder à la page
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
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