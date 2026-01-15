<?php

// Kasutame kohalik arvuti
$serverinimi = 'localhost';
$kasutajanimi = 'IlliaBlahun';
$parool = '12345';
$andmebaasinimi = 'illiablahun';
$connect = new mysqli($serverinimi, $kasutajanimi, $parool, $andmebaasinimi);
$connect->set_charset(  "utf8");


//zone.ee kasutaja
//$serverinimi = 'd141128.mysql.zonevs.eu';
//$kasutajanimi = 'd141128_illia';
//$parool = '12345';
//$andmebaasinimi = 'd141128_baasphp';
//$connect = new mysqli($serverinimi, $kasutajanimi, $parool, $andmebaasinimi);
//$connect->set_charset(  "utf8");