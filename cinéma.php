<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>LES CINEMAS</title>
        <link rel="stylesheet" href="cinéma.css" />
		<link rel="shortcut icon" type="image/x-icon" href="Images/logo ciné.jpg" />
    </head>

    <body >
			<?php
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
	
			<header>
			
			<nav>					
			<li><a href="Questionnaire.php" id="lien"><strong>COMMENTAIRES</strong></a></li>	
			<li><a href="films.php" id="lien"><strong>FILMS</strong></a></li>
			<li><a href="accueil.php" id="lien"><strong>ACCUEIL</strong></a></li> 
			</nav>
             
			<a href="index.php" id="lien"><img src="Images/logo ciné.jpg" alt="Logo ciné" height="60" id="logo"/></a>			
			
			</header>

			 
			 
			 
			<div class="container">
		
			

					<h1>LES CINEMAS</h1>
			</div>
			<br />

			
	<section>
	<div class="row">
	<p>
	
	<?php
	// inclusion de l'en-tête de la page et du menu
	//require_once("header.php");
	//require_once("menu.php");
	echo '<H3>' ; 
	echo 'Liste des cinémas' ; 
	echo '</H3>';  
	//requête
	$requete= "select nomcine, adresse,idcine from CINEMAS";
	// exécution de la requête
	$resultat = $connect->query($requete) or die(print_r($connect->errorInfo()));
	//récupération du tableau associatif
	$tableau=$resultat->fetchAll(PDO::FETCH_ASSOC); #PDO::fetchAll — Retourne un tableau contenant toutes les lignes du jeu d'enregistrements 

	echo '<article>'; 
	//affichage de tout le tableau
	echo "<table>";
		echo '<TR>';
		echo '<TD>';
		echo 'Nom du cinéma';
		echo '</TD>';
		echo '<TD>';
        echo 'Adresse du cinéma';
        echo '</TD>';
		echo '</TR>';
	
	foreach ($tableau as $row){
	//while($donnees = $requete->fetch() ){
		echo '<TR>';
		//echo '<TD>'; 
		//$nomcine = $row['nomcine'];
		//echo $row['nomcine']; 
		echo '<TD>';
		echo '<a href="séances.php?idcine='. $row['idcine'] . '">' . $row['nomcine'] . '</a>';
		echo '</TD>';
		echo '<TD>'; 
		echo $row['adresse']; 
		echo '</TD>';
		echo '</TR>';
	}
	echo '</table>';
	echo '</article>'; 
	//après avoir traité chaque requête
	$resultat->closeCursor();
	///require_once("footer.php");
	?>


	</section>
			<br/>
            <section>
			 					<form action="cinéma.php" method = "POST">
						<label> Rechercher un cinéma : <input type='texte' placeholder ="Vide pour tout afficher" name='titre'>
						<select name="nomcine">
							<option value=''> Choisir un cinéma </option>

							<?php
							$requete = $connect-> query('SELECT distinct(nomcine) FROM CINEMAS');
							while ($donnees = $requete->fetch())
							{
								echo '<option value='.$donnees['nomcine'].'>'.$donnees['nomcine'].'</option>';
							}
							?>

						</select>
						<input type= 'submit' value = 'Rechercher'>
					</form>

			</section>
		</div>
		
	    <footer>
            <p><img src="Images/separateur.png" alt="separateur" width="500" height="3" id="trait"/><br/>
            <strong>  Contact : cinémax@gmail.com 2018/2019 -  Département STID</br>
            Adresse :<a href="https://www.google.com/maps/place/B.S.H.M./@45.1927904,5.7737438,15z/data=!4m5!3m4!1s0x0:0xd944ed39f935ef1!8m2!3d45.1927904!4d5.7737438" id="lien"><strong> 1251 Avenue Centrale, 38400 Saint-Martin-d'Hères</strong></a><br/>
			Site réalisé par Waïl Riachi et Noé Lebreton.
			 <img src="Images/separateur.png" alt="separateur" width="500" height="3" id="trait"/></p>
		</footer> 

		
	    <a href="#top"><img src="Images/haut.png" height= "30"  alt="haut de page" id="fleche" /></a>
	    
    </body>
</html>