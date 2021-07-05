<!DOCTYPE html>
<html>
	<head>
		<?php include 'head.php'; ?>
		<title>VALOCIME/ Application Badges - Création d'un compte utilisateur</title>
	</head>
	<body>
		<?php 
			include 'fonctions.php';
			sessionExiste();
			include 'menu.php';
			if($_SESSION['role'] == "Administrateur"){
		?>
		<h1>Création d'un compte</h1>
		<div class="conteneur">
			<div class="d-flex justify-content-center align-middle form_container border rounded blue-container cadre">
				<fieldset>
					<legend>Nouveau compte</legend>
					<form method="POST" action="traitementCreationCompte.php">
						<div class="form-group red-text">
							<?php
								erreurCreationCompte();
							?>
						</div>		
						<div class="form-group">
							</br>
							<div class="input-group input-groupe-sm">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Nom</span>
									</div>
									<input class="form-control" type="text" id="nom" name="nom">
							</div>
							</br>
							<div class="input-group input-groupe-sm">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Prénom</span>
									</div>
									<input class="form-control" type="text" id="prenom" name="prenom">
							</div>
							</br>
							<div class="input-group input-groupe-sm">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Login</span>
									</div>
									<input class="form-control" type="text" id="login" name="login">
							</div>
							</br>
							<div class="input-group input-groupe-sm">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Mot de passe</span>
									</div>
									<input class="form-control" type="password" id="mdp" name="mdp">
							</div>
							</br>
							<div class="input-group input-groupe-sm">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Rôle</span>
								</div>
								<select class="form-select" name="role" aria-label="Default select example">
									<option value="Administrateur">Administrateur</option>
									<option value="Responsable">Responsable</option>
									<option selected value="Invité">Invité</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							</br>
							</br>
							<div class="button ">
								<input type="submit" class="btn btn-primary justify-content-center" name="valider" value="Retour"/>
								<input type="submit" class="btn btn-primary justify-content-center" name="valider" value="Valider"/>
							</div>
						</div>
					</form>
				</fieldset>
			</div>
		</div>
		<script type="text/javascript" src="scripts.js"></script>
	</body>
</html>
			<?php 
			}else{
				header("Location: accueil.php");
			}	
			?>