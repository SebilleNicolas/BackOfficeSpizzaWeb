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
		
		
		
			
	if(isset($_POST['ajouterMenu']))
	{
	// var_dump($_REQUEST);exit;
	if($_REQUEST['NomMenu'] == ""){
	$message='Erreur: Vous devez ajouter un Nom au menu.';
	echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
	}
	else{
	
		$NomMenu = $_REQUEST['NomMenu'];
		$NbPizzas = $_REQUEST['NbPizzas'];
		$NbPaninis = $_REQUEST['NbPaninis'];
		$NbTexMex = $_REQUEST['NbTexMex'];
		$NbDesserts = $_REQUEST['NbDesserts'];
		$NbSalades = $_REQUEST['NbSalades'];
		$NbBoissons = $_REQUEST['NbBoissons'];
		$Prix = $_REQUEST['Prix'];
		// Mettre le name dans le input type file *****************************************************************************

		
		
		
		$reussi = creeMenu($NomMenu, $NbPizzas, $NbPaninis,$NbTexMex,$NbDesserts,$NbSalades,$NbBoissons,$Prix);

		// $reussi = creePizza($NomPizza, $Ingredient, $Prix);


		if($reussi = false){$message='Erreur menu non ajouter';}
		
		
		if($reussi = true){$message='Le menu a été ajouter';}
		

		echo '<script type="text/javascript">window.alert("'.$message.'");</script>';

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
		Ajouter Menus
		</h2>
	</h2>
	</br>



</br></br>

</br></br>
<form method="POST" action="ajoutermenu.php">
	<table class="ficheCourante" align="center">

		<thead class="thead">			
			<tr>
				<th>
					Nom Menu
				</th>
				<th>
					<input type="text"  style="width: 220px;" name="NomMenu" class="modification" />
				</th>
				</tr>
				<tr>
				<th>
					Pizzas
				</th>
				<th>
					<input type="number" name="NbPizzas"> </input>
				</th>
			</tr>
			<tr>
				<th>
					Paninis
				</th>
				<th>
					<input type="number" name="NbPaninis"> </input>
				</th>
			</tr>
			<tr>
				<th>
					TexMex
				</th>
				<th>
					<input type="number" name="NbTexMex"> </input>
				</th>
			</tr>
			<tr>
				<th>
					Desserts
				</th>
				<th>
					<input type="number" name="NbDesserts"> </input>
				</th>
			</tr>
			<tr>
				<th>
					Salades
				</th>
				<th>
					<input type="number" name="NbSalades"> </input>
				</th>
			</tr>
			<tr>
				<th>
					Boissons
				</th>
				<th>
					<input type="number" name="NbBoissons"> </input>
				</th>
			</tr>
			<tr>
				<th>
					Prix
				</th>
				<th>
					<input type="text"  style="width: 220px;" name="Prix" class="modification" />
				</th>
			</tr>
			<tr>
			<th>
			</th><th>
			<input type="submit"  name="ajouterMenu" value="Ajouter" />
			</th>
			</tr>
		</thead>
		
	</table>
</form>
