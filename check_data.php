<?php
include 'config/database.php';

$errors = array();
$trouver = false;

if(!empty($_POST["nom"])) {
  $nom = addslashes($_POST["nom"]);
  $query = "SELECT * FROM ajax WHERE nom='$nom'";
  $checknom = mysqli_query($db,$query);
  $user_count = mysqli_num_rows($checknom);
  
  if($user_count!=0) {
    echo "<font color='red'>Ce nom existe deja</font>";
    $trouver = true;
  }else{
      echo "<font color='green'>Ce nom est disponible</font>";
      $trouver = true;
  }
}


if(isset($_POST['prenom'])){
    if(!empty($_POST["prenom"])) {
        $prenom = addslashes($_POST["prenom"]);
        $query = "SELECT * FROM ajax WHERE prenom='$prenom'";
        $checkprenom = mysqli_query($db,$query);
        $user_count = mysqli_num_rows($checkprenom);
        
        if($user_count!=0) {
          echo "<font color='red'>Ce prenom existe deja</font>";
          
        }else{
            echo "<font color='green'>Ce prenom est disponible</font>";
        }
    }
      
}