<?php
session_start();
require_once __DIR__ . "/../../model/database.php";

$design = getAllEntities('titre_design');

if(isset($_POST['id']) && isset($_POST['titre']) && isset($_POST['txt'])){

    $id = $_POST['id'];
    $titre = $_POST['titre'];
    $txt = $_POST['txt'];
            
            
    updateEntity("titre_design", $id, ['titre' => $titre, 'txt' => $txt]);

            {
                header("Location: ../admin_design.php#design");
                exit();
            }
    
        }
    

?>
<?php require_once __DIR__ . "/layout/header.php"; ?>

<?php if(!isset($_SESSION['connect'])){ 
    ?>
    <!-- si l'administrateur n'est pas connecté affiche ça -->
        
<?php require_once __DIR__ . "/layout/erreur404.php"; ?>

    <?php } else { ?>  
<?php foreach ($design as $designs) : ?>
    <div class="container bg-light p-5 my-5">
            <form method="POST" action="update_titre_design.php" enctype="multipart/form-data">
            <div class="form-group">
                        <div class="d-flex align-items-center">
                            <img style="height:75px;" src="../../uploads/<?= $designs["logo_ai"]; ?>" alt="">
                            <a class="btn btn-primary  mx-5" href="update_titre_design_logo_ai.php?id=<?= $designs["id"]; ?>"> Modifier l'image</a>
                        </div>
                        <div class="d-flex align-items-center">
                            <img style="height:75px;" src="../../uploads/<?= $designs["logo_ps"]; ?>" alt="">
                            <a class="btn btn-primary  mx-5" href="update_titre_design_logo_ps.php?id=<?= $designs["id"]; ?>"> Modifier l'image</a>
                        </div>
                        <div class="d-flex align-items-center">
                            <img style="height:75px;" src="../../uploads/<?= $designs["logo_xd"]; ?>" alt="">
                            <a class="btn btn-primary  mx-5" href="update_titre_design_logo_xd.php?id=<?= $designs["id"]; ?>"> Modifier l'image</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Titre</label>
                        <input type="text" name="titre" class="form-control" value="<?= $designs["titre"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Texte</label>
                        <textarea rows="15" type="text" name="txt" class="form-control textarea"><?= $designs["txt"]; ?></textarea>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="d-flex justify-content-center">
                            <input type="hidden" name="id" value="<?= $designs["id"]; ?>">
                            <button class="btn btn-primary mt-2 mx-2" value="<?= $designs["id"]; ?>" type="submit"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Modifier</button>
                        </div>
                        <div class="d-flex justify-content-center mt-2 mx-2">
                            <a type="button" class="btn btn-success" href="../admin_design.php#design" role="button">Annuler</a>
                        </div>
                    </div>
            </form>
    </div>    
    <?php endforeach; ?>
        
        
</main>
</body>	
<!-- FIN SESSION-->
<?php } ?>
</html>