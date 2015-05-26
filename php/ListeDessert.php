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
		// var_dump($_POST);
	if(isset($_POST['ConsulterDessert']))
	{
		$id = $_REQUEST['ConsulterDessert'];
		// var_dump($_REQUEST);exit;
		header("Location: ConsulterDessert.php?id=$id");
	}
	if(isset($_POST['SupprimerDessert']))
	{
		$CodeDessert = $_REQUEST['SupprimerDessert'];
		$result = supprimerDessert($CodeDessert);
		if($result == true)
			{$message='La Dessert a bien été supprimer.';}
		else
			{$message='Erreur: La Dessert n\'a pas été supprimer. Veuillez réssayer.';}
			
		echo '<script type="text/javascript">window.alert("'.$message.'");</script>';	
		header( 'Refresh:2; url=ListeDessert.php');
	}
?>

<div class="contenu" >
	<!-- lien vers le haut de page -->
<!-- les liens vers les ancres sont toujours précédés du symbole # -->
<div id="hautpage"> </div>


	<h2>
	Login : <?php echo $_SESSION["user"];  //var_dump( $_SESSION);?>
		</br>
		<h2 align="center">
		Consulter la liste des Dessert
		</h2>
	</h2>
	</br>


Liste des Dessert :
</br></br>

</br></br>
<?php ?> 
<form method="POST" action="">
<table class="ficheCourante">
	<thead class="thead">			
		<tr>
			<th>
				Dessert
			</th>
		
	
			<th>
				Prix
			</th>
			<th>
				Modifier
			</th>
			<th>
				Supprimer
			</th>
		</tr>
	</thead>
	<tbody>
	<?php 
	$ListeDessert = listeDessert();
	// var_dump($ListeDessert);exit;
	// var_dump ($ListeDessert);exit;
	for ($i = 0; $i < count($ListeDessert); $i++) { 
	?>
		<tr>
			<td>
		<?php //var_dump($ListeDessert[$i]);exit; ?>
			<?php echo $ListeDessert[$i]["NomDessert"]?> 
			</td>
		
		
			<td>
			<?php echo $ListeDessert[$i]["PrixDessert"]?> 
			</td>
			<td>
			<input type="submit" name="ConsulterDessert" class="consulter" value="<?php echo $ListeDessert[$i]["CodeDessert"] ?>" />
			</td>
			<td>
			<input type="submit" name="SupprimerDessert" class="suppression"  value="<?php echo $ListeDessert[$i]["CodeDessert"] ?>"/>
			</td>
		</tr>
	<?php } ?>
	</tbody>
	
</table>
</form>