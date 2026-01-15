<?php
require ("config.php");
global $connect;
if (isset($_REQUEST["uusuudis"])){
    if (
            isset($_REQUEST['nimi']) && $_REQUEST['nimi'] !== "" &&
            isset($_REQUEST["date"]) && $_REQUEST["date"] !== "" &&
            isset($_REQUEST["sisu"]) && $_REQUEST["sisu"] !== "" &&
            isset($_REQUEST["tuju"]) && $_REQUEST["tuju"] !== ""
    ) {
        $paring = $connect->prepare("INSERT INTO uudiused (pealkiri, kirjendus, kuupaev, tuju) VALUES (?, ?, ?, ?)");
        $paring->bind_param("ssss", $_REQUEST['nimi'], $_REQUEST['sisu'], $_REQUEST['date'], $_REQUEST['tuju']);
        $paring->execute();
    }
}
?>
<html lang="et">
<head>
    <title>UUdiesed SQL andmebaasist</title>
    <link rel="stylesheet" href="styleAB.css">
</head>
<body>
    <nav>
        <a href="lisaUUdis.php">Lisa uudis</a> | 
        <a href="uudisedTabelist.php">Uudiste tabel</a> | 
        <a href="uudisedTabelistLink.php">Uudiste lingid</a>
    </nav>
    <h1>Uudiste tabeli sisu</h1>
    
    <div id="menu">
    <ul>
    <?php
    global $connect;
    $paring = $connect->prepare("SELECT uudisId, pealkiri FROM uudiused");
    $paring->bind_result($uudisId,$pealkiri);
    $paring->execute();

    while ($paring->fetch()) {
        echo "<li><a href='?id=$uudisId'>$pealkiri</a></li>";
    }
    ?>
    </ul>
</div>
<div id="sisu">
    <?php
    global $connect;
    if (isset($_GET['id'])) {
        $paring = $connect->prepare("SELECT uudisId, pealkiri, kuupaev, kirjendus, tuju FROM uudiused WHERE uudisId=?");
        $paring->bind_param("i", $_GET['id']);
        $paring->bind_result($uudisId, $pealkiri, $kuupaev, $kirjendus, $tuju);
        $paring->execute();
        if ($paring->fetch()) {
            echo "<h2>".htmlspecialchars($pealkiri)."</h2>";
            echo "<p>".htmlspecialchars($kuupaev)."</p>";
            echo "<img src='$kirjendus'>";
            echo "<p>".htmlspecialchars($tuju)."</p>";
        }
    }
    if (isset($_REQUEST["lisamine"])){
        ?>
        <form action="">
            <input type="hidden" name="uusuudis" value="jah">
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
        <?php
    } else {
        echo "<a href='?lisamine=jah'>Lisa uus uudis</a>";
    }
    ?>

</div>

</body>
</html>