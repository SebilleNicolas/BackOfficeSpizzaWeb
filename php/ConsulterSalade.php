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
		
		$CodeSalade = $_REQUEST["id"];
	// var_dump($_REQUEST);
	$salade = ConsulterSalade($_REQUEST["id"]);
	// var_dump($pizza);
	// exit;
	if (isset($_POST["modifierSalade"]))
	{
	// var_dump($_REQUEST);exit;
	if ($_REQUEST["ModifierSalade"] == "" ||  $_REQUEST["ModifierPrix"] == "")
		{	$message='Erreur: Vous devez remplir tous les champs pour modifier la salade.';
		echo '<script type="text/javascript">window.alert("'.$message.'");</script>';}		
		
	else
		{
		
			$nom = $_REQUEST["ModifierSalade"];
			$prix = $_REQUEST["ModifierPrix"];
			
			$result = modifierSalade($_REQUEST["id"],$nom,$prix);
			if($result == true)
			{$message='La Salade a bien été modifier.';}
			else
			{$message='Erreur: La Salade n\'a pas été modifier. Veuillez réssayer.';}
			
		echo '<script type="text/javascript">window.alert("'.$message.'");</script>';	
		header( 'Refresh:2; url=ListeSalade.php');
		}	
	}
	
		if(isset($_POST['AjouterIngredientSalade']))
	{
		$CodePizza = $_REQUEST['AjouterIngredientSalade'];
		// var_dump($CodePizza);exit;
		header("Location:  AjouterIngredientSalade.php?id=$CodeSalade");
	}
	
	if(isset($_POST['ss']))
	{
		$CodeSalade = $_REQUEST['id'];
		$CodeIngredient = $_REQUEST['CodeIngredient'];

		//suppression de l'ingredient d'une Pate 

		$reussi = suprIngredientSalade($CodeSalade, $CodeIngredient);

		if($reussi = false){$message='Erreur Ingredient non supprimer'; echo '<script type="text/javascript">window.alert("'.$message.'");</script>';}
		
		
		if($reussi = true){$message='Ingredient supprimer'; echo '<script type="text/javascript">window.alert("'.$message.'");</script>';}
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
		MODIFIER Salade
		</h2>
	</h2>
	</br>



</br></br>

</br></br>
<form method="POST" action="">
	<table class="ficheCourante" align="center">

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
	
			</tr>
		</thead>
		<tbody>
		
			<tr>
				<td>
				<input type="text"  style="width: 220px;" name="ModifierSalade" class="modification" value="<?php echo $salade["NomSalade"] ;?>"/>
				</td>
				
		
				<td>
				<input type="text"  style="width: 220px;" name="ModifierPrix" class="modification" value="<?php echo $salade["PrixSalade"]?>"/>
				</td>
				<td>				
				<input type="submit" name="modifierSalade" class="modifier" />
				</td>
			
				
				
			</tr>
		
		</tbody>
		
	</table>
</form>




</br>
<h3>
	Ingredient
</h3>
</br>
<form method="POST" action="">
<table class="ficheCourante">
	<thead>
		<tr>
			<th>
			<h4>
				Ajouter un Ingredient :
			<h4>
			</th>
			<th>
				<input type="submit" name="AjouterIngredientSalade" value="<?php echo $CodeSalade; ?>" class="modifier" />
			</th>
		</tr>
	</thead>
</table>
</form>	
</br>
		
<form method="POST" action="">
<table class="ficheCourante">
	<thead class="thead">			
		<tr>
			<th>
				Ingredient
			</th>
			<th>
				Suprimmer
			</th>
		</tr>
	</thead>
	<tbody>
	<?php 
	$listeIngredientPate = listeIngredientSalade($CodeSalade);
	// var_dump ($listeIngredientPate);exit;
	for ($i = 0; $i < count($listeIngredientPate); $i++) { 
	?>
		<tr>
			<td>
				<input type="hidden"  name="CodeIngredient" value=" <?php echo $listeIngredientPate[$i]["CodeIngredient"];?>" /> 
				<input type="text" style="width: 220px;" name="NomPate" class="modification" value="<?php echo $listeIngredientPate[$i]["NomIngredient"];?>" /> 
			</td>
			<td>
				<input type="submit" name="ss" value="<?php echo $CodeSalade; ?>" class="refuser" />
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>
</form>
