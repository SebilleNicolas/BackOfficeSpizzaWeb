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
		
		
		
		
	if(isset($_POST['ajouterSandwich']))
	{
	// var_dump($_REQUEST);exit;
	if($_REQUEST['NouveauSandwich'] == ""){
	$message='Erreur: Vous devez ajouter un Nom au Nouveau Sandwich.';
	echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
	}
	else{
	
	
		$NomSandwich = $_REQUEST['NouveauSandwich'];
		// Mettre le name dans le input type file *****************************************************************************

		$Image = $_REQUEST['NouvelleImage'];
		// var_dump($Image);exit;
		


		// $Ingredient = $_REQUEST['NouveauIngredient'];
		$Prix = $_REQUEST['NouveauPrix'];
		
		
		
		//création de la Sandwich 
		// var_dump($Prix);exit;
		$reussi = creeSandwich($NomSandwich, $Prix,$Image);

		// $reussi = creeSandwich($NomSandwich, $Ingredient, $Prix);


		if($reussi = false){$message='Erreur Sandwich non ajouter';}
		
		
		if($reussi = true){$message='La Sandwich a été ajouter';}
		

		echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
		
		
		

	// header("Location:  AjouterSandwich.php?id=".$id."&IdInter=");
	// header("Location:  AjouterSandwich.php");
	
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
		Ajouter Sandwich
		</h2>
	</h2>
	</br>



</br></br>

</br></br>
<form method="POST" action="AjouterSandwich.php">
	<table class="ficheCourante" align="center">

		<thead class="thead">			
			<tr>
				<th>
					Sandwich
				</th>
				<th>
					Image
				</th>
			<!--	<th>
					Ingredient
				</th>-->
				<th>
					Prix
				</th>
				<th>
					Ajouter
				</th>
	
			</tr>
		</thead>
		<tbody>
		
			<tr>
				<td>
				<input type="text"  style="width: 220px;" name="NouveauSandwich" class="modification" />
				</td>
				<td>

				<input type="file" name="NouvelleImage" />


				
				</td>
				<!--<td>
				<input type="text"  style="width: 220px;" name="NouveauIngredient" class="modification" />
				</td>-->
				<td>
				<input type="text"  style="width: 220px;" name="NouveauPrix" class="modification" />
				</td>
				<td>
				
				
				<input type="submit" name="ajouterSandwich" class="ajouter" />
				</td>
			
				
				
			</tr>
		
		</tbody>
		
	</table>
</form>
