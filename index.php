<?php
include "connexion.php";
include "inscription.php";
?>
<html>
<head>
    <title>Accueil</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" style="text/css" href="css/style.css" />
    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/script.js"></script>
</head>

<body>
<div class="inscription">
    <H1>Inscription</H1>
    <p class="buttoninscri">
        <span class="buttonspaninscri" >I</span>
        <span class="buttonspaninscri" >n</span>
        <span class="buttonspaninscri" >s</span>
        <span class="buttonspaninscri" >c</span>
        <span class="buttonspaninscri" >r</span>
        <span class="buttonspaninscri" >i</span>
        <span class="buttonspaninscri" >p</span>
        <span class="buttonspaninscri" >t</span>
        <span class="buttonspaninscri" >i</span>
        <span class="buttonspaninscri" >o</span>
        <span class="buttonspaninscri" >n</span>
        <span class="buttonspaninscri" >n</span>
        <span class="buttonspaninscri" ><</span>
    </p>
    <form action="index.php" method="post">
        <input type="text" name="login" placeholder="Nom d'utilisateur" class="username" value="<?php if (isset($_POST['login'])) echo htmlentities(trim($_POST['login'])); ?>"><br />
        <input type="password" name="pass" placeholder="Mot de passe" class="password" value=""><br />
        <input type="password" name="pass_confirm" placeholder="Confirmez Mot de passe" class="password" value=""><br />
        <input type="email" name="email" placeholder="Adresse mail" class="mail" value="<?php if (isset($_POST['email'])) echo htmlentities(trim($_POST['email'])); ?>"><br />
        <?php
        if (isset($erreur)) echo '<br />',$erreur;
        ?>
        <input type="submit" value="S'inscrire" class="inscrire"><br />
    </form>
</div>
<div class="connexion">
    <H1>Connexion</H1>
    <p class="buttonco">
        <span class="buttonspanco" >C</span>
        <span class="buttonspanco" >o</span>
        <span class="buttonspanco" >n</span>
        <span class="buttonspanco" >n</span>
        <span class="buttonspanco" >e</span>
        <span class="buttonspanco" >x</span>
        <span class="buttonspanco" >i</span>
        <span class="buttonspanco" >o</span>
        <span class="buttonspanco" >n</span>
        <span class="buttonspanco" >></span>
    </p>
    <form action="index.php" method="POST">
        <input type="text" name="login" placeholder="Nom d'utilisateur" class="username" value="<?php if (isset($_POST['login'])) echo htmlentities(trim($_POST['login'])); ?>"><br />
        <input type="password" name="pass" placeholder="Mot de passe" class="password" value="<?php if (isset($_POST['pass'])) echo htmlentities(trim($_POST['pass'])); ?>"><br />
        <a href="/home.php" style="text-decoration:none">
        <input type="submit" value="Connexion" class="connecter"><br />
            </a>
        <?php
        if (isset($erreur)) echo '<br /><br />',$erreur;
        ?>
    </form>

</div>
</body>

</html>​
