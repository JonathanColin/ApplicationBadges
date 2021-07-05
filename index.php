<!DOCTYPE html>
<html>
	<head>
		<?php include 'head.php'; ?>
		<title>VALOCIME/ Application Badges - Page de connexion</title>
	</head>
	<body>
		<?php
			include 'fonctions.php';
		?>
		<div class="conteneur">
			<h1>Gestion des badges</h1>
			<div class="d-flex justify-content-center align-middle form_container border rounded blue-container cadre">
				<fieldset>
					<div class="text-center img-container">
						<img src="img/logo-valocime2.png" class="img-circle" alt="Logo_Valocime">
					</div>
					</br></br>
					<legend>Connexion</legend>
					</br></br>
					<div class="form-group red-text">
						<?php
							messageConnexion();
						?>
					</div>
					</br>
					<form method="POST" action="traitementConnexion.php">
						<div class="form-group">
							<div class="input-group input-groupe-sm">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Login</span>
									</div>
									<input class="form-control" type="text" id="login" name="user_login">
							</div>
						</div>
						</br>
						<div class="form-group">
							<div class="input-group input-groupe-sm">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Mot de passe</span>
									</div>
									<input class="form-control" type="password" id="psswd" name="user_password">
							</div>
						</div>
						<div class="form-group">
							</br>
							</br>
							<div class="button ">
								<input type="submit" class="btn btn-primary justify-content-center" name="connexion" value="Connexion"/>
							</div>
						</div>
					</form>
				</fieldset>
			</div>
		</div>
	</body>
</html>