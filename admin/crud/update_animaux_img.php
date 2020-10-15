<?php
session_start();
require_once __DIR__ . "/../../model/database.php";

$id = (isset($_GET['id']) ? $_GET["id"] : 1) or (isset($_POST['id'])); 
$animaux_id = getById($id, 'animaux');


            if(isset($_POST['id']) && isset($_FILES['image_ani']['name'])){

                move_uploaded_file($_FILES['image_ani']['tmp_name'], '../../uploads/'.basename($_FILES['image_ani']['name']));
                
                $id = $_POST['id'];
                $image_ani = $_FILES['image_ani'];
            
            

                updateEntity("animaux", $id, [ 'image_ani' => $image_ani['name']])
                /*or die(print_r([$id, $image_ani]))*/;
                {
                    header("Location: update_animaux.php?id=" . $id);
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


                <form method="POST" action="update_animaux_img.php" enctype="multipart/form-data">
                    <div class="container bg-light p-5 my-5">
                            <div class="form-group">
                                <div class="text-align-center">
                                    <label for="exampleFormControlFile1"></label>
                                    <input type="file" name="image_ani" class="form-control-file"  value="<?= $animaux_id["image_ani"]; ?>"></input>
                                </div>
                                <div class="d-flex justify-content-center mt-5 ">
                                    <input type="hidden" name="id" value="<?= $animaux_id["id"]; ?>">
                                    <button class="btn btn-primary mt-2 mx-2" type="submit" value="<?= $animaux_id["id"]; ?>">Valider</button>
                                    <div class="d-flex justify-content-center mt-2 mx-2">
                            <a type="button" class="btn btn-success" href="update_graphisme.php?id=<?= $animaux_id["id"]; ?>" role="button">Annuler</a>
                        </div>
                                </div>
                                
                    </div>
                </form>


</main>
</body>	
<?php } ?> 
</html>