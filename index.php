<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>TP SI6</title>
</head>
<body>
	<form action="index.php?action=connexion" method="post">
	<div style="border-style:Solid;width:600px; height:400px; text-align:center; border-radius: 8px 8px 8px">
		<div style="margin-top: 150px;">
			<label for="pseudo">Pseudo :</label>
			<input type="text" id="pseudo" name="user_pseudo">
		</div>
		<div>
			<label for="mdp">Mot de passe:</label>
			<input type="text" id="mdp" name="user_mdp">
		</div>
		<div class="button">
			<button type="submit">Connexion</button>
			<button type="submit" action="index.php?action=inscription">Incription</button>
			
		</div>
	<div>
	</form>
	
<?php
	if(isset($_GET["action"]))
	{
		switch ($_GET["action"]) {
			case "connexion":
				if(login($_POST['user_pseudo'] && $_POST['user_mdp'])==1 && $_POST['user_pseudo'] && $_POST['user_mdp'] != null)
				echo 'utilisateur connecté';
			else{echo 'erreur authentification';}
			break;
			default:
			echo "je ne connais pas ce paramètre";
			break;

		}
	}

	function login($login,$password){
    try
    {
        $base = new PDO('mysql:host=localhost; dbname=si6', 'root', '');
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $requete=$base->prepare('SELECT count(*) as nb FROM utilisateur where pseudo=:pseudo and mdp=:mdp');
        $requete->bindValue(':pseudo', $login, PDO::PARAM_STR);
        $requete->bindValue(':mdp', $password, PDO::PARAM_STR);
        $requete->execute();
        $resultat = $requete->fetch();
        $nb = $resultat['nb'];
        $base=null;
        return $nb;
        }
    catch (PDOException $e) {
        echo 'Échec lors de la requête de login : ' . $e->getMessage();
    }
	
	function inscription($login,$password){
			$base = new PDO('mysql:host=localhost; dbname=si6', 'root', '');
			$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$requete=$base->preparer('INSERT INTO utilisateur(fk_id_eleve, fk_id_prof, nom_u, prenom_u, date_naissance, statut, mail, tel, identifiant, mdp, image_u) 
  VALUES ();');
			$requete->excute();	
	}
}
?>
</body>
</html>
