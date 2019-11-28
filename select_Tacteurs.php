<?php

echo "3-Connexion à la table <b>Tacteurs</b><br>";
//requete sql
$select = 'SELECT id, nom, prenom, date_naissance, nationalite FROM Tacteurs ORDER BY id';
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
echo '<td>nom</td>';
echo '<td>prenom</td>';
echo '<td>date_naissance</td>';
echo '<td>nationalite</td>';
echo '</tr>'."\n";
// lecture et affichage des résultats sur 2 colonnes, 1 résultat par ligne. 
while($row = mysqli_fetch_array($result)) {
echo '<tr>';
echo '<td>'.$row["id"].'</td>';
echo '<td>'.$row["nom"].'</td>';
echo '<td>'.$row["prenom"].'</td>';
echo '<td>'.$row["date_naissance"].'</td>';
echo '<td>'.$row["nationalite"].'</td>';
echo '</tr>'."\n";
}
echo '</table>'."\n";
// fin du tableau.
}
else echo 'Pas d\'enregistrements dans cette table...';


?>