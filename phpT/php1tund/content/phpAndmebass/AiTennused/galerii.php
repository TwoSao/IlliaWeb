<?php
session_start();
require("config.php");

global $yhendus;
$title = 'Teenuste Galerii';
include 'header.php';
?>
<main>
    <div id="menyykiht">
        <h2>Teenused</h2>
        <br>
        <ul id="N">
            <?php
            $kask = $yhendus->prepare("SELECT id, pilt FROM teenused WHERE avalik=1");
            $kask->bind_result($id, $pilt);
            $kask->execute();
            while ($kask->fetch()) {
                echo "<li><a href='".$_SERVER["PHP_SELF"]."?id=$id'>";
                if (!empty($pilt)) {
                    echo "<img src='$pilt' alt='teenus' style='width: 50px; height: 50px; object-fit: cover;'>";
                } else {
                    echo "Pilt puudub";
                }
                echo "</a></li>";
            }
            ?>
        </ul>
    </div>

    <div id="sisukiht">
        <?php
        if (isset($_REQUEST["id"])) {
            $kask = $yhendus->prepare("SELECT id, nimi, kirjendus, hind, pilt FROM teenused WHERE id=? AND avalik=1");
            $kask->bind_param("i", $_REQUEST["id"]);
            $kask->bind_result($id, $nimi, $kirjendus, $hind, $pilt);
            $kask->execute();

            if ($kask->fetch()) {
                echo "<h2>".htmlspecialchars($nimi)."</h2>";
                if (!empty($pilt)) {
                    echo "<img src='$pilt' alt='$nimi' style='max-width: 300px;'>";
                }
                echo "<p><strong>Kirjeldus:</strong> ".htmlspecialchars($kirjendus)."</p>";
                echo "<p><strong>Hind:</strong> ".htmlspecialchars($hind)." €</p>";
            }
        }
        ?>
    </div>
</main>
<?php include 'footer.php'; ?>