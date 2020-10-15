<?php
session_start();
require_once __DIR__ . "/../model/database.php";
require_once __DIR__ . "/crud/insert_titre_web.php";
require_once __DIR__ . "/crud/insert_creation_site.php";

$titre_web = getAllEntities("titre_web");
$creation_site = getAllEntities("creation_site");

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
        <h2 style="color:#e9492a;">PAGE WEB</h2>
    </div>
</section>

<!-- TITRE WEB-->
<section id="titre_web">
    <div class="border p-5 m-5">
            <h3 class="text-center mb-3">TITRE PAGE CREATION WEB</h3>
            <?php if(count($titre_web) > 0) : ?>
            <table class="table" >
                <thead class="thead-light">
                    <tr>
                        <th scope="col" style="text-align:center;"></th>
                        <th scope="col" style="text-align:center;">Titre</th>
                        <th scope="col" style="text-align:center;">Ville</th>
                        <th scope="col" style="text-align:center;">Texte</th>
                        <th scope="col" style="text-align:center;">Modif</th>
                        <th scope="col" style="text-align:center;">Sup</th>
                    </tr>
            </thead>
            
            <tbody>
                <?php foreach ($titre_web as $titre_webs) : ?>
                <tr>
                    <th scope="row">
                    <td style="text-align:center;vertical-align: center;"><?= $titre_webs["titre_web"]?></td>
                    <td style="text-align:center;vertical-align: center;"><?= $titre_webs["ville_web"]?></p></td>
                    <td style="text-align:center;vertical-align: center;"><?= $titre_webs["txt_web"]?></p></td>
                    <td style="text-align:center;vertical-align: center;">
                        <form method="post" action="crud/update_titre_web.php">
                        <input type="hidden" name="id" value="<?= $titre_webs["id"]; ?>">
                        <button class="btn btn-primary"><i class="fa fa-pencil-alt" aria-hidden="true"></i></button>
                        </form>
                        </td>
                    <td style="text-align:center;">
                        <form method="post" action="crud/delete_titre_web.php" onsubmit="return confirm('Est vous sûre de vouloir Sup cet article? ');">
                        <input type="hidden" name="id" value="<?= $titre_webs["id"]; ?>">
                        <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
                        </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
            <?php endif; ?>
            <!-- ADMIN TITRE WEB-->   
            <?php if(count($titre_web ) >= 1) :?>

            <?php elseif(count($titre_web ) == 0) :?>
                <div class="bg-light p-5 m-5">
                    <form method="POST" action="admin_web.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Titre </label>
                            <input type="text" name="titre_web" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Ville</label>
                            <input type="text" name="ville_web" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Texte</label>
                            <textarea rows="10" type="text" name="txt_web" class="form-control textarea"></textarea>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-primary mt-2 " type="submit">Envoyer</button>
                        </div>
                    </form>
                </div>
            <?php endif; ?>
        </div>
</section>
<!-- FIN TITRE WEB-->

<hr class="featurette-divider">

<!--AFFICHAGE CREATION SITE WEB -->
<section id="creation_web">
        <div class="border p-5 m-5">
            <h3 class="text-center mb-3">CREATION SITE WEB</h3>
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" style="text-align:center;"></th>
                            <th scope="col" style="text-align:center;">image</th>
                            <th scope="col" style="text-align:center;">Titre</th>
                            <th scope="col" style="text-align:center;">Libelle</th>
                            <th scope="col" style="text-align:center;">Texte</th>
                            <th scope="col" style="text-align:center;">date</th>
                            <th scope="col" style="text-align:center;">Modif</th>

                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($creation_site as $creation_sites) : ?>
                        <tr>
                            <th scope="row">
                                <td style="text-align:center;"><img style="height:65px;" src="../uploads/<?= $creation_sites["image"]; ?>"></td>
                                <td style="text-align:center;"><?= $creation_sites["titre"]?></td>
                                <td style="text-align:center;"><p><?= $creation_sites["libelle"]?></p></td>
                                <td style="text-align:center;"><p><?= $creation_sites["txt"]?></p></td>
                                <td style="text-align:center;"><p><?= $creation_sites["date_creation"];?></p></td>
                                <td style="text-align:center;">
                                <a class="btn btn-primary" href="crud/update_creation_site.php?id=<?= $creation_sites["id"]; ?>"><i class="fa fa-pencil-alt" aria-hidden="true"></i></a>
                                </td>
                            </th>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            
        <!-- ADMIN CREATION SITE WEB -->
        
            <div class="bg-light p-5 m-5">
                <form method="POST" action="admin_web.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Image 900 x 600</label>
                        <input type="file" name="image" class="form-control-file">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Titre</label>
                        <input type="text" name="titre" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Libelle</label>
                        <input type="text" name="libelle" class="form-control"required>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Texte</label>
                        <textarea rows="10" type="text" name="txt" class="form-control textarea" required></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Description de l'image</label>
                        <input type="text" name="alt" class="form-control"required>
                    </div>
                    <div class="form-group">
                    <input type="hidden" name="date_creation" value="<?= date("d-m-Y à H:i:s"); ?>">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-primary mt-2 " type="submit">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
</section>
    <!-- FIN CREATION SITE WEB -->
    

<?php } ?>
</body>
</html>