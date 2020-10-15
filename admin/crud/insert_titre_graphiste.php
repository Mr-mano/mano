<?php

require_once __DIR__ . "/../../model/database.php";

if(isset($_POST['titre']) && isset($_POST['libelle']) && isset($_POST['txt'])){

    $titre = $_POST['titre'];
    $libelle = $_POST['libelle'];
    $txt = $_POST['txt'];

    insertEntity("titre_graphique", ['titre' => $titre, 'libelle' => $libelle, 'txt' => $txt]);
    
        {
            header("Location: admin.php#graphiste");
            exit();
        }

    }