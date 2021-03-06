<?php
/*
 * This file is part of RPG Maker ES Core
 * (c) RPG Maker ES community.
 * This code is licensed under MIT license (see LICENSE for details)
*/

/**
 * Main initialization script of RPG Maker ES Core.
 */

define("RPGMAKERES", 1);
$GLOBALS["_RPGMAKERES"] = [];

include_once "CoreFunctions.php";

if (!@include_once  RPGMakerES::GetRootFolder("config.php") ) die("Config.php not found");
if (!@include_once  RPGMakerES::GetRootFolder("vendor/autoload.php") ) die("Composer autoload not found. Are you sure you ran composer update? :)");

//optional separate additional config override
@include_once  RPGMakerES::GetRootFolder("config-override.php");

//setting PHP configurations
global $_RPGMAKERES;

if (!$_RPGMAKERES["config"]["useDefaultSessionName"]) ini_set('session.name','__Host-sesion');
ini_set( 'session.cookie_httponly', 1 );
ini_set('session.cookie_samesite', 'Strict');
if (!$_RPGMAKERES["config"]["useDefaultSessionName"]) ini_set('session.cookie_secure', 1);
ini_set('session.gc_maxlifetime', $_RPGMAKERES["config"]["sessionTimeout"]);
