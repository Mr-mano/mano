<?php
session_start();
require_once __DIR__ . "/../../model/database.php";
$titre_web_design = getAllEntities("titre_web_design");

if(isset($_POST['id']) && isset($_POST['titre']) && isset($_POST['libelle']) && isset($_POST['txt'])){

    $id = $_POST['id'];
    $titre = $_POST['titre'];
    $libelle = $_POST['libelle'];
    $txt = $_POST['txt'];

    updateEntity("titre_web_design", $id, ['titre' => $titre, 'libelle' => $libelle, 'txt' => $txt]);
    
    
        {
            header("Location: ../admin_design.php#titre_web_design");
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
<?php foreach ($titre_web_design as $titre_web_designs) : ?>
    <div class="container bg-light p-5 my-5">
            <form method="POST" action="update_titre_web_design.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Titre</label>
                        <input type="text" name="titre" class="form-control" value="<?= $titre_web_designs["titre"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Libelle</label>
                        <input type="text" name="libelle" class="form-control" value="<?= $titre_web_designs["libelle"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Texte</label>
                        <textarea rows="10" type="text" name="txt" class="form-control textarea"><?= $titre_web_designs["txt"]; ?></textarea>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="d-flex justify-content-center">
                            <input type="hidden" name="id" value="<?= $titre_web_designs["id"]; ?>">
                            <button class="btn btn-primary mt-2 mx-2" value="<?= $titre_web_designs["id"]; ?>" type="submit" id="btn1"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Modifier</button>
                        </div>
                        <div class="d-flex justify-content-center mt-2 mx-2">
                            <a type="button" class="btn btn-success" href="../admin_design.php#titre_web_design" role="button">Annuler</a>
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