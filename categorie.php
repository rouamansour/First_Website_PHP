<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>categorie</title>
</head>
<body>
<div class='container'>
        <div class='row'>
            <form action='' method='GET'>
                <div class='select' name='selectLivre'>
                    <select name='format' id='format' style=' margin-top:14px;outline:0;box-shadow:none;border:0!important;background: #5c6664;
                    background-image: none;flex: 1;padding: 0.5em;color:#fff;cursor:pointer;font-size: 1em'>
                        <option selected disabled>Choisir théme de livre</option>
                        <option id=1 >Roman</option>
                        <option id=2>Art</option>
                    </select>
                    <input type="submit" value="Afficher"/>
                </div>
            </form>

<?php 

        try{
            $cat='';
             if(isset($_GET['format']))
                $cat=$_GET['format'];
                
            }
            catch (Exception $e)
            {
                // echo"Erreur".$e->getMessage();
            }
            try 
            {   
                $pdo=new PDO("mysql:host=localhost;dbname=gestionlivre",'root','') ;
                $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                if($cat!='')
                {
                    $pdostat = $pdo->query("SELECT * FROM `livre` WHERE `categorie` = '$cat'") ;
                    echo $cat;
                }else{
                    $pdostat = $pdo->query("SELECT * from  livre") ;

                } 
                    foreach ($pdostat as $ligne) 
                    {
                                echo"
                                <div>
                                <table>
                                    <thead>
                                        <th>id</th>
                                        <th>Titre </th>
                                        <th>Prix</th>
                                    </thead>
                                    <tbody>
                                            <tr>
                                                <td>".$ligne['id']."</td>
                                                <td>".$ligne['titre']."</td>
                                                <td>".$ligne['prix']."</td>
                                            </tr>    
                                    </tbody>
                                </table>
                            </div>
                                ";
                    }    
                    
                 
                 
                    
            }
            catch (Exception $e)
            {
                echo"Erreur".$e->getMessage();
            }
            ?>
        </div>
    </div>
</body>
</html>
