<?php
    $id=$_GET['id'];
        try{
            $pdo=new PDO("mysql:host=localhost;dbname=gestionlivre",'root','');
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $req="delete from livre where id='".$id."'";
            $pdo->query($req);
            header('Location:ListLivre.php'); 
            }
            catch(Exception $e)
            {
                echo"ERREUR : ".$e->getMessage();
            }
?>