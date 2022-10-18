<?php

require 'classes/Autoloader.php';
// require 'includes/php/srdc-function.php';
Autoloader::register();

$annescolaire = "202-2023";

$user = new Utilisateur();
$eleve = new Eleve();
$paie = new Paiement();
$clas = new Classe();
$opt = new Option();
$tut = new Tuteur();
$insc = new Inscription();
$serv = new Serveur();
$ecole_local =  new Ecole();