<?php
    include 'config/database.php';
    
    $errors = array();
    if(isset($_POST["submit"])) {
        $nom = addslashes($_POST["nom"]);
        $prenom = addslashes($_POST["prenom"]);
        if(empty($nom)){
            array_push($errors,"Le nom est obligatoire");
        }

        if(empty($prenom)){
            array_push($errors,"Le prenom est obligatoire");
        }

        $query = "SELECT * FROM ajax WHERE nom='$nom' OR prenom='$prenom'";
        $checknom = mysqli_query($db,$query);
        // $user_count = mysqli_num_rows($checknom);
        // die($checknom);
        if(mysqli_num_rows($checknom)>0) {
            array_push($errors,"Le nom ou prenom deja utilise");
        }else{
           mysqli_query($db,"INSERT INTO ajax (nom,prenom) VALUES('$nom','$prenom')");
        }
      }
      

    include 'views/index.views.php';