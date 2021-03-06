<?php
session_start();

require_once 'Globals.php';
require_once COMPOSER_AUTOLOADIR;
require_once 'Models/Users.php';
require_once 'Models/Problems.php';
require_once 'Environment Interfaces/Session.php';

$Templater = new \Twig\Environment(new \Twig\Loader\Filesystemloader(array('Templates')), GetTwigOptions());

$Details = Session::GetLoggedInDetails();
$Problems = Problems::GetByWildcard($_GET['matches'] ?? '');

$Templater->display('Search Result.html', array('Problems' => $Problems, 'LoginDetails' => $Details));