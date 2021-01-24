<?php
if (!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');
?>
<?php


class VueContact
{

    public function vuePageAPropos()
    {
        ?>
        <!-- PAGE A PROPOS-->

        <div class="container">
            <div class="row">
                <div class="titrePage my-4">
                    <h1 class="text-center">Qui sommes nous ?</h1>
                </div>
                <div class="sectionTexteAPropos">
                    <div class="sousSection">
                        <h2> À propos de nous : </h2>
                        <p>
                            Cofondée par M. YAHIA Mohcine, M. KEBIR Bilal et M. EL MESTARI Bilel trois jeunes étudiants en informatique à l'IUT de Montreuil, la startup Top Culture et son site éponyme, a vu le jour dans le cadre d'un projet étudiant.
                            Ce site est parti de la passion commune de ses trois créateurs, amateurs de pop culture. A travers ce site, nous voulons vous transmettre cette passion et inciter les différents fans, que ce soit de football, de mangas ou même de cuisine à partager leur avis et à échanger avec d'autres fans du monde entier.
                            Sachez que nous sommes à l'écoute de la communauté et que vous pouvez nous contacter en cas de souci.
                        </p>
                    </div>
                    <div class="sousSection">
                        <h2> Les avantages de Top Culture : </h2>
                        <ul>
                            <li>Exprimer vos opinion via l'espace de notation et de commentaire disponible pour chaque œuvre.</li>
                            <li>Faites vos tops avec un large panel de thèmes et d'œuvres pour chacun d'entre eux.</li>
                            <li>Partager vos tops au monde entier ou alors consulter ceux des autres utilisateurs.</li>
                            <li>Retrouver tous vos tops réalisés sur votre page profil.</li>
                        </ul>
                    </div>
                </div>
                <div class="sectionPresentationAuteurs">
                    <h1 class="text-center my-3">Développeurs</h1>
                    <div class="row">
                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 mx-auto">
                            <div class="profil mx-auto ">
                                <img class="img-fluid mx-auto d-block" src="Ressources/PhotoDev/Bilel.png" alt="Image de Bilel EL MESTARI">
                                <div class="nom">
                                    Nom : EL MESTARI
                                </div>
                                <div class="prénom">
                                    Prenom : Bilel
                                </div>
                                <div class="age">
                                    Âge : 19 ans
                                </div>
                                <div class="poste">
                                    Poste : Développeur JS / Community Manager
                                </div>
                                <div class="adresse">
                                    Adresse mail : belmestari@iut.univ-paris8.fr
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 mx-auto">
                            <div class="profil mx-auto">
                                <img class="img-fluid mx-auto d-block" src="Ressources/PhotoDev/Bilal.png" alt="Image de Bilal KEBIR">
                                <div class="nom">
                                    Nom : KEBIR
                                </div>
                                <div class="prénom">
                                    Prénom : Bilal
                                </div>
                                <div class="age">
                                    Âge : 19 ans
                                </div>
                                <div class="poste">
                                    Poste : Développeur Front-end
                                </div>
                                <div class="adresse">
                                    Adresse mail : bkebir@iut.univ-paris8.fr
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 mx-auto">
                            <div class="profil mx-auto">
                                <img class="img-fluid mx-auto d-block" src="Ressources/PhotoDev/Mohcine.png" alt="Image de YAHIA Mohcine">
                                <div class="nom">
                                    Nom : YAHIA
                                </div>
                                <div class="prénom">
                                    Prenom : Mohcine
                                </div>
                                <div class="age">
                                    Âge : 20 ans
                                </div>
                                <div class="poste">
                                    Poste : Développeur Back-end / Administrateur BD
                                </div>
                                <div class="adresse">
                                    Adresse mail : myahia@iut.univ-paris8.fr
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

}