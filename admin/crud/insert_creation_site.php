<?php

require_once __DIR__ . "/../../model/database.php";

if(isset($_FILES['image']) && isset($_POST['titre']) && isset($_POST['libelle']) && isset($_POST['txt']) && isset($_POST['alt']) && isset($_POST['date_creation'])){

                move_uploaded_file($_FILES['image']['tmp_name'], '../uploads/'.basename($_FILES['image']['name']));

                $image = $_FILES['image'];
                $titre = $_POST['titre'];
                $libelle = $_POST['libelle'];
                $txt = $_POST['txt'];
                $alt = $_POST['alt'];
                $date_creation = $_POST['date_creation'];
                
                
                insertEntity("creation_site", ['image' => $image['name'],'titre' => $titre, 'libelle' => $libelle, 'txt' => $txt, 'alt' => $alt,
                'date_creation' => $date_creation]);

                {
                    header("Location: admin_web.php#creation_web");
                    exit();
                }
        
            }
        
    