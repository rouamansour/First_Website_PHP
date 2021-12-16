<?php
session_start();
if(isset($_SESSION["username"]))
{
    $nom=$_SESSION["username"];
    echo "
    <header>
    <nav>
        <ul style='background-color:#82B1FF'>
        <li><a href='index1.php' class='navbar-brand'> <img src='images/logo2.jpg ' style='height:80px;width:80px;margin-button: 50px;' ></a></li>
        <li><h4 style='margin-top:14px'>Livre Store</h4></li>
            <li><a href='index1.php'>Accueil</a></li>
            <li><a href='#contact'>Contact</a></li>
            <li>
            <form action='' method='POST'>
              <div class='select' name='selectLivre'>
                <select name='format' id='format' style=' margin-top:14px;outline:0;box-shadow:none;border:0!important;background: #5c6664;
                background-image: none;flex: 1;padding: 0 .5em;color:#fff;cursor:pointer;font-size: 1em;font-family: 'Open Sans', sans-serif;'>
                    <option selected disabled>Choisir théme de livre</option>
                    <option value='1'>Roman</option>
                    <option value='2'>Art</option>
                </select>
              </div>
            </form>
            </li>
            
            <li style='margin-top:14px; margin-left:400px'>Bienvenue $nom </li>
            <li><a href=logout.php style='margin-left:20%.;margin-top:0px'>Déconnexion</a></li>
        </ul>
    </nav>
    </header>
";
}
else
	header("location:loginVisiteur.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
    crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="header.css" type="text/css"/>
	<title>Livre Store</title>
</head>
<body>

    <div class="container top">
		<form method="GET">
	<?php
        try{
                    $pdo=new PDO("mysql:host=localhost;dbname=gestionlivre",'root','');
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                    $i=1;
                    $pdostat=$pdo->query("SELECT * FROM livre");
								foreach($pdostat as $ligne)
								{
									$id=$ligne['id'];
									$ligne['titre'];
									$ligne['prix'];
									$ligne['image'];
									if($i%4==1)  
									{
										echo "
					              <div class='row'>
							      ";
									}$i++;     
									echo " 
									<div class='col-md-3 col-sm-6'>
										<div class='thumbnail' >
											<center>
												<div class='caption'>
													<h3>".$ligne['titre']."</h3>
													<img src='images/".$ligne['image']."'  class='img-responsive'  />
													<p>Prix :  ".$ligne['prix']."</p>
													<button class='btn btn-primary btn-block'><a href='detail.php?id=".$id."' style='color:white;'>Acheter</a></button>		
												</div>
											</center>
										</div>	
									</div>
									";
									if($i%4==1)  
									{
										echo "
					</div>
							";
									}
								}
                }
                catch(Exception $e)
                {
                    echo"ERREUR : ".$e->getMessage();
                }
?>
</form>
	</div>
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
				Copyright © Librairie 
			</center>
		</div>
	</footer>
</body>
</html>