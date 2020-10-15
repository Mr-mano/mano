<?php
session_start();
require_once __DIR__ . "/../../model/database.php";

$id = (isset($_GET['id']) ? $_GET["id"] : 1) or (isset($_POST['id'])); 
$image_id = getById($id, 'creation_site');


            if(isset($_POST['id']) && isset($_POST['alt']) && isset($_FILES['image']['name'])){

                move_uploaded_file($_FILES['image']['tmp_name'], '../../uploads/'.basename($_FILES['image']['name']));
                
                $id = $_POST['id'];
                $image = $_FILES['image'];
                $alt = $_POST['alt'];
            
            

                updateEntity("creation_site", $id, [ 'image' => $image['name'], 'alt' => $alt])
                /*or die(print_r([$id, $image]))*/;
                {
                    header("Location: update_creation_site.php?id=" . $id);
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


                <form method="POST" action="update_creation_site_img.php" enctype="multipart/form-data">
                    <div class="container bg-light p-5 my-5">
                            <div class="form-group">
                                <div class="text-align-center">
                                    <label for="exampleFormControlFile1"></label>
                                    <input type="file" name="image" class="form-control-file"  value="<?= $image_id["image"]; ?>"></input>
                                </div>
                                <div class="text-align-center">
                                    <label for="exampleFormControlFile1"></label>
                                    <input type="text" name="alt" class="form-control-file"  value="<?= $image_id["alt"]; ?>"></input>
                                </div>
                                <div class="d-flex justify-content-center mt-5 ">
                                    <input type="hidden" name="id" value="<?= $image_id["id"]; ?>">
                                    <button class="btn btn-primary mt-2 mx-2" type="submit" value="<?= $image_id["id"]; ?>">Valider</button>
                                    <div class="d-flex justify-content-center mt-2 mx-2">
                            <a type="button" class="btn btn-success" href="update_creation_site.php?id=<?= $image_id["id"]; ?>" role="button">Annuler</a>
                        </div>
                                </div>
                                
                    </div>
                </form>


</main>
</body>	
<?php } ?> 
</html>