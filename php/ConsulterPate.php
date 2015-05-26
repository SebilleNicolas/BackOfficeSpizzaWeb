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
	
	if(isset($_POST['mm']))
	{
	if($_REQUEST['NomPate'] == ""){
	$message='Erreur: Vous devez ajouter un Nom au Pate.';
	echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
	}
	else{
		$Chemin = '..\\\\images\\\\';
		$CodePate = $_REQUEST['mm'];
		$NomPate = $_REQUEST['NomPate'];
		$PrixPate = $_REQUEST['PrixPate'];
		
		if(isset($_REQUEST['NouvelleImage'])){
			$Image = $Chemin . $_REQUEST['NouvelleImage'];
		}
		else{
			$Image = $_REQUEST['Image'];
			$Image = str_replace("\\","\\\\",$Image);
		}

		//modification de l'Pate 

		$reussi = modPate($CodePate, $NomPate, $PrixPate, $Image);

		if($reussi = false){$message='Erreur Pate non modifier'; echo '<script type="text/javascript">window.alert("'.$message.'");</script>';}
		
		
		if($reussi = true){$message='La Pate a été modifier'; echo '<script type="text/javascript">window.alert("'.$message.'");</script>';}
		
	}
	}
	
		if(isset($_POST['dd']))
	{
		$CodePate = $_REQUEST['dd'];
		header("Location:  AjouterIngredientPate.php?id=$CodePate");
	}
	
		if(isset($_POST['ss']))
	{
		$CodePate = $_REQUEST['ss'];
		$CodeIngredient = $_REQUEST['CodeIngredient'];

		//suppression de l'ingredient d'une Pate 

		$reussi = suprIngredientPate($CodePate, $CodeIngredient);

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



<form method="POST" action="ConsulterPate.php">
<table class="ficheCourante">
	<thead class="thead">			
		<tr>
			<th>
				Pate
			</th>
			<th>
				Image
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
				<input type="text" style="width: 220px;" name="NomPate" class="modification" value="<?php echo $affichePate[0]["NomPate"];?>" /> 
			</td>
			<td>
			<input type="hidden"  name="Image" value=" <?php echo $affichePate[0]["Image"];?>" /> 
			<input type="file" name="NouvelleImage" />
			</td>
			<td>
				<input type="text"  style="width: 220px;" name="PrixPate" class="modification" value="<?php echo $affichePate[0]["PrixPate"]?>" /> 
			</td>
			<td>
				<input type="submit" name="mm" value="<?php echo $CodePate; ?>" class="modifier" />
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
<form method="POST" action="ConsulterPate.php">
<table class="ficheCourante">
	<thead>
		<tr>
			<th>
			<h4>
				Ajouter un Ingredient :
			<h4>
			</th>
			<th>
				<input type="submit" name="dd" value="<?php echo $CodePate; ?>" class="modifier" />
			</th>
		</tr>
	</thead>
</table>
</form>	
</br>
		
<form method="POST" action="ConsulterPate.php">
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
	$listeIngredientPate = listeIngredientPate($CodePate);
	// var_dump ($listeIngredientPate);exit;
	for ($i = 0; $i < count($listeIngredientPate); $i++) { 
	?>
		<tr>
			<td>
				<input type="hidden"  name="CodeIngredient" value=" <?php echo $listeIngredientPate[$i]["CodeIngredient"];?>" /> 
				<input type="text" style="width: 220px;" name="NomPate" class="modification" value="<?php echo $listeIngredientPate[$i]["NomIngredient"];?>" /> 
			</td>
			<td>
				<input type="submit" name="ss" value="<?php echo $CodePate; ?>" class="refuser" />
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>
</form>