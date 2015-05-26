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
	if(isset($_POST['ConsulterSalade']))
	{
		$id = $_REQUEST['ConsulterSalade'];
		// var_dump($_REQUEST);exit;
		header("Location: ConsulterSalade.php?id=$id");
	}
	if(isset($_POST['SupprimerSalade']))
	{
		$CodeSalade = $_REQUEST['SupprimerSalade'];
		$result = supprimerSalade($CodeSalade);
		if($result == true)
			{$message='La salade a bien été supprimer.';}
		else
			{$message='Erreur: La salade n\'a pas été supprimer. Veuillez réssayer.';}
			
		echo '<script type="text/javascript">window.alert("'.$message.'");</script>';	
		header( 'Refresh:2; url=ListeSalade.php');
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
		Consulter la liste des Salades
		</h2>
	</h2>
	</br>


Liste des Salades :
</br></br>

</br></br>
<?php ?> 
<form method="POST" action="">
<table class="ficheCourante">
	<thead class="thead">			
		<tr>
			<th>
				Salade
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
	$ListeSalade = listeSalade();
	// var_dump ($ListeSalade);exit;
	for ($i = 0; $i < count($ListeSalade); $i++) { 
	?>
		<tr>
			<td>
		<?php //var_dump($ListeSalade[$i]);exit; ?>
			<?php echo $ListeSalade[$i]["NomSalade"]?> 
			</td>
		
		
			<td>
			<?php echo $ListeSalade[$i]["PrixSalade"]?> 
			</td>
			<td>
			<input type="submit" name="ConsulterSalade" class="consulter" value="<?php echo $ListeSalade[$i]["CodeSalade"] ?>" />
			</td>
			<td>
			<input type="submit" name="SupprimerSalade" class="suppression"  value="<?php echo $ListeSalade[$i]["CodeSalade"] ?>"/>
			</td>
		</tr>
	<?php } ?>
	</tbody>
	
</table>
</form>