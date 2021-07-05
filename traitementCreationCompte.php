
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
		
		if(strlen($nom)>20 OR strlen($prenom)>20){
			header("Location: creationCompte.php?erreur=NPlong");
			exit(0);
		}
		
		$connexion = connexion();
		
		$queryUserExist = mysqli_query($connexion,"SELECT * FROM utilisateurs WHERE Login='$login'");
		if($nb_lignes = mysqli_num_rows($queryUserExist) > 0){
			header("Location: creationCompte.php?erreur=logExist");
			exit(0);
		}
		
		
		$queryInsert = mysqli_query($connexion,"INSERT INTO utilisateurs(Login,mdp,Nom,Prénom,Rôle) VALUES ('$login','$mdp','$nom','$prenom','$role')");
		header("Location: afficherComptes.php");
		mysqli_close($connexion);			
	
	
	}
	else{
		header("Location: creationCompte.php?erreur=champs");
		exit(0);
	}

?>






