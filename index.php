<?php
define('CONST_INCLUDE', NULL);
?>
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <!-- Liens -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
    <link rel="stylesheet" href="style.css">
    <link href="pe-connect_html-bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!--css principal-->
    <link type="text/css" href="CSS/index.css" rel="stylesheet">
    <!--css pour la page de connexion-->
    <link type="text/css" href="CSS/connexion.css" rel="stylesheet">
    <!--css pour la page d'oeuvre-->
    <link type="text/css" href="CSS/page_oeuvres.css" rel="stylesheet">
    <!--css pour la page galerie des oeuvres-->
    <link type="text/css" href="CSS/page_galerie.css" rel="stylesheet">
    <!--css pour la page des themes-->
    <link type="text/css" href="CSS/page_themes.css" rel="stylesheet">
    <!--css pour la page de profil-->
    <link type="text/css" href="CSS/page_profil.css" rel="stylesheet">
    <!--css pour la page de top-->
    <link type="text/css" href="CSS/page_top.css" rel="stylesheet">


    <title>Top Culture</title>

</head>
<body>

<?php

$module = isset($_GET['module']) ? $_GET['module'] : "acceuil";

switch ($module) {
    case 'acceuil':
        include_once "ConnexionBD.php";
        break;
    case 'connexion':
    case 'profil':
    case 'theme':
    case 'oeuvre':
    case 'signalement':
    case 'contact':
    case 'top':
        include_once "Modules/mod_$module/Mod$module.php";
        include_once "ConnexionBD.php";
        break;
    default:
        die("interdiction");
}
?>

<!-- Menu de Navigation -->

<header>
    <nav class="navbar fixed-top scrolling-navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php?module=acceuil">
                <img class="img-fluid" src="Ressources/Page_D_Acceuil/logobon.png" alt="Logo du site" width="130">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mt-auto liensNavigation">
                    <li class="nav-item">
                        <a class="nav-link <?php if ($module == "acceuil") { ?> active <?php } ?>" aria-current="page"
                           href="index.php?module=acceuil">ACCUEIL</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($module == "top") { ?> active <?php } ?>"
                           href="index.php?module=top&form_creationTop">TOP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($module == "theme") { ?> active <?php } ?>"
                           href="index.php?module=theme">THÈMES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($module == "contact") { ?> active <?php } ?>"
                           href="index.php?module=contact">A PROPOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($module == "signalement") { ?> active <?php } ?>"
                           href="index.php?module=signalement">SIGNALEMENT</a>
                    </li>
                </ul>
                <!-- Barre de rechercher -->
                <form class="d-flex barreDeNav" action="index.php?module=theme&action=recherche_oeuvre" method="POST">
                    <input class="form-control me-2" type="search" id="rechercheOeuvre" name="recherche"
                           placeholder="Rechercher..." aria-label="Search" required>
                    <button class="btn btn-outline-success" type="submit">Rechercher</button>
                </form>
                <!-- ajout -->
                <!--                <div style="margin: 20px">-->
                <!--                    <div class="list-group" id="result-recherche">-->
                <!--                        <a href="#" class="list-group-item list-group-item-action border-1">Oui</a>-->
                <!--                        <a href="#" class="list-group-item list-group-item-action border-1">Oui</a>-->
                <!--                        <a href="#" class="list-group-item list-group-item-action border-1">Oui</a>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!-- fin ajout -->
                <div class="boutonConnexionEtInscription ms-auto mt-0">
                    <?php
                    if (!isset($_SESSION['nom_utilisateur'])) {
                        ?>
                        <div class="boutonConnexion">
                            <a href="index.php?module=connexion&action=form_connexion">Se connecter</a>
                        </div>
                        <div class="boutonInscription">
                            <button type="button" class="btn btn-danger btn-lg"><a
                                        href="index.php?module=connexion&action=form_creation">S'inscrire</a></button>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="boutonConnexion">
                            <a href="index.php?module=connexion&action=deconnexion">Se déconnecter</a>
                        </div>
                        <div class="boutonInscription">
                            <button type="button" class="btn btn-danger btn-lg"><a
                                        href="index.php?module=profil&action=affichage_profil"><?php echo $_SESSION['nom_utilisateur']; ?></a>
                            </button>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </nav>
</header>

<?php
if ($module == "acceuil") {
    ?>
    <div class="sectionSlider_1">
        <div class="container">
            <h1 class="text-center  mt-4 mb-2">Bienvenue sur Top Culture</h1>
            <h5 class="text-center  mb-4">Plonge toi dans de multiples univers</h5>
            <div class="slider  mx-auto">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active imageSlider">
                            <img src="Ressources/Page_D_Acceuil/manga2.png" class="d-block w-100" alt="Mangas">
                            <div class="titreSlider">
                                <h5>Mangas</h5>
                            </div>
                        </div>
                        <div class="carousel-item imageSlider">
                            <img src="Ressources/Page_D_Acceuil/jeux.jpg" class="d-block w-100" alt="Jeux Vidéo">
                            <div class="titreSlider">
                                <h5>Jeux Vidéos</h5>
                            </div>
                        </div>
                        <div class="carousel-item imageSlider">
                            <img src="Ressources/Page_D_Acceuil/foot2.png" class="d-block w-100" alt="Footballeurs">
                            <div class="titreSlider">
                                <h5>Footballeurs</h5>
                            </div>
                        </div>
                        <div class="carousel-item imageSlider">
                            <img src="Ressources/Page_D_Acceuil/film2.png" class="d-block w-100" alt="Films">
                            <div class="titreSlider">
                                <h5>Films</h5>
                            </div>
                        </div>
                        <div class="carousel-item imageSlider">
                            <img src="Ressources/Page_D_Acceuil/serie2.png" class="d-block w-100" alt="Séries">
                            <div class="titreSlider">
                                <h5>Séries</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Slider du site (Section 2)-->

    <div class="sectionSlider_2">
        <div class="container">
            <h1 class="text-center mt-4 mb-2">Crée ton propre Top</h1>
            <h5 class="text-center mb-4">Dans cette section, tu pourras élaborer tes propres top avec un large choix de
                thèmes différents</h5>
            <div class="slider_2  mx-auto">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="Ressources/Page_D_Acceuil/top.png" class="d-block w-100"
                                 alt="Slider meilleurs Mangas">
                        </div>
                        <div class="carousel-item">
                            <img src="Ressources/Page_D_Acceuil/marvelfilm.png" class="d-block w-100"
                                 alt="Slider Films Marvel">
                        </div>
                        <div class="carousel-item">
                            <img src="Ressources/Page_D_Acceuil/topjv.png" class="d-block w-100"
                                 alt="Slider top Jeux Vidéos">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                       data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                       data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Présentation des top -->

    <div class="top mx-auto mb-5">
        <div class="topPopulaires">
            <h1 class="text-center mt-4 mb-2">Top les plus populaires</h1>
            <h5 class="text-center mb-4">Retrouve les top, qui ont fait l'unanimité</h5>
            <img src="Ressources/Page_D_Acceuil/film2.png" alt="...">
        </div>
        <div class="topRecents">
            <h1 class="text-center mt-4 mb-2">Top les plus récents</h1>
            <h5 class="text-center mb-4">Ici, sont répertoriés les top les plus recents</h5>
            <img src="Ressources/Page_D_Acceuil/serie2.png" alt="...">
        </div>
    </div>


    <?php
} else {
    $nom_class = "Mod" . $module;
    $mod = new $nom_class();
}
?>


<!-- Footer -->

<footer class="footer">
    <div class="container p-4">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase titreFooter">Contact</h5>
                <ul class="list-unstyled mb-0">
                    <li>
                        <a href="#!">Adresse</a>
                        <p>156 rue de France,<br> 93100, Montreuil</p>
                    </li>
                    <li>
                        <a href="#!">Email</a>
                        <p>topculture@gmail.com</p>
                    </li>
                    <li>
                        <a href="#!">Téléphone</a>
                        <p>(+33)123456789</p>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase titreFooter">Liens utiles</h5>
                <ul class="list-unstyled mb-0">
                    <li>
                        <a href="index.php?module=theme">Thèmes</a>
                    </li>
                    <li>
                        <a href="index.php?module=top&form_creationTop!">Top</a>
                    </li>
                    <li>
                        <a href="index.php?module=signalement">Signalement</a>
                    </li>
                    <li>
                        <a href="#!">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase titreFooter">À propos</h5>
                <ul class="list-unstyled mb-0">
                    <li>
                        <a href="#!">Condition d'utilisation</a>
                    </li>
                    <li>
                        <a href="#!">Données personnelles</a>
                    </li>
                    <li>
                        <a href="#!">Conditions de vente</a>
                    </li>
                    <li>
                        <a href="#!">Mentions légales</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase titreFooter">Réseaux</h5>
                <ul class="list-unstyled mb-0">
                    <li>
                        <img class="footerImage" src="Ressources/ReseauxSociaux/Youtube_icon-icons.com_66802.png"
                             alt="YouTube">
                        <a href="https://www.youtube.com/">YouTube</a>
                    </li>
                    <li>
                        <img class="footerImage" src="Ressources/ReseauxSociaux/insta.png" alt="Instagram">
                        <a href="https://www.instagram.com/">Instagram</a>
                    </li>
                    <li>
                        <img class="footerImage" src="Ressources/ReseauxSociaux/twitter.jpg" alt="Twitter">
                        <a href="https://twitter.com/home">Twitter</a>
                    </li>
                    <li>
                        <img class="footerImage" src="Ressources/ReseauxSociaux/Facebook_icon-icons.com_66805.png"
                             alt="Facebook">
                        <a href="https://fr-fr.facebook.com/">Facebook</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Copyright -->

    <div class="copyright">
        <div class="contenu mx-auto">
            <h5 class="text-center">TopCulture © 2020 Copyright - Tous droits réservés</h5>
            <a href="index.php?module=acceuil"><img class="img-fluid" src="Ressources/Page_D_Acceuil/logobon.png"
                                                    alt="Logo du Footer"/></a>
        </div>
    </div>
</footer>

<!-- JavaScript Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>
<!-- LIEN POUR MASQUER DU CONTENU-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<!-- Script Classement -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
<script type="text/javascript">
    $('tbody').sortable({
        items: "tr:not(.ui-state-disabled)"
    });
</script>
<!-- ajax -->
<script src="jquery-3.5.1.min.js"></script>
<!--<script src="Barre_de_recherche/script_recherche.js"></script>-->
<!--<script type="text/javascript">-->
<!--    // $(document).ready(function (){-->
<!--    //     $("#rechercheOeuvre").keyup(function () {-->
<!--    //         var rechercheText = $(this).val();-->
<!--    //         if (rechercheText != '') {-->
<!--    //             $.ajax({-->
<!--    //                 url: 'recherche.php',-->
<!--    //                 method: 'POST',-->
<!--    //                 data:{rechercheText},-->
<!--    //                 success:function (response) {-->
<!--    //                     $("#result-recherche").html(response);-->
<!--    //                 }-->
<!--    //             });-->
<!--    //         }else {-->
<!--    //             $("#result-recherche").html('');-->
<!--    //         }-->
<!--    //     });-->
<!--    //     $(document).on('click','a',function (){-->
<!--    //        $("#rechercheOeuvre").val($(this).text());-->
<!--    //        $("#result-recherche").html('');-->
<!--    //     });-->
<!--    // });-->
<!--</script>-->


</body>
</html>
