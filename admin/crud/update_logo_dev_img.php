<?php
session_start();
require_once __DIR__ . "/../../model/database.php";

$id = (isset($_GET['id']) ? $_GET["id"] : 1) or (isset($_POST['id'])); 
$logo_id = getById($id, 'logo_dev');


            if(isset($_POST['id']) && isset($_FILES['logo']['name'])){

                move_uploaded_file($_FILES['logo']['tmp_name'], '../../uploads/'.basename($_FILES['logo']['name']));
                
                $id = $_POST['id'];
                $logo = $_FILES['logo'];
            
            

                $errcode = updateEntity("logo_dev", $id, [ 'logo' => $logo['name']])
                /*or die(print_r([$id, $logo]))*/;
                if ($errcode) {
                    header("Location: admin.php?errcode=" . $errcode);
                } else {
                    header("Location: update_logo_dev.php?id=" . $id);
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


                <form method="POST" action="update_logo_dev_img.php" enctype="multipart/form-data">
                    <div class="container bg-light p-5 my-5">
                            <div class="form-group">
                                <div class="text-align-center">
                                    <label for="exampleFormControlFile1"></label>
                                    <input type="file" name="logo" class="form-control-file"  value="<?= $logo_id["logo"]; ?>"></input>
                                </div>
                                <div class="d-flex justify-content-center mt-5 ">
                                    <input type="hidden" name="id" value="<?= $logo_id["id"]; ?>">
                                    <button class="btn btn-primary mt-2 mx-2" type="submit" value="<?= $logo_id["id"]; ?>">Valider</button>
                                    <div class="d-flex justify-content-center mt-2 mx-2">
                            <a type="button" class="btn btn-success" href="update_logo_dev.php?id=<?= $logo_id["id"]; ?>" role="button">Annuler</a>
                        </div>
                                </div>
                                
                    </div>
                </form>


</main>
</body>	
<?php } ?> 
</html>