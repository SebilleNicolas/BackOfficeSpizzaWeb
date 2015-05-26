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
		$CodePizza = $_REQUEST["id"];
		
	// var_dump($_REQUEST);
	$pizza = ConsulterPizza($_REQUEST["id"]);
	// var_dump($pizza);
	// exit;
	if (isset($_POST["modifierPizza"]))
	{
	// var_dump($_REQUEST);exit;
	if ($_REQUEST["ModifierPizza"] == "" ||  $_REQUEST["ModifierPrix"] == "")
		{	$message='Erreur: Vous devez remplir tous les champs pour modifier la pizza.';
		echo '<script type="text/javascript">window.alert("'.$message.'");</script>';}		
		
	else
		{
		
			$nom = $_REQUEST["ModifierPizza"];
			$prix = $_REQUEST["ModifierPrix"];
			if(isset($_REQUEST["ModifierImage"]))
			{
				$image = $_REQUEST["ModifierImage"];
				$is_img = true;
			}
			else
			{
			$image = "";
			$is_img = false;
			}
			$result = modifierPizza($_REQUEST["id"],$nom,$image,$prix,$is_img);
			if($result == true)
			{$message='La pizza a bien été modifier.';}
			else
			{$message='Erreur: La pizza n\'a pas été modifier. Veuillez réssayer.';}
			
		echo '<script type="text/javascript">window.alert("'.$message.'");</script>';	
		header( 'Refresh:2; url=ListePizza.php');

		
		}	
	}
		if(isset($_POST['AjouterIngredientPizza']))
	{
		$CodePizza = $_REQUEST['AjouterIngredientPizza'];
		// var_dump($CodePizza);exit;
		header("Location:  AjouterIngredientPizza.php?id=$CodePizza");
	}
	if(isset($_POST['ss']))
	{
		$CodePizza = $_REQUEST['id'];
		$CodeIngredient = $_REQUEST['CodeIngredient'];

		//suppression de l'ingredient d'une Pate 

		$reussi = suprIngredientPizza($CodePizza, $CodeIngredient);

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
		MODIFIER pizzas
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
					Pizza
				</th>
				<th>
					Image
				</th>
			<!--	<th>
					Ingredient
				</th>-->
				<th>
					Modifier image
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
				<input type="text"  style="width: 220px;" name="ModifierPizza" class="modification" value="<?php echo $pizza["NomPizza"] ;?>"/>
				</td>
				<td>

				<img src="<?php echo $pizza["Image"]?>"/>

				</td>
				<!--<td>
				<input type="text"  style="width: 220px;" name="NouveauIngredient" class="modification" />
				</td>-->
				<td>
					<input type="file" name="ModifierImage" value="<?php echo $pizza["Image"]?>" />
				</td>
				<td>
				<input type="text"  style="width: 220px;" name="ModifierPrix" class="modification" value="<?php echo $pizza["Prix"]?>"/>
				</td>
				<td>
				
				
				<input type="submit" name="modifierPizza" class="modifier" />
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
				<input type="submit" name="AjouterIngredientPizza" value="<?php echo $CodePizza; ?>" class="modifier" />
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
	$listeIngredientPate = listeIngredientPizza($CodePizza);
	// var_dump ($listeIngredientPate);exit;
	for ($i = 0; $i < count($listeIngredientPate); $i++) { 
	?>
		<tr>
			<td>
				<input type="hidden"  name="CodeIngredient" value=" <?php echo $listeIngredientPate[$i]["CodeIngredient"];?>" /> 
				<input type="text" style="width: 220px;" name="NomPate" class="modification" value="<?php echo $listeIngredientPate[$i]["NomIngredient"];?>" /> 
			</td>
			<td>
				<input type="submit" name="ss" value="<?php echo $CodePizza; ?>" class="refuser" />
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>
</form>
