<?php

require_once __DIR__ . "/../../model/database.php";


// Récupérer l'identifiant de la ligne à supprimer en BDD
$id = $_POST["id"];
// Appel de la fonction pour supprimer
$errcode = delete("titre_web", $id);
// Redirection de l'utilisateur
if ($errcode) {
    header("Location: ../admin_web.php?errcode=" . $errcode);
} else {
    header("Location: ../admin_web.php#titre_web");
    exit();
}

?>