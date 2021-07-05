
<?php
	
	include 'fonctions.php';
	sessionExiste();
	include 'bd.php';
	
	if($_POST["valider"] == "Retour"){
		header("Location: accueil.php");
		exit(0);
	}
	
	if(!empty($_POST['nom']) && !empty($_POST['prenom'])){
		
		$id = $_POST['id'];
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$parking = $_POST['parking'];
		$pass = $_POST['pass'];
		$bureau = $_POST['bureau'];
		$FZ = $_POST['FZ'];
		$periode = $_POST['periode'];
		
		if(strlen($nom) > 20 OR strlen($prenom) > 20){
			header("Location: accueil.php?erreur=NPlong");
			exit(0);
		}
		
		$connexion = connexion();

		$queryUpdateIdentite = mysqli_query($connexion,"UPDATE identites SET Nom='$nom',Prénom='$prenom',Parking='$parking',Pass='$pass',Accès_Bureau='$bureau',Bureau_FZ='$FZ',Période='$periode' WHERE Id_Identité='$id'");
		
		if(isset($_POST['id_tele']) and isset($_POST['tele'])){
			foreach(array_combine($_POST['id_tele'],$_POST['tele']) as $idTele => $tele){
				$queryUpdateTele = mysqli_query($connexion,"UPDATE telecommande SET Statut='$tele' WHERE Id_Identité='$id' and Id_Télécommande='$idTele'");
			}
		}
		if(isset($_POST['id_badgeN']) and isset($_POST['badgeN'])){
			foreach(array_combine($_POST['id_badgeN'],$_POST['badgeN']) as $idNoir => $badgeN){
				$queryUpdateNoir = mysqli_query($connexion,"UPDATE badge_noir SET Statut='$badgeN' WHERE Id_Identité='$id' and Id_Badge_Noir='$idNoir'");
			}
		}
		
		if(isset($_POST['id_badgeB']) and isset($_POST['badgeB'])){
			foreach(array_combine($_POST['id_badgeB'],$_POST['badgeB']) as $idBleu => $badgeB){
				$queryUpdateBleu = mysqli_query($connexion,"UPDATE badge_bleu SET Statut='$badgeB' WHERE Id_Identité='$id' and Id_Badge_Bleu='$idBleu'");
			}
		}
		
		if(isset($_POST['id_cafe']) and isset($_POST['cafe'])){
			foreach(array_combine($_POST['id_cafe'],$_POST['cafe']) as $idCafe => $badgeC){
				$queryUpdateCafe = mysqli_query($connexion,"UPDATE cafe SET Statut='$badgeC' WHERE Id_Identité='$id' and Id_Café='$idCafe'");
			}
		}
		
		if(isset($_POST['id_indigo']) and isset($_POST['indigo'])){
			foreach(array_combine($_POST['id_indigo'],$_POST['indigo']) as $idindigo => $indigo){
				$queryUpdateIndigo = mysqli_query($connexion,"UPDATE indigo SET Statut='$indigo' WHERE Id_Identité='$id' and Id_Parking='$idindigo'");
			}
		}
		
		if(isset($_POST['id_alarme']) and isset($_POST['alarme'])){
			foreach(array_combine($_POST['id_alarme'],$_POST['alarme']) as $idAlarme => $alarme){
				$queryUpdateAlarme = mysqli_query($connexion,"UPDATE alarme SET Statut='$alarme' WHERE Id_Identité='$id' and Id_Alarme='$idAlarme'");
			}
		}
		
		
		header("Location: Badges.php?id=$id&nom=$nom&prenom=$prenom");
		mysqli_close($connexion);			
	
	
	}
	else{
		header("Location: accueil.php?erreur=modBadge");
		exit(0);
	}

?>






