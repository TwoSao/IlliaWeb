<?php
if(isset($_POST['submit'])){
    $xmlDoc = new DOMDocument("1.0","UTF-8");
    $xmlDoc->preserveWhiteSpace = false;
    $xmlDoc->load('autod.xml');
    $xmlDoc->formatOutput = true;
    
    $xml_root = $xmlDoc->documentElement;

    $xml_auto = $xmlDoc->createElement("auto");

    $xml_root->appendChild($xml_auto);
    
    unset($_POST['submit']);
    
    // Omaniku andmed
    $omanik_andmed = array('perenimi', 'isikukood');
    $xml_omanik = $xmlDoc->createElement("omanik");

        foreach($_POST as $voti => $vaartus){
            if(in_array($voti, $omanik_andmed)){
                $kirje = $xmlDoc->createElement($voti, $vaartus);
                $xml_omanik->appendChild($kirje);
            } else {
                $kirje = $xmlDoc->createElement($voti, $vaartus);
                $xml_auto->appendChild($kirje);
            }
        }
    
    $xml_auto->appendChild($xml_omanik);
    
    $xmlDoc->save('autod.xml');
    echo "<p>Auto andmed salvestatud!</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto lisamine</title>
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="global.php">Avaleht</a></li>
            <li><a href="autoLugemine.php">Autod</a></li>
        </ul>
    </nav>
</header>
    <h2>Auto andmete sisestamine</h2>
    <table>
        <form action="" method="post" name="vorm1">
            <tr>
                <td><label for="mark">Auto mark:</label></td>
                <td><input type="text" name="mark" id="mark" autofocus></td>
            </tr>
            <tr>
                <td><label for="autonumber">Autonumber:</label></td>
                <td><input type="text" name="autonumber" id="autonumber"></td>
            </tr>
            <tr>
                <td><label for="v_aasta">Väljastamise aasta:</label></td>
                <td><input type="text" name="v_aasta" id="v_aasta"></td>
            </tr>

            <tr>
                <td><label for="perenimi">Omaniku perenimi:</label></td>
                <td><input type="text" name="perenimi" id="perenimi"></td>
            </tr>
            <tr>
                <td><label for="isikukood">Isikukood:</label></td>
                <td><input type="text" name="isikukood" id="isikukood"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" id="submit" value="Sisesta"></td>
                <td></td>
            </tr>
        </form>
    </table>
</body>
</html>