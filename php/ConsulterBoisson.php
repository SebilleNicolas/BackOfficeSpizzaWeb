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
	$CodeBoisson = $_REQUEST['id'];	
	}	
	
	if(isset($_POST['mm']))
	{
	if($_REQUEST['NomBoisson'] == ""){
	$message='Erreur: Vous devez ajouter un Nom a la Boisson.';
	echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
	}
	else{
		$CodeBoisson = $_REQUEST['mm'];
		$NomBoisson = $_REQUEST['NomBoisson'];
		$PrixBoisson = $_REQUEST['PrixBoisson'];

		//modification de l'Boisson 

		$reussi = modBoisson($CodeBoisson, $NomBoisson, $PrixBoisson);

		if($reussi = false){$message='Erreur Boisson non modifier'; echo '<script type="text/javascript">window.alert("'.$message.'");</script>';}
		
		
		if($reussi = true){$message='La Boisson a été modifier'; echo '<script type="text/javascript">window.alert("'.$message.'");</script>';}
		
	
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
		Modifier Boisson
		</h2>
	</h2>
	</br>


</br></br>
	<h3>
<?php $afficheBoisson = afficheBoisson($CodeBoisson); ?>
<?php echo $afficheBoisson[0]["NomBoisson"]; ?>
	</h3>
</br></br>

<form method="POST" action="ConsulterBoisson.php">
<table class="ficheCourante">
	<thead class="thead">			
		<tr>
			<th>
				Boisson
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
				<input type="text" style="width: 220px;" name="NomBoisson" class="modification" value="<?php echo $afficheBoisson[0]["NomBoisson"];?>" /> 
			</td>
			<td>
				<input type="text"  style="width: 220px;" name="PrixBoisson" class="modification" value="<?php echo $afficheBoisson[0]["PrixBoisson"]?>" /> 
			</td>
			<td>
				<input type="submit" name="mm" value="<?php echo $CodeBoisson; ?>" class="modifier" />
			</td>
		</tr>
	</tbody>
</table>
</form>