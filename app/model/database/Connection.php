<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 20/04/19
 * Time: 23:38
 */

abstract class Connection {
    public function getConnection()
    {
        $configs = include(__DIR__.'/../../../config.php');
        $con =  mysqli_connect($configs['domain'], $configs['bd_user'], $configs['bd_password'], $configs['bd_database']);
        $con->set_charset("utf8");
        return $con;
    }
}
