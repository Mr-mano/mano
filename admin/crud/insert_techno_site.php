<?php
require_once __DIR__ . "/../../model/database.php";

$id = (isset($_GET['id']) ? $_GET["id"] : 1) or (isset($_POST['id'])); 
$techno = getById($id, 'techno_site');

            if(isset($_POST['id']) && isset($_POST['techno']) && isset($_POST['creation_site_id'])){

                
                $id = $_POST['id'];
                $creation_site_id = $_POST['creation_site_id'];
                $techno = $_POST['techno'];

                insertEntity("techno_site", ['techno' => $techno, 'creation_site_id' => $creation_site_id]);
                
                    header("Location: update_creation_site.php?id=" . $id);
                    exit();
            }

?>
<?php require_once __DIR__ . "/layout/header.php"; ?>

                <form method="POST" action="insert_techno_site.php?id=<?= $id; ?>" enctype="multipart/form-data">
                    <div class="container bg-light p-5 my-5">
                            <div class="form-group">
                                            <div class="text-align-center mt-5">
                                                <label for="exampleFormControlFile1">Techno</label>
                                                <input type="txt" name="techno" class="form-control-file" required></input>
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