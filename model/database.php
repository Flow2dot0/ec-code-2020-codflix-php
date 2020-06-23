<?php

/*************************************
* ----- INIT DATABASE CONNECTION -----
*************************************/

function init_db() {
  try {

    define("BDD_HOSTNAME", "localhost");
    define("BDD_PORT", "3306");
    define("BDD_NAME", "codflix");
    define("BDD_USER", "root");
    define("BDD_PASS", "");

    $dns = 'mysql:host='.BDD_HOSTNAME.';port='.BDD_PORT.';dbname='.BDD_NAME;
    $pdo = new PDO( $dns, BDD_USER, BDD_PASS );
    $pdo->exec('SET NAMES utf8mb4');
    $pdo->exec("SET sql_mode = 'ONLY_FULL_GROUP_BY'");

  } catch(Exception $e) {

    die( 'Erreur : '.$e->getMessage() );

  }

  return $pdo;
}
