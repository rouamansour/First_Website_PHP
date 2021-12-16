
<?php
    //$message="";
    $id=$_GET['id'];
    $titre=$_GET['titre'];
    $description=$_GET['description'];
    $prix=$_GET['prix'];
    $image=$_GET['image'];

    try{
        $pdo=new PDO("mysql:host=localhost;dbname=gestionlivre",'root','');
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $req=" INSERT INTO livre (`id`, `titre`, `description`, `prix`,`image`) VALUES (NULL, '$titre', '$description', '$prix','$image')";
        //$req="INSERT INTO livre  VALUES (null, '".$titre."','".$description."', '".$prix."')";
        $pdo->query($req);
        header('Location:ListLivre.php'); 
        }
        catch(Exception $e)
        {
            echo"ERREUR : ".$e->getMessage();
        }
?>
