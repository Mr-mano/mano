<?php
require_once __DIR__ . "/../../model/database.php";

$id = (isset($_GET["id"]) ? $_GET["id"] : 1); 
$techno = getById($id, 'techno_site');

if(isset($_POST["id"]) && isset($_POST["creation_site_id"]) && isset($_POST["techno"])){
            


                $id = $_POST["id"];
                $creation_site_id = $_POST["creation_site_id"];
                $techno = $_POST["techno"];


                $errcode = updateEntity("techno_site", $id,[
                    "techno" => $techno,  
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
                <form method="POST" action="update_techno_modif.php" enctype="multipart/form-data">
                    <div class="container bg-light p-5 my-5">
                        <div class="form-group">
                                            <div class="text-align-center mt-5">
                                                <label for="exampleFormControlFile1">Techno</label>
                                                <input type="txt" name="techno" class="form-control-file" value="<?= $techno["techno"]; ?>" required></input>
                                            </div>
                                            <div class="text-align-center">
                                                <label for="exampleFormControlFile1"></label>
                                                <input type="hidden" name="creation_site_id" class="form-control-file"  value="<?= $techno["creation_site_id"]; ?>"></input>
                                            </div>
                                <div class="d-flex justify-content-center mt-5 ">
                                        <input type="hidden" name="id" value="<?= $id ?>"></input>
                                        <button class="btn btn-primary mt-2 mx-2" type="submit" value="<?= $id?>">Valider</button>
                                    <div class="d-flex justify-content-center mt-2 mx-2">
                                        <a type="button" class="btn btn-success" href="update_creation_site.php?id=<?= $techno["creation_site_id"]; ?>" role="button">Annuler</a>
                                    </div>
                                </div>
                        </div>
                    </div>
            
                </form>
                <form method="post" action="delete_techno_site.php" onsubmit="return confirm('Est vous sûre de vouloir supprimer cet article? ');">
                        <div class="container bg-light p-5 d-flex justify-content-center">
                                <input type="text" name="id" value="<?= $techno["id"]; ?>">
                                <button class="btn btn-danger"><i class="fas fa-trash-alt"></i> Suprimer Techno</i></button>
                        </div>
                </form>