    <?php
    echo "<h2>Ajafunktsioonid</h2>";

    //timezone, juhul kui timezone ei ole määratud siis php näitab localhost'i aeg
    date_default_timezone_set('Europe/Tallinn');
    ?>

    <div class="flex-container">
        <div>
            <h3>Timezone ja põhifunktsioonid</h3>
            <?php
            echo "<a href='https://www.php.net/manual/en/timezones.europe.php'>Timezone list</a> <br>";
            echo "time() - aeg sekundites: ".time()."<br>";
            echo "date() - kuupäev ja aeg: ".date("d.m.Y G:i:s", time())."<br>";
            ?>
        </div>

        <div>
            <h3>Kuupäeva vormindamine</h3>
            <?php
            echo "date('d.m.Y H:i:s', time())";
            echo "<pre>
    d - päev 01...31
    m - kuu 01...12
    Y - aasta nelja kohane arv
    G - 24h formaat
    i - minutid 00...59
    s - sekundid 00...59
    </pre>";
            ?>
        </div>

        <div>
            <h3>Tehted kuupäevaga</h3>
            <?php
            echo "+1 min: ".date("d.m.Y G:i:s", time()+60)."<br>";
            echo "+1 tund: ".date("d.m.Y G:i:s", time()+60*60)."<br>";
            echo "+1 päev: ".date("d.m.Y G:i:s", time()+60*60*24)."<br>";
            ?>
        </div>

        <div>
            <h3>Kuupäeva genereerimine</h3>
            <?php
            echo "mktime(tunnid, minutid, sekundid, kuu, päev, aasta)";
            $synd=mktime(5, 2, 2, 7, 23, 2009);
            echo "<br>Minu sunnipäev: ".date("d.m.Y G: i:s", $synd);
            ?>
        </div>

        <div>
            <h3>Kuu nimed massiiviga</h3>
            <?php
            echo "Massiivi abil näidata tänase kuu nimega";
            $kuud=array(1=>"jaanuar", "veebruar", "märts", "aprill", "mai", "juuni", "juuli", "august", "september", "oktoober", "november", "detsember");
            $aasta = date("Y");
            $kuu = $kuud[date("m")];
            $päev = date("d");
            echo "<br>Täna on: ".$päev.". ".$kuu." ".$aasta." a.";
            ?>
        </div>
    </div>