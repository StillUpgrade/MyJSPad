<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 25/02/2015
 * Time: 16:32
 */

session_start();
session_unset();
session_destroy();
header('Location: index.php');
exit();
?>