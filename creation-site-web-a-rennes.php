<?php

require_once __DIR__ . "/model/database.php";
require_once __DIR__ . "/admin/crud/insert_titre_web.php";
require_once __DIR__ . "/admin/crud/insert_creation_site.php";

$titre_web = getAllEntities("titre_web");
$creation_site = getAllCreationSite();


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Mano Quéré</title>
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <link href="css/styles.min.css" rel="stylesheet" />
        <LINK REL="SHORTCUT ICON" href="images/favicon.ico">
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <header>
            <nav class="nav-second navbar navbar-expand-lg navbar-light fixed-top py-3">
                <div class="container">
                    <a class="navbar-brand js-scroll-trigger" href="graphisme.php">Design</a>
                    <a class="navbar-brand js-scroll-trigger" href="creation-site-web-a-rennes.php">Site Web</a>
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto my-2 my-lg-0">
                            <li class="nav-item nav-item-2"><a class="nav-link js-scroll-trigger" href="index.php">Accueil</a></li>
                            <li class="nav-item nav-item-2"><a class="nav-link js-scroll-trigger" href="index.php#services">Web</a></li>
                            <li class="nav-item nav-item-2"><a class="nav-link js-scroll-trigger" href="index.php#about">Graphisme</a></li>
                            <li class="nav-item nav-item-2"><a class="nav-link js-scroll-trigger" href="index.php#portfolio">Portfolio</a></li>
                            <li class="nav-item nav-item-2"><a class="nav-link js-scroll-trigger" href="index.php#contact">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        
<section class="page-section pb-2 mx-0">
    <div class="page-section">
                <div class="container text-center">
                    <?php foreach ($titre_web as $titre_webs) : ?>
                        <h1 class="titre-dev text-center"><?= $titre_webs["titre_web"]?></h1>
                        <h2 class="ville_accueil text-center"><?= $titre_webs["ville_web"]?></h1>
                        <hr class="divider my-4" />
                        <p class="text-muted  px-5 mx-auto text-justify"><?= $titre_webs["txt_web"]?></p>
                    <?php endforeach ?>
                </div>
            </div>
        
            <!-- AFFICHAGE REALISATIONS WEB-->
<?php 
$tab = count($creation_site); 
$i = 1;
?>

<div class="container text-center">
<h2 class="titre-dev">Les projets que j'ai réalisé</h2>
<h3 class="ville_accueil text-center">Création de la charte graphique, intégration, développement du code...</h3>
<hr class="divider my-4" />

</div>

        <?php foreach ($creation_site as $creation_sites) : ?>
            <?php while ($i < $tab) : $i++; endwhile;?>
                    <?php $i++;?>
            <div class="container" style="margin-bottom:5%; margin-top:5%;" >
                <div class="row featurette">
                    <div class="col-md-6 <?php if($i % 2 == 0) echo "order-md-2";?>">
                        <h2 class="featurette-heading mb-3" style="color:#f4623a;"><?= $creation_sites["titre"]?>
                            <br><span class="text-muted span-titre"><?= $creation_sites["libelle"]?></span>
                        </h2>
                        <p class="text-muted text-justify"><?= $creation_sites["txt"]?></p>
                        <div class="container">
                            <div class="text-center mt-5">
                                <a class="btn btn-primary btn-xl js-scroll-trigger" href="show-site-web.php?id=<?= $creation_sites["id"];?>">Voir +</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 pt-3 d-flex justify-content-md-center">
                        <a class="image-popup-vertical-fit featurette-image img-fluid mx-auto" href="uploads/<?= $creation_sites["image"]; ?>">
                            <img class="img-fluid img-crea-site" src="uploads/<?= $creation_sites["image"]; ?>" alt="<?= $creation_sites["alt"]; ?>">
                        </a>
                    </div>
                </div>
            </div>
            <hr class="featurette-divider my-5" ?>
        <?php endforeach ?>
    </div>
</section>

<section class="page-section pb-2 mx-0">
    <div class="container">
        <h2 class="featurette-heading mb-3 text-center">Vous souhaitez un renseignement?
                                <br><span class="text-muted span-titre text-center">Vous avez des questions concernant un projet?</span>
                            </h2>
            <p class="text-muted text-center">Besoin de créer un site vitrine, un e-commerce, faire la refonte d'un site existant...<br>
            Vous souhaitez référencer votre site? Améliorer votre présence sur les moteurs de recherche?<br>
            N'hésitez pas à me contacter via le formulaire ci-dessous, je reprend contact avec vous rapidement</p>
    </div>
        <div class="text-center mt-5">
            <a class="btn btn-primary btn-xl js-scroll-trigger" href="index.php#contact">Contact</a>
        </div>
</section>



        <footer class="bg-light py-5 mt-5">
            <div class="container">
                <div class="small text-center text-muted">Copyright © 2020 - Mano Quéré</div>
                <p class="small text-center text-muted">L'ensemble des illustrations présentées sur le site sont soumises aux droits à l'image. Reproduction interdite sans accord.</p>
            </div>
        </footer>   
    <script src="js/jquery-slim.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
	<script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/creation_site.js"></script>

</body>
</html>