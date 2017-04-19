<?php
namespace Api\Lib;


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of db
 *
 * @author linux
 */
class Db {
    public static function start(){
        $pdo=new PDO('mysql:host=localhost;dbname=storypub', 'root', 'linuxlinux')
    }
}
