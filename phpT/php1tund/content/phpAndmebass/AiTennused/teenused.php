<?php
session_start();
require('config.php');

global $yhendus;
$title = 'Meie teenused';
include 'header.php';
?>
<main>
    <div style="margin: 20px;">
        <h1>Meie teenused</h1>
        <table id="teenused-table">
        <tr>
            <th>Pilt</th>
            <th>Nimi</th>
            <th>Kirjeldus</th>
            <th>Hind</th>
        </tr>
        <?php
        $kask = $yhendus->prepare("SELECT id, nimi, kirjendus, hind, pilt FROM teenused WHERE avalik=1");
        $kask->bind_result($id, $nimi, $kirjendus, $hind, $pilt);
        $kask->execute();
        while ($kask->fetch()) {
            echo "<tr>";
            echo "<td>";
            if (!empty($pilt)) {
                echo "<img src='$pilt' alt='$nimi' style='width: 100px; height: 100px; object-fit: cover;'>";
            }
            echo "</td>";
            echo "<td>".htmlspecialchars($nimi)."</td>";
            echo "<td>".htmlspecialchars($kirjendus)."</td>";
            echo "<td>".htmlspecialchars($hind)." €</td>";
            echo "</tr>";
        }
        ?>
        </table>
    </div>
</main>
<?php
$yhendus->close();
include 'footer.php';
?>