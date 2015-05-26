<?php

/**
 * Page contenant toutes les fonctions utilisées sur l'application web
**/

/******************************************** FONCTIONS ********************************************/


/************** Fonction de connexion à la base de données **************/
function connexion()
{

	$pdo = false ;
	
	try {

			$pdo = new PDO( 
			'mysql:host=localhost;dbname=spizza', 
			'root',
			'root' //mdp : root
			); 
			$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	
		}
		
	catch (PDOException $err) {
	
			$messageErreur = $err->getMessage();
			error_log($messageErreur,0);
			
		}
	// var_dump($pdo);exit;
	return $pdo ;

	
}
/************** Fonction de vérification de l'existance de l'utilisateur **************/
function verification($id, $mdp)
{

	$bool = false;
	
	$pdo = connexion();
	
	if($pdo != false)
	{
		// echo"************************************************";
		$sql = "Select count(*) as nb from administrateur where login =:user and mdp =:mdp";
		
		
		$prep = $pdo -> prepare($sql);
		
		$prep -> bindParam(':user', $id, PDO::PARAM_STR);
		
		$prep -> bindParam(':mdp', $mdp, PDO::PARAM_STR);
		var_dump($sql); 
		$prep -> execute();
		
		$resultat = $prep -> fetch();
		
		if($resultat['nb'] == 1)
		{
		
			$bool = true;
		
		}
		
		$prep -> closeCursor();
	
	}
	
	return $bool;
	
}

/************** Fonction de vérification de l'authentification **************/
function verificationAuthentification()
{
	
	if(!($_SESSION["auth"] == "authentifie"))
	{
	
		header("Location: ../index.php");
	
	}
	
}



/************** Fonction d'obention de l'identifiant **************/
function id($login, $mdp)
{
	$stat = false;
	
	$pdo = connexion();
	
	if($pdo != false)
	{
	
		$sql = "Select id from administrateur where login =:user and mdp =:mdp";
		
		$prep = $pdo -> prepare($sql);
		
		$prep -> bindParam(':user', $login, PDO::PARAM_STR);
		
		$prep -> bindParam(':mdp', $mdp, PDO::PARAM_STR);
		
		$prep -> execute();
		
		$resultat = $prep -> fetch();
		
		$stat = $resultat["id"];
	
	}
	
	return $stat;
	
}

/************** Fonction d'obention de la liste des Dessert **************/
function listeDessert()
{
	mb_internal_encoding('UTF-8');
	$result = false;
	
	$pdo = connexion();
	
	
	
	if($pdo != false)
	{
		
		$listeDessert = "
						SELECT *
						FROM dessert
						
						
					";
		//mysql_query("SET NAMES 'utf8'");
		$result = $pdo -> query($listeDessert)->fetchall();
		// var_dump($result); exit;
		
	}

	return $result;
		
}
/************** Fonction d'obention de la liste des Sandwich **************/
function listeSandwich()
{
	mb_internal_encoding('UTF-8');
	$result = false;
	
	$pdo = connexion();
	
	
	
	if($pdo != false)
	{
		
		$listeSandwich = "
						SELECT *
						FROM sandwich
						
						
					";
		//mysql_query("SET NAMES 'utf8'");
		$result = $pdo -> query($listeSandwich)->fetchall();
		
	}

	return $result;
		
}
/************** Fonction d'obention de la liste des Pizza **************/
function listePizza()
{
	mb_internal_encoding('UTF-8');
	$result = false;
	
	$pdo = connexion();
	
	
	
	if($pdo != false)
	{
		
		$listePizza = "
						SELECT *
						FROM pizza
						
						
					";
		//mysql_query("SET NAMES 'utf8'");
		$result = $pdo -> query($listePizza)->fetchall();
		
	}

	return $result;
		
}
/************** Fonction d'obention de la liste des Ingredients **************/
// function listeIngredient()
// {
	// mb_internal_encoding('UTF-8');
	// $result = false;
	
	// $pdo = connexion();
	
	
	
	// if($pdo != false)
	// {
		
		// $listePizza = "
						// SELECT *
						// FROM ingredient
						
						
					// ";
		// mysql_query("SET NAMES 'utf8'");
		// $result = $pdo -> query($listePizza)->fetchall();
		
	// }

	// return $result;
		
// }
/************** Fonction d'obention de la liste des Panini **************/
function listePanini()
{
	mb_internal_encoding('UTF-8');
	$result = false;
	
	$pdo = connexion();
	
	
	
	if($pdo != false)
	{
		
		$listePanini = "
						SELECT *
						FROM panini
						
						
					";
		//mysql_query("SET NAMES 'utf8'");
		$result = $pdo -> query($listePanini)->fetchall();
		
	}

	return $result;
		
}
/************** Fonction d'obention de la liste des Salade **************/
function listeSalade()
{
	mb_internal_encoding('UTF-8');
	$result = false;
	
	$pdo = connexion();
	
	
	
	if($pdo != false)
	{
		
		$listeSalade = "
						SELECT *
						FROM salade
						
						
					";
		//mysql_query("SET NAMES 'utf8'");
		$result = $pdo -> query($listeSalade)->fetchall();
		
	}

	return $result;
		
}
/************** Fonction d'obention de la liste des Boisson **************/
// function listeBoisson()
// {
	// mb_internal_encoding('UTF-8');
	// $result = false;
	
	// $pdo = connexion();
	
	
	
	// if($pdo != false)
	// {
		
		// $listeBoisson = "
						// SELECT *
						// FROM boisson
						
						
					// ";
		// mysql_query("SET NAMES 'utf8'");
		// var_dump ($listeBoisson);exit;
		// $result = $pdo -> query($listeBoisson)->fetchall();
		
	// }

	// return $result;
		
// }

function listeMenu()
{
	mb_internal_encoding('UTF-8');
	$result = false;
	
	$pdo = connexion();
	
	
	
	if($pdo != false)
	{
		
		$listeMenu = "
						SELECT *
						FROM menu
					";
		//mysql_query("SET NAMES 'utf8'");
		$result = $pdo -> query($listeMenu)->fetchall();
		
	}

	return $result;
		
}
 
function creeMenu($NomMenu, $NbPizzas, $NbPaninis,$NbTexMex,$NbDesserts,$NbSalades,$NbBoissons,$Prix)
{

	$reussi = false;
		
	$pdo = connexion();
	// var_dump($pdo);
	if($pdo != false)
	{

		$NomMenu = $pdo -> quote($NomMenu);

			$insert = '
					INSERT INTO menu
					VALUES (null,"'.$NomMenu.'", '.$Prix.', '.$NbPizzas.', '.$NbPaninis.', '.$NbTexMex.', '.$NbDesserts.', '.$NbSalades.', '.$NbBoissons.', 0)
					';
		$res = $pdo-> exec($insert);
					

		
		if($res == 1)
		{
		
			$reussi = true;
		
		}
	}
	
	return $reussi;
	
}
/************** Fonction de suppression d'une sandwich **************/
function supprimerMenu($CodeMenu)
{

	$reussi = false;
	
	$pdo = connexion();
	
	if($pdo != false)
	{
	
		

		
		$req = "
					DELETE FROM menu
					WHERE CodeMenu=$CodeMenu
					
				";
		// var_dump($req);exit;
		$res = $pdo -> exec($req);
		
		if($res == 1)
		{
		
			$reussi = true;
		
		}
		
	}

	return $reussi;

}
/************** Fonction de création d'une fiche **************/
function creePizza($NomPizza, $Ingredient, $Prix , $Image)
{

	$reussi = false;
		
	$pdo = connexion();
	// var_dump($pdo);
	if($pdo != false)
	{
		// var_dump($NomPizza);
// var_dump($Ingredient);
// var_dump($Prix);		exit;
// $Image = ""+$Image
		$NomPizza = $pdo -> quote($NomPizza);
		// $Image = $pdo -> quote($Image);
		
	
		
		$insert = "
					INSERT INTO Pizza
					VALUES ( null, $NomPizza,$Prix, '..\\\\images\\\\".$Image."' )
					";
					
					
		// var_dump($insert); exit();
		$res = $pdo -> exec($insert);

		
		if($res == 1)
		{
		
			$reussi = true;
		
		}
	}
	
	return $reussi;
	
}

/************** Fonction de suppression d'une sandwich **************/
function supprimerDessert($CodeDessert)
{

	$reussi = false;
	
	$pdo = connexion();
	
	if($pdo != false)
	{
	
		

		
		$req = "
					DELETE FROM dessert
					WHERE CodeDessert=$CodeDessert
					
				";
		// var_dump($req);exit;
		$res = $pdo -> exec($req);
		
		if($res == 1)
		{
		
			$reussi = true;
		
		}
		
	}

	return $reussi;

}
/************** Fonction de suppression d'une sandwich **************/
function supprimerSandwich($CodeSandwich)
{

	$reussi = false;
	
	$pdo = connexion();
	
	if($pdo != false)
	{
	
		

		
		$req = "
					DELETE FROM sandwich
					WHERE CodeSandwich=$CodeSandwich
					
				";
		// var_dump($req);exit;
		$res = $pdo -> exec($req);
		
		if($res == 1)
		{
		
			$reussi = true;
		
		}
		
	}

	return $reussi;

}
/************** Fonction de suppression d'une salade **************/
function supprimerSalade($CodeSalade)
{

	$reussi = false;
	
	$pdo = connexion();
	
	if($pdo != false)
	{
	
		

		
		$req = "
					DELETE FROM salade
					WHERE CodeSalade=$CodeSalade
					
				";
		// var_dump($req);exit;
		$res = $pdo -> exec($req);
		
		if($res == 1)
		{
		
			$reussi = true;
		
		}
		
	}

	return $reussi;

}
/************** Fonction de suppression d'une Pizza **************/
function supprimerPizza($CodePizza)
{

	$reussi = false;
	
	$pdo = connexion();
	
	if($pdo != false)
	{
	
		

		
		$req = "
					DELETE FROM pizza
					WHERE CodePizza=$CodePizza
					
				";
		// var_dump($req);exit;
		$res = $pdo -> exec($req);
		
		if($res == 1)
		{
		
			$reussi = true;
		
		}
		
	}

	return $reussi;

}
function ConsulterMenu($CodeMenu)
{
	
	$pdo = connexion();
	
	if($pdo != false)
	{
	$req = "
			Select * 
				from menu where CodeMenu = $CodeMenu	
					";
					
			$result =  $pdo -> query($req)->fetch();
	}
	
	
	return $result;
}
/************** Fonction récupérer Sandwich  **************/
function ConsulterDessert($CodeDessert)
{
	
	$pdo = connexion();
	
	if($pdo != false)
	{
	$req = "
			Select * 
				from dessert where CodeDessert = $CodeDessert	
					";
					
			$result =  $pdo -> query($req)->fetch();
	}
	
	
	return $result;
}
function selectPizza($codePizza)
{
$pdo = connexion();
	
	if($pdo != false)
	{
	$req = "
			Select * 
				from compose_pizza where CodePizza = $codePizza	
					";
					// $result = $pdo -> query($listeDessert)->fetchall();
			$result =  $pdo -> query($req)->fetchall();
	}
	
	
	return $result;

}
function selectIngredient($numIngredient)
{
$pdo = connexion();
	
	if($pdo != false)
	{
	$req = "
			Select * 
				from ingredient where CodeIngredient = $numIngredient	
					";
					// $result = $pdo -> query($listeDessert)->fetchall();
			$result =  $pdo -> query($req)->fetch();
	}
	
	
	return $result;

}
/************** Fonction récupérer Sandwich  **************/
function ConsulterSandwich($CodeSandwich)
{
	
	$pdo = connexion();
	
	if($pdo != false)
	{
	$req = "
			Select * 
				from sandwich where CodeSandwich = $CodeSandwich	
					";
					
			$result =  $pdo -> query($req)->fetch();
	}
	
	
	return $result;
}
/************** Fonction récupérer pizza  **************/
function ConsulterPizza($CodePizza)
{
	
	$pdo = connexion();
	
	if($pdo != false)
	{
	$req = "
			Select * 
				from pizza where CodePizza = $CodePizza	
					";
					
			$result =  $pdo -> query($req)->fetch();
	}
	
	
	return $result;
}
/************** Fonction récupérer salade  **************/
function ConsulterSalade($CodeSalade)
{
	
	$pdo = connexion();
	
	if($pdo != false)
	{
	$req = "
			Select * 
				from salade where CodeSalade = $CodeSalade	
					";
					
			$result =  $pdo -> query($req)->fetch();
	}
	
	
	return $result;
}
/************** Fonction de modification d'une fiche **************/
function modifierMenu($NomMenu, $NbPizzas, $NbPaninis,$NbTexMex,$NbDesserts,$NbSalades,$NbBoissons,$Prix,$CodeMenu)
{

	$modif = false;
	
	$pdo = connexion();
	
	if($pdo != false)
	{
	
		
		$NomMenu = $pdo -> quote($NomMenu);
		
		
		$req = "
					UPDATE menu
					SET NomMenu = $NomMenu , 
					NbPizza = $NbPizzas, 
					NbPanini = $NbPaninis, 
					NbTexMex = $NbTexMex, 
					NbDessert = $NbDesserts, 
					NbSalade = $NbSalades, 
					NbBoisson = $NbBoissons, 
					PrixMenu = $Prix	
					WHERE CodeMenu = $CodeMenu";
				
			
				
		// var_dump($req);exit;
		$res = $pdo -> exec($req);
	
		if($res == 1)
		{
		
			$modif = true;
		
		}
		
	}

	return $modif;
}
/************** Fonction de modification d'une fiche **************/
function modifierDessert($CodeDessert,$nom,$image,$prix,$is_img)
{

	$modif = false;
	
	$pdo = connexion();
	
	if($pdo != false)
	{
	
		
		$nom = $pdo -> quote($nom);
		// $image = $pdo -> quote($image);
		$prix = $pdo -> quote($prix);
		// $CodePostal = $pdo -> quote($CodePostal);
		// $Ville = $pdo -> quote($Ville);
		// $idUtilisateurs = $pdo -> quote($idUtilisateurs);
		// $Telephone = $pdo -> quote($Telephone);
		
		
		if($is_img == true){
		$req = "
					UPDATE dessert
					SET NomDessert = $nom , 
					image = '..\\\\images\\\\".$image."',
					PrixDessert = $prix	
					WHERE CodeDessert = $CodeDessert";
				}
				else
				{
				$req = "
					UPDATE dessert
					SET NomDessert = $nom , 
					PrixDessert = $prix	
					WHERE CodeDessert = $CodeDessert";
				}
		// var_dump($req);exit;
		$res = $pdo -> exec($req);
	
		if($res == 1)
		{
		
			$modif = true;
		
		}
		
	}

	return $modif;
}
/************** Fonction de modification d'une fiche **************/
function modifierSandwich($CodeSandwich,$nom,$image,$prix,$is_img)
{

	$modif = false;
	
	$pdo = connexion();
	
	if($pdo != false)
	{
	
		
		$nom = $pdo -> quote($nom);
		// $image = $pdo -> quote($image);
		$prix = $pdo -> quote($prix);
		// $CodePostal = $pdo -> quote($CodePostal);
		// $Ville = $pdo -> quote($Ville);
		// $idUtilisateurs = $pdo -> quote($idUtilisateurs);
		// $Telephone = $pdo -> quote($Telephone);
		
		
		if($is_img == true){
		$req = "
					UPDATE sandwich
					SET NomSandwich = $nom , 
					image = '..\\\\images\\\\".$image."',
					prix = $prix	
					WHERE CodeSandwich = $CodeSandwich";
				}
				else
				{
				$req = "
					UPDATE sandwich
					SET NomSandwich = $nom , 
					prix = $prix	
					WHERE CodeSandwich = $CodeSandwich";
				}
		// var_dump($req);exit;
		$res = $pdo -> exec($req);
	
		if($res == 1)
		{
		
			$modif = true;
		
		}
		
	}

	return $modif;
}
/************** Fonction de modification d'une fiche **************/
function modifierPizza($CodePizza,$nom,$image,$prix,$is_img)
{

	$modif = false;
	
	$pdo = connexion();
	
	if($pdo != false)
	{
	
		
		$nom = $pdo -> quote($nom);
		// $image = $pdo -> quote($image);
		$prix = $pdo -> quote($prix);
		// $CodePostal = $pdo -> quote($CodePostal);
		// $Ville = $pdo -> quote($Ville);
		// $idUtilisateurs = $pdo -> quote($idUtilisateurs);
		// $Telephone = $pdo -> quote($Telephone);
		
		
		if($is_img == true){
		$req = "
					UPDATE pizza
					SET NomPizza = $nom , 
					image = '..\\\\images\\\\".$image."',
					prix = $prix	
					WHERE CodePizza = $CodePizza";
				}
				else
				{
				$req = "
					UPDATE pizza
					SET NomPizza = $nom , 
					prix = $prix	
					WHERE CodePizza = $CodePizza";
				}
		// var_dump($req);exit;
		$res = $pdo -> exec($req);
	
		if($res == 1)
		{
		
			$modif = true;
		
		}
		
	}

	return $modif;
}
/************** Fonction de modification d'une salade **************/
function modifierSalade($CodeSalade,$nom,$prix)
{

	$modif = false;
	
	$pdo = connexion();
	
	if($pdo != false)
	{
	
		
		$nom = $pdo -> quote($nom);
		// $image = $pdo -> quote($image);
		$prix = $pdo -> quote($prix);
		// $CodePostal = $pdo -> quote($CodePostal);
		// $Ville = $pdo -> quote($Ville);
		// $idUtilisateurs = $pdo -> quote($idUtilisateurs);
		// $Telephone = $pdo -> quote($Telephone);
		
		

				$req = "
					UPDATE salade
					SET NomSalade = $nom , 
					PrixSalade = $prix	
					WHERE CodeSalade = $CodeSalade";
				
		// var_dump($req);exit;
		$res = $pdo -> exec($req);
	
		if($res == 1)
		{
		
			$modif = true;
		
		}
		
	}

	return $modif;
}
function creeDessert($NomDessert, $Prix,$Image)
{
$reussi = false;
		
	$pdo = connexion();
	// var_dump($pdo);
	if($pdo != false)
	{

		$NomDessert = $pdo -> quote($NomDessert);
		// $Image = $pdo -> quote($Image);
		
	
		
		$insert = "
					INSERT INTO dessert
					VALUES ( null, $NomDessert,$Prix, '..\\\\images\\\\".$Image."' )
					";
					
					
		// var_dump($insert); exit();
		$res = $pdo -> exec($insert);

		
		if($res == 1)
		{
		
			$reussi = true;
		
		}
	}
	
	return $reussi;
}
function creeSandwich($NomSandwich, $Prix,$Image)
{
$reussi = false;
		
	$pdo = connexion();
	// var_dump($pdo);
	if($pdo != false)
	{

		$NomSandwich = $pdo -> quote($NomSandwich);
		// $Image = $pdo -> quote($Image);
		
	
		
		$insert = "
					INSERT INTO Sandwich
					VALUES ( null, $NomSandwich,$Prix, '..\\\\images\\\\".$Image."' )
					";
					
					
		// var_dump($insert); exit();
		$res = $pdo -> exec($insert);

		
		if($res == 1)
		{
		
			$reussi = true;
		
		}
	}
	
	return $reussi;
}
function creeSalade($NomSalade, $Prix,$Image)
{
$reussi = false;
		
	$pdo = connexion();
	// var_dump($pdo);
	if($pdo != false)
	{

		$NomSalade = $pdo -> quote($NomSalade);
		// $Image = $pdo -> quote($Image);
		
	
		
		$insert = "
					INSERT INTO Salade
					VALUES ( null, $NomSalade,$Prix, '..\\\\images\\\\".$Image."' )
					";
					
					
		// var_dump($insert); exit();
		$res = $pdo -> exec($insert);

		
		if($res == 1)
		{
		
			$reussi = true;
		
		}
	}
	
	return $reussi;
}








//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------- 				CODE ERWAN 			-------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------




/************** Fonction d'obention de la liste des Ingredients **************/
function listeIngredient()
{
	mb_internal_encoding('UTF-8');
	$result = false;
	
	$pdo = connexion();
	
	
	
	if($pdo != false)
	{
		
		$listeIngredient = "
						SELECT CodeIngredient, NomIngredient
						FROM ingredient
						
						
					";
		//mysql_query("SET NAMES 'utf8'");
		$result = $pdo -> query($listeIngredient)->fetchall();
		
	}

	return $result;
		
}

/************** Fonction d'obention d'un Ingredient **************/
function afficheIngredient($CodeIngredient)
{
	mb_internal_encoding('UTF-8');
	$result = false;
	
	$pdo = connexion();
	
	
	
	if($pdo != false)
	{
		
		$afficheIngredient = "
						SELECT NomIngredient
						FROM ingredient
						WHERE CodeIngredient = '".$CodeIngredient."'
						
					";
		//mysql_query("SET NAMES 'utf8'");
		$result = $pdo -> query($afficheIngredient)->fetchall();
		
	}

	return $result;
		
}

/************** Fonction de création d'un Ingrédient **************/
function creeIngredient($NomIngredient)
{

	$reussi = false;
		
	$pdo = connexion();

	if($pdo != false)
	{
		
		
		$insert = "
					INSERT INTO ingredient
					VALUES ( null, '".$NomIngredient."')
					";
					
					
		$res = $pdo -> exec($insert);

		
		if($res == 1)
		{
		
			$reussi = true;
		
		}
	}
	
	return $reussi;
	
}

/************** Fonction de modification d'un Ingrédient **************/
function modIngredient($CodeIngredient, $NomIngredient)
{

	$reussi = false;
		
	$pdo = connexion();

	if($pdo != false)
	{
		
		
		$update = "
					UPDATE ingredient
					SET NomIngredient = '".$NomIngredient."'
					WHERE CodeIngredient = '".$CodeIngredient."'
					";
					
					
		$res = $pdo -> exec($update);

		
		if($res == 1)
		{
		
			$reussi = true;
		
		}
	}
	
	return $reussi;
	
}

/************** Fonction de suppression d'un Ingredient **************/
function suprIngredient($CodeIngredient)
{

	$reussi = false;
		
	$pdo = connexion();

	if($pdo != false)
	{
		
		
		$delete = "
					DELETE FROM ingredient
					WHERE CodeIngredient = '".$CodeIngredient."'
					";
					
					
		$res = $pdo -> exec($delete);

		
		if($res == 1)
		{
		
			$reussi = true;
		
		}
	}
	
	return $reussi;
	
}



/************** Fonction d'obention de la liste des Boissons **************/
function listeBoisson()
{
	mb_internal_encoding('UTF-8');
	$result = false;
	
	$pdo = connexion();
	
	
	
	if($pdo != false)
	{
		
		$listeBoisson = "
						SELECT CodeBoisson, NomBoisson, PrixBoisson
						FROM boisson
						
						
					";
		//mysql_query("SET NAMES 'utf8'");
		$result = $pdo -> query($listeBoisson)->fetchall();
		
	}

	return $result;
		
}

/************** Fonction d'obention d'une Boisson **************/
function afficheBoisson($CodeBoisson)
{
	mb_internal_encoding('UTF-8');
	$result = false;
	
	$pdo = connexion();
	
	
	
	if($pdo != false)
	{
		
		$afficheBoisson = "
						SELECT NomBoisson, PrixBoisson
						FROM boisson
						WHERE CodeBoisson = '".$CodeBoisson."'
						
					";
		//mysql_query("SET NAMES 'utf8'");
		$result = $pdo -> query($afficheBoisson)->fetchall();
		
	}

	return $result;
		
}

/************** Fonction de création d'une Boisson **************/
function creeBoisson($NomBoisson, $PrixBoisson)
{

	$reussi = false;
		
	$pdo = connexion();

	if($pdo != false)
	{
		
		
		$insert = "
					INSERT INTO boisson
					VALUES ( null, '".$NomBoisson."', '".$PrixBoisson."')
					";
					
					
		$res = $pdo -> exec($insert);

		
		if($res == 1)
		{
		
			$reussi = true;
		
		}
	}
	
	return $reussi;
	
}


/************** Fonction de modification d'une Boisson **************/
function modBoisson($CodeBoisson, $NomBoisson, $PrixBoisson)
{

	$reussi = false;
		
	$pdo = connexion();

	if($pdo != false)
	{
		
		
		$update = "
					UPDATE boisson
					SET NomBoisson = '".$NomBoisson."' ,
					PrixBoisson = '".$PrixBoisson."'
					WHERE CodeBoisson = '".$CodeBoisson."'
					";
					
					
		$res = $pdo -> exec($update);

		
		if($res == 1)
		{
		
			$reussi = true;
		
		}
	}
	
	return $reussi;
	
}

/************** Fonction de suppression d'une Boisson **************/
function suprBoisson($CodeBoisson)
{

	$reussi = false;
		
	$pdo = connexion();

	if($pdo != false)
	{
		
		
		$delete = "
					DELETE FROM boisson
					WHERE CodeBoisson = '".$CodeBoisson."'
					";
					
					
		$res = $pdo -> exec($delete);

		
		if($res == 1)
		{
		
			$reussi = true;
		
		}
	}
	
	return $reussi;
	
}




/************** Fonction d'obention de la liste des Pates **************/
function listePate()
{
	mb_internal_encoding('UTF-8');
	$result = false;
	
	$pdo = connexion();
	
	
	
	if($pdo != false)
	{
		
		$listePate = "
						SELECT CodePate, NomPate, PrixPate, Image
						FROM pate
						
						
					";
		//mysql_query("SET NAMES 'utf8'");
		$result = $pdo -> query($listePate)->fetchall();
		
	}

	return $result;
		
}

/************** Fonction d'obention d'une Pate **************/
function afficheSalade($CodeSalade)
{
	mb_internal_encoding('UTF-8');
	$result = false;
	
	$pdo = connexion();
	
	
	
	if($pdo != false)
	{
		
		$affichePizza = "
						SELECT *
						FROM salade
						WHERE CodeSalade = '".$CodeSalade."'
						
					";
		//mysql_query("SET NAMES 'utf8'");
		$result = $pdo -> query($affichePizza)->fetch();
		
	}

	return $result;
		
}
/************** Fonction d'obention d'une Pate **************/
function affichePizza($CodePizza)
{
	mb_internal_encoding('UTF-8');
	$result = false;
	
	$pdo = connexion();
	
	
	
	if($pdo != false)
	{
		
		$affichePizza = "
						SELECT *
						FROM pizza
						WHERE CodePizza = '".$CodePizza."'
						
					";
		//mysql_query("SET NAMES 'utf8'");
		$result = $pdo -> query($affichePizza)->fetch();
		
	}

	return $result;
		
}

/************** Fonction d'obention d'une Pate **************/
function affichePate($CodePate)
{
	mb_internal_encoding('UTF-8');
	$result = false;
	
	$pdo = connexion();
	
	
	
	if($pdo != false)
	{
		
		$affichePate = "
						SELECT NomPate, PrixPate, Image
						FROM pate
						WHERE CodePate = '".$CodePate."'
						
					";
		//mysql_query("SET NAMES 'utf8'");
		$result = $pdo -> query($affichePate)->fetchall();
		
	}

	return $result;
		
}

/************** Fonction d'obention de la Pate cree **************/
function codePatecree()
{
	mb_internal_encoding('UTF-8');
	$result = false;
	
	$pdo = connexion();
	
	
	
	if($pdo != false)
	{
		
		$codePatecree = "
						SELECT CodePate
						FROM pate
						WHERE CodePate = (SELECT MAX(CodePate) FROM pate)
						
					";
		//mysql_query("SET NAMES 'utf8'");
		$result = $pdo -> query($codePatecree)->fetchall();
		
	}

	return $result;
		
}

/************** Fonction d'obention des Ingredients dispo pour la Pate cree **************/
function listeIngredientdispo($CodePate)
{
	mb_internal_encoding('UTF-8');
	$result = false;
	
	$pdo = connexion();
	
	
	
	if($pdo != false)
	{
		
		$listeIngredientdispo = "
						SELECT CodeIngredient, NomIngredient
						FROM ingredient 
						WHERE CodeIngredient NOT IN (SELECT NumIngredient FROM compose_pate WHERE CodePate= '".$CodePate."')
						
					";
		//mysql_query("SET NAMES 'utf8'");
		$result = $pdo -> query($listeIngredientdispo)->fetchall();
		
	}

	return $result;
		
}

/************** Fonction d'obention des Ingredients dispo pour la Pate cree **************/
function listeIngredientdispoSalade($CodeSalade)
{
	mb_internal_encoding('UTF-8');
	$result = false;
	
	$pdo = connexion();
	
	
	
	if($pdo != false)
	{
		
		$listeIngredientdispo = "
						SELECT CodeIngredient, NomIngredient
						FROM ingredient 
						WHERE CodeIngredient NOT IN (SELECT NumIngredient FROM compose_salade WHERE CodeSalade= '".$CodeSalade."')
						
					";
		//mysql_query("SET NAMES 'utf8'");
		$result = $pdo -> query($listeIngredientdispo)->fetchall();
		
	}

	return $result;
		
}

/************** Fonction d'obention des Ingredients dispo pour la Pate cree **************/
function listeIngredientdispoPizza($CodePizza)
{
	mb_internal_encoding('UTF-8');
	$result = false;
	
	$pdo = connexion();
	
	
	
	if($pdo != false)
	{
		
		$listeIngredientdispo = "
						SELECT CodeIngredient, NomIngredient
						FROM ingredient 
						WHERE CodeIngredient NOT IN (SELECT NumIngredient FROM compose_pizza WHERE CodePizza= '".$CodePizza."')
						
					";
		$result = $pdo -> query($listeIngredientdispo)->fetchall();
		
	}

	return $result;
		
}

/************** Fonction d'obention des Ingredients pour une Pate **************/
function listeIngredientPate($CodePate)
{

mb_internal_encoding('UTF-8');
	$result = false;
	
	$pdo = connexion();
	
	
	
	if($pdo != false)
	{
		
		$listeIngredientPate = "
						SELECT CodeIngredient, NomIngredient
						FROM ingredient 
						WHERE CodeIngredient IN (SELECT NumIngredient FROM compose_pate WHERE CodePate= '".$CodePate."')
						
					";
		//mysql_query("SET NAMES 'utf8'");
		$result = $pdo -> query($listeIngredientPate)->fetchall();
		
	}

	return $result;
		
}
/************** Fonction d'obention des Ingredients pour une Pate **************/
function listeIngredientPizza($CodePizza)
{

mb_internal_encoding('UTF-8');
	$result = false;
	
	$pdo = connexion();
	
	
	
	if($pdo != false)
	{
		
		$listeIngredientPate = "
						SELECT CodeIngredient, NomIngredient
						FROM ingredient 
						WHERE CodeIngredient IN (SELECT NumIngredient FROM compose_pizza WHERE CodePizza= '".$CodePizza."')
						
					";
		//mysql_query("SET NAMES 'utf8'");
		$result = $pdo -> query($listeIngredientPate)->fetchall();
		
	}

	return $result;
		
}
function listeIngredientSalade($CodeSalade)
{

mb_internal_encoding('UTF-8');
	$result = false;
	
	$pdo = connexion();
	
	
	
	if($pdo != false)
	{
		
		$listeIngredientPate = "
						SELECT CodeIngredient, NomIngredient
						FROM ingredient 
						WHERE CodeIngredient IN (SELECT NumIngredient FROM compose_salade WHERE CodeSalade= '".$CodeSalade."')
						
					";
		//mysql_query("SET NAMES 'utf8'");
		$result = $pdo -> query($listeIngredientPate)->fetchall();
		
	}

	return $result;
		
}
/************** Fonction de création d'une Pate **************/
function creePate($NomPate, $PrixPate, $Image)
{

	$reussi = false;
		
	$pdo = connexion();

	if($pdo != false)
	{
		
		
		$insert = "
					INSERT INTO pate
					VALUES ( null, '".$NomPate."', '".$PrixPate."', '".$Image."')
					";
					
					
		$res = $pdo -> exec($insert);

		
		if($res == 1)
		{
		
			$reussi = true;
		
		}
	}
	
	return $reussi;
	
}

/************** Fonction de composition d'une Pate **************/
function composePate($CodePate, $CodeIngredient)
{

	$reussi = false;
		
	$pdo = connexion();

	if($pdo != false)
	{
		
		
		$insert = "
					INSERT INTO compose_pate
					VALUES ( '".$CodePate."', '".$CodeIngredient."')
					";
					
					
		$res = $pdo -> exec($insert);

		
		if($res == 1)
		{
		
			$reussi = true;
		
		}
	}
	
	return $reussi;
	
}

/************** Fonction de composition d'une Pate **************/
function composePizza($CodePizza, $CodeIngredient)
{

	$reussi = false;
		
	$pdo = connexion();

	if($pdo != false)
	{
		
		
		$insert = "
					INSERT INTO compose_pizza
					VALUES ( '".$CodePizza."', '".$CodeIngredient."')
					";
					
					
		$res = $pdo -> exec($insert);

		
		if($res == 1)
		{
		
			$reussi = true;
		
		}
	}
	
	return $reussi;
	
}


/************** Fonction de composition d'une Pate **************/
function composeSalade($CodeSalade, $CodeIngredient)
{

	$reussi = false;
		
	$pdo = connexion();

	if($pdo != false)
	{
		
		
		$insert = "
					INSERT INTO compose_salade
					VALUES ( '".$CodeSalade."', '".$CodeIngredient."')
					";
					
					
		$res = $pdo -> exec($insert);

		
		if($res == 1)
		{
		
			$reussi = true;
		
		}
	}
	
	return $reussi;
	
}
/************** Fonction de modification d'une Pate **************/
function modPate($CodePate, $NomPate, $PrixPate, $Image)
{

	$reussi = false;
		
	$pdo = connexion();

	if($pdo != false)
	{
		
		
		$update = "
					UPDATE pate
					SET NomPate = '".$NomPate."' ,
					PrixPate = '".$PrixPate."',
					Image = '".$Image."'
					WHERE CodePate = '".$CodePate."'
					";
					
					
		$res = $pdo -> exec($update);

		
		if($res == 1)
		{
		
			$reussi = true;
		
		}
	}
	
	return $reussi;
	
}

/************** Fonction de suppression d'une Pate **************/
function suprPate($CodePate)
{

	$reussi = false;
		
	$pdo = connexion();

	if($pdo != false)
	{
		
		
		$delete = "
					DELETE FROM compose_pate
					WHERE CodePate = '".$CodePate."'

					";
					
					
		$res1 = $pdo -> exec($delete);

		$delete = "
					DELETE FROM pate 
					WHERE CodePate = '".$CodePate."'

					";
					
					
		$res2 = $pdo -> exec($delete);
		
		if($res1 == 1 AND $res2 == 1)
		{
		
			$reussi = true;
		
		}
	}
	
	return $reussi;
	
}

/************** Fonction de suppression d'un ingredient d'une Pate **************/
function suprIngredientPate($CodePate, $CodeIngredient)
{
	$reussi = false;
		
	$pdo = connexion();

	if($pdo != false)
	{
			$delete = "
					DELETE FROM compose_pate
					WHERE CodePate = '".$CodePate."' AND NumIngredient =  '".$CodeIngredient."'

					";
					
					
		$res = $pdo -> exec($delete);
		
		if($res == 1)
		{
			$reussi = true;
		}
	}
	
	return $reussi;
}

/************** Fonction de suppression d'un ingredient d'une Pate **************/
function suprIngredientSalade($CodeSalade, $CodeIngredient)
{
	$reussi = false;
		
	$pdo = connexion();

	if($pdo != false)
	{
			$delete = "
					DELETE FROM compose_salade
					WHERE CodeSalade = '".$CodeSalade."' AND NumIngredient =  '".$CodeIngredient."'

					";
					
					
		$res = $pdo -> exec($delete);
		
		if($res == 1)
		{
			$reussi = true;
		}
	}
	
	return $reussi;
}

/************** Fonction de suppression d'un ingredient d'une Pate **************/
function suprIngredientPizza($CodePizza, $CodeIngredient)
{
	$reussi = false;
		
	$pdo = connexion();

	if($pdo != false)
	{
			$delete = "
					DELETE FROM compose_pizza
					WHERE CodePizza = '".$CodePizza."' AND NumIngredient =  '".$CodeIngredient."'

					";
					
					
		$res = $pdo -> exec($delete);
		
		if($res == 1)
		{
			$reussi = true;
		}
	}
	
	return $reussi;
}