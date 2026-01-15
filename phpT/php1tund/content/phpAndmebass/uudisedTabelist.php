<?php
require ("config.php");
// Kustutamine
global $connect;
if (isset($_REQUEST['kustuta'])) {
    $paring = "DELETE FROM uudiused WHERE uudisId = ?";
    $kustutaParing = $connect->prepare($paring);
    $kustutaParing->bind_param("i", $_REQUEST['kustuta']);
    // i - ineteger; s - string; d - double
    $kustutaParing->execute();
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
    <table>
        <tr>
            <th>JRK</th>
            <th>Pealkiri</th>
            <th>Kuupäev</th>
            <th>Kirjendus</th>
            <th>Tuju</th>
        </tr>

<?php
global $connect;
$paring = $connect->prepare("SELECT uudisId, pealkiri, kuupaev, kirjendus, tuju FROM uudiused");
$paring->bind_result($uudisId,$pealkiri, $kuupaev, $kirjendus, $tuju);
$paring->execute();

while ($paring->fetch()) {
    echo "<tr>";
    echo "<td>$uudisId</td>";
    echo "<td  bgcolor='$tuju'>$pealkiri</td>";
    echo "<td>$kuupaev</td>";
    echo "<td>$kirjendus</td>";
    echo "<td>$tuju</td>";
    echo "<td><a href='?kustuta=$uudisId'>Kustuta</a></td>";
    echo "</tr>";
}
?>
</table>
</body>
</html>