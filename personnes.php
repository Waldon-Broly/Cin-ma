<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>PERSONNES</title>
        <link rel="stylesheet" href="cinéma.css" />
		<link rel="shortcut icon" type="image/x-icon" href="Images/logo ciné.jpg" />
    </head>

    <body>
    <header>
				<nav>
				
				<li><a href="Questionnaire.php" height="30px" id="lien"><strong>COMMENTAIRES</strong></a></li> 
				<li><a href="cinéma.php" id="lien"><strong>CINEMAS</strong></a></li>
				<li><a href="films.php" id="lien"><strong>FILMS</strong></a></li>
				<li><a href="accueil.php" id="lien"><strong>ACCUEIL</strong></a></li>
			    <a href="index.php" id="lien"><img src="Images/logo ciné.jpg" alt="Logo ciné" height="60" id="logo"/></a>	
				</nav>
	</header>
   
                   
            <div class="container">
       
                    <h1>LES ACTEURS ET REALISATEURS</h1>
           
            </div>
            <br />
        
    
		<div class="row">
		<p>

		<?php
	// inclusion de l'entête de la page et du menu

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

	$idpersonne =  htmlspecialchars($_GET["idpersonne"]);	
	$requete= $connect->prepare ('select nom, age, nationalité, metier  FROM PERSONNES WHERE idpersonne= ?');
	$requete->execute(array($idpersonne));
	echo '<section>';	
	echo "<table>";     #Faire un tableau
	echo '<TR>';		#Faire la bordure externe du tableau
	echo '<TD>';		#Faire la bordure interne de la cellule
	echo 'Nom ';
	echo '</TD>';
	echo '<TD>';
    echo 'Age';
    echo '</TD>';
	echo '<TD>';
    echo 'Nationalité';
    echo '</TD>';
	echo '<TD>';
    echo 'Métier';
    echo '</TD>';
	echo '</TR>';	
	// foreach ($tableau as $row)
	while($donnees = $requete->fetch() )
	{
		echo '<TR>';
		echo '<TD>'; 
		echo $donnees['nom']; 
		echo '</TD>';
		echo '<TD>'; 
		echo $donnees['age']; 
		echo '</TD>';	
		echo '<TD>'; 
		echo $donnees['nationalité']; 
		echo '</TD>';	
		echo '<TD>'; 
		echo $donnees['metier']; 
		echo '</TD>';	
		echo '</TR>';
	}
	echo '</table>';
	echo '</article>'; 
	$requete->closeCursor();
	echo '</section>';                     
?>


		</div>

        <br /><br /><br /><br />
            <section>
			 					<form action="cinéma.php" method = "POST">
						<label> Rechercher un acteur ou un réalisateur : <input type='texte' placeholder ="Vide pour tout afficher" name='titre'>
						<select name="nom">
							<option value=''> Choisir un acteur ou un réalisateur </option>

							<?php
							$requete = $connect-> query('SELECT distinct(nom) FROM PERSONNES');
							while ($donnees = $requete->fetch())
							{
								echo '<option value='.$donnees['nom'].'>'.$donnees['nom'].'</option>';
							}
							?>

						</select>
						<input type= 'submit' value = 'Rechercher'>
					</form>

			</section><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
			
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