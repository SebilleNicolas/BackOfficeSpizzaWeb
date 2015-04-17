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
	if(isset($_POST['ConsulterPizza']))
	{
		$id = $_REQUEST['ConsulterPizza'];
		// var_dump($_REQUEST);exit;
		header("Location: ConsulterPizza.php?id=$id");
	}
	if(isset($_POST['SupprimerPizza']))
	{
		$CodePizza = $_REQUEST['SupprimerPizza'];
		$result = supprimerPizza($CodePizza);
		if($result == true)
			{$message='La pizza a bien été supprimer.';}
		else
			{$message='Erreur: La pizza n\'a pas été supprimer. Veuillez réssayer.';}
			
		echo '<script type="text/javascript">window.alert("'.$message.'");</script>';	
		header( 'Refresh:2; url=ListePizza.php');
	}
		if(isset($_POST['AjouterIngredient']))
	{
		// var_dump($_REQUEST);exit;
		$id = $_REQUEST['AjouterIngredient'];
		// var_dump($id);exit;
		header("Location: AjouterIngredient.php?id=$id");
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
		Consulter la liste des pizzas
		</h2>
	</h2>
	</br>


Liste des pizzas :
</br></br>

</br></br>
<?php ?> 
<form method="POST" action="">
<table class="ficheCourante">
	<thead class="thead">			
		<tr>
			<th>
				Pizza
			</th>
			<th>
				Image
			</th>
			<th>
				Ingredient
			</th>
				<th>
				Ajouter Ingredient
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
	$ListePizza = listePizza();
	// var_dump ($ListePizza);exit;
	for ($i = 0; $i < count($ListePizza); $i++) { 
	?>
		<tr>
			<td>
		<?php //var_dump($ListePizza[$i]);exit; ?>
			<?php echo $ListePizza[$i]["NomPizza"]?> 
			</td>
			<td>
			
			<img src="<?php echo $ListePizza[$i]["Image"]?>"/>
			</td>
			<td>
			
			</td>
			<td>
				<input type="submit" name="AjouterIngredient" class="ajouter" value="<?php echo $ListePizza[$i]["CodePizza"] ?>" />
			</td>
			<td>
			<?php echo $ListePizza[$i]["Prix"]?> 
			</td>
			<td>
			<input type="submit" name="ConsulterPizza" class="consulter" value="<?php echo $ListePizza[$i]["CodePizza"] ?>" />
			</td>
			<td>
			<input type="submit" name="SupprimerPizza" class="suppression"  value="<?php echo $ListePizza[$i]["CodePizza"] ?>"/>
			</td>
		</tr>
	<?php } ?>
	</tbody>
	
</table>
</form>