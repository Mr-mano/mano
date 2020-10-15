<?php
session_start();
require_once __DIR__ . "/../../model/database.php";



$id = (isset($_GET['id']) ? $_GET['id'] : 1);
$web_design_id= getById($id, 'web_design');

if(isset($_POST['id']) && isset($_POST['titre_1']) && isset($_POST['titre_2']) && isset($_POST['titre_slide']) && isset($_POST['alt'])){


            $id = $_POST['id'];
            $titre_1 = $_POST['titre_1'];
            $titre_2 = $_POST['titre_2'];
            $titre_slide = $_POST['titre_slide'];
            $alt = $_POST['alt'];
            
            
            $errcode = updateEntity("web_design", $id, ['titre_1' => $titre_1, 'titre_2' => $titre_2, 'titre_slide' => $titre_slide, 'alt' => $alt]);

            if ($errcode) {
                header("Location: ../admin_design.php?errcode=" . $errcode);
            } else {
                header("Location: ../admin_design.php#web_design");
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
<section class="page-section">
    <div class="container bg-light p-5 my-5">
            <form method="POST" action="update_web_design.php" enctype="multipart/form-data">
            <div class="form-group">
                        <div class="d-flex align-items-center">
                            <img style="height:75px;" src="../../uploads/<?= $web_design_id["image"]; ?>" alt="">
                            <a class="btn btn-primary  mx-5" href="update_web_design_img.php?id=<?= $web_design_id["id"]; ?>"> Modifier l'image</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Titre 1</label>
                        <input type="text" name="titre_1" class="form-control" value="<?= $web_design_id["titre_1"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Titre 2</label>
                        <input type="text" name="titre_2" class="form-control" value="<?= $web_design_id["titre_2"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Titre slide</label>
                        <input type="text" name="titre_slide" class="form-control" value="<?= $web_design_id["titre_slide"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Description image</label>
                        <input type="text" name="alt" class="form-control" value="<?= $web_design_id["alt"]; ?>">
                    </div>
                    <div class="d-flex justify-content-center">
                    <div class="d-flex justify-content-center">
                            <input type="hidden" name="id" value="<?= $web_design_id["id"]; ?>">
                            <button class="btn btn-primary mt-2 mx-2" value="<?= $web_design_id["id"]; ?>" type="submit" id="btn1"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Modifier</button>
                        </div>
                        <div class="d-flex justify-content-center mt-2 mx-2">
                            <a type="button" class="btn btn-success" href="../admin_design.php#web_design" role="button">Annuler</a>
                        </div>
                    </div>
            </form>
    </div>    
</section>
        
        
</main>
</body>	
<!-- FIN SESSION-->
<?php } ?>
</html>