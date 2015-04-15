<?php
/**
 * Created by PhpStorm.
 * User: Tiboo
 * Date: 19/03/2015
 * Time: 15:17
 */

if (isset($_SESSION['login']) && $_SESSION['login'] != '') {


        $base = mysqli_connect('localhost', 'root', 'root');
        mysqli_select_db($base, 'myjspad_membre');

        // on teste si une entrée de la base contient ce couple  / pass
        $sql = 'SELECT count(*) FROM membre_pseudo WHERE membre_pseudo="' . mysqli_escape_string($base, $_POST['login']) . '"';
        $req = mysqli_query($base, $sql) or die('Erreur SQL !<br />' . $sql . '<br />' . mysqli_error($base));
        $data = mysqli_fetch_array($req);

        mysqli_free_result($req);
        mysqli_close($base);

        // si on obtient une réponse, alors l'utilisateur est un membre
        if ($data[0] == 1) {

            $req = 'SELECT isverified FROM membre_seudo WHERE membre_pseudo="'. mysqli_escape_string($base, $_POST['login']) .'"';
            session_start();
            $_SESSION['login'] = $_POST['login'];
            header('Location: /home.php');
            exit();
        } // si on ne trouve aucune réponse, le visiteur s'est trompé soit dans son login , soit dans son mot de passe
        elseif ($data[0] == 0) {
            $erreur = 'Compte non reconnu.';
        } // sinon, il y a un gros problème :) Problème dans la base de données : plusieurs membres ont les mêmes identifiants de connexion.
        else {
            $erreur = 'Erreur inattendue';
        }
}


