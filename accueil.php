<!DOCTYPE html>
<html>
	<head>
		<?php include 'head.php'; ?>
		<title>VALOCIME/ Application Badges - Accueil</title>
	</head>
	<body>
		<?php
			include 'fonctions.php';
			sessionExiste();
			erreurAccueil();
			erreurBadges();
			include 'menu.php';
			include 'bd.php';
		?>
		
		<h1>Toutes les identités</h1>
		<h6>Cliquez sur une ligne pour voir le détail des badges que l'identité possède</h6>
		<table class="table table-striped table-dark table-hover table-bordered text-center d-flex justify-content-center">
			<tr>
				<th class='colonneCachee'>id</th>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Télécommande</th>
				<th>Badge Noir</th>
				<th>Badge Bleu</th>
				<th>Café</th>
				<th>Alarme Verisure</th>
				<th>Indigo</th>
				<th>Parking</th>
				<th>Pass</th>
				<th>Accès Bureau</th>
				<th>Bureau FZ</th>
				<th>Période d'accès</th>
			</tr>
			<?php
				$connexion = connexion();
				
				$query = mysqli_query($connexion,"SELECT Id_Identité,Nom,Prénom,Parking,Pass,Accès_Bureau,Période,Bureau_FZ FROM identites ORDER BY Nom");
				
				foreach($query as $id){
					$tele = lastBadge("telecommande","Id_Télécommande",$connexion,$id);
					$badgeN = lastBadge("badge_noir","Id_Badge_Noir",$connexion,$id);
					$badgeB = lastBadge("badge_bleu","Id_Badge_Bleu",$connexion,$id);
					$cafe = lastBadge("cafe","Id_Café",$connexion,$id);
					$alarme = lastBadge("alarme","Id_Alarme",$connexion,$id);
					$indigo = lastBadge("indigo","Id_Parking",$connexion,$id);
					
					echo"<tr class='rowTable'>
							<td class='colonneCachee align-middle'>".$id['Id_Identité']."</td>
							<td class='nom align-middle'>".$id['Nom']."</td>
							<td class='prenom align-middle'>".$id['Prénom']."</td>
							<td class='justify-content-center align-middle'>".$tele[0]."".$tele[1]."</td>
							<td class='justify-content-center align-middle'>".$badgeN[0]."".$badgeN[1]."</td>
							<td class='justify-content-center align-middle'>".$badgeB[0]."".$badgeB[1]."</td>
							<td class='justify-content-center align-middle'>".$cafe[0]."".$cafe[1]."</td>
							<td class='justify-content-center align-middle'>".$alarme[0]."".$alarme[1]."</td>
							<td class='justify-content-center align-middle'>".$indigo[0]."".$indigo[1]."</td>
							<td class='align-middle'>".$id['Parking']."</td>
							<td class='align-middle'>".$id['Pass']."</td>
							<td class='align-middle'>".$id['Accès_Bureau']."</td>
							<td class='align-middle'>".$id['Bureau_FZ']."</td>
							<td class='align-middle'>".$id['Période']."</td>
						</tr>";
				}
				
				mysqli_close($connexion);
				
			?>
		</table>
		
	</body>
	<script type="text/javascript" src="scripts.js"></script>
</html>