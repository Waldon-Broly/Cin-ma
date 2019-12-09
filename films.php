<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>FILMS</title>
        <link rel="stylesheet" href="film.css" />
		<link rel="shortcut icon" type="image/x-icon" href="Images/logo ciné.jpg" />
    </head>

    <body >
	
    <header>
	
				<nav>
				
				<li><a href="Questionnaire.php" height="30px" id="lien"><strong>COMMENTAIRES</strong></a></li> 
				<li><a href="cinéma.php" id="lien"><strong>CINEMAS</strong></a></li>				
				<li><a href="accueil.php" id="lien"><strong>ACCUEIL</strong></a></li>


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
			

			
			<div class="container">
		
		
					<h1>LES FILMS</h1>
			
			</div>
			<br />
  
			
		<div class="article">
		
		
		<?php

		// $requete= "select idfilm, nomfilm,acteurprincipal,realisateur from FILMS, PERSONNES where FILMS.acteurprincipal = PERSONNES.idpersonne ";
		//$requete = $connect->query('SELECT idfilm, nomfilm, idpersonne, nom, acteurprincipal, realisateur FROM FILMS,PERSONNES WHERE FILMS.acteurprincipal = PERSONNES.idpersonne OR FILMS.realisateur = PERSONNES.idpersonne');
		$requete = $connect->query('SELECT idfilm, nomfilm, ACTEUR.idpersonne as idActeur, ACTEUR.nom as nomActeur , REALISATEUR.idpersonne as idRealisateur , REALISATEUR.nom as nomRealisateur , acteurprincipal, realisateur FROM FILMS, PERSONNES as ACTEUR, PERSONNES as REALISATEUR WHERE FILMS.acteurprincipal = ACTEUR.idpersonne AND FILMS.realisateur = REALISATEUR.idpersonne');
		// $requete = $connect->prepare('SELECT .... FROM .. WHERE var1 = ?') ?:variable qui change
		// $requete->execute(array($variable));
	
		// $resultat = $connect->query($requete) or die(print_r($connect->errorInfo()));

		// $tableau=$resultat->fetchAll(PDO::FETCH_ASSOC);

	
		echo '<div>';
		echo "<table>";
		
		echo '<TR>';
		echo '<TD>';
		echo 'Nom du film';
		echo '</TD>';
		echo '<TD>';
		echo 'Acteur';
		echo '</TD>';
		echo '<TD>';
		echo 'Réalisateur';
		echo '</TD>';		
		echo '</TR>';
			
		// foreach ($tableau as $row)
		while($donnees = $requete->fetch() )
		{
		echo '<TR>';
		echo '<TD>';
		echo '<a href="séances.php?idfilm='. $donnees['idfilm'] . '">' . $donnees['nomfilm'] . '</a>';
		echo '</TD>';
		
		echo '<TD>';
        echo '<a href="personnes.php?idpersonne='. $donnees['idActeur']. '">' . $donnees['nomActeur'] . '</a>';
        echo '</TD>';
		
		echo '<TD>';
        echo '<a href="personnes.php?idpersonne='. $donnees['idRealisateur']. '">' . $donnees['nomRealisateur'] . '</a>';
        echo '</TD>';
		echo '</TR>';
		}

		echo '</table>';
		echo '</div>';
		$requete->closeCursor();

		$requete1 = $connect->query('SELECT film, Nom, Prenom, Type, Commentaires, Note FROM AVIS');

		echo '<div>';
		echo "<table>";
		echo '<br/>';
		
		echo '<TR>';
		
		echo '<TD>';
		echo 'Nom du film';
		echo '</TD>';
		
		echo '<TD>';
		echo 'Nom';
		echo '</TD>';
		
		echo '<TD>';
		echo 'Prénom';
		echo '</TD>';	
		
		echo '<TD>';
		echo 'Type';
		echo '</TD>';	
		
		echo '<TD>';
		echo 'Note';
		echo '</TD>';	
		
		echo '<TD>';
		echo 'Commentaires';
		echo '</TD>';	
	
		echo '</TR>';
		
		echo '<label > Les avis sur ces films : </label>';
		while($donnees = $requete1->fetch() )
		{

		
		echo '<TR>';
		echo '<TD>';
		echo $donnees['film'];
		echo '</TD>';
		
		echo '<TD>';
        echo $donnees['Nom'];
        echo '</TD>';
		
		echo '<TD>';
        echo $donnees['Prenom'];
        echo '</TD>';
		
		echo '<TD>';
        echo $donnees['Type'];
        echo '</TD>';	
		
		echo '<TD>';
        echo $donnees['Note'];
        echo '</TD>';
	
		echo '<TD>';
        echo $donnees['Commentaires'];
        echo '</TD>';
		
		echo '</TR>';	
		
		}
		echo '</table>';
		
		echo '</div>';
		$requete1->closeCursor();
		
		?>
		
		</div>
		
		</br></br></br></br>
		 		<section>
					
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
					</form>

			</section><br/><br/>
		 

			
	    <footer>
            <p><img src="Images/separateur.png" alt="separateur" width="500" height="3" id="trait"/><br/>
            <strong>  Contact : cinémax@gmail.com 2018/2019 -  Département STID</br>
            Adresse :<a href="https://www.google.com/maps/place/B.S.H.M./@45.1927904,5.7737438,15z/data=!4m5!3m4!1s0x0:0xd944ed39f935ef1!8m2!3d45.1927904!4d5.7737438" id="lien"><strong> 1251 Avenue Centrale, 38400 Saint-Martin-d'Hères</strong></a><br/>
			Site réalisé par Waïl Riachi et Noé Lebreton.			
			<img src="Images/separateur.png" alt="separateur" width="500" height="3" id="trait"/></p>
		</footer> 
	    
	    	    <a href="#top"><img src="Images/haut.png" height= "30"  alt="haut de page" id="fleche" /></a>
	        
	</div>
	
    </body>
</html>