<?php
session_start();
require_once __DIR__ . "/../model/database.php";
require_once __DIR__ . "/crud/insert_titre_design.php";
require_once __DIR__ . "/crud/insert_titre_web_design.php";
require_once __DIR__ . "/crud/insert_web_design.php";
require_once __DIR__ . "/crud/insert_titre_graphisme.php";
require_once __DIR__ . "/crud/insert_graphisme.php";
require_once __DIR__ . "/crud/insert_titre_animaux.php";
require_once __DIR__ . "/crud/insert_animaux.php";
require_once __DIR__ . "/crud/insert_phare.php";
require_once __DIR__ . "/crud/insert_titre_phare.php";

$titre_design = getAllEntities("titre_design");
$titre_web_design = getAllEntities("titre_web_design");
$web_design = getAllEntities("web_design");
$titre_graphisme = getAllEntities("titre_graphisme");
$graphisme = getAllEntities("graphisme");
$titre_animaux = getAllEntities("titre_animaux");
$animaux = getAllEntities("animaux");
$titre_phare = getAllEntities("titre_phare");
$phare = getAllEntities("phare");

?>
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
        <h2 style="color:#e9492a;">PAGE DESIGN</h2>
    </div>
</section>

<hr class="featurette-divider">
    
<!-- TITRE PRINCIPAL PAGE DESIGN-->
<section id="design">
        <div class="border p-5 m-5">
            <h3 class="text-center mb-3">DESIGN</h3>
            <?php if(count($titre_design) > 0) : ?>
            <table class="table" >
                <thead class="thead-light">
                    <tr>
                        <th scope="col" style="text-align:center;"></th>
                        <th scope="col" style="text-align:center;">Titre</th>
                        <th scope="col" style="text-align:center;">logo AI</th>
                        <th scope="col" style="text-align:center;">logo PS</th>
                        <th scope="col" style="text-align:center;">logo XD</th>
                        <th scope="col" style="text-align:center;">Modif</th>
                        <th scope="col" style="text-align:center;">Sup</th>
                    </tr>
            </thead>
            
            <tbody>
                <?php foreach ($titre_design as $titre_designs) : ?>
                <tr>
                    <th scope="row">
                    <td style="text-align:center;vertical-align: center;"><?= $titre_designs["titre"]?></td>
                    <td style="text-align:center;vertical-align: center;"><img style="height:65px;" src="../uploads/<?= $titre_designs["logo_ai"]; ?>"></td>
                    <td style="text-align:center;vertical-align: center;"><img style="height:65px;" src="../uploads/<?= $titre_designs["logo_ps"]; ?>"></td>
                    <td style="text-align:center;vertical-align: center;"><img style="height:65px;" src="../uploads/<?= $titre_designs["logo_xd"]; ?>"></td>
                    <td style="text-align:center;vertical-align: center;">
                        <form method="post" action="crud/update_titre_design.php">
                        <input type="hidden" name="id" value="<?= $titre_designs["id"]; ?>">
                        <button class="btn btn-primary"><i class="fa fa-pencil-alt" aria-hidden="true"></i></button>
                        </form>
                        </td>
                    <td style="text-align:center;">
                        <form method="post" action="crud/delette_titre_design.php" onsubmit="return confirm('Est vous sûre de vouloir Sup cet article? ');">
                        <input type="hidden" name="id" value="<?= $titre_designs["id"]; ?>">
                        <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
                        </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
            <?php endif; ?>
            <!-- TITRE PRINCIPAL PAGE DESIGN-->   
            <?php if(count($titre_design) >= 1) :?>

            <?php elseif(count($titre_design ) == 0) :?>
                <div class="bg-light p-5 m-5">
                    <form method="POST" action="admin_design.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Titre </label>
                            <input type="text" name="titre" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">txt</label>
                            <textarea rows="10" type="text" name="txt" class="form-control textarea"><?= $designs["txt"]; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Logo AI</label>
                            <input type="file" name="logo_ai" class="form-control-file">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Logo PS</label>
                            <input type="file" name="logo_ps" class="form-control-file">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Logo XD</label>
                            <input type="file" name="logo_xd" class="form-control-file">
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-primary mt-2 " type="submit">Envoyer</button>
                        </div>
                    </form>
                </div>
            <?php endif; ?>
        </div>
</section>
<!-- FIN TITRE PRINCIPAL PAGE DESIGN-->

    <hr class="featurette-divider">

    <!-- TITRE WEB_DESIGN PAGE DESIGN-->
    <section id="titre_web_design">
    <div class="border p-5 m-5">
            <h3 class="text-center mb-3">TITRE WEB DESIGN</h3>
            <?php if(count($titre_web_design) > 0) : ?>
            <table class="table" >
                <thead class="thead-light">
                    <tr>
                        <th scope="col" style="text-align:center;"></th>
                        <th scope="col" style="text-align:center;">Titre</th>
                        <th scope="col" style="text-align:center;">Sous titre</th>
                        <th scope="col" style="text-align:center;">Texte</th>
                        <th scope="col" style="text-align:center;">Modif</th>
                        <th scope="col" style="text-align:center;">Sup</th>
                    </tr>
            </thead>
            
            <tbody>
                <?php foreach ($titre_web_design as $titre_web_designs) : ?>
                <tr>
                    <th scope="row">
                    <td style="text-align:center;vertical-align: center;"><?= $titre_web_designs["titre"]?></td>
                    <td style="text-align:center;vertical-align: center;"><?= $titre_web_designs["libelle"]?></p></td>
                    <td style="text-align:center;vertical-align: center;"><?= $titre_web_designs["txt"]?></p></td>
                    <td style="text-align:center;vertical-align: center;">
                        <form method="post" action="crud/update_titre_web_design.php">
                        <input type="hidden" name="id" value="<?= $titre_web_designs["id"]; ?>">
                        <button class="btn btn-primary"><i class="fa fa-pencil-alt" aria-hidden="true"></i></button>
                        </form>
                        </td>
                    <td style="text-align:center;">
                        <form method="post" action="crud/delete_titre_web_design.php" onsubmit="return confirm('Est vous sûre de vouloir Sup cet article? ');">
                        <input type="hidden" name="id" value="<?= $titre_web_designs["id"]; ?>">
                        <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
                        </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
            <?php endif; ?>
            <!-- ADMIN TITRE WEB_DESIGN PAGE DESIGN-->   
            <?php if(count($titre_web_design ) >= 1) :?>
            <?php elseif(count($titre_web_design ) == 0) :?>
                <div class="bg-light p-5 m-5">
                    <form method="POST" action="admin_design.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Titre </label>
                            <input type="text" name="titre" class="form-control" id="formGroupExampleInput" required>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Sous titre</label>
                            <input type="text" name="libelle" class="form-control" id="formGroupExampleInput2">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Texte</label>
                            <textarea rows="10" type="text" name="txt" class="form-control textarea"></textarea>
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

<!--AFFICHAGE WEB DESIGN -->
<section id="web_design">
        <div class="border p-5 m-5">
            <h3 class="text-center mb-3">WEB DESIGN</h3>
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" style="text-align:center;"></th>
                            <th scope="col" style="text-align:center;">logo</th>
                            <th scope="col" style="text-align:center;">Titre 1</th>
                            <th scope="col" style="text-align:center;">titre 2</th>
                            <th scope="col" style="text-align:center;">titre slide</th>
                            <th scope="col" style="text-align:center;">Alt</th>
                            <th scope="col" style="text-align:center;">Modif</th>
                            <th scope="col" style="text-align:center;">Sup</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($web_design as $web_designs) : ?>
                        <tr>
                            <th scope="row">
                            <td style="text-align:center;"><img style="height:65px;" src="../uploads/<?= $web_designs["image"]; ?>"></td>
                            <td style="text-align:center;"><?= $web_designs["titre_1"]?></td>
                            <td style="text-align:center;"><p><?= $web_designs["titre_2"]?></p></td>
                            <td style="text-align:center;"><p><?= $web_designs["titre_slide"]?></p></td>
                            <td style="text-align:center;"><p><?= $web_designs["alt"];?></p></td>
                            <td style="text-align:center;">
                            <a class="btn btn-primary" href="crud/update_web_design.php?id=<?= $web_designs["id"]; ?>"><i class="fa fa-pencil-alt" aria-hidden="true"></i></a>
                            </td>
                            <td style="text-align:center;">
                                <form method="post" action="crud/delete_web_design.php" onsubmit="return confirm('Est vous sûre de vouloir Sup cet article? ');">
                                <input type="hidden" name="id" value="<?= $web_designs["id"]; ?>">
                                <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></i></button>
                                </form>
                                </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            
        <!-- ADMIN WEB DESIGN -->
        
            <div class="bg-light p-5 m-5">
                <form method="POST" action="admin_design.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Image</label>
                        <input type="file" name="image" class="form-control-file">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Titre 1</label>
                        <input type="text" name="titre_1" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Titre 2</label>
                        <input type="text" name="titre_2" class="form-control"required>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Titre slide</label>
                        <input type="text" name="titre_slide" class="form-control"required>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Description de l'image</label>
                        <input type="text" name="alt" class="form-control"required>
                    </div>
                        <div class="d-flex justify-content-center">
                        <button class="btn btn-primary mt-2 " type="submit">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
</section>
    <!-- FIN WEB DESIGN -->

    <hr class="featurette-divider">

    <!-- AFFICHAGE TITRE GRAPHISME -->
    <section id="graphisme">
    <div class="border p-5 m-5">
            <h3 class="text-center mb-3">TITRE GRAPHISME</h3>
            <?php if(count($titre_graphisme) > 0) : ?>
            <table class="table" >
                <thead class="thead-light">
                    <tr>
                        <th scope="col" style="text-align:center;"></th>
                        <th scope="col" style="text-align:center;">Titre</th>
                        <th scope="col" style="text-align:center;">Sous titre</th>
                        <th scope="col" style="text-align:center;">Texte</th>
                        <th scope="col" style="text-align:center;">Modif</th>
                        <th scope="col" style="text-align:center;">Sup</th>
                    </tr>
            </thead>
            
            <tbody>
                <?php foreach ($titre_graphisme as $titre_graphismes) : ?>
                <tr>
                    <th scope="row">
                    <td style="text-align:center;vertical-align: center;"><?= $titre_graphismes["titre_graph"]?></td>
                    <td style="text-align:center;vertical-align: center;"><?= $titre_graphismes["libelle_graph"]?></p></td>
                    <td style="text-align:center;vertical-align: center;"><?= $titre_graphismes["txt_graph"]?></p></td>
                    <td style="text-align:center;vertical-align: center;">
                        <form method="post" action="crud/update_titre_graphisme.php">
                        <input type="hidden" name="id" value="<?= $titre_graphismes["id"]; ?>">
                        <button class="btn btn-primary"><i class="fa fa-pencil-alt" aria-hidden="true"></i></button>
                        </form>
                        </td>
                    <td style="text-align:center;">
                        <form method="post" action="crud/delete_titre_graphisme.php" onsubmit="return confirm('Est vous sûre de vouloir Sup cet article? ');">
                        <input type="hidden" name="id" value="<?= $titre_graphismes["id"]; ?>">
                        <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
                        </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
            <?php endif; ?>
            <!-- ADMIN TITRE GRAPHISME-->   
            <?php if(count($titre_graphisme ) >= 1) :?>

            <?php elseif(count($titre_graphisme ) == 0) :?>
                <div class="bg-light p-5 m-5">
                    <form method="POST" action="admin_design.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Titre </label>
                            <input type="text" name="titre_graph" class="form-control" id="formGroupExampleInput" required>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Sous titre</label>
                            <input type="text" name="libelle_graph" class="form-control" id="formGroupExampleInput2">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Texte</label>
                            <textarea rows="10" type="text" name="txt_graph" class="form-control textarea"></textarea>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-primary mt-2 " type="submit">Envoyer</button>
                        </div>
                    </form>
                </div>
            <?php endif; ?>
        </div>
</section>
<!-- FIN TITRE GRAPHISME--> 
<hr class="featurette-divider">

<!--AFFICHAGE GRAPHISME -->
<section id="graphisme_img">
        <div class="border p-5 m-5">
            <h3 class="text-center mb-3">GRAPHISME</h3>
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" style="text-align:center;"></th>
                            <th scope="col" style="text-align:center;">logo</th>
                            <th scope="col" style="text-align:center;">Titre 1</th>
                            <th scope="col" style="text-align:center;">titre 2</th>
                            <th scope="col" style="text-align:center;">titre slide</th>
                            <th scope="col" style="text-align:center;">Alt</th>
                            <th scope="col" style="text-align:center;">Modif</th>
                            <th scope="col" style="text-align:center;">Sup</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($graphisme as $graphismes) : ?>
                        <tr>
                            <th scope="row">
                            <td style="text-align:center;"><img style="height:65px;" src="../uploads/<?= $graphismes["image_graph"]; ?>"></td>
                            <td style="text-align:center;"><?= $graphismes["titre1_graph"]?></td>
                            <td style="text-align:center;"><p><?= $graphismes["titre2_graph"]?></p></td>
                            <td style="text-align:center;"><p><?= $graphismes["titre_slide_graph"]?></p></td>
                            <td style="text-align:center;"><p><?= $graphismes["alt_graph"];?></p></td>
                            <td style="text-align:center;">
                            <a class="btn btn-primary" href="crud/update_graphisme.php?id=<?= $graphismes["id"]; ?>"><i class="fa fa-pencil-alt" aria-hidden="true"></i></a>
                            </td>
                            <td style="text-align:center;">
                                <form method="post" action="crud/delete_graphisme.php" onsubmit="return confirm('Est vous sûre de vouloir Sup cet article? ');">
                                <input type="hidden" name="id" value="<?= $graphismes["id"]; ?>">
                                <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></i></button>
                                </form>
                                </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            
        <!-- ADMIN GRAPHISME -->
        
            <div class="bg-light p-5 m-5">
                <form method="POST" action="admin_design.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Image</label>
                        <input type="file" name="image_graph" class="form-control-file">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Titre 1</label>
                        <input type="text" name="titre1_graph" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Titre 2</label>
                        <input type="text" name="titre2_graph" class="form-control"required>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Titre slide</label>
                        <input type="text" name="titre_slide_graph" class="form-control"required>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Description de l'image</label>
                        <input type="text" name="alt_graph" class="form-control"required>
                    </div>
                        <div class="d-flex justify-content-center">
                        <button class="btn btn-primary mt-2 " type="submit">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
</section>
    <!-- FIN GRAPHISME -->

    <hr class="featurette-divider">

<!-- AFFICHAGE TITRE PHARE -->
<section id="titre_phare">
    <div class="border p-5 m-5">
            <h3 class="text-center mb-3">TITRE PHARE</h3>
            <?php if(count($titre_phare) > 0) : ?>
            <table class="table" >
                <thead class="thead-light">
                    <tr>
                        <th scope="col" style="text-align:center;"></th>
                        <th scope="col" style="text-align:center;">Titre</th>
                        <th scope="col" style="text-align:center;">Sous titre</th>
                        <th scope="col" style="text-align:center;">Texte</th>
                        <th scope="col" style="text-align:center;">Modif</th>
                        <th scope="col" style="text-align:center;">Sup</th>
                    </tr>
            </thead>
            
            <tbody>
                <?php foreach ($titre_phare as $titre_phares) : ?>
                <tr>
                    <th scope="row">
                    <td style="text-align:center;vertical-align: center;"><?= $titre_phares["titre_ph"]?></td>
                    <td style="text-align:center;vertical-align: center;"><?= $titre_phares["libelle_ph"]?></p></td>
                    <td style="text-align:center;vertical-align: center;"><?= $titre_phares["txt_ph"]?></p></td>
                    <td style="text-align:center;vertical-align: center;">
                        <form method="post" action="crud/update_titre_phare.php">
                        <input type="hidden" name="id" value="<?= $titre_phares["id"]; ?>">
                        <button class="btn btn-primary"><i class="fa fa-pencil-alt" aria-hidden="true"></i></button>
                        </form>
                        </td>
                    <td style="text-align:center;">
                        <form method="post" action="crud/delete_titre_phare.php" onsubmit="return confirm('Est vous sûre de vouloir Sup cet article? ');">
                        <input type="hidden" name="id" value="<?= $titre_phares["id"]; ?>">
                        <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
                        </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
            <?php endif; ?>
            <!-- ADMIN TITRE PHARE-->   
            <?php if(count($titre_phare) >= 1) :?>

            <?php elseif(count($titre_phare) == 0) :?>
                <div class="bg-light p-5 m-5">
                    <form method="POST" action="admin_design.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Titre </label>
                            <input type="text" name="titre_ph" class="form-control" id="formGroupExampleInput" required>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Sous titre</label>
                            <input type="text" name="libelle_ph" class="form-control" id="formGroupExampleInput2">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Texte</label>
                            <textarea rows="10" type="text" name="txt_ph" class="form-control textarea"></textarea>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-primary mt-2 " type="submit">Envoyer</button>
                        </div>
                    </form>
                </div>
            <?php endif; ?>
        </div>
</section>
<!-- FIN TITRE PHARE--> 

<hr class="featurette-divider">

<!--AFFICHAGE PHARE -->
<section id="phare">
        <div class="border p-5 m-5">
            <h3 class="text-center mb-3">PHARE</h3>
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" style="text-align:center;"></th>
                            <th scope="col" style="text-align:center;">Image</th>
                            <th scope="col" style="text-align:center;">Image slide</th>
                            <th scope="col" style="text-align:center;">Titre 1</th>
                            <th scope="col" style="text-align:center;">titre 2</th>
                            <th scope="col" style="text-align:center;">titre slide</th>
                            <th scope="col" style="text-align:center;">Alt 1</th>
                            <th scope="col" style="text-align:center;">Alt 2</th>
                            <th scope="col" style="text-align:center;">Modif</th>
                            <th scope="col" style="text-align:center;">Sup</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($phare as $phares) : ?>
                        <tr>
                            <th scope="row">
                            <td style="text-align:center;"><img style="height:65px;" src="../uploads/<?= $phares["image1_ph"]; ?>"></td>
                            <td style="text-align:center;"><img style="height:65px;" src="../uploads/<?= $phares["image2_ph"]; ?>"></td>
                            <td style="text-align:center;"><?= $phares["titre1_ph"]?></td>
                            <td style="text-align:center;"><p><?= $phares["titre2_ph"]?></p></td>
                            <td style="text-align:center;"><p><?= $phares["titre_slide_ph"]?></p></td>
                            <td style="text-align:center;"><p><?= $phares["alt1_ph"];?></p></td>
                            <td style="text-align:center;"><p><?= $phares["alt2_ph"];?></p></td>
                            <td style="text-align:center;">
                            <a class="btn btn-primary" href="crud/update_phare.php?id=<?= $phares["id"]; ?>"><i class="fa fa-pencil-alt" aria-hidden="true"></i></a>
                            </td>
                            <td style="text-align:center;">
                                <form method="post" action="crud/delete_phare.php" onsubmit="return confirm('Est vous sûre de vouloir Sup cet article? ');">
                                <input type="hidden" name="id" value="<?= $phares["id"]; ?>">
                                <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></i></button>
                                </form>
                                </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            
        <!-- ADMIN PHARE -->
        
            <div class="bg-light p-5 m-5">
                <form method="POST" action="admin_design.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Image</label>
                        <input type="file" name="image1_ph" class="form-control-file">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Image slide</label>
                        <input type="file" name="image2_ph" class="form-control-file">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Titre 1</label>
                        <input type="text" name="titre1_ph" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Titre 2</label>
                        <input type="text" name="titre2_ph" class="form-control"required>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Titre slide</label>
                        <input type="text" name="titre_slide_ph" class="form-control"required>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Description de l'image</label>
                        <input type="text" name="alt1_ph" class="form-control"required>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Description de l'image</label>
                        <input type="text" name="alt2_ph" class="form-control"required>
                    </div>
                        <div class="d-flex justify-content-center">
                        <button class="btn btn-primary mt-2 " type="submit">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
</section>
    <!-- FIN PHARE -->

    <hr class="featurette-divider">

    <!-- AFFICHAGE TITRE ANIMAUX -->
    <section id="titre_animaux">
    <div class="border p-5 m-5">
            <h3 class="text-center mb-3">TITRE ANIMAUX</h3>
            <?php if(count($titre_animaux) > 0) : ?>
            <table class="table" >
                <thead class="thead-light">
                    <tr>
                        <th scope="col" style="text-align:center;"></th>
                        <th scope="col" style="text-align:center;">Titre</th>
                        <th scope="col" style="text-align:center;">Sous titre</th>
                        <th scope="col" style="text-align:center;">Texte</th>
                        <th scope="col" style="text-align:center;">Modif</th>
                        <th scope="col" style="text-align:center;">Sup</th>
                    </tr>
            </thead>
            
            <tbody>
                <?php foreach ($titre_animaux as $titre_animauxs) : ?>
                <tr>
                    <th scope="row">
                    <td style="text-align:center;vertical-align: center;"><?= $titre_animauxs["titre_ani"]?></td>
                    <td style="text-align:center;vertical-align: center;"><?= $titre_animauxs["libelle_ani"]?></p></td>
                    <td style="text-align:center;vertical-align: center;"><?= $titre_animauxs["txt_ani"]?></p></td>
                    <td style="text-align:center;vertical-align: center;">
                        <form method="post" action="crud/update_titre_animaux.php">
                        <input type="hidden" name="id" value="<?= $titre_animauxs["id"]; ?>">
                        <button class="btn btn-primary"><i class="fa fa-pencil-alt" aria-hidden="true"></i></button>
                        </form>
                        </td>
                    <td style="text-align:center;">
                        <form method="post" action="crud/delete_titre_animaux.php" onsubmit="return confirm('Est vous sûre de vouloir Sup cet article? ');">
                        <input type="hidden" name="id" value="<?= $titre_animauxs["id"]; ?>">
                        <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
                        </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
            <?php endif; ?>
            <!-- ADMIN TITRE ANIMAUX-->   
            <?php if(count($titre_animaux) >= 1) :?>

            <?php elseif(count($titre_animaux) == 0) :?>
                <div class="bg-light p-5 m-5">
                    <form method="POST" action="admin_design.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Titre </label>
                            <input type="text" name="titre_ani" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Sous titre</label>
                            <input type="text" name="libelle_ani" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Texte</label>
                            <textarea rows="10" type="text" name="txt_ani" class="form-control textarea"></textarea>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-primary mt-2 " type="submit">Envoyer</button>
                        </div>
                    </form>
                </div>
            <?php endif; ?>
        </div>
</section>
<!-- FIN TITRE ANIMAUX--> 

<hr class="featurette-divider">

<!--AFFICHAGE ANIMAUX -->
<section id="animaux">
        <div class="border p-5 m-5">
            <h3 class="text-center mb-3">ANIMAUX</h3>
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" style="text-align:center;"></th>
                            <th scope="col" style="text-align:center;">logo</th>
                            <th scope="col" style="text-align:center;">Titre 1</th>
                            <th scope="col" style="text-align:center;">titre 2</th>
                            <th scope="col" style="text-align:center;">titre slide</th>
                            <th scope="col" style="text-align:center;">Alt</th>
                            <th scope="col" style="text-align:center;">Modif</th>
                            <th scope="col" style="text-align:center;">Sup</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($animaux as $animauxs) : ?>
                        <tr>
                            <th scope="row">
                            <td style="text-align:center;"><img style="height:65px;" src="../uploads/<?= $animauxs["image_ani"]; ?>"></td>
                            <td style="text-align:center;"><?= $animauxs["titre1_ani"]?></td>
                            <td style="text-align:center;"><p><?= $animauxs["titre2_ani"]?></p></td>
                            <td style="text-align:center;"><p><?= $animauxs["titre_slide_ani"]?></p></td>
                            <td style="text-align:center;"><p><?= $animauxs["alt_ani"];?></p></td>
                            <td style="text-align:center;">
                            <a class="btn btn-primary" href="crud/update_animaux.php?id=<?= $animauxs["id"]; ?>"><i class="fa fa-pencil-alt" aria-hidden="true"></i></a>
                            </td>
                            <td style="text-align:center;">
                                <form method="post" action="crud/delete_animaux.php" onsubmit="return confirm('Est vous sûre de vouloir Sup cet article? ');">
                                <input type="hidden" name="id" value="<?= $animauxs["id"]; ?>">
                                <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></i></button>
                                </form>
                                </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            
        <!-- ADMIN ANIMAUX -->
        
            <div class="bg-light p-5 m-5">
                <form method="POST" action="admin_design.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Image</label>
                        <input type="file" name="image_ani" class="form-control-file">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Titre 1</label>
                        <input type="text" name="titre1_ani" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Titre 2</label>
                        <input type="text" name="titre2_ani" class="form-control"required>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Titre slide</label>
                        <input type="text" name="titre_slide_ani" class="form-control"required>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Description de l'image</label>
                        <input type="text" name="alt_ani" class="form-control"required>
                    </div>
                        <div class="d-flex justify-content-center">
                        <button class="btn btn-primary mt-2 " type="submit">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
</section>
    <!-- FIN ANIMAUX -->

<?php } ?>
</body>
</html>