<!DOCTYPE HTML>
<!--
	Road Trip by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Heat Meat par Pierre, Yohan et Guillaume</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="subpage">

		<!-- Header -->
			<header id="header" class="alt">
				<div class="logo"><a href="index.php"> Heat Meat <span> par Pierre, Yohan et Guillaume</span></a></div>
				<a href="#menu"><span>Menu</span></a>
			</header>

		<?php include("nav.php")?>

		<!-- Content -->
		<!--
			Note: To show a background image, set the "data-bg" attribute below
			to the full filename of your image. This is used in each section to set
			the background image.
		-->
			<section id="post" class="wrapper bg-img" data-bg="banner3.jpg">
				<div class="inner">
					<article class="box">
						<header>
							<h2 text center="align">Connexion et création d'un compte</h2>
						</header>
						<div class="content">
							
						</div>
					</article>
				</div>
			</section>
					<?php
					session_start();
					if(isset($_POST["submit"]))
						{
							$nom=htmlentities(trim($_POST['nom']));
							$prenom=htmlentities(trim($_POST['prenom']));
							$mail=htmlentities(trim($_POST['mail']));
							$telephone=htmlentities(trim($_POST['telephone']));
							$mdp=htmlentities(trim($_POST['mdp']));
							$vmdp=htmlentities(trim($_POST['vmdp']));
						
								if(isset($nom) && isset($prenom) && isset($mail) && isset($telephone) && isset($mdp) && isset($vmdp))
									{ 
										if ($mdp==$vmdp)
										{ 
												$mdp=md5($mdp);
												$serveur='127.0.0.1';
												$login='groupe4'; // login pour accéder à mysql
												$mdp='groupe4'; // mot de passe pour accéder à mysql
												$base='groupe4_phpco'; // nom de la base de données
												$connexion=mysqli_connect($serveur,$login,$mdp,$base) or die('Connexion impossible à la base');
												$sql = ("INSERT INTO client VALUES(null,'$nom','$prenom','$mail','$telephone','$mdp','$vmdp')");
												$req = mysqli_query($sql) or die ('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
											
														
												
												if(mysqli_affected_rows($connexion)==null)
													{
														echo"Tout s'est bien passé, <a href='connexion.php'>vous pouvez vous connecter</a>";
													}
												else
													{
														echo "Oups, il y a eu un problème.";
													}
										}else echo "Les 2 mots de passe doivent être identique.";
									}else echo "Veuillez saisir tous les champs.";
						}
						
						?>				
						
				<form method="POST" action="">
					<input type="text" name="nom" placeholder="Ecrivez vote nom" /></br>
					<input type="text" name="prenom" placeholder="Ecrivez vote prenom" /></br>
					<input type="text" name="mail" placeholder="Ecrivez vote adresse mail" /></br>
					<input type="text" name="telephone" placeholder="Ecrivez vote numéro de telephone" /></br>
					<select name="sexe">
						<option value="choix1">Homme</option>
						<option value="choix2">Femme</option>
					</select></br>
					<input type="password" name="mdp" placeholder="Ecrivez votre mot de passe" /></br>
					<input type="password" name="vmdp" placeholder="Veuillez valider votre mot de passe" /></br>
					<input type="submit"  value="valider" name="submit" />
				</form>

				<?php include("message.php")?>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>