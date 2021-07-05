<!DOCTYPE html>
<html>
	<head>
		<?php include 'head.php'; ?>
		<title>VALOCIME/ Application Badges - Modification d'un compte utilisateur</title>
	</head>
	<body>
		<?php
			
			include 'fonctions.php';
			sessionExiste();
			include 'menu.php';
			include 'bd.php';
			
			$connexion = connexion();
			
			if($_SESSION['role'] == "Administrateur"){
			
				$login = $_GET['log'];
				
				if($_GET['type'] == "mod"){
					
					$queryModif = mysqli_query($connexion,"SELECT * FROM utilisateurs WHERE Login='$login'");
					$user_modification = mysqli_fetch_array($queryModif);
					$role = $user_modification['Rôle'];?>				
					
					<h1>Modification du compte</h1>
					<div class="conteneur">
						<div class="d-flex justify-content-center align-middle form_container border rounded blue-container cadre">
							<fieldset>
								<legend>Nouvelles informations</legend>
													
								<form method="POST" action="traitementModificationUser.php">
									<div class="form-group red-text">
									</div>		
									<div class="form-group">
										</br>
										<div class="input-group input-groupe-sm">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1">Nom</span>
												</div>
												<input class="form-control" type="text" id="nom" name="nom" value=<?php echo $user_modification['Nom'];?>>
										</div>
										</br>
										<div class="input-group input-groupe-sm">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1">Prénom</span>
												</div>
												<input class="form-control" type="text" id="prenom" name="prenom" value=<?php echo $user_modification['Prénom'];?>>
										</div>
										</br>
										<div class="input-group input-groupe-sm">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1">Login</span>
												</div>
												<input class="form-control" type="text" id="login" name="login" value=<?php echo $user_modification['Login'];?>>
										</div>
										</br>
										<div class="input-group input-groupe-sm">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1">Mot de passe</span>
												</div>
												<input class="form-control" type="password" id="mdp" name="mdp" value=<?php echo $user_modification['mdp'];?>>
										</div>
										</br>
										<div class="input-group input-groupe-sm">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1">Rôle</span>
											</div>
											<select class="form-select" name="role" aria-label="Default select example">
												<?php if($role == "Administrateur"){ ?>
													<option selected value="Administrateur">Administrateur</option>
													<option value="Utilisateur">Utilisateur</option>
													<option value="Invité">Invité</option>
												<?php }elseif($role == "Responsable"){ ?>
													<option value="Administrateur">Administrateur</option>
													<option selected value="Responsable">Responsable</option>
													<option value="Invité">Invité</option>
												<?php }else{?>
													<option value="Administrateur">Administrateur</option>
													<option value="Responsable">Responsable</option>
													<option selected value="Invité">Invité</option>
												<?php } ?>
											</select>
										</div>
										<div class="input-group input-groupe-sm">
												<input class="form-control invisible" type="text" id="ancienLog" name="ancienLog" value=<?php echo $login;?>>
										</div>
									</div>
									<div class="form-group">
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
					
					
			<?php
				}elseif($_GET['type'] == "supp"){

					$querySupp = mysqli_query($connexion,"DELETE FROM utilisateurs WHERE Login='$login'");
					
					header("Location: afficherComptes.php");
					exit(0);
				}
				mysqli_close($connexion);
			
			}else{
				header("Location: accueil.php");
			}
			?>
		<script type="text/javascript" src="scripts.js"></script>
	</body>
</html>