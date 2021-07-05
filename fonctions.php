<?php

function sessionExiste(){
	session_start();
	if(!isset($_SESSION['login']) OR empty($_SESSION['login'])){
		header("Location: index.php");
	}
	
}


function messageConnexion(){
	if(isset($_GET['erreur'])){
		if($_GET['erreur'] == "mauvaislog"){
			echo "Login ou mot de passe incorrect";
		}
		else{
			echo "Login ou mot de passe manquant";
		}
	}
	
}

function erreurAccueil(){
	if(isset($_GET['erreur'])){
		if($_GET['erreur'] == "modBadge"){
			echo "<script>alert('Un ou plusieurs champ(s) est/sont manquant(s) lors de la modification de cette identité ainsi que de ses badges, Veuillez recommencer votre opération.');</script>";
		}elseif($_GET['erreur'] == "NPlong"){
			echo "<script>alert('Le nom ou prénom que vous souhaitez modifier est trop long, Veuillez recommencer votre opération.');</script>";
		}
	}
}

function titleAffichageBadges(){
	if($_GET['type'] == "PERDU"){
		echo "<title>VALOCIME/ Application Badges - Affichage des badges perdus</title>";
	}
	else{
		echo "<title>VALOCIME/ Application Badges - Affichage des badges prêtés</title>";
	}
}

function h1AffichageBadge(){
	if($_GET['type'] == "PERDU"){
		echo "<h1>Les Badges Perdus</h1>";
	}
	else{
		echo "<h1>Les Badges Prêtés</h1>";
	}
}

function erreurBadges(){
	if(!empty($_GET['erreur'])){
		if($_GET['erreur'] == "idLong12"){
			echo "<script>alert('Le badge que vous souhaitez créer possède un id trop long (12 caractères max), Veuillez recommencer votre opération.');</script>";
		}
		elseif($_GET['erreur'] == "idLong10"){
			echo "<script>alert('Le badge que vous souhaitez créer possède un id trop long (10 caractères max), Veuillez recommencer votre opération.');</script>";
		}
		else{
			echo "<script>alert('Le badge que vous souhaitez créer possède un id trop long (8 caractères max), Veuillez recommencer votre opération.');</script>";
		}
	}
}

function StatutModBadges($StatutBadge){
	if($StatutBadge == 'ACTIF'){
		echo"
		<option selected value='ACTIF'>ACTIF</option>
		<option value='PERDU'>PERDU</option>
		<option value='PRET'>PRET</option>
		<option value='RENDU'>RENDU</option>";
	}elseif($StatutBadge == 'PERDU'){
		echo"
		<option value='ACTIF'>ACTIF</option>
		<option selected value='PERDU'>PERDU</option>
		<option value='PRET'>PRET</option>
		<option value='RENDU'>RENDU</option>";
	}elseif($StatutBadge == 'PRET'){
		echo "
		<option value='ACTIF'>ACTIF</option>
		<option value='PERDU'>PERDU</option>
		<option selected value='PRET'>PRET</option>
		<option value='RENDU'>RENDU</option>";
	}else{
		echo "
		<option value='ACTIF'>ACTIF</option>
		<option value='PERDU'>PERDU</option>
		<option value='PRET'>PRET</option>
		<option selected value='RENDU'>RENDU</option>";
	}
	
}

function erreurCreationIdentite(){
	if(!empty($_GET['erreur'])){
		if($_GET['erreur'] == "champs"){
			echo "Un ou plusieurs champs sont manquants";
		}
		elseif($_GET['erreur'] == "NPlong"){
			echo "Le nom ou prénom entré est trop long";
		}
		elseif($_GET['erreur'] == "idExiste"){
			echo "Cette personne existe déja";
		}
	}
}

function erreurCreationCompte(){
	if(!empty($_GET['erreur'])){
		if($_GET['erreur'] == "champs"){
			echo "Un ou plusieurs champs sont manquants";
		}
		elseif($_GET['erreur'] == "NPlong"){
			echo "Le nom ou prénom entré est trop long";
		}
		elseif($_GET['erreur'] == "logExist"){
				echo "Cet utilisateur possède déjà un compte";
		}
	}
}

function erreurModificationCompte(){
	if(!empty($_GET['erreur'])){
		if($_GET['erreur'] == "champs"){
			echo "<script>alert('Un ou plusieurs champ(s) est/sont manquant(s) lors de la modification de ce compte, Veuillez recommencer votre opération.');</script>";
		}
	}
}


function lastBadge($table,$idTable,$connexion,$id){
	$queryPret = mysqli_query($connexion,"SELECT * FROM $table WHERE Id_Identité=".$id['Id_Identité']." AND Statut='PRET'");
	$pretFetch = mysqli_fetch_array($queryPret);
	if($nb_lignes = mysqli_num_rows($queryPret) < 1){
		$queryActif = mysqli_query($connexion,"SELECT * FROM $table WHERE Id_Identité=".$id['Id_Identité']." AND Statut='ACTIF'");
		$actifFetch = mysqli_fetch_array($queryActif);
		if($nb_lignes = mysqli_num_rows($queryActif) < 1){
			$queryPerdu = mysqli_query($connexion,"SELECT * FROM $table WHERE Id_Identité=".$id['Id_Identité']." AND Statut='PERDU'");
			$perduFetch = mysqli_fetch_array($queryPerdu);
			if($nb_lignes = mysqli_num_rows($queryPerdu) < 1){
				$queryRendu = mysqli_query($connexion,"SELECT * FROM $table WHERE Id_Identité=".$id['Id_Identité']." AND Statut='RENDU'");
				$renduFetch = mysqli_fetch_array($queryRendu);
				if($nb_lignes = mysqli_num_rows($queryRendu) < 1){
					$teleLast = "AUCUN";
					$teleStatut="";
				}else{
					$teleLast=$renduFetch[$idTable];
					$teleStatut=$renduFetch['Statut']."</br>";
				}
			}else{
				$teleLast=$perduFetch[$idTable];
				$teleStatut=$perduFetch['Statut']."</br>";
			}
		}else{
			$teleLast=$actifFetch[$idTable];
			$teleStatut=$actifFetch['Statut']."</br>";
		}
	}else{
		$teleLast=$pretFetch[$idTable];
		$teleStatut=$pretFetch['Statut']."</br>";
	}
	
	return array($teleStatut,$teleLast);
}
		
?>