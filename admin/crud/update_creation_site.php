<?php
session_start();
require_once __DIR__ . "/../../model/database.php";

$id = (isset($_GET['id']) ? $_GET["id"] : 1); 
$creation_site = getById($id, 'creation_site');
$images = getAllCreationSiteImage($id);
$techno = getAllCreationSiteTechno($id);

if(isset($_POST['id']) && isset($_POST['titre']) && isset($_POST['libelle']) && isset($_POST['txt'])
&& isset($_POST['alt'])){
    
    
                    $id = $_POST['id'];
                    $titre = $_POST['titre'];
                    $libelle = $_POST['libelle'];
                    $txt = $_POST['txt'];
                    $alt = $_POST['alt'];
            
                    $errcode = updateEntity("creation_site", $id, ['titre' => $titre, 'libelle' => $libelle, 'txt' => $txt,'alt' => $alt]);
                
                    if ($errcode) {
                        header("Location: ../admin_web.php?errcode=" . $errcode);
                    } else {
                        header("Location: ../admin_web.php#creation_web");
                        exit();
                    }   
            }
?>
<?php
		if(!isset($_SESSION['connect'])){ 
        ?>
        <!-- si l'administrateur n'est pas connecté affiche ça -->
            
        <?php require_once __DIR__ . "/layout/erreur404.php"; ?>

        <?php } else { ?>  
        
            <!-- HEADER -->
            <?php require_once __DIR__ . "/layout/header.php"; ?>



<div class="container bg-light p-5 mb-5" style="margin-top:7%;">
    <form method="POST" action="update_creation_site.php" enctype="multipart/form-data">
        <div>
            <h3 class="mt-5 text-center">Photo principale</h3>
        </div>
        <div class="row border p-auto d-flex justify-content-center">
            <div class="m-2" style="min-width:10rem;">
                        <img class="mb-3" style="width:10rem;" src="../../uploads/<?= $creation_site["image"]; ?>" alt="<?= $creation_site["alt"]; ?>">
                        <div class="container text-center">
                            <a class="mt-2 mx-2" style="width:50px;" href="update_creation_site_img.php?id=<?= $creation_site["id"]; ?>"><i class="fa fa-pencil-alt" aria-hidden="true"></i></a>
                        </div>
                        </div>
        </div>
        <div>
            <h3 class="mt-5 text-center">Photo page détails</h3>
        </div>
        <div class="row border p-auto d-flex justify-content-center">
                    <?php foreach ($images as $image) : ?>
                        <div class="m-2 text-center" style="width:10rem;">
                            <img class="mb-3" style="width:10rem;" src="../../uploads/<?= $image["image_rea"]; ?>" alt="<?= $image["alt_img"]; ?>">
                            <a class="mt-2 mx-2" style="width:50px;" href="update_creation_site_new_img.php?id=<?= $image["id"]; ?>"><i class="fa fa-pencil-alt" aria-hidden="true"></i></a>
                        </div>
                    <?php endforeach?>
        </div>
        <div class="d-flex justify-content-center mb-5 mx-2">
            <a class="m-3 mx-2" href="insert_creation_site_new_img.php?id=<?= $creation_site["id"]; ?>" role="button">Ajouter image</a>
        </div>
            <div class="container border p-2">
                <h3 class="text-center mb-3">Techno</h3>
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" style="text-align:center;"></th>
                                <th scope="col" style="text-align:center;">Techno</th>
                                <th scope="col" style="text-align:center;">Modif</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($techno as $technos) : ?>
                            <tr>
                                <th scope="row">
                                    <td style="text-align:center;"><?= $technos["techno"]; ?></td>
                                    <td style="text-align:center;">
                                        <a class="mt-2 mx-2" href="update_techno_modif.php?id=<?= $technos["id"]; ?>"><i class="fa fa-pencil-alt" aria-hidden="true"></i></a>
                                    </td>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center mt-2 mx-2">
                        <a class="mt-2 mx-2" href="insert_techno_site.php?id=<?= $creation_site["id"]; ?>" role="button">Ajouter techno</a>
                </div>
            </div>
        <div class="container mt-5 p-2">
                <div class="form-group">
                    <label for="formGroupExampleInput">Titre</label>
                    <input type="text" name="titre" class="form-control" value="<?= $creation_site["titre"]?>">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">libelle</label>
                    <input type="text" name="libelle" class="form-control" value="<?= $creation_site["libelle"]?>">
                </div>
                <div class="form-group">
                    <input type="hidden" name="alt" class="form-control" value="<?= $creation_site["alt"]?>">
                </div>
                <textarea rows="15" type="text" name="txt" class="form-control"><?=  $creation_site["txt"]?></textarea>
                <div class="d-flex justify-content-center">
                    <input type="hidden" name="id" value="<?= $creation_site["id"]; ?>">
                    <button class="btn btn-primary mt-2 mx-2" type="submit" value="<?= $creation_site["id"]; ?>"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Modifier</button>
                        <div class="d-flex justify-content-center  mt-2 mx-2">
                            <a type="button" class="btn btn-success" href="../admin_web.php#creation_web" role="button">Retour</a>
                        </div>
                </div>
    </form>
    <form method="post" action="delete_creation_site.php" onsubmit="return confirm('Est vous sûre de vouloir supprimer cet article? ');">
                        <div class="container bg-light p-5 d-flex justify-content-center">
                                <input type="hidden" name="id" value="<?= $creation_site["id"]; ?>">
                                <button class="btn btn-danger"><i class="fas fa-trash-alt"></i> Suprimer</i></button>
                        </div>
                </form>
</div>
</main>
<?php } ?>
</body>
</html>