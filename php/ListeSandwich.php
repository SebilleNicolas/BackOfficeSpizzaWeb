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
	if(isset($_POST['ConsulterSandwich']))
	{
		$id = $_REQUEST['ConsulterSandwich'];
		// var_dump($_REQUEST);exit;
		header("Location: ConsulterSandwich.php?id=$id");
	}
	if(isset($_POST['SupprimerSandwich']))
	{
		$CodeSandwich = $_REQUEST['SupprimerSandwich'];
		$result = supprimerSandwich($CodeSandwich);
		if($result == true)
			{$message='La Sandwich a bien été supprimer.';}
		else
			{$message='Erreur: La Sandwich n\'a pas été supprimer. Veuillez réssayer.';}
			
		echo '<script type="text/javascript">window.alert("'.$message.'");</script>';	
		header( 'Refresh:2; url=ListeSandwich.php');
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
		Consulter la liste des Sandwich
		</h2>
	</h2>
	</br>


Liste des Sandwich :
</br></br>

</br></br>
<?php ?> 
<form method="POST" action="">
<table class="ficheCourante">
	<thead class="thead">			
		<tr>
			<th>
				Sandwich
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
	$ListeSandwich = listeSandwich();
	// var_dump ($ListeSandwich);exit;
	for ($i = 0; $i < count($ListeSandwich); $i++) { 
	?>
		<tr>
			<td>
		<?php //var_dump($ListeSandwich[$i]);exit; ?>
			<?php echo $ListeSandwich[$i]["NomSandwich"]?> 
			</td>
		
		
			<td>
			<?php echo $ListeSandwich[$i]["Prix"]?> 
			</td>
			<td>
			<input type="submit" name="ConsulterSandwich" class="consulter" value="<?php echo $ListeSandwich[$i]["CodeSandwich"] ?>" />
			</td>
			<td>
			<input type="submit" name="SupprimerSandwich" class="suppression"  value="<?php echo $ListeSandwich[$i]["CodeSandwich"] ?>"/>
			</td>
		</tr>
	<?php } ?>
	</tbody>
	
</table>
</form>