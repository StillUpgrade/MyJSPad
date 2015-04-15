<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 25/02/2015
 * Time: 16:39
 */
// on teste si le visiteur a soumis le formulaire de connexion
if (isset($_POST['connexion'])) {
    if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['pass']) && !empty($_POST['pass']))) {

        $database = new database;
        $base = $database->get_db();

        mysqli_select_db ($base,'myjspad_membre');

        // on teste si une entrée de la base contient ce couple  / pass
        $sql = 'SELECT count(*) FROM identifiant_membre WHERE (membre_pseudo="'.mysqli_escape_string($base,$_POST['login']).'" or membre_email ="'.mysqli_escape_string($base,$_POST['login']).'" ) AND membre_mdp="'.mysqli_escape_string($base,md5($_POST['pass'])).'"';
        $req = mysqli_query($base,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($base));
        $data = mysqli_fetch_array($req);

        mysqli_free_result($req);
        mysqli_close($base);

        // si on obtient une réponse, alors l'utilisateur est un membre
        if ($data[0] == 1) {
            session_start();
            $_SESSION['login'] = $_POST['login'];
            header('Location: home.php');
            exit();
        }
        // si on ne trouve aucune réponse, le visiteur s'est trompé soit dans son login/Mail , soit dans son mot de passe
        elseif ($data[0] == 0) {
            $erreur = 'Compte non reconnu.';
        }
        // sinon, il y a un gros problème :) Problème dans la base de données : plusieurs membres ont les mêmes identifiants de connexion.
        else {
            $erreur = 'Erreur inattendue';
        }
    }
    else {
        $erreur = 'Au moins un des champs est vide.';
    }
}
?>
