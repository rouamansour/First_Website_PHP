<?php
session_start();
if(isset($_SESSION["username"])){
	$nom=$_SESSION["username"];
    echo "<div>Bonjour $nom, <a href=logout.php>déconnexion</a> </div>";
}
else
	echo "pas de session active"
?>