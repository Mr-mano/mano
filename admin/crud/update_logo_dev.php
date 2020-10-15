<?php
session_start();
require_once __DIR__ . "/../../model/database.php";
$id = (isset($_GET['id']) ? $_GET['id'] : 1);
$logo_dev = getById($id, 'logo_dev');


if(isset($_POST['libelle']) && isset($_POST['txt']) && isset($_POST['alt'])){


            $id = $_POST['id'];
            $libelle = $_POST['libelle'];
            $txt = $_POST['txt'];
            $alt = $_POST['alt'];
            
            
            $errcode = updateEntity("logo_dev", $id, ['libelle' => $libelle, 'txt' => $txt, 'alt' => $alt]);

            if ($errcode) {
                header("Location: ../admin.php?errcode=" . $errcode);
            } else {
                header("Location: ../crud/update_logo_dev.php?sucess");
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

        <div class="container bg-light p-5">
            <form method="POST" action="update_logo_dev.php" enctype="multipart/form-data">
            <div class="form-group">
                        <div class="d-flex align-items-center">
                            <img style="height:75px;" src="../../uploads/<?= $logo_dev["logo"]; ?>" alt="">
                            <a class="btn btn-primary  mx-5" href="update_logo_dev_img.php?id=<?= $logo_dev["id"]; ?>"> Modifier l'image</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Techno</label>
                        <input type="text" name="libelle" class="form-control" value="<?= $logo_dev["libelle"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Texte</label>
                        <input type="text" name="txt" class="form-control" value="<?= $logo_dev["txt"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Description image</label>
                        <input type="text" name="alt" class="form-control" value="<?= $logo_dev["alt"]; ?>">
                    </div>
                    <div class="d-flex justify-content-center">
                    <div class="d-flex justify-content-center">
                            <input type="hidden" name="id" value="<?= $logo_dev["id"]; ?>">
                            <button class="btn btn-primary mt-2 mx-2" value="<?= $logo_dev["id"]; ?>" type="submit" id="btn1"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Modifier</button>
                        </div>
                        <div class="d-flex justify-content-center mt-2 mx-2">
                            <a type="button" class="btn btn-success" href="../admin.php#logo_dev" role="button">Retour</a>
                        </div>
                    </div>
            </form>
        </div>        
    </section>
</body>	
<!-- FIN SESSION-->
<?php } ?>
</html>