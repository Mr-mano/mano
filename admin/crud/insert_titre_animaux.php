<?php
require_once __DIR__ . "/../../model/database.php";

if(isset($_POST['titre_ani']) && isset($_POST['libelle_ani']) && isset($_POST['txt_ani'])){

        $titre_ani = $_POST['titre_ani'];
        $libelle_ani = $_POST['libelle_ani'];
        $txt_ani = $_POST['txt_ani'];
        
        
        insertEntity("titre_animaux", ['titre_ani' => $titre_ani, 'libelle_ani' => $libelle_ani,  'txt_ani' => $txt_ani]);

        {
            header("Location: admin_design.php#titre_animaux");
            exit();
        }

    }


