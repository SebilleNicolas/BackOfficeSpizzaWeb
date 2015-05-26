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
	if(isset($_POST['ConsulterMenu']))
	{
		$id = $_REQUEST['ConsulterMenu'];
		// var_dump($_REQUEST);exit;
		header("Location: ConsulterMenu.php?id=$id");
	}
	if(isset($_POST['SupprimerMenu']))
	{
		$CodeMenu = $_REQUEST['SupprimerMenu'];
		$result = supprimerMenu($CodeMenu);
		if($result == true)
			{$message='Le menu a bien été supprimer.';}
		else
			{$message='Erreur: Le menu n\'a pas été supprimer. Veuillez réssayer.';}
			
		echo '<script type="text/javascript">window.alert("'.$message.'");</script>';	
		header( 'Refresh:2; url=ListeMenu.php');
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
		Consulter la liste des menus
		</h2>
	</h2>
	</br>


Liste des menus :
</br></br>

</br></br>
<?php ?> 
<form method="POST" action="">
<table class="ficheCourante">
	<thead class="thead">			
		<tr>
			<th>
				Nom Menu 
			<th>
				Pizzas
			</th>
				<th>
				Paninis
			</th>
			<th>
				TexMex
			</th>
			<th>
				Desserts
			</th>
			<th>
				Salades	
			</th>
			<th>
				Boissons
			</th>
			<th>
				Prix
			</th>
			<th>
				Consulter
			</th>
			<th>
				Supprimer
			</th>
		</tr>
	</thead>
	<tbody>
	
	
	<?php 
	$ListeMenu = listeMenu();
	// var_dump($ListeMenu);exit;
	// var_dump ($ListeMenu);exit;
	for ($i = 0; $i < count($ListeMenu); $i++) { 
	?>
		<tr>
			<td>
		<?php //var_dump($ListeMenu[$i]);exit; ?>
			<?php echo $ListeMenu[$i]["NomMenu"]?> 
			</td>
			<td>
			<?php echo $ListeMenu[$i]["NbPizza"]?> 
			</td><td>
			<?php echo $ListeMenu[$i]["NbPanini"]?> 
			</td><td>
			<?php echo $ListeMenu[$i]["NbTexMex"]?> 
			</td><td>
			<?php echo $ListeMenu[$i]["NbDessert"]?> 
			</td><td>
			<?php echo $ListeMenu[$i]["NbSalade"]?> 
			</td><td>
			<?php echo $ListeMenu[$i]["NbBoisson"]?> 
			</td>
		
			<td>
			<?php echo $ListeMenu[$i]["PrixMenu"]?> 
			</td>
			<td>
			<input type="submit" name="ConsulterMenu" class="consulter" value="<?php echo $ListeMenu[$i]["CodeMenu"] ?>" />
			</td>
			<td>
			<input type="submit" name="SupprimerMenu" class="suppression"  value="<?php echo $ListeMenu[$i]["CodeMenu"] ?>"/>
			</td>
		</tr>
	<?php } ?>
	
	
	
	</tbody>
	
</table>
</form>