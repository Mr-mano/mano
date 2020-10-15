<?php
require_once __DIR__ . "/model/database.php";
require_once __DIR__ . "/admin/crud/insert_titre_design.php";
require_once __DIR__ . "/admin/crud/insert_titre_web_design.php";
require_once __DIR__ . "/admin/crud/insert_web_design.php";
require_once __DIR__ . "/admin/crud/insert_titre_graphisme.php";
require_once __DIR__ . "/admin/crud/insert_graphisme.php";
require_once __DIR__ . "/admin/crud/insert_titre_phare.php";
require_once __DIR__ . "/admin/crud/insert_phare.php";
require_once __DIR__ . "/admin/crud/insert_titre_animaux.php";
require_once __DIR__ . "/admin/crud/insert_animaux.php";



$titre_design = getAllEntities("titre_design");
$titre_web_design = getAllEntities("titre_web_design");
$web_design = getAllEntities("web_design");
$titre_graphisme = getAllEntities("titre_graphisme");
$graphisme = getAllEntities("graphisme");
$titre_phare = getAllEntities("titre_phare");
$phare = getAllEntities("phare");
$titre_animaux = getAllEntities("titre_animaux");
$animaux = getAllEntities("animaux");

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Portfolio" />
        <meta name="author" content="Mano" />
        <title>Mano Quéré</title>
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <link href="css/styles.min.css" rel="stylesheet" />
        <LINK REL="SHORTCUT ICON" href="images/favicon.ico">
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <header >
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
    <!-- TITRE PAGE LOGO PAO -->
<section class="page-section pb-2 mx-0">
                <div class="titre_graphisme mt-5 mb-5">
                    <?php foreach ($titre_design as $titre_designs) : ?>
                    <h1 class="titre-dev text-center mt-5"><?= $titre_designs["titre"]?></h1>
                    <hr class="divider my-4" />
                    <p class="text-muted mb-5 text-justify px-5" style="margin:0 8% 0 8%">
                    <?= $titre_designs["txt"]?>
                    </p>
                    <div class="row justify-content-center mx-0">
                        <div class="col-lg-3 col-md-3 text-center">
                            <div class="mt-5">
                                <img src="images/<?= $titre_designs["logo_ai"]; ?>" alt="illustrator">
                                <h3 class="titre-design">Illustrator</h3>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 text-center">
                            <div class="mt-5">
                                <img src="images/<?= $titre_designs["logo_ps"]; ?>" alt="photoshop">
                                <h3 class="titre-design">Photoshop</h3>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 text-center">
                            <div class="mt-5">
                                <img src="images/<?= $titre_designs["logo_xd"]; ?>" alt="XDesign">
                                <h3 class="titre-design">XDesign</h3>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
</section>
<section id="Web_design" >
   <!-- TITRE WED DESIGN -->
    <div class="page-section text-white bg-primary" >
        <div class="container text-center" >
        <?php foreach ($titre_web_design as $titre_web_designs) : ?>
            <h2 class="text-white mt-0"><?= $titre_web_designs["titre"]?></h2>
            <h3 class="titre-h3 text-white mt-4"><?= $titre_web_designs["libelle"]?></h3>
            <hr class="divider light my-4" />
            <p class="text-white-50 mb-4 text-justify"><?= $titre_web_designs["txt"]?></p>
        <?php endforeach ?>
        </div>
    </div>
    <!-- VIGNETTE WED DESIGN -->
    <div  class="portfolio web-design">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
            <?php foreach ($web_design as $web_designs) : ?>
                <div class="phare col-lg-3 col-sm-4">
                    <a class="portfolio-box" href="uploads/<?= $web_designs["image"]; ?>"  title="<?= $web_designs["titre_slide"]?>">
                        <img class="img-fluid phare__img" src="uploads/<?= $web_designs["image"]; ?>" alt="<?= $web_designs["alt"];?>" >
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50"><h2><?= $web_designs["titre_1"]?></h2></div>
                            <div class="project-name"><h3 style="font-size:1rem;"><?= $web_designs["titre_2"]?></h3></div>
                        </div>
                    </a>
                </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</section>
<!-- GRAPHISME -->
<section id="graphisme">
    <div class="page-section bg-dark text-white">
        <div class="container text-center">
        <?php foreach ($titre_graphisme as $titre_graphismes) : ?>
            <h2 class="titre-h2 text-center"><?= $titre_graphismes["titre_graph"]?></h2>
            <h3 class="titre-h3 text-white mt-4"><?= $titre_graphismes["libelle_graph"]?></h3>
            <hr class="divider my-4" />
            <p class="text-muted  px-5 mx-auto text-justify"><?= $titre_graphismes["txt_graph"]?> </p>
            <?php endforeach?>
        </div>
    </div>
    <div class="portfolio graphisme">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <?php foreach ($graphisme as $graphismes) : ?>
                    <div class="phare col-lg-3 col-sm-4">
                            <a class="portfolio-box" href="uploads/<?= $graphismes["image_graph"]; ?>"  title="<?= $graphismes["titre_slide_graph"]?>">
                                <img class="img-fluid phare__img" src="uploads/<?= $graphismes["image_graph"]; ?>" alt="<?= $graphismes["alt_graph"];?>" >
                                <div class="portfolio-box-caption">
                                    <div class="project-category text-white-50"><h2><?= $graphismes["titre1_graph"]?></h2></div>
                                    <div class="project-name"><h3 style="font-size:1rem;"><?= $graphismes["titre2_graph"]?></h3></div>
                                </div>
                            </a>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</section>
<!-- PHARE -->
<Section id="phare">
    <div class="page-section text-white bg-primary">
        <div class="container text-center">
            <?php foreach ($titre_phare as $titre_phares) : ?>
                <h2 class="text-white mt-0"><?= $titre_phares["titre_ph"]?></h2>
                <h3 class="titre-h3 text-white mt-4"><?= $titre_phares["libelle_ph"]?></h3>
                <hr class="divider light my-4" />
                <p class="text-white-50 mb-4"><?= $titre_phares["txt_ph"]?></p>
            <?php endforeach?>
        </div>
    </div>
    <div class="portfolio phares">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
            <?php foreach ($phare as $phares) : ?>
                <div class="phare col-lg-3 col-sm-4">
                        <a class="portfolio-box" href="uploads/<?= $phares["image2_ph"]; ?>"  title="<?= $phares["titre_slide_ph"]?>" alt="<?= $phares["alt1_ph"];?>">
                            <img class="img-fluid phare__img" src="uploads/<?= $phares["image1_ph"]; ?>" alt="<?= $phares["alt2_ph"];?>" >
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50"><h2><?= $phares["titre1_ph"]?></h2></div>
                                <div class="project-name"><h3 style="font-size:1rem;"><?= $phares["titre2_ph"]?></h3></div>
                            </div>
                        </a>
                </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</Section>
<!-- ANIMAUX -->
<section id="animaux">
    <div class="page-section bg-dark text-white">
        <div class="container text-center">
        <?php foreach ($titre_animaux as $titre_animauxs) : ?>
            <h2 class="titre-h2 text-center"><?= $titre_animauxs["titre_ani"]?></h2>
            <h3 class="titre-h3 text-white mt-4"><?= $titre_animauxs["libelle_ani"]?></h3>
            <hr class="divider my-4" />
            <p class="text-muted mx-auto text-center"><?= $titre_animauxs["txt_ani"]?></p>
        <?php endforeach?>
        </div>
    </div>
    <div  class="portfolio animaux">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <?php foreach ($animaux as $animauxs) : ?>
                    <div class="phare col-lg-3 col-sm-3">
                        <a class="portfolio-box" href="uploads/<?= $animauxs["image_ani"]; ?>"  title="<?= $animauxs["titre_slide_ani"]; ?>">
                            <img class="img-fluid phare__img" src="uploads/<?= $animauxs["image_ani"]; ?>" alt="<?= $animauxs["alt_ani"]; ?>" >
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50"><h2><?= $animauxs["titre1_ani"]?></h2></div>
                                <div class="project-name"><h3 style="font-size:1rem;"><?= $animauxs["titre2_ani"]?></h3></div>
                            </div>
                        </a>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</section>


            <footer class="bg-light py-5">
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
                <script src="js/graphisme.js"></script>
</body>
</html>