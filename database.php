<?php
/**
 * Created by PhpStorm.
 * User: Tiboo
 * Date: 15/04/2015
 * Time: 14:08
 */

class database {
    var $db ;

    function get_db(){
        $db = mysqli_connect ('localhost', 'root', '') or die("get_db error");
        return $db;
    }
}