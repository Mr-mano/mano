<?php

require_once __DIR__ . "/../../model/database.php";


// Récupérer l'identifiant de la ligne à supprimer en BDD
$id = $_POST["id"];
// Appel de la fonction pour supprimer
$errcode = delete("titre_graphique", $id);
// Redirection de l'utilisateur
if ($errcode) {
    header("Location: ../admin.php?errcode=" . $errcode);
} else {
    header("Location: ../admin.php#graphiste");
    exit();
}

?>