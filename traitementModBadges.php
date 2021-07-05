<!DOCTYPE html>
<html>
	<head>
		<?php include 'head.php'; ?>
		<title>VALOCIME/ Application Badges - Modification d'une Identité et ses badges</title>
	</head>
	
	
	<?php
		include 'fonctions.php';
		sessionExiste();
		include 'menu.php';
		include 'bd.php';
		
		$connexion = connexion();
		
			
		if($_SESSION['role'] != "Invité"){
			$id = $_POST['id'];
			
			if($_POST['valider']=="Tout Supprimer"){
				$querySuppTele = mysqli_query($connexion,"UPDATE telecommande SET Id_Identité=NULL,Statut='RENDU' WHERE Id_Identité='$id'");
				$querySuppNoir = mysqli_query($connexion,"UPDATE badge_noir SET Id_Identité=NULL,Statut='RENDU' WHERE Id_Identité='$id'");
				$querySuppBleu = mysqli_query($connexion,"UPDATE badge_bleu SET Id_Identité=NULL,Statut='RENDU' WHERE Id_Identité='$id'");
				$querySuppCafe = mysqli_query($connexion,"UPDATE cafe SET Id_Identité=NULL,Statut='RENDU' WHERE Id_Identité='$id'");
				$querySuppIndigo = mysqli_query($connexion,"UPDATE indigo SET Id_Identité=NULL,Statut='RENDU' WHERE Id_Identité='$id'");
				$querySuppAlarme = mysqli_query($connexion,"UPDATE alarme SET Id_Identité=NULL,Statut='RENDU' WHERE Id_Identité='$id'");
				$querySuppressionId = mysqli_query($connexion,"DELETE FROM identites WHERE Id_Identité='$id'");
				header("Location: accueil.php");
				exit(0);
			}
			elseif($_POST['valider'] == "Supprimer un ou plusieurs Badges"){?>
				<body>
					<h1>Suppression(s) de badge(s)</h1>
					<div class="conteneur">
						<div class="d-flex justify-content-center align-middle form_container border rounded blue-container cadre">
							<fieldset>
								<legend>Supprimer un ou plusieurs badge(s)</legend>
								</br>
								</br>
								<form method="POST" action="traitementSuppBadge.php">
									<div class="form-group">
									<?php
											
										$queryBadges = mysqli_query($connexion,"SELECT * FROM telecommande WHERE Id_Identité='$id'");
										foreach($queryBadges as $badges){
											$id_B = $badges['Id_Télécommande'];
											echo "
												<div class='row'>
													<div class='input-group input-groupe-sm'>
														<div class='input-group-prepend col-md'>
															<div class='input-group-text'>
																<input class='checkbox' type='checkbox' name='Télécommande[]' value='$id_B' aria-label='Checkbox for following text input'>
																<label for='Télécommande'>$id_B</label>
															</div>
														</div>
														<div class='input-group-append col-md'>
															<span class='input-group-text'>Télécommande</span>
														</div>
														<div class='input-group-append col-md'>
															<span class='input-group-text'>".$badges['Statut']."</span>
														</div>
														</div>
												</div>
												</br>";
										}
										
										$queryBadges = mysqli_query($connexion,"SELECT * FROM badge_noir WHERE Id_Identité='$id'");
										foreach($queryBadges as $badges){
											$id_B = $badges['Id_Badge_Noir'];
											echo "
												<div class='row'>
													<div class='input-group input-groupe-sm'>
														<div class='input-group-prepend' col-md>
															<div class='input-group-text'>
																<input class='checkbox' type='checkbox' name='badge_noir[]' value='$id_B' aria-label='Checkbox for following text input'>
																<label for='badge_noir'>$id_B</label>
															</div>
														</div>
														<div class='input-group-append col-md'>
															<span class='input-group-text'>Badge Noir</span>
														</div>
														<div class='input-group-append col-md'>
															<span class='input-group-text'>".$badges['Statut']."</span>
														</div>
														</div>
												</div>
												</br>";
										}
										$queryBadges = mysqli_query($connexion,"SELECT * FROM badge_bleu WHERE Id_Identité='$id'");
										foreach($queryBadges as $badges){
											$id_B = $badges['Id_Badge_Bleu'];
											echo "
											<div class='row'>
												<div class='input-group input-groupe-sm'>
													<div class='input-group-prepend col-md'>
															<div class='input-group-text'>
																<input class='checkbox' type='checkbox' name='badge_bleu[]' value='$id_B' aria-label='Checkbox for following text input'>
																<label for='badge_bleu'>$id_B</label>
															</div>
														</div>
														<div class='input-group-append col-md'>
															<span class='input-group-text'>Badge Bleu</span>
														</div>
														<div class='input-group-append col-md'>
															<span class='input-group-text'>".$badges['Statut']."</span>
														</div>
														</div>
												</div>
												</br>";
										}
											$queryBadges = mysqli_query($connexion,"SELECT * FROM cafe WHERE Id_Identité='$id'");
										foreach($queryBadges as $badges){
											$id_B = $badges['Id_Café'];
											echo "
												<div class='row'>
													<div class='input-group input-groupe-sm'>
														<div class='input-group-prepend col-md'>
															<div class='input-group-text'>
																<input class='checkbox' type='checkbox' name='cafe[]' value='$id_B' aria-label='Checkbox for following text input'>
																<label for='cafe'>$id_B</label>
															</div>
														</div>
														<div class='input-group-append col-md'>
															<span class='input-group-text'>Café</span>
														</div>
														<div class='input-group-append col-md'>
															<span class='input-group-text'>".$badges['Statut']."</span>
														</div>
														</div>
												</div>
												</br>";
										}
										$queryBadges = mysqli_query($connexion,"SELECT * FROM indigo WHERE Id_Identité='$id'");
										foreach($queryBadges as $badges){
											$id_B = $badges['Id_Parking'];
											echo "
												<div class='row'>
													<div class='input-group input-groupe-sm'>
														<div class='input-group-prepend col-md'>
															<div class='input-group-text'>
																<input class='checkbox' type='checkbox' name='indigo[]' value='$id_B' aria-label='Checkbox for following text input'>
																<label for='indigo'>$id_B</label>
															</div>
														</div>
														<div class='input-group-append col-md'>
															<span class='input-group-text'>Indigo</span>
														</div>
														<div class='input-group-append col-md'>
															<span class='input-group-text'>".$badges['Statut']."</span>
														</div>
														</div>
												</div>
												</br>";
										}
										$queryBadges = mysqli_query($connexion,"SELECT * FROM alarme WHERE Id_Identité='$id'");
										foreach($queryBadges as $badges){
											$id_B = $badges['Id_Alarme'];
											echo "
												<div class='row'>
													<div class='input-group input-groupe-sm'>
														<div class='input-group-prepend col-md'>
															<div class='input-group-text'>
																<input class='checkbox' type='checkbox' name='alarme[]' value='$id_B' aria-label='Checkbox for following text input'>
																<label for='alarme'>$id_B</label>
															</div>
														</div>
														<div class='input-group-append col-md'>
															<span class='input-group-text'>Alarme</span>
														</div>
														<div class='input-group-append col-md'>
															<span class='input-group-text'>".$badges['Statut']."</span>
														</div>
														</div>
												</div>
												</br>";
										}
									?>
										</br>
										<div class="row">
											<div class="button">
												<input class="form-control" type="hidden" id="id" name="id" value=<?php echo $id?>>
												<input class="form-control" type="hidden" id="nomB" name="nomB" value=<?php echo $_POST['nomB']?>>
												<input class="form-control" type="hidden" id="prenomB" name="prenomB" value=<?php echo $_POST['prenomB']?>>
												<input type="submit" class="btn btn-primary justify-content-center" name="valider" value="Retour"/>
												<input type="submit" class="btn btn-primary justify-content-center" name="valider" value="Valider"/>
											</div>
										</div>
									</div>
								</form>
							</fieldset>
						</div>
					</div>
				</body>
			
			<?php
			}
			elseif($_POST['valider']=="Ajouter un badge"){?>
			<body>
				<h1>Ajout d'un badge à l'identité</h1>
				<div class="conteneur">
					<div class="d-flex justify-content-center align-middle form_container border rounded blue-container cadre">
							<fieldset>
								<legend>Ajoute du badge</legend>
								</br>
								</br>
								<form method="POST" action="traitementIdAjoutBadge.php">
									<div class="form-group">
										<div class="row">
											<div class="form-check">
												<input class="form-check-input" type="radio" name="radioBadge" value="telecommande" id="flexRadioDefault1" onchange="afficheForm('tele','noir','bleu','cafe','indigo','alarme')" checked>
												<label class="form-check-label" for="flexRadioDefault1">Télécommande</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="radio" name="radioBadge" value="badge_noir" id="flexRadioDefault2" onchange="afficheForm('noir','tele','bleu','cafe','indigo','alarme')">
												<label class="form-check-label" for="flexRadioDefault2">Badge Noir</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="radio" name="radioBadge" value="badge_bleu" id="flexRadioDefault3" onchange="afficheForm('bleu','tele','noir','cafe','indigo','alarme')">
												<label class="form-check-label" for="flexRadioDefault3">Badge Bleu</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="radio" name="radioBadge" value="cafe" id="flexRadioDefault4" onchange="afficheForm('cafe','tele','noir','bleu','indigo','alarme')">
												<label class="form-check-label" for="flexRadioDefault4">Café</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="radio" name="radioBadge" value="indigo" id="flexRadioDefault5" onchange="afficheForm('indigo','tele','noir','bleu','cafe','alarme')">
												<label class="form-check-label" for="flexRadioDefault4">Indigo</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="radio" name="radioBadge" value="alarme" id="flexRadioDefault6" onchange="afficheForm('alarme','tele','noir','bleu','cafe','indigo')">
												<label class="form-check-label" for="flexRadioDefault4">Alarme</label>
											</div>
										</div>
										</br>
										<div class="row" id="tele">
											<div class="input-group input-groupe-sm">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1">Le badge Télécommande</span>
												</div>
												<select class="form-select" name="tele">
													<?php
														$queryBadgesDispos = mysqli_query($connexion,"SELECT * FROM telecommande WHERE Id_Identité IS NULL");
														foreach($queryBadgesDispos as $tele){
															echo "<option value=".$tele['Id_Télécommande'].">".$tele['Id_Télécommande']."</option>";
														}
													?>
												</select>
											</div>
										</div>
										<div class="row cacher" id="noir">
											<div class="input-group input-groupe-sm">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1">Le badge Noir</span>
												</div>
												<select class="form-select" name="noir">
													<?php
														$queryBadgesDispos = mysqli_query($connexion,"SELECT * FROM badge_noir WHERE Id_Identité IS NULL");
														foreach($queryBadgesDispos as $badgeN){
															echo "<option value=".$badgeN['Id_Badge_Noir'].">".$badgeN['Id_Badge_Noir']."</option>";
														}
													?>
												</select>
											</div>
										</div>
										<div class="row cacher" id="bleu">
											<div class="input-group input-groupe-sm">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1">Le badge Bleu</span>
												</div>
												<select class="form-select" name="bleu">
													<?php
														$queryBadgesDispos = mysqli_query($connexion,"SELECT * FROM badge_bleu WHERE Id_Identité IS NULL");
														foreach($queryBadgesDispos as $badgeB){
															echo "<option value=".$badgeB['Id_Badge_Bleu'].">".$badgeB['Id_Badge_Bleu']."</option>";
														}
													?>
												</select>
											</div>
										</div>
										<div class="row cacher" id="cafe">
											<div class="input-group input-groupe-sm">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1">Le badge Café</span>
												</div>
												<select class="form-select" name="bCafe">
													<?php
														$queryBadgesDispos = mysqli_query($connexion,"SELECT * FROM cafe WHERE Id_Identité IS NULL");
														foreach($queryBadgesDispos as $cafe){
															echo "<option value=".$cafe['Id_Café'].">".$cafe['Id_Café']."</option>";
														}
													?>
												</select>
											</div>
										</div>
										<div class="row cacher" id="indigo">
											<div class="input-group input-groupe-sm">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1">Le badge Indigo</span>
												</div>
												<select class="form-select" name="indigo">
													<?php
														$queryBadgesDispos = mysqli_query($connexion,"SELECT * FROM indigo WHERE Id_Identité IS NULL");
														foreach($queryBadgesDispos as $indigo){
															echo "<option value=".$indigo['Id_Parking'].">".$indigo['Id_Parking']."</option>";
														}
													?>
												</select>
											</div>
										</div>
										<div class="row cacher" id="alarme">
											<div class="input-group input-groupe-sm">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1">Alarme</span>
												</div>
												<select class="form-select" name="alarme">
													<?php
														$queryBadgesDispos = mysqli_query($connexion,"SELECT * FROM alarme WHERE Id_Identité IS NULL");
														foreach($queryBadgesDispos as $alarme){
															echo "<option value=".$alarme['Id_Alarme'].">".$alarme['Id_Alarme']."</option>";
														}
													?>
												</select>
											</div>
										</div>
										</br>
										</br>
										<div class="row">
											<div class="button">
												<input class="form-control" type="hidden" id="id" name="id" value=<?php echo $id?>>
												<input class="form-control" type="hidden" id="nomB" name="nomB" value=<?php echo $_POST['nomB']?>>
												<input class="form-control" type="hidden" id="prenomB" name="prenomB" value=<?php echo $_POST['prenomB']?>>
												<input type="submit" class="btn btn-primary justify-content-center" name="valider" value="Retour"/>
												<input type="submit" class="btn btn-primary justify-content-center" name="valider" value="Valider"/>
											</div>
										</div>
									</div>
								</form>
							</fieldset>
						</div>
					</div>
				</body>
		<?php
			}else{
				$queryRecupIdentite =  mysqli_query($connexion,"SELECT * FROM identites WHERE Id_Identité='$id'");
				$user_choisi = mysqli_fetch_array($queryRecupIdentite);
			
		?>
		<body>
			<h1>Modification de l'identité</h1>
			<div class="conteneur">
				<div class="d-flex justify-content-center align-middle form_container border rounded blue-container cadre">
					<fieldset>
						<legend>L'identité</legend>
									
						<form method="POST" action="traitementModificationBadgeId.php">
							<div class="form-group red-text">
							</div>
						
							<div class="form-group">
								<input class="form-control" type="hidden" id="id" name="id" value=<?php echo $id?>>
								<input class="form-control" type="hidden" id="id" name="id" value=<?php echo $id?>>
								<div class="input-group input-groupe-sm">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">Nom</span>
										</div>
										<input class="form-control" type="text" id="nom" name="nom" value=<?php echo $user_choisi['Nom'] ?>>
								</div>
							</br>
								<div class="input-group input-groupe-sm">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">Prénom</span>
										</div>
										<input class="form-control" type="text" id="prenom" name="prenom" value=<?php echo $user_choisi['Prénom'] ?>>
								</div>
							</div>
							</br></br>
							<legend>Télécommande</legend>
							<div class="form-group">
								<?php 
									$queryRecupStatutTele = mysqli_query($connexion,'SELECT * FROM telecommande WHERE Id_Identité='.$id);
									foreach($queryRecupStatutTele as $badge){
									
									echo "
									<div class='input-group input-groupe-sm'>
										<input class='form-control' type='text' id='id_tele' name='id_tele[]' value=".$badge['Id_Télécommande']." readonly='readonly'/>
								
										<div class='input-group-prepend'>
											<span class='input-group-text' id='basic-addon1'>Statut</span>
										</div>
										<select class='form-select' name='tele[]' aria-label='Default select example'>";
										StatutModBadges($badge['Statut']);
										echo"
										</select>
										
									</div>
									</br>";
									}
									
								?>
								
								
							</div>
							</br>
							<legend>Badge Noir</legend>
							<div class="form-group">
							
								<?php 
									$queryRecupStatutNoir = mysqli_query($connexion,'SELECT * FROM badge_noir WHERE Id_Identité='.$id);

									foreach($queryRecupStatutNoir as $badge){	
									echo "
									<div class='input-group input-groupe-sm'>
										<input class='form-control' type='text' id='id_badgeN' name='id_badgeN[]' value=".$badge['Id_Badge_Noir']." readonly='readonly'/>
								
										<div class='input-group-prepend'>
											<span class='input-group-text' id='basic-addon1'>Statut</span>
										</div>
										<select class='form-select' name='badgeN[]' aria-label='Default select example'>";
										StatutModBadges($badge['Statut']);
										echo"
										</select>
										
									</div>
									</br>";
									}
								?>
							</div>
							</br>
							<div class="form-group">
								<legend>Badge Bleu</legend>
								
								<?php 
									$queryRecupStatutBleu = mysqli_query($connexion,"SELECT * FROM badge_bleu WHERE Id_Identité=".$id);

									foreach($queryRecupStatutBleu as $badge){	
									echo "
									<div class='input-group input-groupe-sm'>
										<input class='form-control' type='text' id='id_badgeB' name='id_badgeB[]' value=".$badge['Id_Badge_Bleu']." readonly='readonly'/>
								
										<div class='input-group-prepend'>
											<span class='input-group-text' id='basic-addon1'>Statut</span>
										</div>
										<select class='form-select' name='badgeB[]' aria-label='Default select example'>";
										StatutModBadges($badge['Statut']);
										echo"
										</select>
										
									</div>
									</br>";
									}
								?>
							</div>
							</br>
							<div class="form-group">
								<legend>Badge Café</legend>
								
								<?php 
									$queryRecupStatutCafe = mysqli_query($connexion,"SELECT * FROM cafe WHERE Id_Identité=".$id);

									foreach($queryRecupStatutCafe as $badge){	
									echo "
									<div class='input-group input-groupe-sm'>
										<input class='form-control' type='text' id='id_cafe' name='id_cafe[]' value=".$badge['Id_Café']." readonly='readonly'/>
										<div class='input-group-prepend'>
											<span class='input-group-text' id='basic-addon1'>Statut</span>
										</div>
										<select class='form-select' name='cafe[]' aria-label='Default select example'>";
										StatutModBadges($badge['Statut']);
										echo"
										</select>
										
									</div>
									</br>";
									}
								?>
							</div>
							</br>
							<div class="form-group">
								<legend>Badge Indigo</legend>
								
								<?php 
									$queryRecupStatutIndigo = mysqli_query($connexion,"SELECT * FROM indigo WHERE Id_Identité=".$id);

									foreach($queryRecupStatutIndigo as $badge){	
									echo "
									<div class='input-group input-groupe-sm'>
										<input class='form-control' type='text' id='id_indigo' name='id_indigo[]' value=".$badge['Id_Parking']." readonly='readonly'/>
										<div class='input-group-prepend'>
											<span class='input-group-text' id='basic-addon1'>Statut</span>
										</div>
										<select class='form-select' name='indigo[]' aria-label='Default select example'>";
										StatutModBadges($badge['Statut']);
										echo"
										</select>
										
									</div>
									</br>";
									}
								?>
							</div>
							</br>
							<div class="form-group">
								<legend>Alarme</legend>
								
								<?php 
									$queryRecupStatutAlarme = mysqli_query($connexion,"SELECT * FROM alarme WHERE Id_Identité=".$id);

									foreach($queryRecupStatutAlarme as $badge){	
									echo "
									<div class='input-group input-groupe-sm'>
										<input class='form-control' type='text' id='id_alarme' name='id_alarme[]' value=".$badge['Id_Alarme']." readonly='readonly'/>
										<div class='input-group-prepend'>
											<span class='input-group-text' id='basic-addon1'>Statut</span>
										</div>
										<select class='form-select' name='alarme[]' aria-label='Default select example'>";
										StatutModBadges($badge['Statut']);
										echo"
										</select>
										
									</div>
									</br>";
									}
								?>
								</br>
							</div>
							</br>
							<legend>Autres Badges</legend>
							<div class="form-group">
								<div class="input-group input-groupe-sm">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Parking</span>
									</div>
									<select class="form-select" name="parking" aria-label="Default select example">
										<?php if($user_choisi['Parking'] == "OUI"){ ?>
											<option selected value="OUI">Oui</option>
											<option value="NON">Non</option>
											<option value="CODE">Code</option>
										<?php }elseif($user_choisi['Parking'] == "NON"){ ?>
											<option value="OUI">Oui</option>
											<option selected value="NON">Non</option>
											<option value="CODE">Code</option>
										<?php }else{ ?>
											<option value="OUI">Oui</option>
											<option value="NON">Non</option>
											<option selected value="CODE">Code</option>
										<?php } ?>
									</select>
								</div>
								</br>
								<div class="input-group input-groupe-sm">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Clé Pass</span>
									</div>
									<select class="form-select" name="pass" aria-label="Default select example">
										<?php if($user_choisi['Pass'] == "OUI"){ ?>
											<option selected value="OUI">Oui</option>
											<option value="NON">Non</option>
										<?php }else{ ?>
											<option value="OUI">Oui</option>
											<option selected value="NON">Non</option>
										<?php } ?>
									</select>
								</div>
								</br>
								<div class="input-group input-groupe-sm">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Clé Accès Bureau</span>
									</div>
									<select class="form-select" name="bureau" aria-label="Default select example">
										<?php if($user_choisi['Accès_Bureau'] == "OUI"){ ?>
											<option selected value="OUI">Oui</option>
											<option value="NON">Non</option>
										<?php }else{ ?>
											<option value="OUI">Oui</option>
											<option selected value="NON">Non</option>
										<?php } ?>
									</select>
								</div>
								</br>
								<div class="input-group input-groupe-sm">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Bureau FZ</span>
									</div>
									<select class="form-select" name="FZ" aria-label="Default select example">
										<?php if($user_choisi['Bureau_FZ'] == "OUI"){ ?>
											<option selected value="OUI">Oui</option>
											<option value="NON">Non</option>
										<?php }else{ ?>
											<option value="OUI">Oui</option>
											<option selected value="NON">Non</option>
										<?php } ?>
									</select>
								</div>
								</br>
								<div class="input-group input-groupe-sm">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Période d'accès</span>
									</div>
									<select class="form-select" name="periode" aria-label="Default select example">
										<?php if($user_choisi['Période'] == "Du Lundi au Vendredi"){ ?>
											<option selected value="Du Lundi au Vendredi">Du Lundi au Vendredi</option>
											<option value="Du Lundi au Dimanche">Du Lundi au Dimanche</option>
										<?php }else{ ?>
											<option value="Du Lundi au Vendredi">Du Lundi au Vendredi</option>
											<option selected value="Du Lundi au Dimanche">Du Lundi au Dimanche</option>
										<?php } ?>
									</select>
								</div>
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
			<?php } 
				mysqli_close($connexion);
			?>
			<script>
				function afficheForm(idChoix, id2, id3, id4, id5, id6){
					document.getElementById(idChoix).className = 'afficher';
					document.getElementById(id2).className = 'cacher';
					document.getElementById(id3).className = 'cacher';
					document.getElementById(id4).className = 'cacher';
					document.getElementById(id5).className = 'cacher';
					document.getElementById(id6).className = 'cacher';
				}
			</script>
			
		</body>
	<?php }else{
		header("Location: accueil.php");
	} ?>
	<script type="text/javascript" src="scripts.js"></script>
</html>