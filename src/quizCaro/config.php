<?php
// start session and initialize achieved number of points
session_start();

//preset paths to standard include folders (concat them with PATH_SEPARATOR)
//
$incPaths = $_SERVER['DOCUMENT_ROOT'] . '/php'; //site root includes
$incPaths .= PATH_SEPARATOR;
//file folder path
$incPaths .= $_SERVER['DOCUMENT_ROOT'] . '/quizCaro/php';
set_include_path($incPaths);

// includes required for all the page templates
//include 'auth.php';
include 'db-access.php';
