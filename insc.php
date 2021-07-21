<?php
$username="root";
$password="muffan";
$dbname="webprojet";
$servername="localhost";

$ps=$_POST[ps];
$nom=$_POST[nom];
$prenom=$_POST[prenom];
$pwd=$_POST[pwd];
$email=$_POST[email];
if(!isset($ps)){
  echo "Merci de mettre un pseudo";
}
else if(!isset($pwd)){

    echo "Merci de remplir le champs Mot de passe ";
}
else {
try{
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     // set the PDO error mode to exception
/*     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $req = "SELECT COUNT(*) FROM utilisateur where ps LIKE '$ps'";
     $us = $conn->exec($req);
     if($us == 1){
        echo" Ce ps est déjà utililsé";
        header('Location : /inscription.php');
     }
else{
*/
     $sql = "INSERT INTO utilisateur (ps, prenom, nom,pwd,email)
     VALUES ('$ps', '$prenom','$nom','$pwd','$email')";
     // use exec() because no results are returned
     $conn->exec($sql);
     echo "New record created successfully";
     header ('Location : index.php');
   }

catch(PDOException $e)
{
      echo $sql . "<br>" . $e->getMessage();
}
$conn = null;
}
?>
