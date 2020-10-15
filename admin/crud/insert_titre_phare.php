<?php

require_once __DIR__ . "/../../model/database.php";

if(isset($_POST['titre_ph']) && isset($_POST['libelle_ph']) && isset($_POST['txt_ph'])){

    $titre_ph = $_POST['titre_ph'];
    $libelle_ph = $_POST['libelle_ph'];
    $txt_ph = $_POST['txt_ph'];

    insertEntity("titre_phare", ['titre_ph' => $titre_ph, 'libelle_ph' => $libelle_ph, 'txt_ph' => $txt_ph]);
    
        {
            header("Location: admin_design.php#titre_phare");
            exit();
        }

    }