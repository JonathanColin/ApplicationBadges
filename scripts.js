$(".rowTable").click(function() {
	var $id = $(this).find(".colonneCachee").text();
	var $nom = $(this).find(".nom").text();
	var $prenom = $(this).find(".prenom").text();		
	location.replace("Badges.php?id="+$id+"&nom="+$nom+"&prenom="+$prenom);
});
			
$(".btn-warning").click(function() {
	var $row = $(this).closest("tr");
	var $text = $row.find(".log").text();
	var $role = $row.find(".role").text();	
	location.replace("traitementModComptes.php?log="+$text+"&type=mod&role="+$role);
});

$(".btn-danger").click(function() {
	var $row = $(this).closest("tr");
	var $text = $row.find(".log").text();	
	location.replace("traitementModComptes.php?log="+$text+"&type=supp");
});


