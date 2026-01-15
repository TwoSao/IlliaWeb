<?php
$autod = simplexml_load_file("autod.xml");

function otsingAutonumbri($paring)
{
    global $autod;
    $tulemus = array();

    foreach ($autod->auto as $auto) {
        if (substr(strtolower($auto->autonumber), 0, strlen($paring)) == strtolower($paring)) {
            array_push($tulemus, $auto);
            break;
        }
        else if (substr(strtolower($auto->omanik->perenimi), 0, strlen($paring)) == strtolower($paring)) {
            array_push($tulemus, $auto);
            break;
        }
    }

    return $tulemus;
}
?>

<!DOCTYPE  html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>Autod XML failist</title>
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
<h1>Autod XML failist</h1>

<form method="post">
    <label for="otsing">Otsi autonumbrit: </label>
    <input type="text" name="otsing" id="otsing" placeholder="nt 666 või nt Jürgen">
    <input type="submit" value="Otsi">
</form>

<table>
    <tr>
        <th>Mark</th>
        <th>Autonumber</th>
        <th>Aasta</th>
        <th>Omanik</th>
        <th>Isikukood</th>
    </tr>

    <?php
    if (!empty($_POST["otsing"])) {

        $tulemus = otsingAutonumbri($_POST["otsing"]);

        if (!empty($tulemus)) {
            foreach ($tulemus as $auto) {
                echo "<tr>";
                echo "<td>{$auto->mark}</td>";
                echo "<td>{$auto->autonumber}</td>";
                echo "<td>{$auto->v_aasta}</td>";
                echo "<td>{$auto->omanik->perenimi}</td>";
                echo "<td>{$auto->omanik->isikukood}</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'><strong>Autot ei leitud.</strong></td></tr>";
        }

    } else {
        foreach ($autod->auto as $auto) {
            echo "<tr>";
            echo "<td>{$auto->mark}</td>";
            echo "<td>{$auto->autonumber}</td>";
            echo "<td>{$auto->v_aasta}</td>";
            echo "<td>{$auto->omanik->perenimi}</td>";
            echo "<td>{$auto->omanik->isikukood}</td>";
            echo "</tr>";
        }
    }
    ?>
</table>

</body>
</html>
