<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Ciné'Max </title>
        <link rel="stylesheet" href="cinémax.css" />
		<link rel="shortcut icon" type="image/x-icon" href="Images/logo ciné.jpg" />
    </head>

    <body >
	
    		<header>
			<nav>
					<li><a href="Questionnaire.php" height="30px" id="lien"><strong>COMMENTAIRES</strong></a></li> 
					<li><a href="accueil.php" height="30px" id="lien"><strong>ACCUEIL</strong></a></li> 
					
				
						
					<a href="index.php" id="lien"><img src="Images/logo ciné.jpg" alt="Logo ciné" height="60" id="logo"/></a>
				
			</nav>
			</header>
			
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
			
			<div class="recherche">
					
					<form action="films.php" method = "POST">
						<label> Rechercher un film : <input type='texte' placeholder ="Vide pour tout afficher" name='titre'>
						<select name="nomfilm">
							<option value=''> Choisir un film </option>

							<?php
							$requete = $connect-> query('SELECT distinct(nomfilm) FROM FILMS');
							while ($donnees = $requete->fetch())
							{
								echo '<option value='.$donnees['nomfilm'].'>'.$donnees['nomfilm'].'</option>';
							}
							?>

						</select>
						<input type= 'submit' value = 'Rechercher'>
					</form><br/>
						
			      
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

	
					
					
			</div>
			
			<div class="container">
					<h1> Bienvenue sur Ciné'Max </h1>
			</div><br/><br/>
			
			<div class="article">
		
		
		
			<h2>Présentation :</h2>
			<p> Retrouvez tous les films au Ciné'Max, les séances dans tous les cinémas d'Isère, la liste des meilleurs films à voir, et bien plus encore ... </br></br>
			Les avis des personnes sont là pour aider les spectateurs à choisir leurs films. <br/>
			Laissez donc vos avis en cliquant sur l'onglet "<a href="Questionnaire.php" height="30px" id="lien"><strong>commentaires</strong></a>" en haut à droite ! <br/> <br/>
			Cliquez sur la page d'<a href="accueil.php" height="30px" id="lien"><strong>accueil</strong></a> pour avoir plus d'informations.
			</br>
			</p>

			</div>
			
			<br/><br/></br></br></br></br>
			
			
	
	    <footer>
             <p><img src="Images/separateur.png" alt="separateur" width="500" height="3" id="trait"/>
            <strong>  Contact : cinémax@gmail.com 2018/2019 -  Département STID</br>
            Adresse :<a href="https://www.google.com/maps/place/B.S.H.M./@45.1927904,5.7737438,15z/data=!4m5!3m4!1s0x0:0xd944ed39f935ef1!8m2!3d45.1927904!4d5.7737438" id="lien"><strong> 1251 Avenue Centrale, 38400 Saint-Martin-d'Hères</strong></a><br/>
			Site réalisé par Waïl Riachi et Noé Lebreton.
             
			 <img src="Images/separateur.png" alt="separateur" width="500" height="3" id="trait"/></p>
		</footer> 
			    <a href="#top"><img src="Images/haut.png" height= "30"  alt="haut de page" id="fleche" /></a>
	   </body>		
	    
	        
	
	

</html>