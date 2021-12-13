<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>Liste des livres</title>
    </head>
    <body>
        
    <center>
            <h1>Liste des livres</h1>
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
                $images= array ("1" => "/images/image1.jpg",
                                "2" => "/images/image2.jpg",
                                "3" => "/images/image3.jpg",
                                "4" => "/images/image4.jpg",
                                "5" => "/images/image5.jpg",
                                "6" => "/images/image6.jpg",
                                "7" => "/images/image7.jpg",
                                "8" => "/images/image8.jpg",
                                "9" => "/images/image9.jpg",
                                "10" => "/images/image10.jpg",
                                "11" => "/images/image11.jpg",
                                "12" => "/images/image12.jpg"
                            );
                try{
                    $pdo=new PDO("mysql:host=localhost;dbname=gestionlivre",'root','');
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                    
                    $pdostat=$pdo->query("SELECT * FROM livre");
                    
                    foreach($images  as $cle => $val)
                    {
                        foreach($pdostat as $ligne)
                        {
                            echo"<tr>"; 
                            echo"<th>".$ligne['id']."</th>";
                            echo"<td>".$ligne['titre']."</td>";
                            echo"<td>".$ligne['description']."</td>";
                            echo"<td>".$ligne['prix']."dt</td>";
                            $v=$ligne['id'];
                            echo "<td><img src='.$images[$v].' width='184' height='150'/></td>";
                            echo "<td> <a class=\"btn btn-primary btn-sm\" 
                            href=Modifier_Livre.php?id={$ligne['id']}>modifier</a></td>";
                            echo "<td><a class=\"btn btn-danger btn-sm\" 
                            href=Supprimer_Livre.php?id={$ligne['id']}>supprimer</a></td>";
                            echo"</tr>";
                        
                        }
                    } 
                }
                catch(Exception $e)
                {
                    echo"ERREUR : ".$e->getMessage();
                }
                ?>
        </table >
            </center>

            
    </body>
</html>