<?php

require_once __DIR__ . "/../../model/database.php";


// Récupérer l'identifiant de la ligne à supprimer en BDD

    $id = $_POST["id"];
    
    
    
    // Appel de la fonction pour supprimer
    delete("creation_site", $id);
    
    
    
    // Redirection de l'utilisateur
    
    if ($errcode) {
        header("Location: ../admin_web.php#creation_web" . $errcode);
    } else {
        header("Location: ../admin_web.php#creation_web");
        exit();
    }


?>
