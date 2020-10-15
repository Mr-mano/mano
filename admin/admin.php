<?php
session_start();
require_once __DIR__ . "/../model/database.php";
require_once __DIR__ . "/crud/insert_titre_dev.php";
require_once __DIR__ . "/crud/insert_logo_dev.php";
require_once __DIR__ . "/crud/insert_titre_graphiste.php";
require_once __DIR__ . "/crud/insert_logo_graphiste.php";
require_once __DIR__ . "/crud/insert_portfolio_accueil.php";

$titre_dev = getAllEntities("titre_dev");
$logo_dev = getAllEntities("logo_dev");
$graphiste = getAllEntities("titre_graphique");
$logo_graphiste = getAllEntities("logo_graphiste");
$portfolio = getAllEntities("portfolio_accueil");
?>


 <!-- vérifie si administrateur est connecté -->
 <?php
		if(!isset($_SESSION['connect'])){ 
        ?>
        <!-- si l'administrateur n'est pas connecté affiche ça -->
            
        <?php require_once __DIR__ . "/layout/erreur404.php"; ?>

        <?php } else { ?>  
        
            <!-- HEADER -->
            <?php require_once __DIR__ . "/layout/header.php"; ?>

            <section style="margin-top:8%;">
            <div class="container text-center">
                <h2 style="color:#e9492a;">PAGE ACCUEIL</h2>
            </div>
            </section>

        <!-- WEB ACCUEIL--> 
<section id="titre_dev">
    <div class="border p-5 m-5">
            <h3 class="text-center mb-3">DEVELOPPEUR WEB</h3>
            <?php if(count($titre_dev) > 0) : ?>
            <table class="table" >
                <thead class="thead-light">
                    <tr>
                        <th scope="col" style="text-align:center;"></th>
                        <th scope="col" style="text-align:center;">Titre</th>
                        <th scope="col" style="text-align:center;">Modif</th>
                        <th scope="col" style="text-align:center;">Sup</th>
                    </tr>
            </thead>
            
            <tbody>
                <?php foreach ($titre_dev as $titre_devs) : ?>
                <tr>
                    <th scope="row">
                    <td style="text-align:center;vertical-align: center;"><?= $titre_devs["titre"]?></td>
                    <td style="text-align:center;vertical-align: center;">
                        <form method="post" action="crud/update_titre_dev.php">
                        <input type="hidden" name="id" value="<?= $titre_devs["id"]; ?>">
                        <button class="btn btn-primary"><i class="fa fa-pencil-alt" aria-hidden="true"></i></button>
                        </form>
                        </td>
                    <td style="text-align:center;">
                        <form method="post" action="crud/delete_titre_dev.php" onsubmit="return confirm('Est vous sûre de vouloir Sup cet article? ');">
                        <input type="hidden" name="id" value="<?= $titre_devs["id"]; ?>">
                        <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
                        </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
            <?php endif; ?>
            <!-- ADMIN WEB ACCUEIL-->   
            <?php if(count($titre_dev ) >= 1) :?>

            <?php elseif(count($titre_dev ) == 0) :?>
                <div class="bg-light p-5 m-5">
                    <form method="POST" action="admin.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Titre </label>
                            <input type="text" name="titre" class="form-control" id="formGroupExampleInput" required>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Ville</label>
                            <input type="text" name="ville" class="form-control" id="formGroupExampleInput2">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Texte</label>
                            <textarea rows="15" type="text" name="txt" class="form-control textarea"></textarea>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-primary mt-2 " type="submit">Envoyer</button>
                        </div>
                    </form>
                </div>
            <?php endif; ?>
        </div>
</section>

    <hr class="featurette-divider">

<!--AFFICHAGE LOGO_DEV -->
<section id="logo_dev">
        <div class="border p-5 m-5">
            <h3 class="text-center mb-3">Logo techno</h3>
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" style="text-align:center;"></th>
                            <th scope="col" style="text-align:center;">logo</th>
                            <th scope="col" style="text-align:center;">libelle</th>
                            <th scope="col" style="text-align:center;">Texte</th>
                            <th scope="col" style="text-align:center;">Alt</th>
                            <th scope="col" style="text-align:center;">Modif</th>
                            <th scope="col" style="text-align:center;">Sup</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($logo_dev as $logo_devs) : ?>
                        <tr>
                            <th scope="row">
                            <td style="text-align:center;"><img style="height:65px;" src="../uploads/<?= $logo_devs["logo"]; ?>"></td>
                            <td style="text-align:center;"><?= $logo_devs["libelle"]?></td>
                            <td style="text-align:center;"><p><?= $logo_devs["txt"]?></p></td>
                            <td style="text-align:center;"><p><?= $logo_devs["alt"]?></p></td>
                            <td style="text-align:center;">
                            <a class="btn btn-primary" href="crud/update_logo_dev.php?id=<?= $logo_devs["id"]; ?>"><i class="fa fa-pencil-alt" aria-hidden="true"></i></a>
                            </td>
                            <td style="text-align:center;">
                                <form method="post" action="crud/delete_logo_dev.php" onsubmit="return confirm('Est vous sûre de vouloir Sup cet article? ');">
                                <input type="hidden" name="id" value="<?= $logo_devs["id"]; ?>">
                                <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></i></button>
                                </form>
                                </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            
        <!-- ADMIN LOGO_DEV -->
        
            <div class="bg-light p-5 m-5">
                <form method="POST" action="admin.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Photo (8MO maxi)</label>
                        <input type="file" name="logo" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Titre</label>
                        <input type="text" name="libelle" class="form-control" id="formGroupExampleInput" required>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Texte</label>
                        <input type="text" name="txt" class="form-control" id="formGroupExampleInput2" required>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Description de l'image</label>
                        <input type="text" name="alt" class="form-control" id="formGroupExampleInput2" required>
                    </div>
                        <div class="d-flex justify-content-center">
                        <button class="btn btn-primary mt-2 " type="submit">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
</section>
    <!-- FIN LOGO_DEV -->

    <hr class="featurette-divider">

    <!-- GRAPHISTE ACCUEIL-->
<section id="graphiste">
    <div class="border p-5 m-5">
            <h3 class="text-center mb-3">GRAPHISME</h3>
            <?php if(count($graphiste) > 0) : ?>
            <table class="table" >
                <thead class="thead-light">
                    <tr>
                        <th scope="col" style="text-align:center;"></th>
                        <th scope="col" style="text-align:center;">Titre</th>
                        <th scope="col" style="text-align:center;">Libelle</th>
                        <th scope="col" style="text-align:center;">Texte</th>
                        <th scope="col" style="text-align:center;">Modif</th>
                        <th scope="col" style="text-align:center;">Sup</th>
                    </tr>
            </thead>
            
            <tbody>
                <?php foreach ($graphiste as $graphistes) : ?>
                <tr>
                    <th scope="row">
                    <td style="text-align:center;vertical-align: center;"><?= $graphistes["titre"]?></td>
                    <td style="text-align:center;vertical-align: center;"><p><?= $graphistes["libelle"]?></p></td>
                    <td style="text-align:center;vertical-align: center;"><p><?= $graphistes["txt"]?></p></td>
                    <td style="text-align:center;vertical-align: center;">
                        <form method="post" action="crud/update_titre_graphiste.php">
                        <input type="hidden" name="id" value="<?= $graphistes["id"]; ?>">
                        <button class="btn btn-primary"><i class="fa fa-pencil-alt" aria-hidden="true"></i></button>
                        </form>
                        </td>
                    <td style="text-align:center;">
                        <form method="post" action="crud/delete_titre_graphiste.php" onsubmit="return confirm('Est vous sûre de vouloir Sup cet article? ');">
                        <input type="hidden" name="id" value="<?= $graphistes["id"]; ?>">
                        <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
                        </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
            <?php endif; ?>
            <!-- ADMIN GRAPHISTE ACCUEIL-->   
            <?php if(count($graphiste ) >= 1) :?>

            <?php elseif(count($graphiste ) == 0) :?>
                <div class="bg-light p-5 m-5">
                    <form method="POST" action="admin.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Titre </label>
                            <input type="text" name="titre" class="form-control" id="formGroupExampleInput" required>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Libelle</label>
                            <input type="text" name="libelle" class="form-control" id="formGroupExampleInput2">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Texte</label>
                            <textarea rows="15" type="text" name="txt" class="form-control textarea"></textarea>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-primary mt-2 " type="submit">Envoyer</button>
                        </div>
                    </form>
                </div>
            <?php endif; ?>
    </div>
</section>
<!-- FIN GRAPHISTE ACCUEIL-->

<hr class="featurette-divider">

<!--AFFICHAGE LOGO_GRAPHISTE -->
<section id="logo_graphiste">
        <div class="border p-5 m-5">
            <h3 class="text-center mb-3">Logo logiciel PAO</h3>
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" style="text-align:center;"></th>
                            <th scope="col" style="text-align:center;">logo</th>
                            <th scope="col" style="text-align:center;">libelle</th>
                            <th scope="col" style="text-align:center;">Texte</th>
                            <th scope="col" style="text-align:center;">Alt</th>
                            <th scope="col" style="text-align:center;">Modif</th>
                            <th scope="col" style="text-align:center;">Sup</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($logo_graphiste as $logo_graphistes) : ?>
                        <tr>
                            <th scope="row">
                            <td style="text-align:center;"><img style="height:65px;" src="../uploads/<?= $logo_graphistes["logo_graph"]; ?>"></td>
                            <td style="text-align:center;"><?= $logo_graphistes["libelle_graph"]?></td>
                            <td style="text-align:center;"><p><?= $logo_graphistes["txt_graph"]?></p></td>
                            <td style="text-align:center;"><p><?= $logo_graphistes["alt_graph"]?></p></td>
                            <td style="text-align:center;">
                            <a class="btn btn-primary" href="crud/update_logo_graphiste.php?id=<?= $logo_graphistes["id"]; ?>"><i class="fa fa-pencil-alt" aria-hidden="true"></i></a>
                            </td>
                            <td style="text-align:center;">
                                <form method="post" action="crud/delete_logo_graphiste.php" onsubmit="return confirm('Est vous sûre de vouloir Sup cet article? ');">
                                <input type="hidden" name="id" value="<?= $logo_graphistes["id"]; ?>">
                                <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></i></button>
                                </form>
                                </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            
        <!-- ADMIN LOGO_GRAPHISTE -->
        
            <div class="bg-light p-5 m-5">
                <form method="POST" action="admin.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Photo (8MO maxi)</label>
                        <input type="file" name="logo_graph" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Titre</label>
                        <input type="text" name="libelle_graph" class="form-control" id="formGroupExampleInput" required>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Texte</label>
                        <input type="text" name="txt_graph" class="form-control" id="formGroupExampleInput2" required>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Description de l'image</label>
                        <input type="text" name="alt_graph" class="form-control" id="formGroupExampleInput2" required>
                    </div>
                        <div class="d-flex justify-content-center">
                        <button class="btn btn-primary mt-2 " type="submit">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
</section>
    <!-- FIN LOGO_GRAPHISTE -->

<hr class="featurette-divider">

<!--AFFICHAGE PORTFOLIO -->
<section id="portfolio">
        <div class="border p-5 m-5">
            <h3 class="text-center mb-3">Portfolio</h3>
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" style="text-align:center;"></th>
                            <th scope="col" style="text-align:center;">900 px</th>
                            <th scope="col" style="text-align:center;">600 px</th>
                            <th scope="col" style="text-align:center;">Titre 1</th>
                            <th scope="col" style="text-align:center;">Titre 2</th>
                            <th scope="col" style="text-align:center;">Titre slide</th>
                            <th scope="col" style="text-align:center;">alt 600</th>
                            <th scope="col" style="text-align:center;">alt 900</th>
                            <th scope="col" style="text-align:center;">Modif</th>
                            <th scope="col" style="text-align:center;">Sup</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($portfolio as $portfolios) : ?>
                        <tr>
                            <th scope="row">
                            <td style="text-align:center;"><img style="height:65px;" src="../assets/img/portfolio/fullsize/<?= $portfolios["image_1"]; ?>"></td>
                            <td style="text-align:center;"><img style="height:65px;" src="../assets/img/portfolio/thumbnails/<?= $portfolios["image_2"]; ?>"></td>
                            <td style="text-align:center;"><p><?= $portfolios["titre_1"]?></p></td>
                            <td style="text-align:center;"><p><?= $portfolios["titre_2"]?></p></td>
                            <td style="text-align:center;"><p><?= $portfolios["titre_slide"]?></p></td>
                            <td style="text-align:center;"><p><?= $portfolios["alt_1"]?></p></td>
                            <td style="text-align:center;"><p><?= $portfolios["alt_2"]?></p></td>
                            <td style="text-align:center;">
                            <a class="btn btn-primary" href="crud/update_portfolio_accueil.php?id=<?= $portfolios["id"]; ?>"><i class="fa fa-pencil-alt" aria-hidden="true"></i></a>
                            </td>
                            <td style="text-align:center;">
                                <form method="post" action="crud/delete_portfolio_accueil.php" onsubmit="return confirm('Est vous sûre de vouloir Sup cet article? ');">
                                <input type="hidden" name="id" value="<?= $portfolios["id"]; ?>">
                                <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></i></button>
                                </form>
                                </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            
        <!-- ADMIN PORTFOLIO -->
        
            <div class="bg-light p-5 m-5">
                <form method="POST" action="admin.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Image 600 - Fullsize</label>
                        <input type="file" name="image_1" class="form-control-file">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Image 900 - Thumbails</label>
                        <input type="file" name="image_2" class="form-control-file">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Titre 1</label>
                        <input type="text" name="titre_1" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Titre 2</label>
                        <input type="text" name="titre_2" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Titre slide</label>
                        <input type="text" name="titre_slide" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Description de l'image 600</label>
                        <input type="text" name="alt_1" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Description de l'image 900</label>
                        <input type="text" name="alt_2" class="form-control" required>
                    </div>
                        <div class="d-flex justify-content-center">
                        <button class="btn btn-primary mt-2 " type="submit">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
</section>
<!-- FIN PORTFOLIO -->



<?php } ?>
</body>
</html>
