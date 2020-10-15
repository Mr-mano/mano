<?php

require_once __DIR__ . "/../../model/database.php";

if((isset($_FILES['logo']) && $_FILES['logo']['error'] == 0) && isset($_POST['libelle']) && isset($_POST['txt']) && isset($_POST['alt'])){

        if($_FILES['logo']['size']<= 8000000){
            $informationsImage = pathinfo($_FILES['logo']['name']);
            $extensionImage = $informationsImage['extension'];
            $extensionsArray = array('png', 'gif', 'jpg', 'jpeg', 'svg');

            if(in_array($extensionImage, $extensionsArray)){
                move_uploaded_file($_FILES['logo']['tmp_name'], '../uploads/'.basename($_FILES['logo']['name']));

                $logo = $_FILES['logo'];
                $libelle = $_POST['libelle'];
                $txt = $_POST['txt'];
                $alt = $_POST['alt'];
                
                
                $errcode = insertEntity("logo_dev", ['logo' => $logo['name'],'libelle' => $libelle, 'txt' => $txt, 'alt' => $alt]);

                if ($errcode) {
                    header("Location: admin.php?errcode=" . $errcode);
                } else {
                    header("Location: admin.php#logo_dev");
                    exit();
                }
        
            }
        }
    }
        
