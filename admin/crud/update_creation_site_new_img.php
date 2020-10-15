<?php
require_once __DIR__ . "/../../model/database.php";

$id = (isset($_GET["id"]) ? $_GET["id"] : 1); 
$image = getById($id, 'image_site');

if(isset($_POST["id"]) && isset($_POST["creation_site_id"]) && isset($_FILES["image_rea"]["name"]) && isset($_POST["alt_img"])){
            

            move_uploaded_file($_FILES['image_rea']['tmp_name'], '../../uploads/'.basename($_FILES['image_rea']['name']));

                $id = $_POST["id"];
                $creation_site_id = $_POST["creation_site_id"];
                $image_rea = $_FILES["image_rea"];
                $alt_img = $_POST["alt_img"];


                $errcode = updateEntity("image_site", $id,[
                    "image_rea" => $image_rea["name"], 
                    "alt_img" => $alt_img, 
                    "creation_site_id" => $creation_site_id
                    ]);

                if ($errcode) {
                    header("Location: update_creation_site.php?errcode=" . $errcode);
                } else {
                    header("Location: update_creation_site.php?id=" . $creation_site_id);
                    exit();
                }
            }
        
    


?>
<?php require_once __DIR__ . "/layout/header.php"; ?>
                <form method="POST" action="update_creation_site_new_img.php" enctype="multipart/form-data">
                    <div class="container bg-light p-5 my-5">
                        <div class="form-group">
                                            <div class="m-2" style="min-width:10rem;">
                                                <img style="width:10rem;" src="../../uploads/<?= $image["image_rea"]; ?>" alt="<?= $image["alt_img"]; ?>">
                                            </div>
                                            <div class="text-align-center">
                                                <label for="exampleFormControlFile1"></label>
                                                <input type="file" name="image_rea" class="form-control-file" value="<?= $image["image_rea"]; ?>" required></input>
                                            </div>
                                            <div class="text-align-center mt-5">
                                                <label for="exampleFormControlFile1">Description de la photo</label>
                                                <input type="txt" name="alt_img" class="form-control-file" value="<?= $image["alt_img"]; ?>" required></input>
                                            </div>
                                            <div class="text-align-center">
                                                <label for="exampleFormControlFile1"></label>
                                                <input type="hidden" name="creation_site_id" class="form-control-file"  value="<?= $image["creation_site_id"]; ?>"></input>
                                            </div>
                                <div class="d-flex justify-content-center mt-5 ">
                                        <input type="hidden" name="id" value="<?= $id ?>"></input>
                                        <button class="btn btn-primary mt-2 mx-2" type="submit" value="<?= $id?>">Valider</button>
                                    <div class="d-flex justify-content-center mt-2 mx-2">
                                        <a type="button" class="btn btn-success" href="update_creation_site.php?id=<?= $image["creation_site_id"]; ?>" role="button">Annuler</a>
                                    </div>
                                </div>
                        </div>
                    </div>
                </form>
                <form method="post" action="delete_creation_site_new_img.php" onsubmit="return confirm('Est vous sûre de vouloir supprimer cet article? ');">
                        <div class="container bg-light p-5 d-flex justify-content-center">
                                <input type="hidden" name="id" value="<?= $image["id"]; ?>">
                                <button class="btn btn-danger"><i class="fas fa-trash-alt"></i> Suprimer l'image</i></button>
                        </div>
                </form>