<?php
require_once __DIR__ . "/model/database.php";
require_once __DIR__ . "/admin/crud/insert_titre_dev.php";
require_once __DIR__ . "/admin/crud/insert_logo_dev.php";
require_once __DIR__ . "/admin/crud/insert_titre_graphiste.php";


$titre_dev = getAllEntities("titre_dev");
$logo_dev = getAllEntities("logo_dev");
$graphiste = getAllEntities("titre_graphique");
$logo_graphiste = getAllEntities("logo_graphiste");
$portfolio = getAllEntities("portfolio_accueil");

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
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="graphisme.php">Design</a>
                <a class="navbar-brand" href="creation-site-web-a-rennes.php">Site Web</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#page-top">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Web</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">Graphisme</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 container-titre">
                        <h2 class="titre-mano">MANO 
                            <span style="color:rgba(244, 98, 58, 0.9);">QUERE</span></h2>
                        <hr class="divider my-2" />
                        <div>
                            <p class="text-white-100 font-weight-light">Portfolio</p>
                        </div>
                    </div>
                    
                    <div class="div-fleche col-lg-8">
                        
                    </div>
                </div>
            </div>
        </header>
        

        <!-- TITRE PAGE-->
        <section class="page-section" id="services">
            <div class="container text-center">
                <?php foreach ($titre_dev as $titre_devs) : ?>
                    <h1 class="titre-dev text-center mt-0"><?= $titre_devs["titre"]?></h1>
                    <h2 class="ville_accueil text-center mt-0"><?= $titre_devs["ville"]?></h2>
                    <hr class="divider my-4" />
                    <div class="justify-content-center txt"  style="margin: 0 5% 3% 5%;">
                        <p class="text-muted mb-0 px-5 text-justify">
                        <?= $titre_devs["txt"]?>
                        </p>
                    </div>
                    <?php endforeach; ?>

                
                    <h3 class="titre-dev" style="font-size:2.2rem; margin-top:8%;">Ma boite à outils...</h3>
                    <h2 class="ville_accueil text-center">Découvrez les technos que j'utilise pour développer les sites web.</h2>
                    <hr class="divider my-4" />
                    <div class="justify-content-center txt"  style="margin: 0 5% 3% 5%;">
                        <p class="text-muted mb-0 px-5 text-justify">
                        J'utilise en certains nombre de langage, framework, logiciel...
                        pour développer les projets web dont j'ai la charge. 
                        Vous retrouverez ci-dessous une liste non exhaustif  des « technos »  avec lesquelles je travail. 
                        Puisque le monde du numérique est en perpétuel évolution, Je continu de me former, de travailler, de découvrir... 
                        </p>
                    </div>
                
                
            <!-- LOGO TECHNO DEV-->
                <div class="row">
                <?php foreach ($logo_dev as $logo_devs) : ?>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <img src="uploads/<?= $logo_devs["logo"]; ?>" alt="<?= $logo_devs["alt"]?>">
                            <h3 class="h4 mb-2"><?= $logo_devs["libelle"]?></h3>
                            <p class="text-muted mb-0"><?= $logo_devs["txt"]?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- Voir + creation web-->
            <div class="text-center mt-5">
                <a class="btn btn-primary btn-xl" href="creation-site-web-a-rennes.php">Voir +</a>
            </div>
        </section>
        <!-- GRAPHISME-->
        <section class="page-section bg-primary" id="about">
            <div class="container">
                <div class="row justify-content-center mb-5">
                    <div class="col-lg-10 text-center grahisme">
                    <?php foreach ($graphiste as $graphistes) : ?>
                        <h2 class="text-white mt-0"><?= $graphistes["titre"]?></h2>
                        <h2 class="ville_accueil text-center mt-0 text-white-50"><?= $graphistes["libelle"]?></h2>
                        <hr class="divider light my-4" />
                        <p class="text-white-50 text-justify"><?= $graphistes["txt"]?></p>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <?php foreach ($logo_graphiste as $logo_graphistes) : ?>
                        <div class="col-lg-3 col-md-3 mb-5 text-center">
                                <img src="uploads/<?= $logo_graphistes["logo_graph"]; ?>" alt="<?= $logo_graphistes["alt_graph"]; ?>">
                                <h3 class="h4 mb-2 mt-3 text-white"><?= $logo_graphistes["libelle_graph"]; ?></h3>
                                <p class="text-white-50 mb-0" ><?= $logo_graphistes["txt_graph"]; ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
                    
        </section>

        <!-- Portfolio-->
        <div id="portfolio" class="portfolio">
        <div class="text-center">
                        <h2 class="titre-dev  mt-5">Découvrez quelques graphismes :</h2>
                        <hr class="divider my-4" />
                    </div>
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                <?php foreach ($portfolio as $portfolios) : ?>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/<?= $portfolios["image_1"]; ?>" title="<?= $portfolios["titre_slide"]; ?>" alt="<?= $portfolios["alt_1"]; ?>">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/<?= $portfolios["image_2"]; ?>" alt="<?= $portfolios["alt_2"]; ?>" />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50"><h2><?= $portfolios["titre_1"]; ?></h2></div>
                                <div class="project-name"><h3 style="font-size:1rem;"><?= $portfolios["titre_2"]; ?></h3></div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
        </div>
        <!-- Voir + design -->
        <section class="page-section bg-dark text-white">
            <div class="container text-center">
                <h2 class="mb-4">Découvrez l'ensemble de mes réalisations</h2>
                <a class="btn btn-light btn-xl" href="graphisme.php">Voir +</a>
            </div>
        </section>
        <!-- Contact-->

        <section class="page-section" id="contact">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="mt-0">Formulaire de contact</h2>
                        <hr class="divider my-4" />
                        <p class="text-muted mb-5">Si vous souhaitez me contacter, n'hésitez pas à m'envoyer un email via le formualaire ci-dessous. Je vous répondrai dans les plus brefs délais.</p>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
					<div class="col-md-9 mb-md-0 mb-5">
                    <!--FORMULAIRE ENVOI EMAIL-->
						<form id="contact-form" name="contact-form" action="traitement_formulaire.php" method="POST">
							<div class="row justify-content-center">
								<div class="col-md-6">
									<div class="md-form mb-0">
										<input type="text" id="name" name="nom" class="form-control" required>
										<label for="nom" class="text-muted mb-0">Votre nom</label>
									</div>
								</div>
								<div class="col-md-6">
									<div class="md-form mb-0">
										<input type="email" id="email" name="email" class="form-control" required>
										<label for="email" class="text-muted mb-0">Votre email</label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="md-form mb-0">
										<input type="text" id="subject" name="objet" class="form-control" required>
										<label for="objet" class="text-muted mb-0">Sujet</label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="md-form">
										<textarea type="text" id="message" name="message" rows="6"
											class="form-control md-textarea"></textarea>
										<label for="message" class="text-muted mb-0">Votre message</label>
									</div>
								</div>
							</div>
                            <div class="text-center text-md btn-envoyer">
                                <button class="btn btn-primary btn-xl" name="envoi" type="submit">Envoyer</button>
						    </div>
                        </form>
						<div class="status"></div>
				</div>
            </div>
        </section>
        
    <!-- FOOTER -->
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
    <script src="js/scripts.js"></script>
</body>
</html>
 

