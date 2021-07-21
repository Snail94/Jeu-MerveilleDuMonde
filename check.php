
<?php
session_start();
$ps = $_POST['ps'];
$pwd = $_POST['pwd'];
$username = "root";
$pass = "muffan";
$dbname = "webprojet";
$servername = "localhost";

if ((isset($ps) and !(is_null($ps))))
	{
	$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $pass);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$request = $dbh->prepare("SELECT COUNT(*) as nb FROM utilisateur WHERE  ps LIKE '$ps' AND PWD LIKE '$pwd'");
	$request->execute();
	$result = $request->fetch(PDO::FETCH_ASSOC);

	// test de l'existance du login et password dans la BDD

	if ($result['nb'] == 1)
		{
		$_SESSION['ps'] = $ps;
		header("Location: index.php");
		}
	  else
		{
		echo "ps non valide";
		}
	}
  else
	{
	echo "ps vide";
	header("Location: index.php");
	}

/*
<?php
$ps=$_POST['ps'];
$pwd=$_POST['pwd'];
$username="root";
$pass="muffan";
$dbname="webprojet";
$servername="localhost";

if((isset($ps) and !(is_null($ps))) ){
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $pass);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$request= $dbh -> prepare("SELECT COUNT(*) as nb FROM utilisateur WHERE  ps LIKE '$ps' AND PWD LIKE '$pwd'");
$request -> execute();
$result = $request -> fetch(PDO::FETCH_ASSOC);

// test de l'existance du login et password dans la BDD

if($result['nb'] == 1 ){
echo"ps valid et mdp";
header("Location: index.php");

}
  else {
echo"ps non valide";
}
}
  else {
echo"ps vide";
header("Location: index.php");
}

?>

*/
?>
