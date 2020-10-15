<?php
session_start();
require_once __DIR__ . "/../../model/database.php";

$id = (isset($_GET['id']) ? $_GET["id"] : 1) or (isset($_POST['id'])); 
$portfolio_id = getById($id, 'portfolio_accueil');


            if(isset($_POST['id']) && isset($_FILES['image_1']['name'])){

                move_uploaded_file($_FILES['image_1']['tmp_name'], '../../assets/img/portfolio/fullsize/'.basename($_FILES['image_1']['name']));
                
                $id = $_POST['id'];
                $image_1 = $_FILES['image_1'];
            
            

                updateEntity("portfolio_accueil", $id, [ 'image_1' => $image_1['name']])
                /*or die(print_r([$id, $image_1]))*/;
                {
                    header("Location: update_portfolio_accueil.php?id=" . $id);
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
                <form method="POST" action="update_portfolio_accueil_img_1.php" enctype="multipart/form-data">
                    <div class="container bg-light p-5 my-5">
                            <div class="form-group">
                                <div class="text-align-center">
                                    <label for="exampleFormControlFile1"></label>
                                    <input type="file" name="image_1" class="form-control-file"  value="<?= $portfolio_id["image_1"]; ?>"></input>
                                </div>
                                <div class="d-flex justify-content-center mt-5 ">
                                    <input type="hidden" name="id" value="<?= $portfolio_id["id"]; ?>">
                                    <button class="btn btn-primary mt-2 mx-2" type="submit" value="<?= $portfolio_id["id"]; ?>">Valider</button>
                                    <div class="d-flex justify-content-center mt-2 mx-2">
                            <a type="button" class="btn btn-success" href="update_portfolio_accueil.php?id=<?= $portfolio_id["id"]; ?>" role="button">Annuler</a>
                        </div>
                                </div>
                                
                    </div>
                </form>
        </section>

</main>
</body>	
<?php } ?> 
</html>