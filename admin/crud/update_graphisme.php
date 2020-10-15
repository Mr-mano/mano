<?php
session_start();
require_once __DIR__ . "/../../model/database.php";



$id = (isset($_GET['id']) ? $_GET['id'] : 1);
$graphisme_id = getById($id, 'graphisme');

if(isset($_POST['id']) && isset($_POST['titre1_graph']) && isset($_POST['titre2_graph']) && isset($_POST['titre_slide_graph']) && isset($_POST['alt_graph'])){


            $id = $_POST['id'];
            $titre1_graph = $_POST['titre1_graph'];
            $titre2_graph = $_POST['titre2_graph'];
            $titre_slide_graph = $_POST['titre_slide_graph'];
            $alt_graph = $_POST['alt_graph'];
            
            
            $errcode = updateEntity("graphisme", $id, ['titre1_graph' => $titre1_graph, 'titre2_graph' => $titre2_graph, 'titre_slide_graph' => $titre_slide_graph, 'alt_graph' => $alt_graph]);

            if ($errcode) {
                header("Location: ../admin_design.php?errcode=" . $errcode);
            } else {
                header("Location: ../admin_design.php#graphisme_img");
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
            <form method="POST" action="update_graphisme.php" enctype="multipart/form-data">
            <div class="form-group">
                        <div class="d-flex align-items-center">
                            <img style="height:75px;" src="../../uploads/<?= $graphisme_id["image_graph"]; ?>" alt_graph="">
                            <a class="btn btn-primary  mx-5" href="update_graphisme_img.php?id=<?= $graphisme_id["id"]; ?>"> Modifier l'image</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Titre 1</label>
                        <input type="text" name="titre1_graph" class="form-control" value="<?= $graphisme_id["titre1_graph"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Titre 2</label>
                        <input type="text" name="titre2_graph" class="form-control" value="<?= $graphisme_id["titre2_graph"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Titre slide</label>
                        <input type="text" name="titre_slide_graph" class="form-control" value="<?= $graphisme_id["titre_slide_graph"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Description image</label>
                        <input type="text" name="alt_graph" class="form-control" value="<?= $graphisme_id["alt_graph"]; ?>">
                    </div>
                    <div class="d-flex justify-content-center">
                    <div class="d-flex justify-content-center">
                            <input type="hidden" name="id" value="<?= $graphisme_id["id"]; ?>">
                            <button class="btn btn-primary mt-2 mx-2" value="<?= $graphisme_id["id"]; ?>" type="submit" id="btn1"><i class="fa fa-pencil-alt_graph" aria-hidden="true"></i> Modifier</button>
                        </div>
                        <div class="d-flex justify-content-center mt-2 mx-2">
                            <a type="button" class="btn btn-success" href="../admin_design.php#graphisme_img" role="button">Annuler</a>
                        </div>
                    </div>
            </form>
    </div>    

        
        
</main>
</body>	
<!-- FIN SESSION-->
<?php } ?>
</html>