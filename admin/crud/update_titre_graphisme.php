<?php
session_start();
require_once __DIR__ . "/../../model/database.php";
$titre_graphisme = getAllEntities("titre_graphisme");

if(isset($_POST['id']) && isset($_POST['titre_graph']) && isset($_POST['libelle_graph']) && isset($_POST['txt_graph'])){

    $id = $_POST['id'];
    $titre_graph = $_POST['titre_graph'];
    $libelle_graph = $_POST['libelle_graph'];
    $txt_graph = $_POST['txt_graph'];

    updateEntity("titre_graphisme", $id, ['titre_graph' => $titre_graph, 'libelle_graph' => $libelle_graph, 'txt_graph' => $txt_graph]);
    
    
        {
            header("Location: ../admin_design.php#graphisme");
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
<?php foreach ($titre_graphisme as $titre_graphismes) : ?>
    <div class="container bg-light p-5 my-5">
            <form method="POST" action="update_titre_graphisme.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="formGroupExampleInput">titre</label>
                        <input type="text" name="titre_graph" class="form-control" value="<?= $titre_graphismes["titre_graph"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">libelle</label>
                        <input type="text" name="libelle_graph" class="form-control" value="<?= $titre_graphismes["libelle_graph"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Texte</label>
                        <textarea rows="10" type="text" name="txt_graph" class="form-control textarea"><?= $titre_graphismes["txt_graph"]; ?></textarea>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="d-flex justify-content-center">
                            <input type="hidden" name="id" value="<?= $titre_graphismes["id"]; ?>">
                            <button class="btn btn-primary mt-2 mx-2" value="<?= $titre_graphismes["id"]; ?>" type="submit"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Modifier</button>
                        </div>
                        <div class="d-flex justify-content-center mt-2 mx-2">
                            <a type="button" class="btn btn-success" href="../admin_design.php#graphisme" role="button">Annuler</a>
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