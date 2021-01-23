<?php
if (!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');
?>
<?php


class VueTuto
{

    public function vuePageTuto()
    {
        ?>
        <!-- Page de tutoriel -->

        <div class="container">
            <div class="containerPageTuto">
                <h1 class="text-center py-3">Toi aussi apprends à faire ton propre top !</h1>
                <div class="videoPageTuto ratio ratio-16x9">
                    <iframe src="https://www.youtube.com/embed/bvHzG3R_Bdo" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                </div>
                <div class="section_1">
                    <h2 class="text-center">1. Choix du nom et du thème</h2>
                    <p class="text-center">Tout d'abord choisis un thème parmis ceux proposés. <br>
                        C'est fait ? OK alors maintenant chosi le nom que tu veux donner à ton top, choisi le bien.<br>
                        Une fois que c'est fait il te suffit de cliquer sur le bouton "créer le top" et c'est parti !
                    </p>
                    <img class="img-fluid border border-dark" src="Ressources/imgTuto/Capture1.png" alt="Création du Top">
                </div>
                <div class="section_1">
                    <h2 class="text-center">2. Comment remplir son top</h2>
                    <p class="text-center">Maintenant que le top est crée il s'agit de le remplir.<br>
                        Pour ce faire clique sur l'élément que tu veux ajouter à ton top, l'élément disparaitra de la
                        galerie et apparaîtra dans ton top</p>
                    <img class="img-fluid border border-dark" src="Ressources/imgTuto/Capture2.png" alt="Ajout d'élément au Top">
                </div>
                <div class="section_3">
                    <h2 class="text-center">3. Changer le placement des éléments dans le tableau</h2>
                    <p class="text-center">Pour faire monter ou descendre un élément dans ton classement, il te suffit
                        de l'attraper avec ta souris puis de le mettre à sa nouvelle place.</p>
                    <div class="gifSection_3">
                        <img class="border border-dark" src="Ressources/imgTuto/gif_drag_and_drop.gif"
                             alt="Gif de présentation du classement">
                    </div>
                </div>
                <div class="section_4">
                    <h2 class="text-center">4. Comment retirer un élément de son top</h2>
                    <p class="text-center">Pour retirer un élément de ton top, il suffit de cliquer sur la croix rouge
                        dans la colonne tout à gauche.</p>
                    <img class="img-fluid border border-dark" src="Ressources/imgTuto/Capture4.png"
                         alt="Supprimer un élément du top - Image 1">
                    <p class="text-center my-3">Après avoir supprimé un élément du top il est de retour dans la galerie
                        en bas</p>
                    <img class="img-fluid border border-dark" src="Ressources/imgTuto/Capture5.png"
                         alt="Supprimer un élément du top - Image 2">
                    <p class="text-center my-3">Tu sais maintenant tout ce qu'il faut savoir sur la création d'un top
                        alors fonce et crée ton 1er top :)</p>
                </div>
            </div>
        </div>

        <?php
    }

}