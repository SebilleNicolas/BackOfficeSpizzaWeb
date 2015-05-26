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
		
		
		
		
	if(isset($_POST['mm']))
	{
	$id = $_REQUEST['mm'];

	header("Location: ConsulterBoisson.php?id=$id");
	}
	
	
	if(isset($_POST['ss']))
	{
		$CodeBoisson = $_REQUEST['ss'];	

		//suppression de l'Boisson 

		$reussi = suprBoisson($CodeBoisson);

		if($reussi = false){$message='Erreur Boisson non supprimer'; echo '<script type="text/javascript">window.alert("'.$message.'");</script>';}
		
		
		if($reussi = true){$message='La Boisson a été supprimer'; echo '<script type="text/javascript">window.alert("'.$message.'");</script>';}
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
		Modifier Boisson
		</h2>
	</h2>
	</br>


</br></br>
	<h3>
		Liste des Boissons :
	</h3>
</br></br>

<?php ?> 
<form method="POST" action="ListeBoisson.php">
<table class="ficheCourante">
	<thead class="thead">			
		<tr>
			<th>
				Boisson
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
	$listeBoisson = listeBoisson();
	// var_dump ($ListeBoisson);exit;
	for ($i = 0; $i < count($listeBoisson); $i++) { 
	?>
		<tr>
			<td>
				<input type="text" style="width: 220px;" disabled="disabled" name="NomBoisson" class="modification" value="<?php echo $listeBoisson[$i]["NomBoisson"];?>" /> 
			</td>
			<td>
				<input type="text"  style="width: 220px;" disabled="disabled" name="PrixBoisson" class="modification" value="<?php echo $listeBoisson[$i]["PrixBoisson"]?>" /> 
			</td>
			<td>
				<input type="submit" name="mm" value="<?php echo $listeBoisson[$i]["CodeBoisson"]; ?>" class="modifier" />
			</td>
			<td>
				<input type="submit" name="ss" value="<?php echo $listeBoisson[$i]["CodeBoisson"]; ?>" class="refuser" />
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>
</form>