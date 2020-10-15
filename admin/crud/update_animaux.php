<?php
session_start();
require_once __DIR__ . "/../../model/database.php";



$id = (isset($_GET['id']) ? $_GET['id'] : 1);
$animaux_id = getById($id, 'animaux');

if(isset($_POST['id']) && isset($_POST['titre1_ani']) && isset($_POST['titre2_ani']) && isset($_POST['titre_slide_ani']) && isset($_POST['alt_ani'])){

    
            $id = $_POST['id'];
            $titre1_ani = $_POST['titre1_ani'];
            $titre2_ani = $_POST['titre2_ani'];
            $titre_slide_ani = $_POST['titre_slide_ani'];
            $alt_ani = $_POST['alt_ani'];
            
            
            $errcode = updateEntity("animaux", $id, ['titre1_ani' => $titre1_ani, 'titre2_ani' => $titre2_ani, 'titre_slide_ani' => $titre_slide_ani, 'alt_ani' => $alt_ani]);

            if ($errcode) {
                header("Location: ../admin_design.php?errcode=" . $errcode);
            } else {
                header("Location: ../admin_design.php#animaux");
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

    <div class="container bg-light p-5 my-5">
            <form method="POST" action="update_animaux.php" enctype="multipart/form-data">
            <div class="form-group">
                        <div class="d-flex align-items-center">
                            <img style="height:75px;" src="../../uploads/<?= $animaux_id["image_ani"]; ?>" alt_ani="">
                            <a class="btn btn-primary  mx-5" href="update_animaux_img.php?id=<?= $animaux_id["id"]; ?>"> Modifier l'image</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Titre 1</label>
                        <input type="text" name="titre1_ani" class="form-control" value="<?= $animaux_id["titre1_ani"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Titre 2</label>
                        <input type="text" name="titre2_ani" class="form-control" value="<?= $animaux_id["titre2_ani"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Titre slide</label>
                        <input type="text" name="titre_slide_ani" class="form-control" value="<?= $animaux_id["titre_slide_ani"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Description image</label>
                        <input type="text" name="alt_ani" class="form-control" value="<?= $animaux_id["alt_ani"]; ?>">
                    </div>
                    <div class="d-flex justify-content-center">
                    <div class="d-flex justify-content-center">
                            <input type="hidden" name="id" value="<?= $animaux_id["id"]; ?>">
                            <button class="btn btn-primary mt-2 mx-2" value="<?= $animaux_id["id"]; ?>" type="submit" id="btn1"><i class="fa fa-pencil-alt_ani" aria-hidden="true"></i> Modifier</button>
                        </div>
                        <div class="d-flex justify-content-center mt-2 mx-2">
                            <a type="button" class="btn btn-success" href="../admin_design.php#animaux" role="button">Annuler</a>
                        </div>
                    </div>
            </form>
    </div>    

        
        
</main>
</body>	
<!-- FIN SESSION-->
<?php } ?>
</html>