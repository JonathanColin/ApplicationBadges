<ul class="nav nav-tabs">
	<li class="nav-item">
		<a class="nav-link active" aria-current="page" href="accueil.php"><i class="fa fa-home" aria-hidden="true"></i> Accueil</a>
	</li>
	<?php
		if($_SESSION['role'] != "Invité"){?>
		<li class="nav-item">
			<a class="nav-link" href="creationIdentite.php"><i class="fa fa-id-card-o" aria-hidden="true"></i> Nouvelle identité</a>
		</li>
	<?php } ?>
	<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-tags" aria-hidden="true"></i> Badges</a>
		<div class="dropdown-menu">
			<a class="dropdown-item" href="afficherBadges.php?type=PERDU">Afficher les badges perdus</a>
			<a class="dropdown-item" href="afficherBadges.php?type=PRET">Afficher les badges prêtés</a>
			<?php if($_SESSION['role'] == "Administrateur"){ ?>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="creationBadge.php">Créer un Badge</a>
			<?php } ?>
		</div>
	</li>
	<?php 
		if($_SESSION['role'] == "Administrateur"){ ?>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i> Gestion des comptes</a>
			<div class="dropdown-menu">
				<a class="dropdown-item" href="afficherComptes.php">Afficher les comptes</a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="creationCompte.php">Créer un compte</a>
			</div>
		</li>
	<?php } ?>
	<li class="nav-item">
		<a class="nav-link" href="deconnexion.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Déconnexion</a>
	</li>
	<li class="nav-item">
		<a class="nav-link disabled"><i class="fa fa-info" aria-hidden="true"></i> <?php echo "Rôle: ".$_SESSION['role']?></a>
	</li>
	<li class="nav-item ms-auto">
		<form method="POST" action="traitementRecherche.php">
			<div class="input-group search">
				<div class="input-group-append">
					<button class="btn btn-primary justify-content-center" style="float:right" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
							<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
						</svg>
					</button>
				</div>
				<input type="text" style="float:left" class="form-control" placeholder="ID du Badge" name="srch-term">
			</div>
		</form>
	</li>
	<li class="nav-item ms-left">
		<img src="img/logo-valocime.png" class="img-menu" alt="Logo_Valocime">
	</li>
</ul>
