<?php

require_once __DIR__ . "/../../model/database.php";

if(isset($_FILES['image1_ph']) && isset($_FILES['image2_ph']) && isset($_POST['titre1_ph']) && isset($_POST['titre2_ph'])
&& isset($_POST['titre_slide_ph']) && isset($_POST['alt1_ph']) && isset($_POST['alt2_ph'])){

        
                move_uploaded_file($_FILES['image1_ph']['tmp_name'], '../uploads/'.basename($_FILES['image1_ph']['name']));
                move_uploaded_file($_FILES['image2_ph']['tmp_name'], '../uploads/'.basename($_FILES['image2_ph']['name']));

                $image1_ph = $_FILES['image1_ph'];
                $image2_ph = $_FILES['image2_ph'];
                $titre1_ph = $_POST['titre1_ph'];
                $titre2_ph = $_POST['titre2_ph'];
                $titre_slide_ph = $_POST['titre_slide_ph'];
                $alt1_ph = $_POST['alt1_ph'];
                $alt2_ph = $_POST['alt2_ph'];
                
                
                insertEntity("phare", ['image1_ph' => $image1_ph['name'], 'image2_ph' => $image2_ph['name'],
                'titre1_ph' => $titre1_ph, 'titre2_ph' => $titre2_ph, 'titre_slide_ph' => $titre_slide_ph, 'alt1_ph' => $alt1_ph, 'alt2_ph' => $alt2_ph,]);

                {
                    header("Location: admin_design.php#phare");
                    exit();
                }
        
            }
            
    
    
    