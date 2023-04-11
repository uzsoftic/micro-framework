<?php
session_start();

require_once('inc/helper.php');
require_once('inc/database.php');
require_once('inc/logger.php');

try {
    $config = config('database');
    $GLOBALS['db'] = new database(
        $config['DB_HOST'],
        $config['DB_USER'],
        $config['DB_PASS'],
        $config['DB_NAME']
    );
}catch (Exception $e){
    throw new Exception('Error database connection. Please connect Database');
}
//dd($GLOBALS['db']);