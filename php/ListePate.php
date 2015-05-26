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

	header("Location: ConsulterPate.php?id=$id");
	}
	
	
	if(isset($_POST['ss']))
	{
		$CodePate = $_REQUEST['ss'];	

		//suppression de l'Pate 

		$reussi = suprPate($CodePate);

		if($reussi = false){$message='Erreur Pate non supprimer'; echo '<script type="text/javascript">window.alert("'.$message.'");</script>';}
		
		
		if($reussi = true){$message='Pate supprimer'; echo '<script type="text/javascript">window.alert("'.$message.'");</script>';}
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
		Liste des Pates :
	</h3>
</br></br>

<?php ?> 
<form method="POST" action="ListePate.php">
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
			<th>
				Supprimer
			</th>
		</tr>
	</thead>
	<tbody>
	<?php 
	$listePate = listePate();
	// var_dump ($ListePate);exit;
	for ($i = 0; $i < count($listePate); $i++) { 
	?>
		<tr>
			<td>
				<input type="text" style="width: 220px;" disabled="disabled" name="NomPate" class="modification" value="<?php echo $listePate[$i]["NomPate"];?>" /> 
			</td>
			<td>
				<img src="<?php echo $listePate[$i]["Image"]?>"/>
			</td>
			<td>
				<input type="text"  style="width: 220px;" disabled="disabled" name="PrixPate" class="modification" value="<?php echo $listePate[$i]["PrixPate"]?>" /> 
			</td>
			<td>
				<input type="submit" name="mm" value="<?php echo $listePate[$i]["CodePate"]; ?>" class="modifier" />
			</td>
			<td>
				<input type="submit" name="ss" value="<?php echo $listePate[$i]["CodePate"]; ?>" class="refuser" />
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>
</form>