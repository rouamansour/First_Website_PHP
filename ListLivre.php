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
            <li><a href='Ajouter_Livre.html'>Ajouter</a></li>
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
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="header.css" type="text/css"/>
        <title>Liste des livres</title>
    </head>
    <body>
        <header>
            
        </header>
    <center>
            <!-- <h1>Liste des livres</h1> -->
            <br/>
            <table class="table table-bordered" >
                <tr>
                    <th>id</th>
                    <th>titre</th>
                    <th>description</th>
                    <th>Prix</th>
                    <th>image</th>
                    <th>Modification</th>
                    <th>Suppression</th>
                </tr> 
                <?php
                try{
                    $pdo=new PDO("mysql:host=localhost;dbname=gestionlivre",'root','');
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                    $pdostat=$pdo->query("SELECT * FROM livre");
                        foreach($pdostat as $ligne)
                        {
                            echo"<tr>"; 
                            echo"<th>".$ligne['id']."</th>";
                            echo"<td>".$ligne['titre']."</td>";
                            echo"<td>".$ligne['description']."</td>";
                            echo"<td>".$ligne['prix']."dt</td>";
                            echo'<td><img src="images/'.$ligne['image'].'" width="184" height="200"/></td>';       
                            echo "<td> <a class=\"btn btn-primary btn-sm\" 
                            href=Modifier_Livre.php?id={$ligne['id']}>Modifier</a></td>";
                            echo "<td><a class=\"btn btn-danger btn-sm\" 
                            href=Supprimer_Livre.php?id={$ligne['id']}>Supprimer</a></td>";
                            echo"</tr>";
                        }
                }
                catch(Exception $e)
                {
                    echo"ERREUR : ".$e->getMessage();
                }
                ?>
        </table >
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