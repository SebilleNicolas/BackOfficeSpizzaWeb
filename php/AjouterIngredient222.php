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
		// $id = $_REQUEST['ConsulterPizza'];
		var_dump($_REQUEST);exit;
		// header("Location: AjouterIngredient.php?id=$id");
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
		Ajouter les ingredients dans une pizza
		</h2>
	</h2>
	</br>


</br></br>
<?php ?> 
<form method="POST" action="">
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
	
	<td>
	<select><?php $ListeIngredient = listeIngredient(); 
	// var_dump($ListeIngredient);exit;
		for ($i = 0; $i < count($ListeIngredient); $i++) { 
	?>
<option value="tti"> <?php echo  $ListeIngredient[$i]["NomIngredient"]; ?> </option>
<?php }?>
	</select>
	</td>
	<input type="submit" name="AjouterIngredient" class="ajouter" value="" />
		<td>
	</td>

	</tbody>
	
</table>
</form>