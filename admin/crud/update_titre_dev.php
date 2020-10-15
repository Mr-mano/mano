<?php
session_start();
require_once __DIR__ . "/../../model/database.php";
$titre_dev = getAllEntities("titre_dev");

if(isset($_POST['id']) && isset($_POST['titre']) && isset($_POST['ville']) && isset($_POST['txt'])){

    $id = $_POST['id'];
    $titre = $_POST['titre'];
    $ville = $_POST['ville'];
    $txt = $_POST['txt'];

    $errcode = updateEntity("titre_dev", $id, ['titre' => $titre, 'ville' => $ville, 'txt' => $txt]);
    
    
        if ($errcode) {
            header("Location: ../admin.php?errcode=" . $errcode);
        } else {
            header("Location: ../admin.php#titre_dev");
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
<?php foreach ($titre_dev as $titre_devs) : ?>
    <div class="container bg-light p-5 my-5">
            <form method="POST" action="update_titre_dev.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Titre</label>
                        <input type="text" name="titre" class="form-control" value="<?= $titre_devs["titre"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Ville</label>
                        <input type="text" name="ville" class="form-control" value="<?= $titre_devs["ville"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Texte</label>
                        <textarea rows="15" type="text" name="txt" class="form-control"><?= $titre_devs["txt"]; ?></textarea>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="d-flex justify-content-center">
                            <input type="hidden" name="id" value="<?= $titre_devs["id"]; ?>">
                            <button class="btn btn-primary mt-2 mx-2" value="<?= $titre_devs["id"]; ?>" type="submit" id="btn1"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Modifier</button>
                        </div>
                        <div class="d-flex justify-content-center mt-2 mx-2">
                            <a type="button" class="btn btn-success" href="../admin.php" role="button">Annuler</a>
                        </div>
                    </div>
            </form>
    </div>    
        <?php endforeach; ?>
        
        
</main>
</body>	
<!-- FIN SESSION-->
<?php } ?>
</html>