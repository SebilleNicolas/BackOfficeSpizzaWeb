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
		
	if(isset($_REQUEST['id']))
	{
	$CodeIngredient = $_REQUEST['id'];	
	}	
	
	if(isset($_POST['mm']))
	{
	if($_REQUEST['NomIngredient'] == ""){
	$message='Erreur: Vous devez ajouter un Nom a la Ingredient.';
	echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
	}
	else{
		$CodeIngredient = $_REQUEST['mm'];
		$NomIngredient = $_REQUEST['NomIngredient'];

		//modification de l'Ingredient 

		$reussi = modIngredient($CodeIngredient, $NomIngredient);

		if($reussi = false){$message='Erreur Ingredient non modifier'; echo '<script type="text/javascript">window.alert("'.$message.'");</script>';}
		
		
		if($reussi = true){$message='La Ingredient a été modifier'; echo '<script type="text/javascript">window.alert("'.$message.'");</script>';}
		
	
	}
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
		<?php $AfficheIngredient = AfficheIngredient($CodeIngredient); ?>
		<?php echo $AfficheIngredient[0]["NomIngredient"]; ?>
	</h3>
</br></br>

<form method="POST" action="ConsulterIngredient.php">
<table class="ficheCourante">
	<thead class="thead">			
		<tr>
			<th>
				Ingredient
			</th>
			<th>
				Modifier
			</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				<input type="text" style="width: 220px;" name="NomIngredient" class="modification" value="<?php echo $AfficheIngredient[0]["NomIngredient"];?>" /> 
			</td>
			<td>
				<input type="submit" name="mm" value="<?php echo $CodeIngredient; ?>" class="modifier" />
			</td>
		</tr>
	</tbody>
</table>
</form>