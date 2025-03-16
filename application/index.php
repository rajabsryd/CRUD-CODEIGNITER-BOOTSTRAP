<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$system_path = 'system';
$application_folder = 'application';

if (realpath($system_path) !== FALSE) {
    $system_path = realpath($system_path).'/';
}

$system_path = rtrim($system_path, '/').'/';
$application_folder = rtrim($application_folder, '/').'/';

define('BASEPATH', 'system/'); // Define the BASEPATH constant
require_once BASEPATH.'core/CodeIgniter.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
