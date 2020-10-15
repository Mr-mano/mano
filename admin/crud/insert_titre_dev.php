<?php

require_once __DIR__ . "/../../model/database.php";

if(isset($_POST['titre']) && isset($_POST['ville']) && isset($_POST['txt'])){

    $titre = $_POST['titre'];
    $ville = $_POST['ville'];
    $txt = $_POST['txt'];

    insertEntity("titre_dev", ['titre' => $titre, 'ville' => $ville, 'txt' => $txt]);
    
        {
            header("Location: admin.php#titre_dev");
            exit();
        }

}