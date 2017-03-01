<?php 
include 'fonctions.php';
extract($_POST);
extract($_GET);
$message="";
if (isset($nom) && isset($prix)) {
	ajouter_produit($nom,$prix);
	$message="ajout du produit <u>$nom</u> effectué avec succès";	
}

if (isset($ids)) {
	supprimer($ids,"produit");
	$message="produit supprimé avec succès";
}
if (isset($idc)) {
$resultat1=get_by_id($idc,"produit");
$produit_a_consulter=mysqli_fetch_assoc($resultat1);
}

$produits=get_all("produit");

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>crud produits</title>
</head>
<body>

	form>table>tr*3>td*2

	<div><?= $message ?></div>
	<form action="<?php echo basename(__FILE__); ?>" method="post">
		<table align="center">
			<tr>
				<td>Nom :</td>
				<td><input type="text" name="nom"></td>
			</tr>
			<tr>
				<td>Prix:</td>
				<td><input type="text" name="prix" required></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Ajouter"></td>
			</tr>
		</table>
	</form>
	<hr>

	<ul>détails du produit :

	<li>Nom : <?php echo $produit_a_consulter['nom']; ?> </li>
	<li>Prix :  <?php echo $produit_a_consulter['prix']; ?> Dhs </li>
	<li>Id est : <?php echo $produit_a_consulter['id']; ?> </li>
</ul>
<hr>
<!--
table>((tr>th*4)+(tr>td*4))
<br>
ou table>tr*2>td*4 -->
<hr>
<table align="center" border="1" width="80%">
	<tr>
		<th>id</th>
		<th>nom</th>
		<th>prix</th>
		<th>opérations</th>
	</tr>

	<?php while($produit=mysqli_fetch_assoc($produits)){ ?>
<tr>
		<td><?=$produit['id']; ?></td>
		<td><?=$produit['nom']; ?></td>
		<td><?=$produit['prix']; ?></td>
		<td>
<a href="<?php echo basename(__FILE__); ?>
?ids=<?=$produit['id'];?>" 
 onclick="return confirm('voulez vous vrm supprimé cet élement?');"
 >Supprimer</a>
		 <a href="<?php echo basename(__FILE__); ?>?idc=<?=$produit['id'];?>">consulter</a> 
		<a href="<?php echo basename(__FILE__); ?>?idm=<?=$produit['id'];?>">Modifier</a></td>
	</tr>
		<?php } ?>
</table>

</body>
</html>