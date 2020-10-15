<?php
session_start();
require_once __DIR__ . "/../../model/database.php";
$titre_anim = getAllEntities("titre_animaux");

if(isset($_POST['id']) && isset($_POST['titre_ani']) && isset($_POST['libelle_ani']) && isset($_POST['txt_ani'])){

    $id = $_POST['id'];
    $titre_ani = $_POST['titre_ani'];
    $libelle_ani = $_POST['libelle_ani'];
    $txt_ani = $_POST['txt_ani'];

    $errcode = updateEntity("titre_animaux", $id, ['titre_ani' => $titre_ani, 'libelle_ani' => $libelle_ani, 'txt_ani' => $txt_ani]);
    
    
        if ($errcode) {
            header("Location: ../admin_design.php?errcode=" . $errcode);
        } else {
            header("Location: ../admin_design.php#titre_animaux");
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
<?php foreach ($titre_anim as $titre_anims) : ?>
    <div class="container bg-light p-5 my-5">
            <form method="POST" action="update_titre_animaux.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Titre</label>
                        <input type="text" name="titre_ani" class="form-control" value="<?= $titre_anims["titre_ani"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">libelle</label>
                        <input type="text" name="libelle_ani" class="form-control" value="<?= $titre_anims["libelle_ani"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Texte</label>
                        <input type="text" name="txt_ani" class="form-control" value="<?php echo $titre_anims["txt_ani"]; ?>">
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="d-flex justify-content-center">
                            <input type="hidden" name="id" value="<?= $titre_anims["id"]; ?>">
                            <button class="btn btn-primary mt-2 mx-2" value="<?= $titre_anims["id"]; ?>" type="submit" id="btn1"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Modifier</button>
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