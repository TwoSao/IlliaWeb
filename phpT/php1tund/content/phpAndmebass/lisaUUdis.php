<?php
require ("config.php");
global $connect;
if (
    isset($_REQUEST['nimi']) && $_REQUEST['nimi'] !== "" &&
    isset($_REQUEST["date"]) && $_REQUEST["date"] !== "" &&
    isset($_REQUEST["sisu"]) && $_REQUEST["sisu"] !== "" &&
    isset($_REQUEST["tuju"]) && $_REQUEST["tuju"] !== ""
) {

    $paring = $connect->prepare("INSERT INTO uudiused (pealkiri, kirjendus, kuupaev, tuju) VALUES (?, ?, ?, ?)");
    $paring->bind_param("ssss", $_REQUEST['nimi'], $_REQUEST['sisu'], $_REQUEST['date'], $_REQUEST['tuju']);
    $paring->execute();

    header('Location: uudisedTabelist.php');

}
?>
<!DOCTYPE html>
<html lang="et">
<head>
    <title>Lisa uudis andmebaasi</title>
    <link rel="stylesheet" href="styleAB.css">
</head>
<body>
    <nav>
        <a href="lisaUUdis.php">Lisa uudis</a> | 
        <a href="uudisedTabelist.php">Uudiste tabel</a> | 
        <a href="uudisedTabelistLink.php">Uudiste lingid</a>
    </nav>
    <h1>Lisa uudis</h1>
    <form action="">
        <label for="nimi">Lisa pealkiri</label>
        <input type="text" name="nimi" id="nimi">
        <br>
        <label for="date">Lisa kuupäev</label>
        <input type="date" name="date" id="date">
        <br>
        <label for="sisu">Lisa kirjendus</label>
        <input type="text" name="sisu" id="sisu">
        <br>
        <label for="tuju">Lisa Tuju</label>
        <input type="color" name="tuju" id="tuju">
        <br>
        <input type="submit" value="Lisa">
    </form>
</body>
</html>
