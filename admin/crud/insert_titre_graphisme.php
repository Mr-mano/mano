<?php

require_once __DIR__ . "/../../model/database.php";

if(isset($_POST['titre_graph']) && isset($_POST['libelle_graph']) && isset($_POST['txt_graph'])){

    $titre_graph = $_POST['titre_graph'];
    $libelle_graph = $_POST['libelle_graph'];
    $txt_graph = $_POST['txt_graph'];

    insertEntity("titre_graphisme", ['titre_graph' => $titre_graph, 'libelle_graph' => $libelle_graph, 'txt_graph' => $txt_graph]);
    
        {
            header("Location: admin_design.php#graphisme");
            exit();
        }

    }