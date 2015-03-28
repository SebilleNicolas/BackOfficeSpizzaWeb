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
	
	if(isset($_POST['AjouterMenu']))
	{
		exit;
	// $id = $_REQUEST['ConsulterAction'];
	// header("Location: ConsulterAction.php?id=$id");
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
		Ajouter un menu
		</h2>
	</h2>
	</br>



</br></br>

</br></br>
<?php ?> 
<form method="POST" action="" >
<table class="ficheCourante" align="center">
	<thead class="thead">			
		<tr>
			<th>
				Nom Menu
			</th>
			<th>
				Pizza
			</th>
			<th>
				Nbr Pizza
			</th>
			<th>
				Panini
			</th>
			<th>
				Nbr Panini
			</th>
			<th>
				Salade
			</th>
			<th>
				Nbr Salade
			</th>
			<th>
				Boisson
			</th>
			<th>
				Nbr Boisson
			</th>
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
				<input type="text"  style="width: 150px;" name="NomMenu" class="modification" />
			</td>
			<td>
		<select>
		
		<?php	$ListePizza = listePizza();	// var_dump ($ListePizza);exit;
		for ($i = 0; $i < count($ListePizza); $i++) { 
		?>
		<option value= <?php echo $ListePizza[$i]["CodePizza"]?>> 
			<?php echo $ListePizza[$i]["NomPizza"]?> 
			</option>
				<?php } ?>
		</select>
			</td>
			<td>
				<input type="number"  style="width:60px;" name="NomMenu" class="modification" min="0" placeholder="0"/>
			</td>
			<td>
			<select>
		
		<?php	$ListePanini = listePanini();	// var_dump ($ListePizza);exit;
		for ($i = 0; $i < count($ListePanini); $i++) { 
		?>
		<option value= <?php echo $ListePanini[$i]["CodePanini"]?>> 
			<?php echo $ListePanini[$i]["NomPanini"]?> 
			</option>
				<?php } ?>
		</select>
			
			
			</td>
			<td>
				<input type="number"  style="width:60px;" name="NomMenu" class="modification" min="0" placeholder="0"/>
			</td>
			<td>
			<select>
		<?php	$ListeSalade = listeSalade();	// var_dump ($ListePizza);exit;
		for ($i = 0; $i < count($ListeSalade); $i++) { 
		?>
		<option value= <?php echo $ListeSalade[$i]["CodeSalade"]?>> 
			<?php echo $ListeSalade[$i]["NomSalade"]?> 
			</option>
				<?php } ?>
		</select>
			</td>
			<td>
				<input type="number"  style="width:60px;" name="NomMenu" class="modification" min="0" placeholder="0"/>
			</td>
			<td>
			<select>
		<?php	$ListeBoisson = listeBoisson();	 //var_dump ($ListeBoisson);exit;
		for ($i = 0; $i < count($ListeBoisson); $i++) { 
		?>
		<option value= <?php echo $ListeBoisson[$i]["CodeBoisson"]?>> 
			<?php echo $ListeBoisson[$i]["NomBoisson"]?> 
			</option>
				<?php } ?>
		</select>
			</td>
			<td>
				<input type="number"  style="width:60px;" name="NomMenu" class="modification" min="0" placeholder="0"/>
			</td>
			<td>
			<input type="text"  style="width: 150px;" name="PrixMenu" class="modification" />
			</td>
			<td>
			<input type="submit" name="AjouterMenu" class="ajouter" value="" />
			</td>
		</tr>

	</tbody>
</table>
</form>