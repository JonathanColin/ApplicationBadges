
<?php
	
	include 'fonctions.php';
	sessionExiste();
	include 'bd.php';
	
	if($_POST["valider"] == "Retour"){
		header("Location: accueil.php");
		exit(0);
	}
	
	if(!empty($_POST['nom']) && !empty($_POST['prenom'])){
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$parking = $_POST['parking'];
		$pass = $_POST['pass'];
		$bureau = $_POST['bureau'];
		$fz = $_POST['FZ'];
		$periode = $_POST['periode'];
		
		if(strlen($nom)>20 OR strlen($prenom)>20){
			header("Location: creationIdentite.php?erreur=NPlong");
			exit(0);
		}
		
		$connexion = connexion();
		
		$queryIdExiste =  mysqli_query($connexion,"SELECT * FROM identites WHERE Nom='$nom' and Prénom='$prenom'");
		
		if(mysqli_num_rows($queryIdExiste) > 0){
			header("Location: creationIdentite.php?erreur=idExiste");
			mysqli_close($connexion);
			exit(0);
		}
		
		
		$queryIdentite = mysqli_query($connexion,"INSERT INTO identites (Nom,Prénom,Parking,Pass,Accès_Bureau,Bureau_FZ,Période) VALUES ('$nom','$prenom','$parking','$pass','$bureau','$fz','$periode')");
		
		header("Location: accueil.php");
		mysqli_close($connexion);			
	
	
	}
	else{
		header("Location: creationIdentite.php?erreur=champs");
	}
?>






