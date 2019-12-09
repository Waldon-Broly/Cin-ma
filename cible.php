<!DOCTYPE html>  
<html>	
   <head>
   <meta charset="utf-8" />  
   </head>
   <body>
   		<?php
		// inclusion de l'entête de la page et du menu
		echo '<section>';
		//ouverture de la connexion
		// remplacez votrebase par le nom de votre base de données
		$dsn = 'mysql:host=etu-php-mysql.iut2.upmf-grenoble.fr;dbname=riachiw0';
		// remplacez login par votre login 
		$login= 'riachiw';
		// remplacez motdepasse par votre mot de passe d'accès à la base de données
		$motDePasse = '3610';
		
		// exception levée si la connexion à la base de données échoue
		try
		{

			$connect = new PDO($dsn, $login, $motDePasse, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		
		}
		catch (Exception $e) 
		{
    	die('erreur de connexion: '.$e->getMessage() );
		}
		?>
		
		<?php
		// Récupération des paramètres
		$Nom=htmlspecialchars($_POST['Nom']);
		$Prénom=htmlspecialchars($_POST['Prenom']);
		$Film=htmlspecialchars($_POST['Film']);
		$Commentaires=htmlspecialchars($_POST['Commentaires']);
		$Civilité=htmlspecialchars($_POST['Civilité']);
		$Note=htmlspecialchars($_POST['Note']);
		$Type=htmlspecialchars($_POST['Type']);
		?>
		
		<?php
		//Requête préparée
		$query="INSERT into AVIS(Nom,Prenom,Civilité,Type,Film,Note,Commentaires) VALUES (?,?,?,?,?,?,?)";
		$insert=$connect->prepare($query);	
		$tableau=array($Nom,$Prénom,$Civilité,$Type,$Film,$Note,$Commentaires);
		
		if($_POST["Note"]==null)
		{ echo "L'insertion à échoué. La saisie d'une note est obligatoire. Veuillez donc saisir une note. <br/>";}
		else {	
		 
		$insert->execute($tableau);
		echo 'Merci. Votre avis a été pris en compte et servira aux prochains visiteurs.';
		}
		
		echo $Note;
		
		?>
		

   </body>

</html>