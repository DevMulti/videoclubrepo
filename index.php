<?php
// phpinfo();



   print "
   <!DOCTYPE html>
   <html lang=\"fr\">
   <head>
        <meta charset=\"utf-8\">
        <title> Vidéo Club </title>
    </head>";
    
    print "
    <body>
    <h1>Page d'accueil projet Vidéo Club</h1>
    <br>";
    
    // Affichage de la date et de l'heure afin de vérifier le rafraichissement de la page dans le navigateur
    $date = date("d-m-Y");
    $heure = date("H:i:s");
    print("Nous sommes le $date et il est $heure");

    print "<br><hr><br>";

    print "<a href=page_films.php?titre=1 target='_blank'>id 1</a><br>";
    print "<a href=page_films.php?titre=2 target='_blank'>id 2</a><br>";
    print "<a href=page_films.php?titre=3 target='_blank'>id 3</a><br>";
    print "<a href=page_films.php?titre=4 target='_blank'>id 4</a><br>";
    print "<a href=page_films.php?titre=5 target='_blank'>id 5</a><br>";
    print "<a href=page_films.php?titre=6 target='_blank'>id 6</a><br>";
    print "<a href=page_films.php?titre=7 target='_blank'>id 7</a><br>";
    print "<a href=page_films.php?titre=8 target='_blank'>id 8</a><br>";
    print "<a href=page_films.php?titre=9 target='_blank'>id 9</a><br>";
    print "<a href=page_films.php?titre=10 target='_blank'>id 10</a><br>";
    print "<a href=page_films.php?titre=11 target='_blank'>id 11</a><br>";
    print "<a href=page_films.php?titre=12 target='_blank'>id 12</a><br>";
    print "<a href=page_films.php?titre=13 target='_blank'>id 13</a><br>";
    print "<a href=page_films.php?titre=14 target='_blank'>id 14</a><br>";
    print "<a href=page_films.php?titre=15 target='_blank'>id 15</a><br>";
    print "<a href=page_films.php?titre=16 target='_blank'>id 16</a><br>";
    print "<a href=page_films.php?titre=17 target='_blank'>id 17</a><br>";
    print "<a href=page_films.php?titre=18 target='_blank'>id 18</a><br>";
    print "<a href=page_films.php?titre=19 target='_blank'>id 19</a><br>";
    print "<a href=page_films.php?titre=20 target='_blank'>id 20</a><br>";
    print "<a href=page_films.php?titre=21 target='_blank'>id 21</a><br>";
    print "<a href=page_films.php?titre=22 target='_blank'>id 22</a><br>";
    print "<a href=page_films.php?titre=23 target='_blank'>id 23</a><br>";
    print "<a href=page_films.php?titre=24 target='_blank'>id 24</a><br>";
    print "<a href=page_films.php?titre=25 target='_blank'>id 25</a><br>";
    print "<a href=page_films.php?titre=26 target='_blank'>id 26</a><br>";
    print "<a href=page_films.php?titre=27 target='_blank'>id 27</a><br>";
    print "<a href=page_films.php?titre=28 target='_blank'>id 28</a><br>";
    print "<a href=page_films.php?titre=29 target='_blank'>id 29</a><br>";
    print "<a href=page_films.php?titre=30 target='_blank'>id 30</a><br>";



    print "<br><hr><br>";

    // Choix de la connexion mysql en fonction de la plateforme
    print "Détection de la plateforme : <b>".$_SERVER['SERVER_NAME']."</b><br>";

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

    print "<br><hr><br>";

    // Affiche la table Test
    include "select_test.php";
    
    print "<br><hr><br>";

    // Affiche à l'écran la table Trealisateurs
    include 'select_Trealisateurs.php';

    print "<br><hr><br>";

    // Affiche à l'écran la table Tcategories
    include 'select_Tcategories.php';

    print "<br><hr><br>";
    
    // Affiche à l'écran la table Tacteurs
    include 'select_Tacteurs.php';

    print "<br><hr><br>";

    // Affiche à l'écran la table Tfilms
    include 'select_Tfilms.php';

    print "<br><hr><br>";

    print "
    </body>
    </html>";

    

    // Close connexion
    mysqli_close($conn); 

?>

