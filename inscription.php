<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 25/02/2015
 * Time: 16:44
 */
// on teste si le visiteur a soumis le formulaire
if (isset($_POST['inscription'])) {
    // on teste l'existence de nos variables. On teste également si elles ne sont pas vides
    if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['pass']) && !empty($_POST['pass'])) && (isset($_POST['pass_confirm']) && !empty($_POST['pass_confirm']))  && (isset($_POST['email']) && !empty($_POST['email']))) {
        // on teste les deux mots de passe
        if ($_POST['pass'] != $_POST['pass_confirm']) {
            $erreur = 'Les 2 mots de passe sont différents.';
        }
        else {
            $database = new database;
            $base = $database->get_db();
            mysqli_select_db ($base,'myjspad_membre');
            // on recherche si ce login est déjà utilisé par un autre membre
            $sql = 'SELECT count(*) FROM identifiant_membre WHERE membre_pseudo="'.mysqli_escape_string($base,$_POST['login']).'" or membre_email="'.mysqli_escape_string($base,$_POST['email']).'" ';
            $req = mysqli_query($base,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($base));
            $data = mysqli_fetch_array($req);
            if ($data[0] == 0) {
                $sql = 'INSERT INTO identifiant_membre(membre_pseudo,membre_mdp,membre_email) VALUES("'.mysqli_escape_string($base,$_POST['login']).'", "'.mysqli_escape_string($base,md5($_POST['pass'])).'", "'.mysqli_escape_string($base,$_POST['email']).'")';
                mysqli_query($base,$sql) or die('Erreur SQL !'.$sql.'<br />'.mysqli_error($base));
                session_start();

                header('Location: home.php');
                exit();
            }
            else {
                $erreur = 'Un membre possède déjà ce login ou cette adresse mail.';
            }
        }
    }
    else {
        $erreur = 'Au moins un des champs est vide.';
    }
}
?>