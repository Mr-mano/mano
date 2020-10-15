<?php

require_once __DIR__ . "/../../model/database.php";

if(isset($_FILES['image_1']) && isset($_FILES['image_2'])
&& isset($_POST['titre_1']) && isset($_POST['titre_2']) && isset($_POST['titre_slide']) && isset($_POST['alt_1']) && isset($_POST['alt_2'])){

                move_uploaded_file($_FILES['image_1']['tmp_name'], '../assets/img/portfolio/fullsize/'.basename($_FILES['image_1']['name']));
                move_uploaded_file($_FILES['image_2']['tmp_name'], '../assets/img/portfolio/thumbnails/'.basename($_FILES['image_2']['name']));

                $image_1 = $_FILES['image_1'];
                $image_2 = $_FILES['image_2'];
                $titre_1 = $_POST['titre_1'];
                $titre_2 = $_POST['titre_2'];
                $titre_slide = $_POST['titre_slide'];
                $alt_1 = $_POST['alt_1'];
                $alt_2 = $_POST['alt_2'];
                
                
                insertEntity("portfolio_accueil", 
                ['image_1' => $image_1['name'], 'image_2' => $image_2['name'], 'titre_1' => $titre_1,
                'titre_2' => $titre_2, 'titre_slide' => $titre_slide, 'alt_1' => $alt_1, 'alt_2' => $alt_2 ]);

                {
                    header("Location: admin.php#portfolio");
                    exit();
                }
        
            
            }
        
        