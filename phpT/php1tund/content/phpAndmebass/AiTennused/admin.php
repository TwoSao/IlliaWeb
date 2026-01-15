    <?php if (isset($_GET["code"])) {die(highlight_file(__FILE__,1));} ?>
    <?php
    session_start();
    if (!isset($_SESSION['tuvastamine']) || $_SESSION['role'] != 1) {
        header('Location: login.php');
        exit();
    }
    
    require('config.php');
    global $yhendus;

    // Uue teenuse lisamine
    if (isset($_REQUEST["uusleht"])) {
        $avalik = isset($_REQUEST["avalik"]) ? 1 : 0;
        $kask = $yhendus->prepare("INSERT INTO teenused (nimi, kirjendus, hind, avalik, pilt) VALUES (?, ?, ?, ?, ?)");
        $kask->bind_param("ssiis", $_REQUEST["nimi"], $_REQUEST["kirjendus"], $_REQUEST["hind"], $avalik, $_REQUEST["pilt"]);
        $kask->execute();
        header("Location: ".$_SERVER["PHP_SELF"]);
        $yhendus->close();
        exit();
    }

    // Teenuse kustutamine
    if (isset($_REQUEST["kustutusid"])) {
        $kask = $yhendus->prepare("DELETE FROM teenused WHERE id=?");
        $kask->bind_param("i", $_REQUEST["kustutusid"]);
        $kask->execute();
    }

    // Teenuse muutmine
    if (isset($_REQUEST["muutmisid"])) {
        $kask = $yhendus->prepare("UPDATE teenused SET nimi=?, kirjendus=?, hind=?, pilt=? WHERE id=?");
        $kask->bind_param("ssisi", $_REQUEST["nimi"], $_REQUEST["kirjendus"], $_REQUEST["hind"], $_REQUEST["pilt"], $_REQUEST["muutmisid"]);
        $kask->execute();
    }

    // Näitamine
    if (isset($_REQUEST["naita"])) {
        $kask = $yhendus->prepare("UPDATE teenused SET avalik=1 WHERE id=?");
        $kask->bind_param("i", $_REQUEST["naita"]);
        $kask->execute();
        header("Location: ".$_SERVER["PHP_SELF"]);
    }

    // Peidamine
    if (isset($_REQUEST["peida"])) {
        $kask = $yhendus->prepare("UPDATE teenused SET avalik=0 WHERE id=?");
        $kask->bind_param("i", $_REQUEST["peida"]);
        $kask->execute();
        header("Location: ".$_SERVER["PHP_SELF"]);
    }
    
    $title = 'AI Teenused - Admin';
    include 'header.php';
    ?>

    <main>
        <div id="menyykiht">
            <h2>Teenused</h2>
            <ul>
                <?php
                $kask = $yhendus->prepare("SELECT id, nimi FROM teenused");
                $kask->bind_result($id, $nimi);
                $kask->execute();
                while ($kask->fetch()) {
                    echo "<li><a href='".$_SERVER["PHP_SELF"]."?id=$id'>".htmlspecialchars($nimi)."</a></li>";
                }
                ?>
            </ul>
            <p><a href="<?=$_SERVER["PHP_SELF"]?>?lisamine=jah">Lisa uus teenus</a></p>
        </div>

        <div id="sisukiht">
            <?php
            // Ühe teenuse kuvamine või muutmine
            if (isset($_REQUEST["id"])) {
                $kask = $yhendus->prepare("SELECT id, nimi, kirjendus, hind, avalik, pilt FROM teenused WHERE id=?");
                $kask->bind_param("i", $_REQUEST["id"]);
                $kask->bind_result($id, $nimi, $kirjendus, $hind, $avalik, $pilt);
                $kask->execute();

                if ($kask->fetch()) {
                    // MUUTMISVORM
                    if (isset($_REQUEST["muutmine"])) {
                        ?>
                        <form action="<?=$_SERVER["PHP_SELF"]?>">
                            <input type="hidden" name="muutmisid" value="<?=$id?>" />
                            <h2>Teenuse muutmine</h2>

                            <table>
                                <tr>
                                    <th>Nimi:</th>
                                    <td><input type="text" name="nimi" value="<?=htmlspecialchars($nimi)?>" /></td>
                                </tr>
                                <tr>
                                    <th>Kirjeldus:</th>
                                    <td>
                                        <textarea rows="10" cols="50" name="kirjendus"><?=htmlspecialchars($kirjendus)?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Hind:</th>
                                    <td><input type="number" step="0.01" name="hind" value="<?=htmlspecialchars($hind)?>" /></td>
                                </tr>
                                <tr>
                                    <th>Pilt:</th>
                                    <td><input type="text" name="pilt" value="<?=htmlspecialchars($pilt)?>" /></td>
                                </tr>
                            </table>

                            <input type="submit" value="Muuda">
                        </form>
                        <?php
                    }
                    // INFO KUVA
                    else {
                        echo "<h2>".htmlspecialchars($nimi)."</h2>";
                        if (!empty($pilt)) {
                            echo "<img src='$pilt' alt='$nimi' style='max-width: 200px;'><br>";
                        }
                        echo "<p><strong>Kirjeldus:</strong> ".htmlspecialchars($kirjendus)."</p>";
                        echo "<p><strong>Hind:</strong> ".htmlspecialchars($hind)."</p>";

                        if ($avalik) {
                            echo "<p><strong>Staatus:</strong> Nähtav</p>";
                            echo "<br><a href='?kustutusid=$id'>kustuta</a> ";
                            echo "<a href='?id=$id&muutmine=jah'>muuda</a> ";
                            echo "<a href='?peida=$id'>Peida</a>";
                        } else {
                            echo "<p><strong>Staatus:</strong> Peidetud</p>";
                            echo "<br><a href='?kustutusid=$id'>kustuta</a> ";
                            echo "<a href='?id=$id&muutmine=jah'>muuda</a> ";
                            echo "<a href='?naita=$id'>Näita</a>";
                        }
                    }
                }
            }

            // Uue teenuse lisamise vorm
            if (isset($_REQUEST["lisamine"])) {
                ?>
                <form action="<?=$_SERVER["PHP_SELF"]?>">
                    <input type="hidden" name="uusleht" value="jah" />
                    <h2>Uue teenuse lisamine</h2>

                    <table>
                        <tr>
                            <th>Nimi:</th>
                            <td><input type="text" name="nimi"></td>
                        </tr>
                        <tr>
                            <th>Kirjeldus:</th>
                            <td><textarea rows="10" cols="50" name="kirjendus"></textarea></td>
                        </tr>
                        <tr>
                            <th>Hind:</th>
                            <td><input type="number" step="0.01" name="hind"></td>
                        </tr>
                        <tr>
                            <th>Pilt:</th>
                            <td><input type="text" name="pilt" placeholder="URL"></td>
                        </tr>
                        <tr>
                            <th>Avalik:</th>
                            <td><label><input type="checkbox" name="avalik"> Nähtav</label></td>
                        </tr>
                    </table>

                    <input type="submit" value="Lisa">
                </form>
                <?php
            }
            ?>
        </div>
    </main>

    <?php include 'footer.php'; ?>
