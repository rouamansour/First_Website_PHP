<?php
session_start();
if(isset($_SESSION["username"]))
{
    $nom=$_SESSION["username"];
    echo "
    <header>
    <nav>
        <ul style='background-color:#82B1FF'>
        <li><a href='listlivre.php' class='navbar-brand'> <img src='images/logo2.jpg ' style='height:80px;width:80px;margin-button: 50px;' ></a></li>
        <li><h4 style='margin-top:14px'>Livre Store</h4></li>
            <li><a href='ListLivre.php'>Accueil</a></li>
            <li><a href='#news'>Catégories</a></li>
            <li><a href='#contact'>Contact</a></li>
            <li style='margin-top:14px; margin-left:400px'>Bienvenue $nom </li>
            <li><a href=logout.php style='margin-left:20%.;margin-top:0px'>Déconnexion</a></li>
        </ul>
    </nav>
    </header>
";
}
else
	header("location:login.php");
?>

<?php
try{
    $id=$_GET['id'];
    $pdo=new PDO("mysql:host=localhost;dbname=gestionlivre",'root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $pdostat=$pdo->query("select * from livre where id='".$id."'");
    $ligne=$pdostat->fetch(PDO::FETCH_ASSOC);
    $titre=$ligne['titre'];
    $description=$ligne['description'];
    $prix=$ligne['prix'];
    $image=$ligne['image'];
}
catch(Exception $e)
{
    echo "ERREUR :".$e->getMessage();
}
?>


<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />
        <link rel="stylesheet" href="header.css" type="text/css"/>
    <title>Modifier Livre</title>
</head>
<body>

<center>
<form method="Get" action="Enregistrer_Livre.php">
<h1>Modifier Livre</h1>
<br />
<table class="table">
<tr>
<th>Id</th>
<td><input type="number" name="id" value=<?php echo $id?> /></td>
</tr>
<tr>
<th>Titre</th>
<td><input type="text" name="titre" value=<?php echo $titre?> /></td>
</tr>
<tr>
<th>Description</th>
<td><input type="text" name="description" value=<?php echo $description?> /></td>
</tr>
<tr>
<th>Prix</th>
<td><input type="number" name="prix" value=<?php echo $prix?> /></td>
</tr>
<tr>
<th>Image</th>
<td><input type="text" name="image" value=<?php echo $image?> /></td>
</tr>
</table>
<br/>
<p>
    <!-- <a class="btn btn-success" href="enregistrer_produit.php?nump={$ligne['numP']}">Enregistrer</a> -->
    <input type="submit" name="" value="Enregistrer" class="btn btn-success">
    <input type="reset" class="btn btn-danger" value="Annuler"/>
</p>
</form>
</center>
<footer class="footer-bot">
            <div class="container">
                <div class="social-links">
                    <a href=""><i class="fab fa-facebook-f"></i></a>
                    <a href=""><i class="fab fa-twitter"></i></a>
                    <a href=""><i class="fab fa-linkedin"></i></a>
                    <a href=""><i class="fab fa-whatsapp"></i></a>
                  </div>
                  <p><a href="">Contact</a></p>
                  <br>
                <center>
                    Copyright © Livre Store
                </center>
            </div>
        </footer>
</body>
</html>
