<!DOCTYPE html>
<html>
	<head>
		<?php include 'head.php'; ?>
		<title>VALOCIME/ Application Badges - Affichage des comptes</title>
	</head>
	<body>
		<?php
		
			include 'fonctions.php';
			sessionExiste();
			erreurModificationCompte();
			include 'bd.php';
			include 'menu.php';
			if($_SESSION['role'] == "Administrateur"){
		
		?>
		
		<h1>Les comptes pouvant accéder à l'outil</h1>
		<table class="table table-striped table-dark table-hover table-bordered text-center d-flex justify-content-center">
			<tr>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Login</th>
				<th>Mot de passe</th>
				<th>Rôle</th>
				<th>Actions</th>
			</tr>
			<?php
				$connexion = connexion();
				
				$query = mysqli_query($connexion,"SELECT Nom,Prénom,Login,mdp,Rôle FROM utilisateurs ORDER BY Nom");
				foreach($query as $id){
					echo"<tr><td>".$id['Nom']."</td><td>".$id['Prénom']."</td><td class='log'>".$id['Login']."</td><td type='password'>".$id['mdp']."</td><td class='role'>".$id['Rôle']."</td><td><button type='button' class='btn btn-warning'>Modifier</button> <button type='button' class='btn btn-danger'>Supprimer</button></td></tr>";
				}
				
			?>
		</table>
		<script type="text/javascript" src="scripts.js"></script>
	</body>
</html>
<?php
			}else{
				header("Location: accueil.php");
			}
?>