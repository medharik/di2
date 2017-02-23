<?php 
include 'fonctions.php';
$message="";
extract($_POST);
if (isset($nom)&& isset($prix)) {
ajouter_produit($nom,$prix);
$message="Ajout effectué avec succès";
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

	<div class="container">
<form action="produits.php" method="post">
	<table align="center" >
		<tr>
			<td>Nom: </td>
			<td><input type="tetx" name="nom"></td>
		</tr>
		<tr>
			<td>Prix:</td>
			<td><input type="text" name="prix"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="ok" value="valider"  class="btn btn-primary"></td>
		</tr>
	</table>
</form>

<hr>
<div class="alert alert-success">
	<?php echo $message; ?>

</div>
<table border="1" align="center" width="80%" class="table table-striped">
	<tr>
		<td>id</td>
		<td>nom</td>
		<td>prix</td>
		<td>Opérations</td>
	</tr>
	
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td><a href="#" class="btn btn-danger">Supprimer</a> <a href="#" class="btn btn-warning">Modifier</a> <a href="#" class="btn btn-primary">consulter</a></td>
	</tr>

</table>
</div>
</body>
</html>