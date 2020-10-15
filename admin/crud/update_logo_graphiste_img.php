<?php
session_start();
require_once __DIR__ . "/../../model/database.php";

$id = (isset($_GET['id']) ? $_GET["id"] : 1) or (isset($_POST['id'])); 
$grahiste_id = getById($id, 'logo_graphiste');


            if(isset($_POST['id']) && isset($_FILES['logo_graph']['name'])){

                move_uploaded_file($_FILES['logo_graph']['tmp_name'], '../../uploads/'.basename($_FILES['logo_graph']['name']));
                
                $id = $_POST['id'];
                $logo_graph = $_FILES['logo_graph'];
            
            

                updateEntity("logo_graphiste", $id, [ 'logo_graph' => $logo_graph['name']])
                /*or die(print_r([$id, $logo_graph]))*/;
                
                {
                    header("Location: update_logo_graphiste.php?id=" . $id);
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


                <form method="POST" action="update_logo_graphiste_img.php" enctype="multipart/form-data">
                    <div class="container bg-light p-5 my-5">
                            <div class="form-group">
                                <div class="text-align-center">
                                    <label for="exampleFormControlFile1"></label>
                                    <input type="file" name="logo_graph" class="form-control-file"  value="<?= $grahiste_id["logo_graph"]; ?>"></input>
                                </div>
                                <div class="d-flex justify-content-center mt-5 ">
                                    <input type="hidden" name="id" value="<?= $grahiste_id["id"]; ?>">
                                    <button class="btn btn-primary mt-2 mx-2" type="submit" value="<?= $grahiste_id["id"]; ?>">Valider</button>
                                    <div class="d-flex justify-content-center mt-2 mx-2">
                            <a type="button" class="btn btn-success" href="update_logo_graphiste.php?id=<?= $grahiste_id["id"]; ?>" role="button">Annuler</a>
                        </div>
                                </div>
                                
                    </div>
                </form>


</main>
</body>	
<?php } ?> 
</html>