<?php
require_once __DIR__ . "/../../model/database.php";

$id = (isset($_GET['id']) ? $_GET["id"] : 1) or (isset($_POST['id'])); 
$image = getById($id, 'image_site');

            if(isset($_POST['id']) && isset($_POST['creation_site_id']) && isset($_FILES['image_rea']['name']) && isset($_POST['alt_img'])){

                move_uploaded_file($_FILES['image_rea']['tmp_name'], '../../uploads/'.basename($_FILES['image_rea']['name']));
                
                $id = $_POST['id'];
                $creation_site_id = $_POST['creation_site_id'];
                $image_rea = $_FILES['image_rea'];
                $alt_img = $_POST['alt_img'];

                insertEntity("image_site", ['image_rea' => $image_rea['name'], 'alt_img' => $alt_img, 'creation_site_id' => $creation_site_id]);
                
                    header("Location: update_creation_site.php?id=" . $id);
                    exit();
            }

?>
<?php require_once __DIR__ . "/layout/header.php"; ?>

                <form method="POST" action="insert_creation_site_new_img.php?id=<?= $id; ?>" enctype="multipart/form-data">
                    <div class="container bg-light p-5 my-5">
                            <div class="form-group">
                            
                                            <div class="text-align-center">
                                                <label for="exampleFormControlFile1"></label>
                                                <input type="file" name="image_rea" class="form-control-file"  value="<?= $image["image_rea"]; ?>" required></input>
                                            </div>
                                            
                                            <div class="text-align-center mt-5">
                                                <label for="exampleFormControlFile1">Description image_site</label>
                                                <input type="txt" name="alt_img" class="form-control-file" required></input>
                                            </div>
                                            <div class="text-align-center">
                                                <label for="exampleFormControlFile1"></label>
                                                <input type="txt" name="creation_site_id" class="form-control-file"  value="<?= $id; ?>"></input>
                                            </div>
                                <div class="d-flex justify-content-center mt-5 ">
                                        <input type="hidden" name="id" value="<?= $id; ?>">
                                        <button class="btn btn-primary mt-2 mx-2" type="submit">Valider</button>
                                    <div class="d-flex justify-content-center mt-2 mx-2">
                                        <a type="button" class="btn btn-success" href="update_creation_site.php?id=<?= $id ?>" role="button">Annuler</a>
                                    </div>
                                </div>
                    </div>
                </form>
                



</main>
</body>	

</html>