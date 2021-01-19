<?php


class VueConnexion
{

    public function vueFormConnexion()
    {
        ?>
        <div class="container">
            <div class="topPage">
                <div class="bande_horizontale_connexion mx-auto mb-4 mt-3">
                    <div class="imageConnexion">
                        <a href="index.php?module=acceuil"><img class="mx-auto d-block" src="Ressources/logobon.png"
                                                                alt="logo" width="150"/></a>
                    </div>
                    <div class=" formulaire text-center">
                        <form action="index.php?module=connexion&action=se_connecte" method="POST">
                            <div class="form-group mx-auto">
                                <label for="text">Identifiant :</label>
                                <input type="text" name="nom_utilisateur" maxlength="30" class="form-control" id="text"
                                       placeholder="Entrer votre nom utilisateur" required>
                                <label for="pwd">Mot de passe :</label>
                                <input type="password" maxlength="20" name="mot_de_passe" class="form-control" id="pwd"
                                       placeholder="Entrer votre mot de passe" required>
                            </div>
                            <div class="boutonConForm my-3">
                                <button class="btn-connexionForm btn btn-lg btn-info px-5" type="submit">Se connecter
                                </button>
                            </div>
                            <div class="form-inscription pb-3">
                                <a href="index.php?module=connexion&action=form_creation">Pas encore inscrit ?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <?php
    }

    public function vueFormCreation()
    {
        ?>
        <div class="container">
            <div class="topPage">
                <div class="bande_horizontale_connexion mx-auto mb-4 mt-3">
                    <div class="imageConnexion">
                        <a href="index.php?module=acceuil"><img class="mx-auto d-block" src="Ressources/logobon.png"
                                                                alt="logo" width="150"/></a>
                    </div>
                    <div class=" formulaire text-center">
                        <form action="index.php?module=connexion&action=creation_compte" method="POST">
                            <div class="form-group mx-auto">
                                <label for="text">Identifiant :</label>
                                <input type="text" name="nom_utilisateur" maxlength="30" class="form-control" id="text"
                                       placeholder="Entrer votre nom utilisateur" required>
                                <label for="pwd">Mot de passe :</label>
                                <input type="password" maxlength="20" name="mot_de_passe" class="form-control" id="pwd"
                                       placeholder="Entrer votre mot de passe" required>
                                <label for="pwd">Confirmer mot de passe :</label>
                                <input type="password" maxlength="20" name="re_mot_de_passe" class="form-control"
                                       id="pwd"
                                       placeholder="Confirmez votre mot de passe" required>
                            </div>
                            <div class="boutonConForm my-3">
                                <button class="btn-connexionForm btn btn-lg btn-info px-5" type="submit">S'inscrire
                                </button>
                            </div>
                            <div class="form-inscription pb-3">
                                <a href="index.php?module=connexion&action=form_connexion">Dèja inscrit ?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <?php
    }

}
