<?php
session_start();
require_once __DIR__ . "/../../model/database.php";

$id = (isset($_GET['id']) ? $_GET['id'] : 1);
$logo_graphiste = getById($id, 'logo_graphiste');

if(isset($_POST['libelle_graph']) && isset($_POST['txt_graph']) && isset($_POST['alt_graph'])){


            $id = $_POST['id'];
            $libelle_graph = $_POST['libelle_graph'];
            $txt_graph = $_POST['txt_graph'];
            $alt_graph = $_POST['alt_graph'];
            
            
            $errcode = updateEntity("logo_graphiste", $id, ['libelle_graph' => $libelle_graph, 'txt_graph' => $txt_graph, 'alt_graph' => $alt_graph]);

            if ($errcode) {
                header("Location: update_logo_graphiste.php?error=" . $errcode);
            } else {
                header("Location: ../crud/update_logo_graphiste.php?sucess");
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
        <div class="container p-1  text-center">
            <?php
                if (isset($_GET['error'])) {
                        echo '<p class="m-0">Une erreur c\'est produite.</p>';
                } else if (isset($_GET['sucess'])){
                    echo '<p style="color:green; font-size:1.2rem;">Modification validée.</p>';
                }

                ?>
        </div>

    <div class="container bg-light p-5 my-5">
    
            <form method="POST" action="update_logo_graphiste.php" enctype="multipart/form-data">
            <div class="form-group">
                        <div class="d-flex align-items-center">
                            <img style="height:75px;" src="../../uploads/<?= $logo_graphiste["logo_graph"]; ?>" alt_graph="">
                            <a class="btn btn-primary  mx-5" href="update_logo_graphiste_img.php?id=<?= $logo_graphiste["id"]; ?>"> Modifier l'image</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Techno</label>
                        <input type="text" name="libelle_graph" class="form-control" value="<?= $logo_graphiste["libelle_graph"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Texte</label>
                        <input type="text" name="txt_graph" class="form-control" value="<?= $logo_graphiste["txt_graph"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Description image</label>
                        <input type="text" name="alt_graph" class="form-control" value="<?= $logo_graphiste["alt_graph"]; ?>">
                    </div>
                    <div class="d-flex justify-content-center">
                    <div class="d-flex justify-content-center">
                            <input type="hidden" name="id" value="<?= $logo_graphiste["id"]; ?>">
                            <button class="btn btn-primary mt-2 mx-2" value="<?= $logo_graphiste["id"]; ?>" type="submit" id="btn1"><i class="fa fa-pencil-alt_graph" aria-hidden="true"></i> Modifier</button>
                        </div>
                        <div class="d-flex justify-content-center mt-2 mx-2">
                            <a type="button" class="btn btn-success" href="../admin.php#logo_graphiste" role="button">Retour</a>
                        </div>
                    </div>
            </form>
    </div>    
        
        
    </section>
</body>	
<!-- FIN SESSION-->
<?php } ?>
</html>