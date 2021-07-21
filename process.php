<?php
$username="root";
$password="muffan";
$dbname="webprojet";
$servername="localhost";

//on récupère les arguments depuis le formulaire à l'aide de AJAX
$text=$_POST["text"];
$point=$_POST["point"];
$description=$_POST["descrip"];
$url=$_POST["url"];

try{
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     // set the PDO error mode to exception
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     // Requetes d'insertion dans la base de données
     $sql = "INSERT INTO `questions`( `cord`, `nom`, `description`, `img`) VALUES  ('$point','$text' ,'$descrip' ,'$img') ";
     // use exec() because no results are returned
     $conn->exec($sql);
     //Retourne vers la page admin.php
     header('Location:admin.php');
}
catch(PDOException $e)
{
  echo $sql . "<br>" . $e->getMessage();
}




?>
