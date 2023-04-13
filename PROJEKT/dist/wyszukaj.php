<?php
	include 'autoryzacja.php';

	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)	
	or die('Bład połączenia z serwerem: '.mysqli_connect_error($conn));	
	echo 'Połączenie udane <br>';	

	mysqli_query($conn, 'SET NAMES utf8');
?>


<!DOCTYPE>

<html>
<head>
		<title> Patrycja Bobowska </title>
			<meta charset="utf-8">
</head>
	
<body>

<?php
	if((isset($_POST['imie'])) && (isset($_POST['nazwisko'])))
	{
		//echo - sprawdzenie poprawności zapytania
/*		echo "SELECT gracze.imie, gracze.nazwisko, druzyny.nazwa FROM gracze JOIN druzyny ON gracze.druzyna_id=druzyny.druzyna_id WHERE gracze.imie='".$_POST['imie']."' AND gracze.nazwisko='".$_POST['nazwisko']."'";
*/
			
		$result=mysqli_query($conn,"SELECT gracze.imie, gracze. nazwisko, druzyny.nazwa FROM gracze LEFT JOIN druzyny ON gracze.druzyna_id=druzyny.druzyna_id WHERE gracze.imie='".$_POST['imie']."' && gracze.nazwisko='".$_POST['nazwisko']."'")			
		or die("Błąd w zapytaniu do tabeli gracze");
		
			while($row=mysqli_fetch_array($result)){
		echo "<h3>".$row['imie']." ".$row['nazwisko']." => ".$row['nazwa']."<br></h3>";
		}
		}
?>


		<form action="wyszukaj.php" method="POST">
			
					<h1>dane:</h1><br>
				Nazwisko: <input type="text" name="nazwisko"><br>
				Imię: <input type="text" name="imie"><br>

				<input type="submit" value="Szukaj"><br><br>	
		</form>
</body>
</html>