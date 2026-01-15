<?php
// Используем локальный компьютер
$serverinimi = 'localhost';
$kasutajanimi = 'IlliaBlahun';
$parool = '12345';
$andmebaasinimi = 'illiablahun';
$yhendus = new mysqli($serverinimi, $kasutajanimi, $parool, $andmebaasinimi);
$yhendus->set_charset("utf8");

// Проверка соединения
if ($yhendus->connect_error) {
    die("Connection failed: " . $yhendus->connect_error);
}
?>