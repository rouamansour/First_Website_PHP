<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
    crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css">
    <!-- <script src="script.js"></script> -->
    <title>detail</title>
</head>
<body>
  <?php
  $id=$_GET['id'];
  // $titre=$_GET['titre'];
  // $description=$_GET['description'];
  // $prix=$_GET['prix'];
  // $image=$_GET['image'];

  try{
      $pdo=new PDO("mysql:host=localhost;dbname=gestionlivre",'root','');
      $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $req=" select * from livre where id=$id";
      $pdostat=$pdo->query($req);
      foreach($pdostat as $ligne){
        
        echo"
        <div class='container'>
        <div class='row'>
          <div class='col-md-6'>
            <img src='images/".$ligne['image']."' class='img-thumbnail' style='max-width: 93%; max-height: 93%;' >
          </div>
          <div class='col-md-6'>
              <h1>".$ligne['titre']."</h1>
             <img src='images/ratingc.png' style='max-width: 8%; max-height: 8%;'/>
              (21 avis client)
              <div>
              ".$ligne['description']."
              </div>
            </div>
            </div>
            </div>
        ";
      }
      
     // header('Location:ListLivre.php'); 
      }
      catch(Exception $e)
      {
          echo"ERREUR : ".$e->getMessage();
      }
  ?>

              <div >
                <p><strong style=" margin-right:15px;">Version :</strong>
                  <select name="op" id="version" >
                    <option value="choisir_une_option" selected>choisir une option </option>
                    <option value="5">Ebook Télechargable </option>
                    <option value="60">livre Papier </option>
                  </select>
              </div>
              <p id="prix"></p>
              <div>
                <strong style=" margin-right:15px;">Quantité:</strong>
                <input type="number" style=" font-size:10px; width:40px; height:30px;"/>
                <input type="submit"  id="btn"value ="Ajouter au panier" class="btn btn-danger" />
                <br><br>
                UGS : ND Catégories : Humour, Nouveautés, Présentés en vidéo Brand: Fabrice Dorey
              </div>
          </div>
        </div>
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