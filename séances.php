<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>SEANCES</title>
        <link rel="stylesheet" href="séance.css" />
		<link rel="shortcut icon" type="image/x-icon" href="Images/logo ciné.jpg" />
    </head>
	
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
	

	
	$idfilm =  htmlspecialchars($_GET["idfilm"]);
	$idcine =  htmlspecialchars($_GET["idcine"]);
	
	$requete1= $connect-> prepare ('select  nomfilm  FROM FILMS WHERE idfilm= ? ');
	$requete2= $connect-> prepare ('select  nomcine  FROM CINEMAS WHERE idcine= ? ');
	$requete3= $connect-> prepare ('select  description  FROM FILMS WHERE idfilm= ?');
	$requete1->execute(array($idfilm));
	$requete2->execute(array($idcine));	
	$requete3->execute(array($idfilm));
	$resultatRequeteNomFilm = $requete1->fetch();
	$resultatRequeteNomCine = $requete2->fetch();
	$resultatRequeteSynopsis = $requete3->fetch();
	
	
	
    ?>
	
    <body >
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
       
           
                 
					
					 <?php
					 if($idfilm != null )  {
					 echo "<h1>Les séances du film  ${resultatRequeteNomFilm[0]}</h1>"; 
					 }
					 
           ?>
					 <?php
					 if ($idcine != null )  {
					 echo "<h1>Les séances du cinéma ${resultatRequeteNomCine[0]}</h1>"; 
					 }
           ?>
            </div>
            <br />
        
    

		<div class="article">
		<p>

		<?php
	// inclusion de l'entête de la page et du menu
	

	//echo "<span style='color:white'>Identifiant du film passé en paramètre : >$idfilm< </span>";
	
	// si l'identifiant est vide : on fait une requete sur tous les flms
 if ($idfilm != null){
	  $requete= $connect->prepare ('select idsceance, jour, heure, nomcine, nomfilm, description  FROM SEANCES,FILMS,CINEMAS WHERE SEANCES.idfilm= ? and SEANCES.idcine= CINEMAS.idcine AND SEANCES.idfilm = FILMS.idfilm');
	
	  $requete->execute(array($idfilm));
	// Si l'identifiant n'est pas vide, on fait la requete sur les séances du film passé en paramètre

	echo '<article>'; 
	echo "<table>";
	echo '<TR>';
	
	echo '<TD>';
    echo 'Jour de la séance';
    echo '</TD>';
    echo '<TD>';
    echo 'Heure de la séance ';
    echo '</TD>';
	echo '<TD>';
	echo 'Nom du cinéma';
	echo '</TD>';
	echo '</TR>';
	
	// foreach ($tableau as $row)
	while($donnees = $requete->fetch() )
	{
		echo '<TR>';
		
		echo '<TD>'; 
		echo $donnees['jour']; 
		echo '</TD>';

		echo '<TD>'; 
		echo $donnees['heure']; 
		echo '</TD>';
		
		echo '<TD>'; 
		echo $donnees['nomcine']; 
		echo '</TD>';
		
		echo '</TR>';	
		
	}

		echo '</table>';
		echo '</article>'; 

		
		echo '<article>';
		echo "<h2> Synopsis du film ${resultatRequeteNomFilm[0]} :  </h2> ";
		echo "${resultatRequeteSynopsis[0]}";
		echo '</article>';

		
	
	
	
	$requete->closeCursor();

 }
 
    if ($idcine != null){
	  $requete= $connect->prepare ('select nomcine, SEANCES.idcine, CINEMAS.idcine, jour, heure, nomfilm  FROM SEANCES,FILMS,CINEMAS WHERE SEANCES.idcine= ? and SEANCES.idcine= CINEMAS.idcine and SEANCES.idfilm=FILMS.idfilm');
	
	  $requete->execute(array($idcine));
	// Si l'identifiant n'est pas vide, on fait la requete sur les séances du film passé en paramètre

	echo '<article>'; 
	echo "<table>";
	echo '<TR>';
	echo '<TD>';
	echo 'Nom du film';
	echo '</TD>';
	echo '<TD>';
    echo 'Jour de la séance';
    echo '</TD>';
    echo '<TD>';
    echo 'Heure de la séance ';
    echo '</TD>';
	echo '</TR>';
	
	// foreach ($tableau as $row)
	while($donnees = $requete->fetch() )
	{
		echo '<TR>';
		
		echo '<TD>'; 
		echo $donnees['nomfilm']; 
		echo '</TD>';
		
		echo '<TD>'; 
		echo $donnees['jour']; 
		echo '</TD>';

		echo '<TD>'; 
		echo $donnees['heure']; 
		echo '</TD>';
		
		echo '</TR>';
	}

	echo '</table>';
	echo '</article>'; 
	
	$requete->closeCursor();

}        
?>


		</div>

        <br/>

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