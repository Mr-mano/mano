<?php
session_start();
require_once __DIR__ . "/../../model/database.php";
$titre_phare = getAllEntities("titre_phare");

if(isset($_POST['id']) && isset($_POST['titre_ph']) && isset($_POST['libelle_ph']) && isset($_POST['txt_ph'])){

    $id = $_POST['id'];
    $titre_ph = $_POST['titre_ph'];
    $libelle_ph = $_POST['libelle_ph'];
    $txt_ph = $_POST['txt_ph'];

    updateEntity("titre_phare", $id, ['titre_ph' => $titre_ph, 'libelle_ph' => $libelle_ph, 'txt_ph' => $txt_ph]);
    
    
        {
            header("Location: ../admin_design.php#titre_phare");
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
<?php foreach ($titre_phare as $titre_phares) : ?>
    <div class="container bg-light p-5 my-5">
            <form method="POST" action="update_titre_phare.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Titre</label>
                        <input type="text" name="titre_ph" class="form-control" value="<?= $titre_phares["titre_ph"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Sous titre</label>
                        <input type="text" name="libelle_ph" class="form-control" value="<?= $titre_phares["libelle_ph"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Texte</label>
                        <input type="text" name="txt_ph" class="form-control" value="<?= $titre_phares["txt_ph"]; ?>">
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="d-flex justify-content-center">
                            <input type="hidden" name="id" value="<?= $titre_phares["id"]; ?>">
                            <button class="btn btn-primary mt-2 mx-2" value="<?= $titre_phares["id"]; ?>" type="submit" id="btn1"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Modifier</button>
                        </div>
                        <div class="d-flex justify-content-center mt-2 mx-2">
                            <a type="button" class="btn btn-success" href="../admin_design.php#titre_phare" role="button">Annuler</a>
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