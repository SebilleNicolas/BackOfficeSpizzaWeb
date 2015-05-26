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

	header("Location: ConsulterIngredient.php?id=$id");
	}
	
	
	if(isset($_POST['ss']))
	{
		$CodeIngredient = $_REQUEST['ss'];	

		//suppression de l'Ingredient 

		$reussi = suprIngredient($CodeIngredient);

		if($reussi = false){$message='Erreur Ingredient non supprimer'; echo '<script type="text/javascript">window.alert("'.$message.'");</script>';}
		
		
		if($reussi = true){$message='L Ingredient a été supprimer'; echo '<script type="text/javascript">window.alert("'.$message.'");</script>';}
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
		Modifier Ingredient
		</h2>
	</h2>
	</br>


</br></br>
	<h3>
		Liste des Ingredients :
	</h3>
</br></br>

<?php ?> 
<form method="POST" action="ListeIngredient.php">
<table class="ficheCourante">
	<thead class="thead">			
		<tr>
			<th>
				Ingredient
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
	$listeIngredient = listeIngredient();
	for ($i = 0; $i < count($listeIngredient); $i++) { 
	?>
		<tr>
			<td>
				<input type="text" style="width: 220px;" disabled="disabled" name="NomIngredient" class="modification" value="<?php echo $listeIngredient[$i]["NomIngredient"];?>" /> 
			</td>
			<td>
				<input type="submit" name="mm" value="<?php echo $listeIngredient[$i]["CodeIngredient"]; ?>" class="modifier" />
			</td>
			<td>
				<input type="submit" name="ss" value="<?php echo $listeIngredient[$i]["CodeIngredient"]; ?>" class="refuser" />
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>
</form>