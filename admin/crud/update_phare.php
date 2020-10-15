<?php
session_start();
require_once __DIR__ . "/../../model/database.php";



$id = (isset($_GET['id']) ? $_GET['id'] : 1);
$phare_id = getById($id, 'phare');

if(isset($_POST['id']) && isset($_POST['titre1_ph']) && isset($_POST['titre2_ph']) && isset($_POST['titre_slide_ph'])
&& isset($_POST['alt1_ph']) && isset($_POST['alt2_ph'])){

    
            $id = $_POST['id'];
            $titre1_ph = $_POST['titre1_ph'];
            $titre2_ph = $_POST['titre2_ph'];
            $titre_slide_ph = $_POST['titre_slide_ph'];
            $alt1_ph = $_POST['alt1_ph'];
            $alt2_ph = $_POST['alt2_ph'];
            
            
            $errcode = updateEntity("phare", $id, ['titre1_ph' => $titre1_ph, 'titre2_ph' => $titre2_ph,
            'titre_slide_ph' => $titre_slide_ph, 'alt1_ph' => $alt1_ph, 'alt2_ph' => $alt2_ph]);

            if ($errcode) {
                header("Location: ../admin_design.php?errcode=" . $errcode);
            } else {
                header("Location: ../admin_design.php#phare");
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
            <form method="POST" action="update_phare.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="d-flex align-items-center">
                            <img style="height:75px;" src="../../uploads/<?= $phare_id["image1_ph"]; ?>" alt="<?= $phare_id["alt1_ph"]; ?>">
                            <a class="btn btn-primary  mx-5" href="update_phare_img1.php?id=<?= $phare_id["id"]; ?>"> Modifier l'image</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="d-flex align-items-center">
                            <img style="height:75px;" src="../../uploads/<?= $phare_id["image2_ph"]; ?>" alt="<?= $phare_id["alt2_ph"]; ?>">
                            <a class="btn btn-primary  mx-5" href="update_phare_img2.php?id=<?= $phare_id["id"]; ?>"> Modifier l'image</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Titre 1</label>
                        <input type="text" name="titre1_ph" class="form-control" value="<?= $phare_id["titre1_ph"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Titre 2</label>
                        <input type="text" name="titre2_ph" class="form-control" value="<?= $phare_id["titre2_ph"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Titre slide</label>
                        <input type="text" name="titre_slide_ph" class="form-control" value="<?= $phare_id["titre_slide_ph"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Description image</label>
                        <input type="text" name="alt1_ph" class="form-control" value="<?= $phare_id["alt1_ph"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Description image</label>
                        <input type="text" name="alt2_ph" class="form-control" value="<?= $phare_id["alt2_ph"]; ?>">
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="d-flex justify-content-center">
                            <input type="hidden" name="id" value="<?= $phare_id["id"]; ?>">
                            <button class="btn btn-primary mt-2 mx-2" value="<?= $phare_id["id"]; ?>" type="submit" id="btn1"><i class="fa fa-pencil-alt1_ph" aria-hidden="true"></i> Modifier</button>
                        </div>
                        <div class="d-flex justify-content-center mt-2 mx-2">
                            <a type="button" class="btn btn-success" href="../admin_design.php#phare" role="button">Annuler</a>
                        </div>
                    </div>
            </form>
    </div>    

        
        
</main>
</body>	
<!-- FIN SESSION-->
<?php } ?>
</html>