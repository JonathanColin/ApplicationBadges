<!DOCTYPE html>
<html>
	<head>
		<?php
			include 'head.php';
			
			include 'fonctions.php';
			titleAffichageBadges();
		?>
		<title>VALOCIME/ Application Badges -  Types de Badges</title>
	</head>
	<body>
		<?php
			
			sessionExiste();
			include 'menu.php';
			include 'bd.php';
			
			h1AffichageBadge();
		?>
		
		
		<table class="table table-striped table-dark table-hover table-bordered text-center d-flex justify-content-center">
			<tr>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Type de badge</th>
				<th>Id du Badge</th>			
			</tr>
			<?php
				$connexion = connexion();
				$status = $_GET['type'];
				
				$query = mysqli_query($connexion,"SELECT Id_Identité,Nom,Prénom FROM identites ORDER BY Nom");
				foreach($query as $id){
					$queryBadgeTele = mysqli_query($connexion,"SELECT * FROM telecommande WHERE Id_Identité=".$id['Id_Identité']." AND Statut='$status'");
					foreach($queryBadgeTele as $tele){
						echo"<tr><td class='nom'>".$id['Nom']."</td><td class='prenom'>".$id['Prénom']."</td><td>Télécommande</td><td>".$tele['Id_Télécommande']."</td></tr>";
					}
					$queryBadgeNoir = mysqli_query($connexion,"SELECT * FROM badge_noir WHERE Id_Identité=".$id['Id_Identité']." AND Statut='$status'");
					foreach($queryBadgeNoir as $badgeN){
						echo"<tr><td class='nom'>".$id['Nom']."</td><td class='prenom'>".$id['Prénom']."</td><td>Badge Noir</td><td>".$badgeN['Id_Badge_Noir']."</td></tr>";
					}
					$queryBadgeBleu = mysqli_query($connexion,"SELECT * FROM badge_bleu WHERE Id_Identité=".$id['Id_Identité']." AND Statut='$status'");
					foreach($queryBadgeBleu as $badgeB){
						echo"<tr><td class='nom'>".$id['Nom']."</td><td class='prenom'>".$id['Prénom']."</td><td>Badge Bleu</td><td>".$badgeB['Id_Badge_Bleu']."</td></tr>";
					}
					$queryBadgeCafe = mysqli_query($connexion,"SELECT * FROM cafe WHERE Id_Identité=".$id['Id_Identité']." AND Statut='$status'");
					foreach($queryBadgeCafe as $cafe){
						echo"<tr><td class='nom'>".$id['Nom']."</td><td class='prenom'>".$id['Prénom']."</td><td>Café</td><td>".$cafe['Id_Café']."</td></tr>";
					}
					$queryBadgeIndigo = mysqli_query($connexion,"SELECT * FROM indigo WHERE Id_Identité=".$id['Id_Identité']." AND Statut='$status'");
					foreach($queryBadgeIndigo as $indigo){
						echo"<tr><td class='nom'>".$id['Nom']."</td><td class='prenom'>".$id['Prénom']."</td><td>Indigo</td><td>".$indigo['Id_Parking']."</td></tr>";
					}
					$queryBadgeAlarme = mysqli_query($connexion,"SELECT * FROM alarme WHERE Id_Identité=".$id['Id_Identité']." AND Statut='$status'");
					foreach($queryBadgeAlarme as $alarme){
						echo"<tr><td class='nom'>".$id['Nom']."</td><td class='prenom'>".$id['Prénom']."</td><td>Alarme</td><td>".$alarme['Id_Alarme']."</td></tr>";
					}
				}
				
				mysqli_close($connexion);
				
			?>
		</table>
		<script type="text/javascript" src="scripts.js"></script>
	</body>
</html>