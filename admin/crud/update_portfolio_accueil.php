<?php
session_start();
require_once __DIR__ . "/../../model/database.php";
$id = (isset($_GET['id']) ? $_GET['id'] : 1);
$portfolio = getById($id, "portfolio_accueil");


if(isset($_POST['id']) && isset($_POST['titre_1']) && isset($_POST['titre_2']) && isset($_POST['titre_slide']) && isset($_POST['alt_1']) && isset($_POST['alt_2'])){

    $id = $_POST['id'];
    $titre_1 = $_POST['titre_1'];
    $titre_2 = $_POST['titre_2'];
    $titre_slide = $_POST['titre_slide'];
    $alt_1 = $_POST['alt_1'];
    $alt_2 = $_POST['alt_2'];
            
            
            updateEntity("portfolio_accueil", $id, ['titre_1' => $titre_1, 'titre_2' => $titre_2, 'titre_slide' => $titre_slide, 'alt_1' => $alt_1, 'alt_2' => $alt_2]);

            {
                header("Location: ../admin.php#portfolio");
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
            <form method="POST" action="update_portfolio_accueil.php" enctype="multipart/form-data">
            <div class="form-group">
                        <div class="d-flex align-items-center">
                            <img style="height:75px;" src="../../assets/img/portfolio/fullsize/<?= $portfolio["image_1"]; ?>">
                            <p class="mt-3">Taille : 900px</p>
                            <a class="btn btn-primary  mx-5" href="update_portfolio_accueil_img_1.php?id=<?= $portfolio["id"]; ?>"> Modifier l'image</a>
                        </div>
                        <div class="d-flex align-items-center">
                            <img style="height:75px;" src="../../assets/img/portfolio/thumbnails/<?= $portfolio["image_2"]; ?>">
                            <p class="mt-3">Taille: 600px</p>
                            <a class="btn btn-primary  mx-5" href="update_portfolio_accueil_img_2.php?id=<?= $portfolio["id"]; ?>"> Modifier l'image</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Titre 1</label>
                        <input type="text" name="titre_1" class="form-control" value="<?= $portfolio["titre_1"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Titre 2</label>
                        <input type="text" name="titre_2" class="form-control" value="<?= $portfolio["titre_2"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Titre slide</label>
                        <input type="text" name="titre_slide" class="form-control" value="<?= $portfolio["titre_slide"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Description image 900</label>
                        <input type="text" name="alt_1" class="form-control" value="<?= $portfolio["alt_1"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Description image 600</label>
                        <input type="text" name="alt_2" class="form-control" value="<?= $portfolio["alt_2"]; ?>">
                    </div>
                    <div class="d-flex justify-content-center">
                    <div class="d-flex justify-content-center">
                            <input type="hidden" name="id" value="<?= $portfolio["id"]; ?>">
                            <button class="btn btn-primary mt-2 mx-2" value="<?= $portfolio["id"]; ?>" type="submit" id="btn1"><i class="fa fa-pencil-titre_slide" aria-hidden="true"></i> Modifier</button>
                        </div>
                        <div class="d-flex justify-content-center mt-2 mx-2">
                            <a type="button" class="btn btn-success" href="../admin.php#portfolio" role="button">Annuler</a>
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