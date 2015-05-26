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

	if($_REQUEST['NouvellePate'] == ""){
	$message='Erreur: Vous devez ajouter un Nom aux Pates.';
	echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
	}
	else{
		$Chemin = '..\\\\images\\\\';
		$NomPate = $_REQUEST['NouvellePate'];
		$PrixPate = $_REQUEST['NouveauPrix'];
		$Image = $Chemin . $_REQUEST['NouvelleImage'];
		
		
		
		//création de la Pate 
		$reussi = creePate($NomPate, $PrixPate, $Image);

		if($reussi = false){$message='Erreur Pâte non ajouter'; echo '<script type="text/javascript">window.alert("'.$message.'");</script>';}
		
		
		if($reussi = true){
		$codePatecree = codePatecree();
		$id = $codePatecree[0]['CodePate'];
		header("Location:  AjouterIngredientPate.php?id=$id");
		;}
	
	
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
		Ajouter Pâte
		</h2>
	</h2>
	</br>



</br></br>

</br></br>

<form method="POST" action="AjouterPate.php">
	<table class="ficheCourante" align="center">

		<thead class="thead">			
			<tr>
				<th>
					Pâte
				</th>
				<th>
					Image
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
				<input type="text"  style="width: 220px;" name="NouvellePate" class="modification" />
				</td>
				<td>
				<input type="file" name="NouvelleImage" />
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
