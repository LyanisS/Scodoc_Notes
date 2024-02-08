<?php

/************************************/
/* base_path
    Défini une variable globale $base_path contenant le chemin de base de la passerelle

    Entrée :
        $current_file_path (string) : chemin du fichier courant à partir du dossier html (sans commencer par /)
*/
/************************************/
function base_path($current_file_path = "") {
    global $base_path;

    $current_url_path = preg_replace('/index.php$/', '', parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
    $current_file_path = preg_replace('/index.php$/', '', $current_file_path);

    $base_path = preg_replace('/(\/\/*)$/', '/', str_replace($current_file_path, "", $current_url_path));
}
