<?php
require("config.php");
global $yhendus;
// Lisa president

if (isset($_REQUEST["lisa"]) && !empty($_REQUEST["pressedent"])) {
    $pressedent = $_REQUEST["pressedent"];
    $pilt = $_REQUEST["pilt"];
    $avalik = isset($_REQUEST["avalik"]) ? 1 : 0;
    $paring = $yhendus->prepare("INSERT INTO valimised (pressedent, pilt, avalik, lisamisaeg) VALUES (?, ?, ?, NOW())");
    $paring->bind_param("ssi", $pressedent, $pilt, $avalik);
    $paring->execute();
    header("Location: $_SERVER[PHP_SELF]");
}

// Näitamine
if (isset($_REQUEST["naita"])) {
    $paring = $yhendus->prepare("UPDATE valimised SET avalik=1 WHERE id=?");
    $paring->bind_param("i", $_REQUEST["naita"]);
    $paring->execute();
    header("Location: $_SERVER[PHP_SELF]");
    $yhendus->close();

}
// Peidamine
if (isset($_REQUEST["peida"])) {
    $paring = $yhendus->prepare("UPDATE valimised SET avalik=0 WHERE id=?");
    $paring->bind_param("i", $_REQUEST["peida"]);
    $paring->execute();
    header("Location: $_SERVER[PHP_SELF]");
    $yhendus->close();

}

// Kustuta kandidaat
if (isset($_REQUEST["kustuta"])) {
    $paring = $yhendus->prepare("DELETE FROM valimised WHERE id=?");
    $paring->bind_param("i", $_REQUEST["kustuta"]);
    $paring->execute();
    header("Location: $_SERVER[PHP_SELF]");
}

// Nulliks punktid
if (isset($_REQUEST["nulliks"])) {
    $paring = $yhendus->prepare("UPDATE valimised SET punktid=0 WHERE id=?");
    $paring->bind_param("i", $_REQUEST["nulliks"]);
    $paring->execute();
    header("Location: $_SERVER[PHP_SELF]");
}

// Kustuta kommentaarid
if (isset($_REQUEST["kustuta_kommentaarid"])) {
    $paring = $yhendus->prepare("UPDATE valimised SET kommentaarid='' WHERE id=?");
    $paring->bind_param("i", $_REQUEST["kustuta_kommentaarid"]);
    $paring->execute();
    header("Location: $_SERVER[PHP_SELF]");
}
?>


<!DOCTYPE html>
<html lang="et">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin leht</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>

<h1>TARpv24 presidendi admin leht</h1>
<nav>
    <ul>
        <li><a href="valimised.php">Kasutaja leht</a></li>
        <li><a href="admin.php">Admin leht</a>  </li>
        <li><a href="galerii.php">Galerii pressedent</a></li>
    </ul>
</nav>
<table>
    <tr>
        <th>Nimi</th>
        <th>Pilt</th>
        <th>Punktid</th>
        <th>Lisamisaeg</th>
        <th>Haldus</th>
        <th>Status</th>
        <th>Kommentaarid</th>
        <th>Tegevused</th>
    </tr>
    <?php
    global $yhendus;
    $paring = $yhendus->prepare("SELECT id, pressedent, pilt, punktid, lisamisaeg, avalik, kommentaarid FROM valimised");
    $paring->bind_result($id, $pressedent, $pilt, $punktid, $lisamisaeg, $avalik, $kommentaarid);
    $paring->execute();
    while ($paring->fetch()) {
        echo "<tr>";
        echo "<td>$pressedent</td>";
        echo "<td><img src='$pilt' alt='pilt'></td>";
        echo "<td>$punktid</td>";
        echo "<td>$lisamisaeg</td>";

        $tekstLehel = "Näitatud";

        if ($avalik == 1){
            $tekst="Peida";
            $seisund="peida";
            $tekstLehel = "Näitatud";}
        else {
            $tekst="Näita";
            $seisund="naita";
            $tekstLehel = "Peidetud";
        }

        echo "<td><a id='peida' href='?$seisund=$id'>$tekst</a></td>";
        echo "<td>$tekstLehel</td>";
        echo "<td>";
        echo "<div>";
        echo nl2br(htmlspecialchars($kommentaarid));
        echo "</div>";

        echo "</td>";
        echo "<td>";
        echo "<a href='?nulliks=$id'>Nulliks</a> | ";
        echo "<a href='?kustuta_kommentaarid=$id' onclick='return confirm(\"Kas kustutada kõik kommentaarid?\")'>Kustuta kommentaarid</a> | ";
        echo "<a href='?kustuta=$id' onclick='return confirm(\"Kas oled kindel?\")'>Kustuta</a>";
        echo "</td>";
        echo "</tr>";

    }
    ?>
</table>
<h2>Lisa oma Presidendi</h2>
<form action="?" method="post">
    <input type="text" name="pressedent" placeholder="Nimi">
    <input type="text" name="pilt" placeholder="Pilt">
    <label><input type="checkbox" name="avalik"> Avalik</label>
    <input type="submit" name="lisa" value="Lisa">
</form>
</body>

