<?php

require_once __DIR__ . "/../../model/database.php";

if((isset($_FILES['logo_graph']) && $_FILES['logo_graph']['error'] == 0) && isset($_POST['libelle_graph']) && isset($_POST['txt_graph']) && isset($_POST['alt_graph'])){

        if($_FILES['logo_graph']['size']<= 8000000){
            $informationsImage = pathinfo($_FILES['logo_graph']['name']);
            $extensionImage = $informationsImage['extension'];
            $extensionsArray = array('png', 'gif', 'jpg', 'jpeg', 'svg');

            if(in_array($extensionImage, $extensionsArray)){
                move_uploaded_file($_FILES['logo_graph']['tmp_name'], '../uploads/'.basename($_FILES['logo_graph']['name']));

                $logo_graph = $_FILES['logo_graph'];
                $libelle_graph = $_POST['libelle_graph'];
                $txt_graph = $_POST['txt_graph'];
                $alt_graph = $_POST['alt_graph'];
                
                
                insertEntity("logo_graphiste", ['logo_graph' => $logo_graph['name'], 'libelle_graph' => $libelle_graph, 'txt_graph' => $txt_graph, 'alt_graph' => $alt_graph]);

                {
                    header("Location: admin.php#logo_graphiste");
                    exit();
                }
        
            }
        }
    }
        
