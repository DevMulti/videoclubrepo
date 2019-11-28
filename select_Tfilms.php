<?php

echo "3-Connexion à la table <b>Tfilms</b><br>";
//requete sql
$select = 'SELECT id, titre, annee, budget, duree, affiche, url_youtube, synopsis, id_realisateur, id_acteur1, id_acteur2, id_acteur3, id_categorie FROM Tfilms ORDER BY id';
$result = mysqli_query($conn,$select) or die ('Erreur : '.mysqli_error() );
$total = mysqli_num_rows($result);


echo "4-Nombre de lignes :".$total."<br><br>";


// si on a récupéré un résultat on l'affiche.
if($total) {
// debut du tableau
echo '<table>'."\n";
// première ligne on affiche les titres prénom et surnom dans 2 colonnes
echo '<tr>';
echo '<td>id</td>';
echo '<td>titre</td>';
echo '<td>annee</td>';
echo '<td>budget</td>';
echo '<td>duree</td>';
echo '<td>affiche</td>';
echo '<td>url_youtube</td>';
echo '<td>synopsis</td>';
echo '<td>id_realisateur</td>';
echo '<td>id_acteur1</td>';
echo '<td>id_acteur2</td>';
echo '<td>id_acteur3</td>';
echo '<td>id_categorie</td>';
echo '</tr>'."\n";
// lecture et affichage des résultats sur 2 colonnes, 1 résultat par ligne. 
while($row = mysqli_fetch_array($result)) {
echo '<tr>';
echo '<td>'.$row["id"].'</td>';
echo '<td>'.$row["titre"].'</td>';
echo '<td>'.$row["annee"].'</td>';
echo '<td>'.$row["budget"].'</td>';
echo '<td>'.$row["duree"].'</td>';
echo '<td><img src=affiches/'.$row["affiche"].' width=100 height=auto border=0></td>';
echo '<td>'.$row["url_youtube"].'</td>';
echo '<td>'.$row["synopsis"].'</td>';
echo '<td>'.$row["id_realisateur"].'</td>';
echo '<td>'.$row["id_acteur1"].'</td>';
echo '<td>'.$row["id_acteur2"].'</td>';
echo '<td>'.$row["id_acteur3"].'</td>';
echo '<td>'.$row["id_categorie"].'</td>';
echo '</tr>'."\n";
}
echo '</table>'."\n";
// fin du tableau.
}
else echo 'Pas d\'enregistrements dans cette table...';


?>