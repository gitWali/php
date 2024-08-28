<!adresse im Browser: http://localhost/codes/neu_Waligorski_Henning_mTools.php

<!Doctype html>

<html lang="de">
	<head>
		<meta charset="UTF-8">
		<title>mTool-Medizinshop</title>
	</head>

	<body>
		<head>
			<h1>Herzlich wilkommen bei mTool</h1>
			<p> Bestellen Sie etwas von den unten stehenden medizinischen Artikeln</p>
		</header>
		
		<form action="" method="post">
	
		  
			<h1>Bestellformular</h1>
				
			<h2>Ihre Kontaktdaten</h2>
		
				<p>
					<label for="Herr"> Herr: </label> <input type="radio" value="Herr" name="Geschlecht" id="Herr" checked>   
					<br> 
					<label for "Frau"> Frau:  </label> <input type="radio" value="Frau" name="Geschlecht" id="Herr">   
				</p>
		
				<p>
					Vorname:   <input type="text" size="20" maxlength="20" value="Max" name="Vorname"> <br>  
					Nachname:   <input type="text" size="20" maxlength="20" value="Mustermann" name="Nachname"><br> 
				</p>
		 
				<h2>Produktmenge auswählen</h2>
		
				 <label for="Reflexhammer"> Reflexhammer: </label> <input type="number" min="0" name="Reflexhammer"> 
				 <br>
				 <label for="Zeckenzangen"> Zeckenzangen: </label> <input type="number" min="0" name="Zeckenzangen" >

				<h2>Sonstiges</h2>
				<p>Zustimmung AGB: <input type="checkbox" name="AGB" </p>
				<p>Newsletter <input type="checkbox" name="Newsletter"  </p>
		
				<br><br>
		
				<input type="reset" value="Zurücksetzen">
				<input type="submit" name="Bestellen" value="Bestellen">
		
		</form>
	
	<?php
		if (isset($_POST['Bestellen'])) 
		{
			
			function anrede($geschlecht)
			{
				if ($geschlecht == "Herr")	/*Ausgabe von Sehr geehrter Herr, wenn Herr gewählt wird*/
				{
					echo  "Sehr geehrter Herr";
				} 
				else if ($geschlecht == "Frau")	/*Ausgabe von Sehr geehrte Frau, wenn Frau gewählt wird*/
				{
					echo  "Sehr geehrte Frau";
				} 
				else	/*Ausgabe, wenn keins von beiden gewählt ist, was derzeit nicht eintreten kann, da Herr immer vorgewählt ist.*/
				{
					echo  "Sehr geehrte(r) Kundin/Kunde";
				}
			}
			
			function bestellzahlen($reflexhammer, $zeckenzangen)	/*Funktion für die Ausgabe der Menge der bestellen Reflexhammer und Zeckenzangen*/
			{
				echo "Sie haben $reflexhammer Reflexhammer und $zeckenzangen Zeckenzangen bestellt.";
			}
			
			function agb($agb)
			{
				echo $agb ? "Sie haben unseren AGB´s zugestimmt." : "Sie haben unseren AGB noch nicht zugestimmt."; 
			}
			
			function newsletter($news)
			{
				echo $news ? "JA" : "NEIN";
			}
			
			function abschiedsklausel()
			{
				echo "Vielen Dank $anrede $Nachname für Ihre Bestellung bei mTools.";
			}
			
			function gesamtpreis($reflexhammer , $zeckenzangen)
			{
				$p_r = 16.90;	/*Preis für die Reflexhammer*/
				$p_z = 14.50;	/*Preis für die Zeckenzangen*/
				echo ($reflexhammer * $p_r) + ($zeckenzangen * $p_z);
			}
			
			
			$geschlecht = $_POST['Geschlecht'];
			$vorname = $_POST['Vorname'];
			$nachname = $_POST['Nachname'];
			$anzahl_reflexhammer = $_POST['Reflexhammer'];
			$anzahl_zeckenzange = $_POST['Zeckenzangen'];
			$agb_zustimmung = isset($_POST['AGB']);
			$newsletter = isset($_POST['Newsletter']);
			$gesamtpreis = gesamtpreis($anzahl_reflexhammer , $anzahl_zeckenzange);
			$bestellzahlen = bestellzahlen($anzahl_reflexhammer , $anzahl_zeckenzange);
			$anrede = anrede($geschlecht);
    
			if (!$agb_zustimmung) 
			{
				echo '<p style="color:red; font-weight:bold; font-size:1.2em;">Sie haben unseren AGB noch nicht zugestimmt.</p>';
				exit();
			}
			
			
			echo "<h2>Bestätigung</h2>";
			echo "<p> $anrede $svorname $snachname!</p>";
			echo "<p>$bestellzahlen</p>";
			echo "<p> Der Gesamtpreis Ihrer Bestellung beträgt: " . gesamtpreis($reflexhammer , $zeckenzangen) . "</p>";
			echo "<p>" . agb($agb_zustimmung) . "</p>";
			echo "<p>Sie wollen unseren Newsletter beziehen:" . newsletter($news) . "</p>";
			echo "<p> " . abschiedsklausel() ."</p>";
			}
		?>

		

	</body>
</html>