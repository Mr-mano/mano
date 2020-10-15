<?php

require_once __DIR__ . "/../../model/database.php";

if(isset($_POST['titre_web']) && isset($_POST['ville_web']) && isset($_POST['txt_web'])){

    $titre_web = $_POST['titre_web'];
    $ville_web = $_POST['ville_web'];
    $txt_web = $_POST['txt_web'];

    insertEntity("titre_web", ['titre_web' => $titre_web, 'ville_web' => $ville_web, 'txt_web' => $txt_web]);
    
        {
            header("Location: admin_web.php#titre_web");
            exit();
        }

    }