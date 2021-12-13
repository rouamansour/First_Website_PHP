<?php
$message="";
    $id=$_GET['id'];
    $titre=$_GET['titre'];
    $description=$_GET['description'];
    $prix=$_GET['prix'];
    $image=$_GET['image'];
    
    try{  
    $pdo=new PDO("mysql:host=localhost;dbname=gestionlivre",'root','') ;
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $query = "update livre set titre='".$titre."',prix='".$prix."',description='".$description."' where id='".$id."'";
    //echo $query;
    $pdostat=$pdo->query($query);
    header ('location:ListLivre.php');
    echo"test";
    }
    catch (Exception $e){
        echo "ERREUR :".$e->getMessage();
    }


?>