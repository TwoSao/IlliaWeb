<?php
echo "<h1>Matemaatilised tehted</h1>";
$arv1 = 10;
$arv2 = 20;
$arv = 3.456;
echo "Esimese arvu väärtus on: ".$arv1;
echo "<br>";
echo "Teise arvi väärtus on: ".$arv2;
echo "<br>";
echo "+ | Liitmine --> : ".($arv1 + $arv2);
echo "<br>";
echo "- | Lahutamine --> : ".($arv1 - $arv2);
echo "<br>";
echo "* | Korrutamine --> : ".($arv1 * $arv2); // Korrutise
echo "<br>";
echo "/ | Jagamine --> : ".($arv1 / $arv2);
echo "<br>";
echo "<h2>Matemaatilised funktsioonid</h2>";
echo "<br>";
echo "min(arv) | Väiksem arv --> : ".min($arv1, $arv2);
echo "<br>";
echo "max(arv) | Suurem arv --> : ".max($arv1, $arv2);
echo "<br>";
echo "round(arv) | Arv ümardamine täisarvani --> : ".round($arv);
echo "<br>";
echo "round(arv, 2) | Arv ümardamine täisarvani --> : ".round($arv, 2);
echo"<br>";
echo "ceil(arv) | Arv ümardamine üles --> : ".ceil($arv);
echo "<br>";
echo "floor(arv) | Arv ümardamine alla --> : ".floor($arv);
echo "<br>";
echo "rand(1, 10) | Juhuslike arvude genereerimine --> : ".rand(1, 10);
echo "<br>";
echo "pow(arv1, 2) | Astendamine --> : ".pow($arv1, 2);
echo "<br>";
echo "sqrt(arv1) | Ruutjuur --> : ".sqrt($arv1);
echo "<br>";
echo "<h2>Omistamise operaatorid</h2>"; // Присваивание - Omistamise
$x = 10;
$y = 20;
$x ++; // $x =  $x + 1; Suurendamine ühevõrra
$y --; // $y = $y - 1; Vähendamine ühevõrra
echo "x = ".$x;
echo "<br>";
echo "y = ".$y;
echo "<br>";
$x *=$y;
echo "x *=y: ".$x;

$nimi = "Illia";
$parenimi = "Blahun";

// $nimi .=$parenimi;
echo "<br>";
echo $nimi;
echo  "<br>";
printf("Tere %s %s", $nimi, $parenimi);

echo "<br>";
echo "<h2>Arva ära 2 numbrit</h2>";

// Saladuslikud numbrid
$number1 = 7;
$number2 = 15;

echo "Esimene number on vahemikus 1-10<br>";
echo "Teine number on vahemikus 10-20<br>";
echo "Esimene number on paaritu<br>";
echo "Teine number jagub 3-ga<br>";
echo "Numbrite summa on: ".($number1 + $number2)."<br>";
echo "Numbrite korrutis on: ".($number1 * $number2)."<br>";

function clearVarsExcept($url, $varname)
{
    $url = basename($url);
    if (str_starts_with($url, "?")) {
        return "?$varname=$_REQUEST[$varname]";
    }
    return strtok($url, "?") . "?$varname=" . $_REQUEST[$varname];
}
?>

<form name="numbrikontroll" action="<?=clearVarsExcept($_SERVER['REQUEST_URI'], "link")?>" method="post">
    <label for="number1">Sisesta esimene number (1-10):</label>
    <input type="number" name="number1" id="number1" min="1" max="10" required><br><br>
    <label for="number2">Sisesta teine number (10-20):</label>
    <input type="number" name="number2" id="number2" min="10" max="20" required><br><br>
    <input type="submit" value="Kontrolli" id="kontroll">
</form>

<?php
if(isset($_REQUEST['number1']) && isset($_REQUEST['number2'])){
    $guess1 = (int)$_REQUEST['number1'];
    $guess2 = (int)$_REQUEST['number2'];

    if($guess1 == $number1 && $guess2 == $number2){
        echo "<strong>Õige! Mõlemad numbrid on õiged: ".$guess1." ja ".$guess2."</strong>";
    } elseif($guess1 == 7){
        echo "Esimene number ".$guess1." on õige, aga teine on vale!";
    } elseif($guess2 == 15){
        echo "Teine number ".$guess2." on õige, aga esimene on vale!";
    } else {
        echo "Mõlemad numbrid on valed! Proovi uuesti.";
    }
}
?>