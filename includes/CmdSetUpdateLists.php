<?php
global $argv;

if (isset($argv)) {
    $path = dirname(dirname(realpath($argv[0])));           // Exécution par CLI
}
else {
    $path = realpath(dirname(__FILE__) . '/..');    // Exécution par serveur web
}

include_once "$path/includes/default_config.php";
include_once "$path/includes/".$Config->scheduler_class;	// Class Scheduler

Scheduler::setUpdateLists();