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
			'' //mdp : root
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
function listeIngredient()
{
	mb_internal_encoding('UTF-8');
	$result = false;
	
	$pdo = connexion();
	
	
	
	if($pdo != false)
	{
		
		$listePizza = "
						SELECT *
						FROM ingredient
						
						
					";
		//mysql_query("SET NAMES 'utf8'");
		$result = $pdo -> query($listePizza)->fetchall();
		
	}

	return $result;
		
}
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
function listeBoisson()
{
	mb_internal_encoding('UTF-8');
	$result = false;
	
	$pdo = connexion();
	
	
	
	if($pdo != false)
	{
		
		$listeBoisson = "
						SELECT *
						FROM boisson
						
						
					";
		//mysql_query("SET NAMES 'utf8'");
		// var_dump ($listeBoisson);exit;
		$result = $pdo -> query($listeBoisson)->fetchall();
		
	}

	return $result;
		
}
/************** Fonction d'obention de fiche avec l'identifiant **************/
function listeFiche($id)
{

	$result = false;
	
	$pdo = connexion();
	
	
	
	if($pdo != false)
	{
		
		$listeFiche = "
						SELECT id, NomSociete, Adresse, CodePostal,Ville,Telephone
						FROM fichesociete
						
						
					";
				
		$result = $pdo -> query($listeFiche)->fetchall();
		
	}

	return $result;
		
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
/************** Fonction de suppression d'une fiche **************/
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
