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
                <div class="container content-block p-2">
                    <h1> À propos de nous : </h1>
                    <p>
                        Cofondée par M. YAHIA Mohcine, M. KEBIR Bilal et M. EL MESTARI Bilel trois jeunes étudiants en
                        informatique à l'IUT de Montreuil, la startup Top Culture et son site éponyme, a vu le jour dans
                        le cadre d'un projet étudiant.
                        Ce site est parti de la passion commune de ses trois créateurs, amateurs de pop culture. A
                        travers ce site, nous voulons vous transmettre cette passion et inciter les différents fans, que
                        ce soit de football, de mangas ou même de cuisine à partager leur avis et à échanger avec
                        d'autres fans du monde entier.
                        Sachez que nous sommes à l'écoute de la communauté et que vous pouvez nous contacter en cas de
                        souci.
                    </p>
                </div>
                <div class="container content-block p-2">
                    <h1> Les avantages de Top Culture : </h1>
                    <ul>
                        <li>Exprimez vos opinion via l'espace de notation et de commentaire disponible pour chaque
                            œuvre.
                        </li>
                        <li>Faites vos tops avec un large panel de thèmes et d'œuvres pour chacun d'entre eux.</li>
                        <li>Partager vos tops au monde entier ou alors consulter ceux des autres utilisateurs.</li>
                        <li>Retrouver tous vos tops réalisé sur votre page profil.</li>
                    </ul>
                </div>

                <div class="equipe p-2">
                    <h1> L'équipe : </h1>
                </div>

                <div class="row mb-3">
                    <div class="cadreDescription col-lg-3 col-md-6 mb-4 mb-md-0 text-center ">

                        <img id="imageid" src="Ressources/PhotoDev/Bilel.png" alt="Image de Bilel EL MESTARI">

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
                    <div class=" cadreDescription col-lg-3 col-md-6 mb-4 mb-md-0 text-center">

                        <img id="imageid" src="Ressources/PhotoDev/Bilal.png" alt="Image de Bilal KEBIR">
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

                    <div class="cadreDescription col-lg-3 col-md-6 mb-4 mb-md-0 text-center">

                        <img id="imageid" src="Ressources/PhotoDev/Mohcine.png" alt="Image de YAHIA Mohcine">

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
        <?php
    }

}