<?php
$username="root";
$pass="muffan";
$dbname="webprojet";
$servername="localhost";

try{
    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $pass);

    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
}

?>
