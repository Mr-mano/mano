<?php

require_once __DIR__ . "/../../model/database.php";


// Récupérer l'identifiant de la ligne à supprimer en BDD
$id = $_POST["id"];
$techno = getById($id, 'techno_site');
$id_back = $techno["creation_site_id"]; 

// Appel de la fonction pour supprimer
$errcode = delete("techno_site", $id);
// Redirection de l'utilisateur
if ($errcode) {
    header("Location: ../admin_web.php?errcode=" . $errcode);
} else {
    header("Location: ../crud/update_creation_site.php?id=" . $id_back);
    exit();
}

?>