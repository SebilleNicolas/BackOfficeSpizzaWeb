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
		
		
	// var_dump($_REQUEST);
	$Menu = ConsulterMenu($_REQUEST["id"]);
	
	// var_dump($Menu);
	// exit;
	if (isset($_POST["modifierMenu"]))
	{
	// var_dump($_REQUEST);exit;
	if ($_REQUEST["NomMenu"] == "" ||  $_REQUEST["Prix"] == "")
		{	$message='Erreur: Vous devez remplir tous les champs pour modifier le menu.';
		echo '<script type="text/javascript">window.alert("'.$message.'");</script>';}		
		
	else
		{
		
		$NomMenu = $_REQUEST['NomMenu'];
		$NbPizzas = $_REQUEST['NbPizzas'];
		$NbPaninis = $_REQUEST['NbPaninis'];
		$NbTexMex = $_REQUEST['NbTexMex'];
		$NbDesserts = $_REQUEST['NbDesserts'];
		$NbSalades = $_REQUEST['NbSalades'];
		$NbBoissons = $_REQUEST['NbBoissons'];
		$Prix = $_REQUEST['Prix'];
		$CodeMenu = $_REQUEST["id"];
		
			$result = modifierMenu($NomMenu, $NbPizzas, $NbPaninis,$NbTexMex,$NbDesserts,$NbSalades,$NbBoissons,$Prix, $CodeMenu);
			if($result == true)
			{$message='Le MENU a bien été modifier.';}
			else
			{$message='Erreur: Le MENU n\'a pas été modifier. Veuillez réssayer.';}
			
		echo '<script type="text/javascript">window.alert("'.$message.'");</script>';	
		header( 'Refresh:2; url=ListeMenu.php');

		
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
		MODIFIER MENU
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
					Nom Menu
				</th>
				<th>
					<input type="text"  style="width: 220px;" name="NomMenu" class="modification"  value="<?php echo $Menu["NomMenu"] ; ?>" />
				</th>
				</tr>
				<tr>
				<th>
					Pizzas
				</th>
				<th>
					<input type="number" name="NbPizzas" value="<?php echo $Menu["NbPizza"] ; ?>"> </input>
				</th>
			</tr>
			<tr>
				<th>
					Paninis
				</th>
				<th>
					<input type="number" name="NbPaninis"  value="<?php echo $Menu["NbPanini"] ; ?>"> </input>
				</th>
			</tr>
			<tr>
				<th>
					TexMex
				</th>
				<th>
					<input type="number" name="NbTexMex"  value="<?php echo $Menu["NbTexMex"] ; ?>"> </input>
				</th>
			</tr>
			<tr>
				<th>
					Desserts
				</th>
				<th>
					<input type="number" name="NbDesserts"  value="<?php echo $Menu["NbDessert"] ; ?>"> </input>
				</th>
			</tr>
			<tr>
				<th>
					Salades
				</th>
				<th>
					<input type="number" name="NbSalades"  value="<?php echo $Menu["NbSalade"] ; ?>"> </input>
				</th>
			</tr>
			<tr>
				<th>
					Boissons
				</th>
				<th>
					<input type="number" name="NbBoissons"  value="<?php echo $Menu["NbBoisson"] ; ?>"> </input>
				</th>
			</tr>
			<tr>
				<th>
					Prix
				</th>
				<th>
					<input type="text"  style="width: 220px;" name="Prix" class="modification"  value="<?php echo $Menu["PrixMenu"] ; ?>"/>
				</th>
			</tr>
			<tr>
			<th>
			</th><th>
			<input type="submit"  name="modifierMenu" value="Modifier" />
			</th>
			</tr>
		</thead>
		
	</table>
</form>