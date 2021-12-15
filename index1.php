<?php
session_start();
if(isset($_SESSION["username"]))
{$nom=$_SESSION["username"];
echo "<div>Bonjour $nom, <a href=logout.php>déconnexion</a> </div>";}
else
	header("location:login.php");
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
    <title>site web</title>
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
				Copyright © Lifestyle Store. All Rights Reserved 
			</center>
		</div>
	</footer>
</body>
</html>