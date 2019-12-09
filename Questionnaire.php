<!DOCTYPE html>  
<html>
	
	
	<head> 
		<meta charset="utf-8" />             
		<meta name="Language" content="fr" />         
		<meta name="Description" content="Description de votre page" />
		<title> Vos avis </title>
		<link rel="stylesheet"href="questionnaire.css"/>
		<link rel="shortcut icon" type="image/x-icon" href="Images/logo ciné.jpg" />
	</head>
	<body> 		
    <header>
				<nav>

				<li><a href="cinéma.php" id="lien"><strong>CINEMAS</strong></a></li>				
				<li><a href="films.php" id="lien"><strong>FILMS</strong></a></li>
				<li><a href="accueil.php" id="lien"><strong>ACCUEIL</strong></a></li>
				
			    <a href="index.php" id="lien"><img src="Images/logo ciné.jpg" alt="Logo ciné" height="60" id="logo"/></a>	
				</nav>
	</header>
	
	<div class=container>
		
		<h1>VOS AVIS SUR LE FILM <br/></h1><br/><br/>

	</div>

		<div class="article">
		<form method="post" action="cible.php" > <!-- Création de formulaire -->
		<fieldset>
		<legend>Votre Identité</legend><br/> <!-- Informations personnelles/identité -->
		<label for="Nom">Nom :</label><input type="text" name="Nom" id="Nom"/>
		<label for="Prenom" >Prénom :</label><input type="text" name="Prenom" /><br/><br/>		
		<label >Civilité : </label>
		<input type="radio" name="Civilité" value="Mme" id="CivMme" /><label for="CivMme">Madame</label>
		<input type="radio" name="Civilité" value="Mle" id="CivMle"/><label for="CivMle">Mademoiselle</label>
		<input type="radio" name="Civilité" value="Mr" id="CivMr" /><label for="CivMr">Monsieur</label><br/><br/>		
		<label>Vous êtes : </label>
		<input type="radio" name="Type" value="Une personne faisant partie des médias"  id="médias"/><label for="médias">Une personne faisant partie des médias</label>
		<input type="radio" name="Type" value="Un internaute"  id="médias"/><label for="médias">Un internaute</label>
		<input type="radio" name="Type" value="Un spectateur/visiteur/client"  id="médias"/><label for="médias">Un spectateur/visiteur/client</label>
		</fieldset><br/>
		<fieldset>
		<legend> Votre Avis </legend><br/>		
		<label for="idMessage"> Le film que vous avez vu: </label>
		<textarea name="Film"  id="idMessage" rows="1" cols="20"></textarea> <br/><br/>
		<label>Votre note de -1 à 5 concernant ce film :</label>
		<input type="radio" name="Note" value="-1" id="Note-1"/><label for="Note-1">-1</label>
		<input type="radio" name="Note" value="0" id="Note0"/><label for="Note0">0</label>
		<input type="radio" name="Note" value="1" id="Note1"/><label for="Note1">1</label>
		<input type="radio" name="Note" value="2" id="Note2"/><label for="Note2">2</label>
		<input type="radio" name="Note" value="3" id="Note3"/><label for="Note3">3</label>
		<input type="radio" name="Note" value="4" id="Note4"/><label for="Note4">4</label>
		<input type="radio" name="Note" value="5" id="Note5"/><label for="Note5">5</label><br/><br/>
		<label id="Sugges" for="idMessage">Vos remarques/commentaires/suggestions :</label><br/>
		<textarea name="Commentaires"  id="idMessage" rows="5" cols="90"></textarea> <br/><br/>
		</fieldset></br>		
		<input type="submit" value="Envoyer" />
		<input type="reset" value="Annuler" />
		</form></br>
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