<?php 
include 'fonctions.php';
extract($_POST);//
$message="";
if(isset($nom) && isset($prix)){

ajouter_produit($nom,$prix);
$message="Ajout affectué avec succès";
header("location:produits.php?message=$message");
}
$resultat=get_all_produit();
extract($_GET);
 ?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>gestion des produits</title>
</head>
<body>
<!--form>table>tr*2>((td>label)+(td>input))+tr>(td+td>input[type="submit"])-->
<div class="alert">
	<?php echo $message; ?>

</div>
<form action="produits.php" method="post">
	<table align="center" class="table">
		<tr>
			<td><label for="nom">Nom :</label></td>
			<td><input type="text" name="nom" id="nom" required="required" ></td>
		</tr>
		<tr>
			<td><label for="">prix: </label></td>
			<td><input type="text" name="prix"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Valider"></td>
		</tr>
	</table>
</form>
	<hr>

	<table align="center" width="80%" border="1">
		<tr>
			<th>id</th>
			<td>nom</td>
			<td>prix</td>
			<td>Opérations</td>
		</tr>

<?php while($ligne=mysqli_fetch_assoc($resultat)){ ?>
		<tr>
			<th><?php echo $ligne['id']; ?></th>
			<td><?php echo $ligne['nom']; ?></td>
			<td><?php echo $ligne['prix']; ?></td>
			<td><a href="#">Supprimer</a> <a href="#">Modifier</a></td>
		</tr>
<?php } ?>
	</table>
</body>
</html>