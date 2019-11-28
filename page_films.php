<?php

/*Création de l'ihm page film
 Date : 2019/11/17
 Version : 1.0
 Auteur : Jean-Baptiste Morozoff*/

print "
<!DOCTYPE html>
<html lang=\"fr\">
<head>
     <meta charset=\"utf-8\">
     <link rel=\"stylesheet\" type=\"text/css\" href=\"page_films.css\" media=\"all\"/>
     <link href=\"https://fonts.googleapis.com/css?family=Bebas+Neue&display=swap\" rel=\"stylesheet\">
     <title> Vidéo Club </title>
 </head>";
 
 print "<body id=\"body\">";
 // <h1>Fiche film</h1> 
 
 print "<br>";

 // Affichage de la date et de l'heure afin de vérifier le rafraichissement de la page dans le navigateur
 /*$date = date("d-m-Y");
 $heure = date("H:i:s");
 print("Nous sommes le $date et il est $heure");*/

 // print "<br><hr><br>";

 // Choix de la connexion mysql en fonction de la plateforme
 // print "Détection de la plateforme : <b>".$_SERVER['SERVER_NAME']."</b><br>";

 switch ($_SERVER['SERVER_NAME']) {
     // Plateforme de dev école
     case "www.cefii-developpements.fr" : 
         include 'mysqlecole.php';
         break;  
     // Plateforme de dev local MAMP
     case "localhost" : 
         include 'mysqllocal.php';
         break; 
     case "192.168.0.13" : 
         include 'mysqllocal.php';
         break; 
 }

// print "<br><hr><br>";

// Récupération de l'id du film dans l'url 
if (isset($_GET['titre']))
{
	$id_titre=$_GET['titre'];
}
else // Il manque l'id du film
{
	echo 'Il faut renseigner un paramètre titre dans l\'url';
}



// echo "3-Requête fiche film (5jointures)</b><br>";
//requete sql
$select = 'SELECT
f.titre, f.annee, f.budget, f.duree, f.affiche, f.url_youtube, f.synopsis,
r.nom as rn, r.prenom as rp, r.date_naissance as rdn, r.nationalite as rnat,
a1.nom as a1n, a1.prenom as a1p, a1.date_naissance as a1dn, a1.nationalite as a1na,
a2.nom as a2n, a2.prenom as a2p, a2.date_naissance as a2dn, a2.nationalite as a2na,
a3.nom as a3n, a3.prenom as a3p, a3.date_naissance as a3dn, a3.nationalite as a3na,
c.nom as cat
FROM Tfilms AS f
LEFT JOIN Trealisateurs AS r ON f.id_realisateur = r.id
LEFT JOIN Tacteurs AS a1 ON f.id_acteur1 = a1.id
LEFT JOIN Tacteurs AS a2 ON f.id_acteur2 = a2.id
LEFT JOIN Tacteurs AS a3 ON f.id_acteur3 = a3.id
LEFT JOIN Tcategories AS c ON f.id_categorie = c.id
WHERE f.id ='.$id_titre;


$result = mysqli_query($conn,$select) or die ('Erreur : '.mysqli_error() );
$total = mysqli_num_rows($result);


// echo "4-Nombre de lignes :".$total."<br><br>";


if($total) {
    // Chargement du résultat de la requête dans le tableau $row
    $row = mysqli_fetch_array($result);

    //on dessine un tableau pour mettre en page les différents DIV
    print "<center>";
    print "<table width=80% bgcolor='#4A98AF'>";

    //ligne1
        echo '<tr>';
            echo '<td>';
                print "<div id='affiche'>";
                print "<center>";
                echo '<img src=affiches/'.$row["affiche"].' width=200 height=auto border=0>';
                print "</center>";
                print "</div>";
            echo '</td>';
            
            echo '<td>';
                print "<div id='caract'>";
                echo "<div id='titre'>Titre :</div> ".$row["titre"].'<br>';
                echo "<div id='annee'>Année :</div> ".$row["annee"].'<br>';
                echo "<div id='budget'>Budget :</div> ".$row["budget"].'€'.'<br>';
                echo "<div id='duree'>Durée :</div> ".$row["duree"].'mn'.'<br>';
                echo "<div id='categorie'>Catégorie :</div> ".$row["cat"].'<br>';

                $realisateur=$row["rn"].' '.$row["rp"].' ('.$row["rdn"].' '.'de nationalité '.$row["rnat"].')';
                echo "<div id='real'>Réalisateur (Nom Prénom): </div>".$realisateur.'<br>';
                $acteur1=$row["a1n"].' '.$row["a1p"].' ('.$row["a1dn"].' '.'de nationalité '.$row["a1na"].')';
                echo "<div id='acteur'>Acteur 1 (Nom Prénom): </div>".$acteur1.'<br>';
                $acteur2=$row["a2n"].' '.$row["a2p"].' ('.$row["a2dn"].' '.'de nationalité '.$row["a2na"].')';
                echo "<div id='acteur2'>Acteur 2 (Nom Prénom): </div>".$acteur2.'<br>';
                $acteur3=$row["a3n"].' '.$row["a3p"].' ('.$row["a3dn"].' '.'de nationalité '.$row["a3na"].')';
                echo "<div id='acteur3'>Acteur 3 (Nom Prénom): </div>".$acteur3.'<br>';
                print "</div>";
            echo '</td>';
        echo '</tr>';
        echo '<br>';
        echo '<br>';
        echo '<br>';
        echo '<br>';
    //ligne2
        echo '<tr>';
            echo '<td colspan=2>';
                print "<div id='synopsis'>";
                echo "<div id='titresyno'>Synopsis : </div>";
                echo "<p>".$row['synopsis']."</p><br>";
                print "</div>";
            echo '</td>';
        echo '</tr>';  
        echo '<br>';
        echo '<br>';  
    //ligne3        
        echo '<tr>';
            echo '<td colspan=2>';
                print "<center>";
                print "<div id='youtube'>";
                echo $row["url_youtube"];
                print "</center>";
                print "</div>";
            echo '</td>';
        echo '</tr>';

    print "</table>";
    print "</center>";

}
else echo 'Film inconnu...';





// print '<br><br><br><br>';

// Close connexion
// echo "5-Fermeture de la connexion à mysql...(non testée)<br><br>";
mysqli_close($conn); 

 print "
 </body>
 </html>";












?>

