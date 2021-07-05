
<?php
	include 'bd.php';
	
	if(!empty($_POST['user_login']) && !empty($_POST['user_password'])){
		$login = $_POST['user_login'];
		$mdp = $_POST['user_password'];
					
		$connexion = connexion();
		
		$query = mysqli_query($connexion,"SELECT * FROM utilisateurs WHERE Login= '$login' and mdp= '$mdp'");
		
		if($nb_lignes = mysqli_num_rows($query) == 1){
			session_start();
			$user_connecte = mysqli_fetch_array($query);
			$_SESSION['login'] = $user_connecte["Login"];
			$_SESSION['mdp'] = $user_connecte["mdp"]; 
			$_SESSION['Prenom'] = $user_connecte["Nom"]; 
			$_SESSION['Nom'] = $user_connecte["Prénom"]; 
			$_SESSION['role'] = $user_connecte["Rôle"];
			header("Location: accueil.php");
		}
		else{
			header("Location: index.php?erreur=mauvaislog");
			
		}
					
					
		mysqli_close($connexion);			
	}
	else{
		header("Location: index.php?erreur=pasloginoumdp");
	}
?>






