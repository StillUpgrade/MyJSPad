<?php
/**
 * Created by PhpStorm.
 * User: Tiboo
 * Date: 19/03/2015
 * Time: 15:17
 */
include "database.php";


session_start();
if (isset($_SESSION['login']) && $_SESSION['login'] != '') {

    echo ("bonjour ".$_SESSION['login']);
    $database = new database;
    $base = $database->get_db();
        mysqli_select_db($base, 'myjspad_membre');

        // on teste si une entrée de la base contient ce couple  / pass
        $sql = 'SELECT count(*) FROM identifiant_membre WHERE membre_pseudo="' . mysqli_escape_string($base, $_SESSION['login']) . '"';
        $req = mysqli_query($base, $sql) or die('Erreur SQL !<br />' . $sql . '<br />' . mysqli_error($base));
        $data = mysqli_fetch_array($req);

        mysqli_free_result($req);
        mysqli_close($base);

        // si on obtient une réponse, alors l'utilisateur est un membre
        if ($data[0] == 1) {

            $req = 'SELECT is_verified FROM identifiant_membre WHERE membre_pseudo="'. mysqli_escape_string($base, $_SESSION['login']) .'"';
            $_SESSION['login'] = $_POST['login'];
            exit();
        } // si on ne trouve aucune réponse, le visiteur s'est trompé soit dans son login , soit dans son mot de passe
        elseif ($data[0] == 0) {
            $erreur = 'Compte non reconnu.';
        } // sinon, il y a un gros problème :) Problème dans la base de données : plusieurs membres ont les mêmes identifiants de connexion.
        else {
            $erreur = 'Erreur inattendue';
        }
}


