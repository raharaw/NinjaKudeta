<?php
/**
 * using mysqli_connect for database connection
 */

$databaseHost = 'localhost';
$databaseName = 'ninjakudeta_web';
$databaseUsername = 'ninjakudeta_web';
$databasePassword = 'Peler999!!!';

$connect = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
