<?php

require_once __DIR__ . "/../../model/database.php";

if((isset($_FILES['image_ani']) && $_FILES['image_ani']['error'] == 0) && isset($_POST['titre1_ani']) && isset($_POST['titre2_ani']) && isset($_POST['titre_slide_ani']) && isset($_POST['alt_ani'])){

        if($_FILES['image_ani']['size']<= 8000000){
            $informationsimage = pathinfo($_FILES['image_ani']['name']);
            $extensionimage = $informationsimage['extension'];
            $extensionsArray = array('png', 'gif', 'jpg', 'jpeg', 'svg');

            if(in_array($extensionimage, $extensionsArray)){
                move_uploaded_file($_FILES['image_ani']['tmp_name'], '../uploads/'.basename($_FILES['image_ani']['name']));

                $image_ani = $_FILES['image_ani'];
                $titre1_ani = $_POST['titre1_ani'];
                $titre2_ani = $_POST['titre2_ani'];
                $titre_slide_ani = $_POST['titre_slide_ani'];
                $alt_ani = $_POST['alt_ani'];
                
                
                insertEntity("animaux", ['image_ani' => $image_ani['name'],'titre1_ani' => $titre1_ani, 'titre2_ani' => $titre2_ani, 'titre_slide_ani' => $titre_slide_ani, 'alt_ani' => $alt_ani]);

                {
                    header("Location: admin_design.php#animaux");
                    exit();
                }
        
            }
        }
    }
        
    