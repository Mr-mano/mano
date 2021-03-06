<?php
session_start();
require_once __DIR__ . "/../../model/database.php";

$id = (isset($_GET['id']) ? $_GET["id"] : 1) or (isset($_POST['id'])); 
$design_id = getById($id, 'titre_design');


            if(isset($_POST['id']) && isset($_FILES['logo_xd']['name'])){

                move_uploaded_file($_FILES['logo_xd']['tmp_name'], '../../uploads/'.basename($_FILES['logo_xd']['name']));
                       
                $id = $_POST['id'];
                $logo_xd = $_FILES['logo_xd'];
            
            

                updateEntity("titre_design", $id, [ 'logo_xd' => $logo_xd['name']]);
                
                {
                    header("Location: update_titre_design.php?id=" . $id);
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
                <form method="POST" action="update_titre_design_logo_xd.php" enctype="multipart/form-data">
                    <div class="container bg-light p-5 my-5">
                            <div class="form-group">
                                <div class="text-align-center">
                                    <label for="exampleFormControlFile1"></label>
                                    <input type="file" name="logo_xd" class="form-control-file"  value="<?= $design_id["logo_xd"]; ?>"></input>
                                </div>
                                <div class="d-flex justify-content-center mt-5 ">
                                    <input type="hidden" name="id" value="<?= $design_id["id"]; ?>">
                                    <button class="btn btn-primary mt-2 mx-2" type="submit" value="<?= $design_id["id"]; ?>">Valider</button>
                                    <div class="d-flex justify-content-center mt-2 mx-2">
                            <a type="button" class="btn btn-success" href="update_titre_design.php?id=<?= $design_id["id"]; ?>" role="button">Annuler</a>
                        </div>
                                </div>
                                
                    </div>
                </form>
    </section>

</main>
</body>	
<?php } ?> 
</html>