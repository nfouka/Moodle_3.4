<?php // Moodle configuration file

unset($CFG);
global $CFG;
$CFG = new stdClass();

$CFG->dbtype    = 'mysqli';
$CFG->dblibrary = 'native';
$CFG->dbhost    = 'localhost';
$CFG->dbname    = 'm';
$CFG->dbuser    = 'root';
$CFG->dbpass    = 'root';
$CFG->prefix    = '';
$CFG->dboptions = array(
	'dbpersist'   => 0,
	'dbport'      => '',
	'dbsocket'    => '',
	'dbcollation' => 'utf8mb4_unicode_ci',
);

$CFG->wwwroot  = 'http://127.0.0.1';
$CFG->dataroot = '/var/www/moodledata';
$CFG->admin    = 'admin';

$CFG->directorypermissions = 0777;

require_once (__DIR__ .'/lib/setup.php');

// There is no php closing tag in this file,
// it is intentional because it prevents trailing whitespace problems!