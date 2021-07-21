
<?php
//function qui retourne le score de l'utilisateur

function solo()
	{
		// les identifiants pour se connecter a PHPmYsQl

	$username = "root";
	$password = "muffan";
	$dbname = "webprojet";
	$servername = "localhost";
	$ps = $_SESSION['ps'];
	$pwd = $_SESSION['pwd'];
		try
			{
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

			// set the PDO error mode to exception

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$req = $conn->prepare("SELECT ps,val,dat FROM `Score` where ps= '$ps' ");
			$req->execute();
			$R = $req->fetchAll();
			foreach($R as $resul)
				{
					echo 	"<tr>";
							echo	"<td>";
									echo	"$resul[ps]";
						echo		"</td>";
								echo "<td>";
									echo	"$resul[val]";
								echo "</td>";
								echo "<td>";
									echo "$resul[val]";
								echo"</td>";
						echo "</tr>";

					}
			$conn = null;
			}

		catch(PDOException $e){
			echo $conn . "<br />" . $e->getMessage();
			}
		}

		//function qui retourne le MEILLEUR score depuis la base de donnée

function gl()
	{
		// les identifiants pour se connecter a PHPmYsQl

	$username = "root";
	$password = "muffan";
	$dbname = "webprojet";
	$servername = "localhost";
	$ps = $_SESSION['ps'];
	$pwd = $_SESSION['pwd'];
	try
		{
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

		// set the PDO error mode to exception

		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$request = $conn->prepare("SELECT ps,val,dat FROM Score WHERE val > 2000 ORDER BY ID desc LIMIT 10;");
		$request->execute();
		$R = $request->fetchAll();
		foreach($R as $result)
			{
//affichage du tableau dans la page
			echo 	"<tr>";
					echo	"<td>";
							echo	"$result[ps]";
				echo		"</td>";
						echo "<td>";
							echo	"$result[val]";
						echo "</td>";
						echo "<td>";
							echo "$result[val]";
						echo"</td>";
				echo "</tr>";
			}

		$conn = null;
		}

	catch(PDOException $e)
		{
		echo $conn . "<br />" . $e->getMessage();
		}
	}

?>
