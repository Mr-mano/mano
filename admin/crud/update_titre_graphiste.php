<?php
session_start();
require_once __DIR__ . "/../../model/database.php";
$grahisme = getAllEntities("titre_graphique");

if(isset($_POST['id']) && isset($_POST['titre']) && isset($_POST['libelle']) && isset($_POST['txt'])){

    $id = $_POST['id'];
    $titre = $_POST['titre'];
    $libelle = $_POST['libelle'];
    $txt = $_POST['txt'];

    updateEntity("titre_graphique", $id, ['titre' => $titre, 'libelle' => $libelle, 'txt' => $txt]);
    
    
        {
            header("Location: ../admin.php#graphiste");
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
<?php foreach ($grahisme as $grahismes) : ?>
    <div class="container bg-light p-5 my-5">
            <form method="POST" action="update_titre_graphiste.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Titre</label>
                        <input type="text" name="titre" class="form-control" value="<?= $grahismes["titre"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Libelle</label>
                        <input type="text" name="libelle" class="form-control" value="<?= $grahismes["libelle"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Texte</label>
                        <textarea rows="15" type="text" name="txt" class="form-control textarea"><?= $grahismes["txt"]; ?></textarea>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="d-flex justify-content-center">
                            <input type="hidden" name="id" value="<?= $grahismes["id"]; ?>">
                            <button class="btn btn-primary mt-2 mx-2" value="<?= $grahismes["id"]; ?>" type="submit" id="btn1"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Modifier</button>
                        </div>
                        <div class="d-flex justify-content-center mt-2 mx-2">
                            <a type="button" class="btn btn-success" href="../admin.php#graphiste" role="button">Annuler</a>
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