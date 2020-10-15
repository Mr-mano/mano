<?php

require_once __DIR__ . "/../../model/database.php";

if((isset($_FILES['image_graph']) && $_FILES['image_graph']['error'] == 0) && isset($_POST['titre1_graph']) && isset($_POST['titre2_graph']) && isset($_POST['titre_slide_graph']) && isset($_POST['alt_graph'])){

        if($_FILES['image_graph']['size']<= 8000000){
            $informationsimage = pathinfo($_FILES['image_graph']['name']);
            $extensionimage = $informationsimage['extension'];
            $extensionsArray = array('png', 'gif', 'jpg', 'jpeg', 'svg');

            if(in_array($extensionimage, $extensionsArray)){
                move_uploaded_file($_FILES['image_graph']['tmp_name'], '../uploads/'.basename($_FILES['image_graph']['name']));

                $image_graph = $_FILES['image_graph'];
                $titre1_graph = $_POST['titre1_graph'];
                $titre2_graph = $_POST['titre2_graph'];
                $titre_slide_graph = $_POST['titre_slide_graph'];
                $alt_graph = $_POST['alt_graph'];
                
                
                insertEntity("graphisme", ['image_graph' => $image_graph['name'],'titre1_graph' => $titre1_graph, 'titre2_graph' => $titre2_graph, 'titre_slide_graph' => $titre_slide_graph, 'alt_graph' => $alt_graph]);

                {
                    header("Location: admin_design.php#graphisme_img");
                    exit();
                }
        
            }
        }
    }
        
