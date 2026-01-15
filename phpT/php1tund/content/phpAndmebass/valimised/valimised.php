<?php
require("config.php");
global $yhendus;
// +1 punkt

if (isset($_REQUEST["lisa1p"])) {
    $paring = $yhendus->prepare("UPDATE valimised SET punktid=punktid+1 WHERE id=?");
    $paring->bind_param("i", $_REQUEST["lisa1p"]);
    $paring->execute();
    header("Location: $_SERVER[PHP_SELF]");
}

// -1 punkt

if (isset($_REQUEST["miinus1p"])) {
    $paring = $yhendus->prepare("UPDATE valimised SET punktid=punktid-1 WHERE id=?");
    $paring->bind_param("i", $_REQUEST["miinus1p"]);
    $paring->execute();
    header("Location: $_SERVER[PHP_SELF]"); // aadressiriba puhastab päring ja jääb failinimi
}

// Lisa president

if (isset($_REQUEST["lisa"]) && !empty($_REQUEST["pressedent"])) {
    $pressedent = $_REQUEST["pressedent"];
    $pilt = $_REQUEST["pilt"];
    $paring = $yhendus->prepare("INSERT INTO valimised (pressedent, pilt, lisamisaeg) VALUES (?, ?, NOW())");
    $paring->bind_param("ss", $pressedent, $pilt);
    $paring->execute();
    header("Location: $_SERVER[PHP_SELF]");
}

global $yhendus;
if (isset($_REQUEST['uue_komment_id'])) {
    $paring = $yhendus->prepare("UPDATE valimised SET kommentaarid=CONCAT(kommentaarid, ?) WHERE id = ?");
    $kom = $_REQUEST['uue_komment']."\n";
    $paring->bind_param("si",$kom, $_REQUEST['uue_komment_id']);
    $paring->execute();
    header("Location: " . $_SERVER['PHP_SELF']);
    $yhendus->close();
}
?>

<!DOCTYPE html>
<html lang="et">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valimised leht</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
<h1>TARpv24 presidendi valimised</h1>
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
        <th>Lisa punkt</th>
        <th>Lahuta punkt</th>
        <th>Kommentaarid</th>
    </tr>
    <?php
    global $yhendus;
    $paring = $yhendus->prepare("SELECT id, pressedent, pilt, punktid, lisamisaeg, kommentaarid FROM valimised where avalik=1");
    $paring->bind_result($id, $pressedent, $pilt, $punktid, $lisamisaeg, $kommentaarid);
    $paring->execute();
    while ($paring->fetch()) {
        echo "<tr>";
        echo "<td>$pressedent</td>";
        echo "<td><img src='$pilt' alt='pilt'></td>";
        echo "<td>$punktid</td>";
        echo "<td>$lisamisaeg</td>";
        echo "<td><a href='?lisa1p=$id'>Lisa 1 punkt</a></td>";
        echo "<td><a href='?miinus1p=$id'>Lahuta 1 punkt</a></td>";
        echo "<td>".nl2br(htmlspecialchars($kommentaarid))."</td>";
        echo "<td>
        <form action='?' method='post'>
            <input type='hidden' name='uue_komment_id' value='$id'>
            <label for='uue_komment'>Kommentaar:</label>
            <input type='text' name='uue_komment'>
            <input type='submit' value='Lisa kommentaar'>
            
        </form>
        </td>";

        echo "</tr>";

    }
    ?>
</table>
<h2>Lisa oma Presidendi</h2>
<form action="?" method="post">
    <input type="text" name="pressedent" placeholder="Nimi">
    <br>
    <input type="text" name="pilt" placeholder="Pilt">
    <br>
    <input type="submit" name="lisa" value="Lisa">
</form>
</body>

