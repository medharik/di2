<?php 
function connecter_db()
{
	$adresse=mysqli_connect("localhost", "root", "", "dbcesa2017tp") or die("erreur de connexion à la bd") ;
return $adresse;
}
//ajout de produit dans la base de données : 
function ajouter_produit($nom,$prix)
{//connection à la bd
	$adresse=connecter_db();
	//formuler la requete  sql (crud : create , read, update et delete)
	$sql=sprintf("insert into produit(nom,prix) values('%s','%f')",e($nom),$prix);
	//executé la requete sql
	mysqli_query($adresse, $sql) 
	or die("Erreur d'ajout ".mysqli_error($adresse));
	
}
// suppression de pruduit de la bd
function supprimer_produit($id)
{	$adresse=connecter_db();
	$sql=sprintf("delete from produit where id=%d)",$id);
	
	mysqli_query($adresse, $sql) or die("Erreur de suppression ".mysqli_error($adresse));
	;
	
}

// modification  de pruduit de la bd
function modifier_produit($id,$new_nom,$new_prix)
{	$adresse=connecter_db();
	$sql=sprintf("update produit set 
nom='%s',
prix='%f'
where id=%d
		",e($new_nom),$new_prix,$id);
	
	mysqli_query($adresse, $sql) or die("Erreur de modification de produit ".mysqli_error($adresse));
	;
	
}

//selection des données depuis la bd
function get_all_produit()
{	$adresse=connecter_db();
	$sql=sprintf("select * from produit order by id asc");
	
	$resultat=mysqli_query($adresse, $sql) or die("Erreur de selection ".mysqli_error($adresse));
	;
	return $resultat;
}
//fonction generique de lecture depuis une bd
function get_all($table)
{
	$adresse=connecter_db();
	$sql=sprintf("select * from $table order by id desc");
	
	$resultat=mysqli_query($adresse, $sql);
	return $resultat;
}
// suppression générique d'une table de la bd
function supprimer($id,$table)
{	$adresse=connecter_db();
	$sql=sprintf("delete from $table where id=%d)",$id);
	
	mysqli_query($adresse, $sql);
	
}

function e($mot) 
{
	$adresse=connecter_db();
return mysqli_real_escape_string($adresse, $mot);
}
 ?>