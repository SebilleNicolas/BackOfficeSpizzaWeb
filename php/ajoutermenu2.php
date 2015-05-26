<?php
header('Content-Type: text/html; charset=UTF-8');
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<?php



	//Démarrage des sessions
	session_start();
	
	//inclusion du header
	include '../html/Header.html';
	
	//inclusion de la page de fonction php
	require_once('_function.php');
	
	include '../html/menuAdministrateur.html';
	$nommenu = $_POST['NomMenu']; 
	$nbpizzas = $_POST['NbPizzas']; 
	$nbpaninis = $_POST['NbPaninis']; 
	$nbtexmex = $_POST['NbTexMex']; 
	$nbdesserts = $_POST['NbDesserts'];
	$nbsalades = $_POST['NbSalades']; 
	$nbboissons = $_POST['NbBoissons'];
	$prix = $_POST['Prix'];	
	
	$pdo = connexion();
	// var_dump($pdo);
	if($pdo != false)
	{

	
		
		$insert = '
					INSERT INTO menu
					VALUES (null,"'.$nommenu.'", '.$prix.', '.$nbpizzas.', '.$nbpaninis.', '.$nbtexmex.', '.$nbdesserts.', '.$nbsalades.', '.$nbboissons.', 0)
					';
		$res = $pdo-> exec($insert);
		
		if($res == 1)
		{
		
			$message='Erreur: Vous devez ajouter un Nom a la nouvelle pizza.';
			echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
			header( 'Location:2; url=ListeMenu.php');
		
		}
		
		
	
}
?>