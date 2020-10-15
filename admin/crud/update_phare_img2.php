<?php
session_start();
require_once __DIR__ . "/../../model/database.php";

$id = (isset($_GET['id']) ? $_GET["id"] : 1); 
$phare_id = getById($id, 'phare');


            if(isset($_POST['id']) && isset($_FILES['image2_ph']['name'])){

                move_uploaded_file($_FILES['image2_ph']['tmp_name'], '../../uploads/'.basename($_FILES['image2_ph']['name']));
                
                $id = $_POST['id'];
                $image2_ph = $_FILES['image2_ph'];
            
            

                updateEntity("phare", $id, [ 'image2_ph' => $image2_ph['name']]);
                {
                    header("Location: update_phare.php?id=" . $id);
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
                <form method="POST" action="update_phare_img2.php" enctype="multipart/form-data">
                    <div class="container bg-light p-5 my-5">
                            <div class="form-group">
                                <div class="text-align-center">
                                    <label for="exampleFormControlFile1"></label>
                                    <input type="file" name="image2_ph" class="form-control-file"  value="<?= $phare_id["image2_ph"]; ?>"></input>
                                </div>
                                <div class="d-flex justify-content-center mt-5 ">
                                    <input type="hidden" name="id" value="<?= $phare_id["id"]; ?>">
                                    <button class="btn btn-primary mt-2 mx-2" type="submit" value="<?= $phare_id["id"]; ?>">Valider</button>
                                    <div class="d-flex justify-content-center mt-2 mx-2">
                            <a type="button" class="btn btn-success" href="update_phare.php?id=<?= $phare_id["id"]; ?>" role="button">Annuler</a>
                        </div>
                                </div>
                                
                    </div>
                </form>
        </section>

</main>
</body>	
<?php } ?> 
</html>