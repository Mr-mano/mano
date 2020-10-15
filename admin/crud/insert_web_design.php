<?php

require_once __DIR__ . "/../../model/database.php";

if((isset($_FILES['image']) && $_FILES['image']['error'] == 0) && isset($_POST['titre_1']) && isset($_POST['titre_2']) && isset($_POST['titre_slide']) && isset($_POST['alt'])){

        if($_FILES['image']['size']<= 8000000){
            $informationsImage = pathinfo($_FILES['image']['name']);
            $extensionImage = $informationsImage['extension'];
            $extensionsArray = array('png', 'gif', 'jpg', 'jpeg', 'svg');

            if(in_array($extensionImage, $extensionsArray)){
                move_uploaded_file($_FILES['image']['tmp_name'], '../uploads/'.basename($_FILES['image']['name']));

                $image = $_FILES['image'];
                $titre_1 = $_POST['titre_1'];
                $titre_2 = $_POST['titre_2'];
                $titre_slide = $_POST['titre_slide'];
                $alt = $_POST['alt'];
                
                
                insertEntity("web_design", ['image' => $image['name'],'titre_1' => $titre_1, 'titre_2' => $titre_2, 'titre_slide' => $titre_slide, 'alt' => $alt]);

                {
                    header("Location: admin_design.php#web_design");
                    exit();
                }
        
            }
        }
    }
        
