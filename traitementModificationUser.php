
<?php
	
	include 'fonctions.php';
	sessionExiste();
	include 'bd.php';
	
	if($_POST["valider"] == "Retour"){
		header("Location: afficherComptes.php");
		exit(0);
	}
	
	if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['login']) && !empty($_POST['mdp'])){
		
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$login = $_POST['login'];
		$mdp = $_POST['mdp'];
		$role = $_POST['role'];
		$ancienLogin = $_POST['ancienLog'];
		
		if(strlen($nom)>20 OR strlen($prenom)>20){
			header("Location: afficherComptes.php?erreur=NPlong");
			exit(0);
		}
		
		$connexion = connexion();

		$queryUpdate = mysqli_query($connexion,"UPDATE utilisateurs SET Login='$login', mdp='$mdp', Nom='$nom', Prénom='$prenom', Rôle='$role' WHERE Login='$ancienLogin'");
		
		header("Location: afficherComptes.php");
		mysqli_close($connexion);			
	
	}
	else{
		header("Location: afficherComptes.php?erreur=champs");
		exit(0);
	}

?>






