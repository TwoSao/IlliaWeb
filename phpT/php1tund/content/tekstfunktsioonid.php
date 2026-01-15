<?php

function clearVarsExcept($url, $varname)
{
    $url = basename($url);
    if (str_starts_with($url, "?")) {
        return "?$varname=$_REQUEST[$varname]";
    }
    return strtok($url, "?")."?$varname=".$_REQUEST[$varname];
}

?>

<div class="flex-container">
    <div>
        <?php

        echo "<h2>Tekstfunktsioonid</h2>";
        $tekst = "PHP on skriptikeel serveripoolne";
        echo $tekst;
        echo "<br>";
        echo "teksti pikkus - strlen(). <br>".strlen($tekst)."tähemärgi";
        echo "<br>";
        echo "Esimesed 6 tähte - substr() = ".substr($tekst, 0, 6);
        echo "<br>";
        echo "Alates 6 tähest = ".substr($tekst, 6);
        echo "<br>";
        echo "Sõnade arv lauses str_word_count() = ".str_word_count($tekst)." sõna lauses";
        echo "<br>";
        echo "Kõik tähed on suured - strtoupper() = ".strtoupper($tekst);
        echo "<br>";
        echo "Kõik tähed on väikesed - strtolower() = ".strtolower($tekst);
        echo "<br>";
        echo "Iga sõna algab suure tähega - ucwords() = ".ucwords($tekst);
        echo "<br>";
        echo ucwords(strtolower($tekst));
        echo "<br>";
        echo "<br>";
        $tekst2 = "   PHP on skriptikeel serveripoolne   ";

        // trim, ltrim, rtrim
        echo "|".$tekst2."|";
        echo "<br>";
        echo "Eemaldab tekstist tühikuid paremalt ja vasakult - trim() = '".trim($tekst2)."'";
        // trim() удаляет все пробелы (и другие пробельные символы) с начала и конца строки
        echo "<br>";
        echo "Eemaldab tekstist tühikuid ainult vasakult - ltrim() = '".ltrim($tekst2)."'";
        // ltrim() удаляет пробелы (или другие символы) только с начала строки
        echo "<br>";
        echo "Eemaldab tekstist tühikuid ainult paremalt - rtrim() = '".rtrim($tekst2)."'";
        // rtrim() удаляет пробелы (или другие символы) только с конца строки
        echo "<br>";


        ?>

    </div>
    <div>
        <?php

        echo "<h3>Tekst kui massiiv</h3>";
        echo "1. täht massiivist: ".$tekst[0];
        echo "<br>";
        // Määrab iga sõna nagu eraldi element
        print_r(str_word_count($tekst,1)); // Array ( [0] => PHP [1] => on [2] => skriptikeel [3] => serveripoolne )
        $syna = str_word_count($tekst,1);

        echo "<br>";
        echo "3. sõna massiivist: ".$syna[2];

        //Määrab mis sümbool on iga sõna alguses
        echo "<br>";
        print_r(str_word_count($tekst,2));

        echo "<br>";

        echo "<h2>Teksti asendamine</h2>";

        $otsi = array("PHP", "serveripoolne");
        $asendav = array("Javascript", "kliendipoolne");

        echo str_replace($otsi, $asendav, $tekst);

        echo "<br>";
         ?>
    </div>
    <div>
        <?php
echo "<h2>Mõistatus. Arva ära linnanimi</h2>";


// Näide linna tuvastamiseks kasutades tekstifunktsioone
$linn = "tallinn"; // saladuslik linn

echo "<br>";
echo "Linnanimi pikkus: ".strlen($linn)." tähte";
echo "<br>";
echo "Linnanimi esimene täht: ".substr($linn, 0, 1);
echo "<br>";
echo "Linnanimi viimane täht: ".substr($linn, -1);
echo "<br>";
echo "Linnanimi kolmas täht: ".substr($linn, 2, 1);
echo "<br>";
$replsyna = array("n", "t", "l");
echo "Linnanimi: ".str_replace($replsyna, "_", $linn);
?>

<form name="tekstkontroll" action="<?=clearVarsExcept($_SERVER['REQUEST_URI'], "link")?>" method="post">
    <label for="linn">Sisesta linnanimi</label>
    <input type="text" name="linn" placeholder="Sisesta linnanimi" id="linn"><br>
    <input type="submit" value="Kontrolli" id="kontroll">
</form>

<?php
if(isset($_REQUEST['linn'])){
    $sisestatud_linn = $_REQUEST['linn'];
    $sisestatud_linn = strtolower($sisestatud_linn);
    if($sisestatud_linn == "tallinn"){
        echo $sisestatud_linn." on Õige linnanimi!";
    } else {
        echo "Vale linnanimi!";
    }
}
?>

    </div>
</div>