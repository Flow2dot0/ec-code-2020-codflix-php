<?php

/*************************************
 * ----- ABS PATH TO CHANGE -----
 *************************************/
$ABS_PATH = '/Volumes/DATA/dev/ec-code-2020-codflix-php-master/';
$ABS_URL = 'http://localhost:8888/ec-code-2020-codflix-php-master/';

/*************************************
 * ----- AUTOLOADER -----
 *************************************/
class ClassAutoloader {
    public function __construct() {
        spl_autoload_register(array($this, 'loader'));
    }
    private function loader($className) {
        require_once dirname(__FILE__).'/../model/bo/'.$className . '.class.php';
    }
}
$autoloader = new ClassAutoloader();


/*************************************
 * ----- DB CONNECTION -----
 *************************************/

function connexion() {
    try {

        define("BDD_HOSTNAME", "localhost");
        define("BDD_PORT", "3306");
        define("BDD_NAME", "codflix");
        define("BDD_USER", "root");
        define("BDD_PASS", "root");

        $dns = 'mysql:host='.BDD_HOSTNAME.';port='.BDD_PORT.';dbname='.BDD_NAME;
        $pdo = new PDO( $dns, BDD_USER, BDD_PASS );
        $pdo->exec('SET NAMES utf8mb4');
        $pdo->exec("SET sql_mode = 'ONLY_FULL_GROUP_BY'");

    } catch(Exception $e) {

        error_log ("MySQL connect error : ". $e->getMessage());
        die();

    }

    return $pdo;
}

$pdo = connexion();



