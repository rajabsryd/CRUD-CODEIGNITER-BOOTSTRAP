<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();

$autoload['libraries'] = array('database'); // Tambahkan 'database'
$autoload['drivers'] = array();

$autoload['helper'] = array('url'); // Tambahkan 'url'

$autoload['config'] = array();
$autoload['language'] = array();

$autoload['model'] = array('Siswa_model'); // (Opsional) Autoload model siswa
?>