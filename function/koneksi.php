<?php
/**
 * using mysqli_connect for database connection
 */

$databaseHost = 'localhost:8081';
$databaseName = 'ninjakudeta';
$databaseUsername = 'root';
$databasePassword = '';

$connect = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
