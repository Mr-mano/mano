<?php
require_once __DIR__ . "/model/database.php";
require_once __DIR__ . "/admin/crud/insert_creation_site.php";

$id = (isset($_GET['id']) ? $_GET["id"] : 1) or (isset($_POST['id']));
$creation_site = getById($id, 'creation_site');
$images = getAllCreationSiteImage($id);
$techno = getAllCreationSiteTechno($id);
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
                            <li class="nav-item nav-item-2"><a class="nav-link" href="index.php">Accueil</a></li>
                            <li class="nav-item nav-item-2"><a class="nav-link" href="index.php#graphisme">Web</a></li>
                            <li class="nav-item nav-item-2"><a class="nav-link" href="index.php#phare">Graphisme</a></li>
                            <li class="nav-item nav-item-2"><a class="nav-link" href="index.php#animaux">Portfolio</a></li>
                            <li class="nav-item nav-item-2"><a class="nav-link" href="index.php#contact">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        
<section class="page-section">
        <div class="page-section">
            <div class="container text-center">
                <h1 class="titre-dev text-center"><?= $creation_site["titre"]?></h1>
                <h2 class="show_accueil text-center"><?= $creation_site["libelle"]?></h2>
                <hr class="divider my-4" />
                <h4 class=" text-center mb-3 mt-5">Les technos utilisées :</h4>
                <ul class="liste_techno_show">
                    <?php foreach ($techno as $technos) : ?>
                        <li class="text-muted" style="font-size:1.3rem;"><?= $technos["techno"]; ?></li>
                    <?php endforeach?>
                </ul> 
                <hr class="divider my-4" />
                <p class="text-muted  px-5 mx-auto text-justify"><?=  $creation_site["txt"]?></p>
            </div>
        </div>
        <div class="container">
            <div class="row zoom-gallery">
            <?php foreach ($images as $image) : ?>
                <div class="block-img col-sm-4 text-center mb-2 mt-2">
                        <a href="uploads/<?= $image["image_rea"]; ?>"  title="<?= $image["alt_img"]; ?>" style="width:auto;height:200px;">
                            <img src="uploads/<?= $image["image_rea"]; ?>" width="auto" height="200" alt="<?= $image["alt_img"]; ?>">
                        </a>
                </div>
                <?php endforeach?>
            </div>
        </div>
        
<div class="text-center mt-5 mb-5">
    <a class="btn btn-primary btn-xl" href="creation-site-web-a-rennes.php">Retour</a>
</div>
</section>
            



<footer class="bg-light py-5">
    <div class="container">
        <div class="small text-center text-muted">Copyright © 2020 - Mano Quéré</div>
        <p class="small text-center text-muted">L'ensemble des illustrations présentées sur le site sont soumises aux droits à l'image. Reproduction interdite sans accord.</p>
    </div>
</footer>   
    <script src="js/jquery-slim.min.js"></script>
	<script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/creation_site.js"></script>

</body>
</html>