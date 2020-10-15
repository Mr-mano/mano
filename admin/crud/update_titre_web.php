<?php
session_start();
require_once __DIR__ . "/../../model/database.php";
$titre_web = getAllEntities("titre_web");

if(isset($_POST['id']) && isset($_POST['titre_web']) && isset($_POST['ville_web']) && isset($_POST['txt_web'])){

    $id = $_POST['id'];
    $titre_web = $_POST['titre_web'];
    $ville_web = $_POST['ville_web'];
    $txt_web = $_POST['txt_web'];

    $errcode = updateEntity("titre_web", $id, ['titre_web' => $titre_web, 'ville_web' => $ville_web, 'txt_web' => $txt_web]);
    
    
        if ($errcode) {
            header("Location: ../admin_web.php?errcode=" . $errcode);
        } else {
            header("Location: ../admin_web.php#titre_web");
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
<?php foreach ($titre_web as $titre_webs) : ?>
    <div class="container bg-light p-5 my-5">
            <form method="POST" action="update_titre_web.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="formGroupExampleInput">titre</label>
                        <input type="text" name="titre_web" class="form-control" value="<?= $titre_webs["titre_web"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">ville</label>
                        <input type="text" name="ville_web" class="form-control" value="<?= $titre_webs["ville_web"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Texte</label>
                        <textarea rows="10" type="text" name="txt_web" class="form-control textarea"><?= $titre_webs["txt_web"]; ?></textarea>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="d-flex justify-content-center">
                            <input type="hidden" name="id" value="<?= $titre_webs["id"]; ?>">
                            <button class="btn btn-primary mt-2 mx-2" value="<?= $titre_webs["id"]; ?>" type="submit" id="btn1"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Modifier</button>
                        </div>
                        <div class="d-flex justify-content-center mt-2 mx-2">
                            <a type="button" class="btn btn-success" href="../admin_web.php" role="button">Annuler</a>
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