<!DOCTYPE html>
<html>
	<head>
		<?php
			include 'head.php';
			include 'fonctions.php';
		?>
		<title>VALOCIME/ Application Badges - Recherche</title>
	</head>
	<body>
		<?php
			
			sessionExiste();
			include 'menu.php';
			include 'bd.php';
		?>
		
		<h1>Résultat de la recherche pour "<?php echo $_POST['srch-term'] ?>"</h1>
		<table class="table table-striped table-dark table-hover table-bordered d-flex justify-content-center">
			<tr>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Type de badge</th>
				<th>Id du Badge</th>
				<th>Statut</th>
								
			</tr>
			<?php
				$connexion = connexion();
				$id = $_POST['srch-term'];
				
				$queryIdTele = mysqli_query($connexion,"SELECT * FROM telecommande LEFT JOIN identites ON telecommande.Id_Identité=identites.Id_Identité WHERE Id_Télécommande LIKE '%$id%'");
				if($nb_lignes = mysqli_num_rows($queryIdTele) > 0){
					foreach($queryIdTele as $tele){
						if(!isset($tele['Nom'])){
							$tele['Nom'] = "Non Attribué";
							$tele['Prénom'] = "Non Attribué";
						}
						echo"<tr><td>".$tele['Nom']."</td><td>".$tele['Prénom']."</td><td>Télécommande</td><td>".$tele['Id_Télécommande']."</td><td>".$tele['Statut']."</td></tr>";
					}
				}	
				
				$queryIdBadgeN = mysqli_query($connexion,"SELECT * FROM badge_noir LEFT JOIN identites ON badge_noir.Id_Identité=identites.Id_Identité WHERE Id_Badge_Noir LIKE '%$id%'");
				if($nb_lignes = mysqli_num_rows($queryIdBadgeN) > 0){
					foreach($queryIdBadgeN as $badgeN){
						if(!isset($badgeN['Nom'])){
							$badgeN['Nom'] = "Non Attribué";
							$badgeN['Prénom'] = "Non Attribué";
						}
						echo"<tr><td>".$badgeN['Nom']."</td><td>".$badgeN['Prénom']."</td><td>Badge Noir</td><td>".$badgeN['Id_Badge_Noir']."</td><td>".$badgeN['Statut']."</td></tr>";
					}
				}
				
				$queryIdBadgeB = mysqli_query($connexion,"SELECT * FROM badge_bleu LEFT JOIN identites ON badge_bleu.Id_Identité=identites.Id_Identité WHERE Id_Badge_Bleu LIKE '%$id%'");
				if($nb_lignes = mysqli_num_rows($queryIdBadgeB) > 0){
					foreach($queryIdBadgeB as $badgeB){
						if(!isset($badgeB['Nom'])){
							$badgeB['Nom'] = "Non Attribué";
							$badgeB['Prénom'] = "Non Attribué";
						}
						echo"<tr><td>".$badgeB['Nom']."</td><td>".$badgeB['Prénom']."</td><td>Badge Bleu</td><td>".$badgeB['Id_Badge_Bleu']."</td><td>".$badgeB['Statut']."</td></tr>";
					}
				}
				
				$queryIdBadgeC = mysqli_query($connexion,"SELECT * FROM cafe LEFT JOIN identites ON cafe.Id_Identité=identites.Id_Identité WHERE Id_Café LIKE '%$id%'");
				if($nb_lignes = mysqli_num_rows($queryIdBadgeC) > 0){
					foreach($queryIdBadgeC as $badgeC){
						if(!isset($badgeC['Nom'])){
							$badgeC['Nom'] = "Non Attribué";
							$badgeC['Prénom'] = "Non Attribué";
						}
						echo"<tr><td>".$badgeC['Nom']."</td><td>".$badgeC['Prénom']."</td><td>Badge Café</td><td>".$badgeC['Id_Café']."</td><td>".$badgeC['Statut']."</td></tr>";
					}
				}
				
				$queryIdBadgeP = mysqli_query($connexion,"SELECT * FROM indigo LEFT JOIN identites ON indigo.Id_Identité=identites.Id_Identité WHERE Id_Parking LIKE '%$id%'");
				if($nb_lignes = mysqli_num_rows($queryIdBadgeP) > 0){
					foreach($queryIdBadgeP as $badgeP){
						if(!isset($badgeP['Nom'])){
							$badgeP['Nom'] = "Non Attribué";
							$badgeP['Prénom'] = "Non Attribué";
						}
						echo"<tr><td>".$badgeP['Nom']."</td><td>".$badgeP['Prénom']."</td><td>Badge Indigo</td><td>".$badgeP['Id_Parking']."</td><td>".$badgeP['Statut']."</td></tr>";
					}
				}
				
				$queryIdBadgeA = mysqli_query($connexion,"SELECT * FROM alarme LEFT JOIN identites ON alarme.Id_Identité=identites.Id_Identité WHERE Id_Alarme LIKE '%$id%'");
				if($nb_lignes = mysqli_num_rows($queryIdBadgeA) > 0){
					foreach($queryIdBadgeA as $badgeA){
						if(!isset($badgeA['Nom'])){
							$badgeA['Nom'] = "Non Attribué";
							$badgeA['Prénom'] = "Non Attribué";
						}
						echo"<tr><td>".$badgeA['Nom']."</td><td>".$badgeA['Prénom']."</td><td>Alarme</td><td>".$badgeA['Id_Alarme']."</td><td>".$badgeA['Statut']."</td></tr>";
					}
				}
				
				mysqli_close($connexion);
				
			?>
		</table>
		<script type="text/javascript" src="scripts.js"></script>
	</body>
</html>