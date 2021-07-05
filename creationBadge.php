<!DOCTYPE html>
<html>
	<head>
		<?php include 'head.php'; ?>
		<title>VALOCIME/ Application Badges - Création d'un badge</title>
	</head>
	<body>
		<?php
		
			include 'fonctions.php';
			sessionExiste();
			include 'bd.php';
			include 'menu.php';
			if($_SESSION['role'] == "Administrateur"){
		?>
		<h1>Création d'un nouveau badge</h1>
		<div class="conteneur">
			<div class="d-flex justify-content-center align-middle form_container border rounded blue-container cadre">
					<fieldset>
						<legend>Ajouter un badge</legend>
						</br>
						</br>
						<form method="POST" action="traitementAjoutBadge.php">
							<div class="form-group">
								<div class="row">
									<div class="input-group input-groupe-sm">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">Type de badge</span>
										</div>
										<select class="form-select" id="select" name="typeBadge" onchange="choixSelect()" aria-label="Default select example">
											<option selected value="telecommande">Télécommande</option>
											<option value="badge_noir">Badge Noir</option>
											<option value="badge_bleu">Badge Bleu</option>
											<option value="cafe">Café</option>
											<option value="indigo">Indigo</option>
											<option value="alarme">Alarme</option>
										</select>
									</div>
								</div>
								</br>
								<div class="row">
									<div class="input-group input-groupe-sm">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">Id du badge</span>
										</div>
										<input class="form-control" type="text" id="Id_badge" name="Id_badge">
										<select class="form-select cacher" id="selectAlarme" name="selAlarme" aria-label="Default select example">
											<?php 
												$connexion=connexion();
												$idAlarme = array('Noir-1','Noir-2','Noir-3','Noir-4','Noir-5','Noir-6','Noir-7','Noir-8','Noir-9',
												'Blanc-1','Blanc-2','Blanc-3','Blanc-4','Blanc-5','Blanc-6','Blanc-7','Blanc-8','Blanc-9',
												'Bleu-1','Bleu-2','Bleu-3','Bleu-4','Bleu-5','Bleu-6','Bleu-7','Bleu-8','Bleu-9',
												'Vert-1','Vert-2','Vert-3','Vert-4','Vert-5','Vert-6','Vert-7','Vert-8','Vert-9',
												'Rouge-1','Rouge-2','Rouge-3','Rouge-4','Rouge-5','Rouge-6','Rouge-7','Rouge-8','Rouge-9','OUI','NON');
												$copie = $idAlarme;
												$queryIdAlarme = mysqli_query($connexion,"SELECT Id_Alarme FROM alarme");
												foreach($queryIdAlarme as $ids){
													unset($copie[array_search($ids['Id_Alarme'], $copie)]);
												}
												
												foreach($copie as $badge){
													echo "<option value='$badge'>$badge</option>";
												}
											?>
											
										</select>
									</div>
								</div>
								</br>
								<div class="row">
									<div class="input-group input-groupe-sm">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">Statut du badge</span>
										</div>
										<select class="form-select" name="Statut_badge" aria-label="Default select example">
											<option selected value="ACTIF">ACTIF</option>
											<option value="PERDU">PERDU</option>
											<option value="PRET">PRET</option>
											<option value="RENDU">RENDU</option>
										</select>
									</div>
								</div>
								</br>
								</br>
								<div class="row">
									<div class="button">
										<input type="submit" class="btn btn-primary justify-content-center" name="valider" value="Retour"/>
										<input type="submit" class="btn btn-primary justify-content-center" name="valider" value="Valider"/>
									</div>
								</div>
							</div>
						</form>
					</fieldset>
			</div>
		</div>
		<script>
			function choixSelect(){
				var value = document.getElementById("select").value;
				if(value == "alarme"){
					document.getElementById("selectAlarme").className = "form-select afficher";
					document.getElementById("Id_badge").className = "form-control cacher";
				}else{
					document.getElementById("Id_badge").className = "form-control afficher";
					document.getElementById("selectAlarme").className = " form-select cacher";
				}
			}
		</script>
		<script type="text/javascript" src="scripts.js"></script>
			<?php
				}else{
					header("Location: accueil.php");
				} 
			?>
	</body>
	
</html>
