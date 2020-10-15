<?php
if(isset($_FILES['logo_ai']) &&isset($_FILES['logo_ai']) && isset($_FILES['logo_ps']) && isset($_FILES['logo_xd']) && isset($_POST['titre']) && isset($_POST['txt'])){

        move_uploaded_file($_FILES['logo_ai']['tmp_name'], '../uploads/'.basename($_FILES['logo_ai']['name']));
        move_uploaded_file($_FILES['logo_ps']['tmp_name'], '../uploads/'.basename($_FILES['logo_ps']['name']));
        move_uploaded_file($_FILES['logo_xd']['tmp_name'], '../uploads/'.basename($_FILES['logo_xd']['name']));

        $logo_ai = $_FILES['logo_ai'];
        $logo_ps = $_FILES['logo_ps'];
        $logo_xd = $_FILES['logo_xd'];
        $titre = $_POST['titre'];
        $txt = $_POST['txt'];
        
        
        insertEntity("titre_design", ['logo_ai' => $logo_ai['name'], 'logo_ps' => $logo_ps['name'], 'logo_xd' => $logo_xd['name'],'titre' => $titre, 'txt' => $txt]);

        {
            header("Location: admin_design.php#design");
            exit();
        }

    }


