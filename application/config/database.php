<?php defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

$db['default']  = array(
//    'hostname'  => getenv('DB_HOST') ?: 'localhost',
//    'username'  => getenv('DB_USER') ?: 'fokt6383_nuhapos',
//    'password'  => getenv('DB_PASS') ?: 'bismillah123',
//    'database'  => getenv('DB_NAME') ?: 'fokt6383_nuhapos',
//    'port'      => getenv('DB_PORT') ?: '3306',
//    'dbdriver'  => getenv('DB_DRIVER') ?: 'mysqli',
    'hostname'  => 'localhost',
    'username'  => 'root',
    'password'  => '',
    'database'  => 'popjasa',
    'port'      => '3306',
    'dbdriver'  => 'mysqli',
    'dbprefix'  => '',
    'pconnect'  => FALSE,
    'db_debug'  => getenv('DB_DEBUG') ?: FALSE,
    'cache_on'  => FALSE,
    'cachedir'  => '',
    'char_set'  => 'utf8',
    'dbcollat'  => 'utf8_general_ci',
    'swap_pre'  => '',
    'encrypt'   => FALSE,
    'compress'  => FALSE,
    'stricton'  => FALSE,
    'failover'  => array(),
    'save_queries' => TRUE
);
