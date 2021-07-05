<?php

	include 'fonctions.php';
	sessionExiste();
	session_destroy();
	header("Location: index.php");

	
?>