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
		
		
		
		
	if(isset($_POST['dd']))
	{
	if($_REQUEST['NouvelleBoisson'] == ""){
	$message='Erreur: Vous devez ajouter un Nom a la nouvelle Boisson.';
	echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
	}
	else{
	
			
		$NomBoisson = $_REQUEST['NouvelleBoisson'];
		$PrixBoisson = $_REQUEST['NouveauPrix'];
		//création de la Boisson 

		$reussi = creeBoisson($NomBoisson, $PrixBoisson);

		if($reussi = false){$message='Erreur Boisson non ajouter'; echo '<script type="text/javascript">window.alert("'.$message.'");</script>';}
		
		
		if($reussi = true){$message='La Boisson a été ajouter'; echo '<script type="text/javascript">window.alert("'.$message.'");</script>';}
		
	
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
		Ajouter Boisson
		</h2>
	</h2>
	</br>



</br></br>

</br></br>
<form method="POST" action="AjouterBoisson.php">
	<table class="ficheCourante" align="center">

		<thead class="thead">			
			<tr>
				<th>
					Boisson
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
					<input type="text"  style="width: 220px;" name="NouvelleBoisson" class="modification" />
				</td>
				<td>
					<input type="text"  style="width: 220px;" name="NouveauPrix" class="modification" />
				</td>				
				<td>
					<input type="submit" name="dd" class="ajouter" />
				</td>				
			</tr>
		
		</tbody>
		
	</table>
</form>
