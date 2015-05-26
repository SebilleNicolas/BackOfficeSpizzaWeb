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
	$CodePate = $_REQUEST['id'];	
	}	
	
	if(isset($_POST['dd']))
	{
	if($_REQUEST['listeIngredient'] == ""){
	$message='Erreur: Vous devez ajouter un Ingredient au Pate.';
	echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
	}
	else{
		$CodePate = $_REQUEST['dd'];
		$CodeIngredient = $_REQUEST['listeIngredient'];

		//modification des Ingredients 

		$reussi = composePate($CodePate, $CodeIngredient);

		if($reussi = false){$message='Erreur Pate non modifier'; echo '<script type="text/javascript">window.alert("'.$message.'");</script>';}
		
		
		if($reussi = true){$message='La Pate a été modifier'; echo '<script type="text/javascript">window.alert("'.$message.'");</script>';}
		
	
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
		Modifier Pate
		</h2>
	</h2>
	</br>


</br></br>
	<h3>
		<?php $affichePate = affichePate($CodePate); ?>
		<?php echo $affichePate[0]["NomPate"]; ?>
	</h3>
</br></br>

<form method="POST" action="AjouterIngredientPate.php">
<table class="ficheCourante">
	<thead class="thead">			
		<tr>
			<th>
				Ingredient
			</th>
			<th>
				Ajouter
			</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
			<h2> Liste des ingredients non présent dans les pates </h2>
			<select name="listeIngredient">
			<option value="" selected> </option>
			<?php 
			$listeIngredientdispo = listeIngredientdispo($CodePate);
			for ($i = 0; $i < count($listeIngredientdispo); $i++) { 
			?>
				<option value="<?php echo $listeIngredientdispo[$i]["CodeIngredient"];?>"><?php echo $listeIngredientdispo[$i]["NomIngredient"];?></option>
			<?php } ?>
			</select>
			</td>
			<td>
				<input type="submit" name="dd" value="<?php echo $CodePate; ?>" class="ajouter" />
			</td>
		</tr>
	</tbody>
</table>
</form>