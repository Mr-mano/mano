<?php
session_start();
require_once __DIR__ . "/../../model/database.php";

$id = (isset($_GET['id']) ? $_GET["id"] : 1); 
$web_design_id= getById($id, 'web_design' );


            if(isset($_POST['id']) && isset($_FILES['image']['name'])){

                move_uploaded_file($_FILES['image']['tmp_name'], '../../uploads/'.basename($_FILES['image']['name']));
                
                $id = $_POST['id'];
                $image = $_FILES['image'];
            
            

                updateEntity("web_design", $id, [ 'image' => $image['name']])
                /*or die(print_r([$id, $image]))*/;
                {
                    header("Location: update_web_design.php?id=" . $id);
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


                <form method="POST" action="update_web_design_img.php" enctype="multipart/form-data">
                    <div class="container bg-light p-5 my-5">
                            <div class="form-group">
                                <div class="text-align-center">
                                    <label for="exampleFormControlFile1"></label>
                                    <input type="file" name="image" class="form-control-file"  value="<?= $web_design_id["image"]; ?>"></input>
                                </div>
                                <div class="d-flex justify-content-center mt-5 ">
                                    <input type="hidden" name="id" value="<?= $web_design_id["id"]; ?>">
                                    <button class="btn btn-primary mt-2 mx-2" type="submit" value="<?= $web_design_id["id"]; ?>">Valider</button>
                                    <div class="d-flex justify-content-center mt-2 mx-2">
                            <a type="button" class="btn btn-success" href="update_imageiste.php?id=<?= $web_design_id["id"]; ?>" role="button">Annuler</a>
                        </div>
                                </div>
                                
                    </div>
                </form>


</main>
</body>	
<?php } ?> 
</html>