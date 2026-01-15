
<div class="flex-container">
    <div>
        <h2>Sissejuhatus</h2>
        <p>
            Selles peatükis õpime kuidas näha kataloogi sisse ning kuvada sealolevad failid.
            Samuti muudame failinimed lingiks, et kasutaja saaks neid allalaadida.
            Lisaks õpime kuidas faile veebiliidese kaudu üles laadida, kontrollida nende suurust ja tüüpi
            ning vajadusel kontrollida, kas fail on juba olemas.
        </p>
    </div>
    <div>
        <h2>Kataloogi sisu kuvamine</h2>
<p>
    Kataloogi sisu nägemiseks tuleb see avada funktsiooniga <b>opendir()</b> ja lugeda rida
    haaval <b>readdir()</b> funktsiooniga.
</p>

<?php
$kataloog = 'failid';       // имя каталога
$asukoht = opendir($kataloog); // открываем каталог
$rida = readdir($asukoht);     // читаем первую строку
echo $rida . '<br>';           // выводим её
?>

<p>
    Ülaltoodud näide näitas vaid ühte rida. Kõigi failide kuvamiseks
    kasutame while-tsüklit, mis töötab kuni kataloogis on ridu.
</p>
<?php
$kataloog = 'failid';
$asukoht = opendir($kataloog);

while ($rida = readdir($asukoht)) {
    echo $rida . '<br>';
}
?>

<p>
    readdir() tagastab ka punktid "." ja "..", mis tähistavad jooksvaid kaustu.
    Need eemaldame tingimusega.
</p>

<?php
$kataloog = 'failid';
$asukoht = opendir($kataloog);

while ($rida = readdir($asukoht)) {
    if ($rida != '.' && $rida != '..') {
        echo $rida . '<br>';
    }
}
?>

    </div>
    <div>
        <h2>Failide lingiks muutmine</h2>
<p>
    Et kasutaja saaks failile klikkides selle avada või alla laadida, teeme failinime HTML lingiks.
</p>

<?php
$kataloog = 'failid';
$asukoht = opendir($kataloog);

while ($rida = readdir($asukoht)) {
    if ($rida != '.' && $rida != '..') {
        echo '<a href="'.$kataloog.'/'.$rida.'">'.$rida.'</a><br>';
    }
}
?>

    </div>
    <div>
        <h2>Failide üleslaadimine</h2>
<p>
    Failide üleslaadimiseks kasutame vormi, kus <b>enctype="multipart/form-data"</b>
    on kohustuslik.
</p>

<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="minu_fail"><br>
    <input type="submit" value="Lae üles!">
</form>

<p>
    Pärast üleslaadimist kontrollime, kas fail on valitud, ja kuvame selle nime.
</p>

<?php
if (!empty($_FILES['minu_fail']['name'])) {
    $sinu_faili_nimi = $_FILES['minu_fail']['name'];
    echo $sinu_faili_nimi;
}
?>

<p>
    Üleslaetud fail salvestatakse ajutisse kataloogi. Kuvame selle asukoha.
</p>

<?php
if (!empty($_FILES['minu_fail']['name'])) {
    $sinu_faili_nimi = $_FILES['minu_fail']['name'];
    $ajutine_fail = $_FILES['minu_fail']['tmp_name'];

    echo $ajutine_fail;
}
?>

<p>
    Edasi tõstame faili ajutisest asukohast oma kataloogi.
</p>

<?php
if (!empty($_FILES['minu_fail']['name'])) {
    $sinu_faili_nimi = $_FILES['minu_fail']['name'];
    $ajutine_fail = $_FILES['minu_fail']['tmp_name'];

    $kataloog = 'failid';

    if (move_uploaded_file($ajutine_fail, $kataloog.'/'.$sinu_faili_nimi)) {
        echo 'Faili üleslaadimine oli edukas';
    } else {
        echo 'Faili üleslaadimine ebaõnnestus';
    }
}
?>

<h3>Failisuuruse piiramine</h3>

<?php
if (!empty($_FILES['minu_fail']['name'])) {
    $sinu_faili_nimi = $_FILES['minu_fail']['name'];
    $ajutine_fail = $_FILES['minu_fail']['tmp_name'];

    $faili_suurus = $_FILES['minu_fail']['size'];
    $max_suurus = 1048576; // 1MB

    if ($faili_suurus <= $max_suurus) {
        $kataloog = 'failid';
        if (move_uploaded_file($ajutine_fail, $kataloog.'/'.$sinu_faili_nimi)) {
            echo 'Faili üleslaadimine oli edukas';
        } else {
            echo 'Faili üleslaadimine ebaõnnestus';
        }
    } else {
        echo 'Liiga suur fail!';
    }
}
?>

<h3>Faili tüübi piiramine</h3>

<?php
if (!empty($_FILES['minu_fail']['name'])) {
    $sinu_faili_nimi = $_FILES['minu_fail']['name'];
    $ajutine_fail = $_FILES['minu_fail']['tmp_name'];

    $faili_suurus = $_FILES['minu_fail']['size'];
    $max_suurus = 1048576;

    $faili_tyyp = $_FILES['minu_fail']['type'];

    if ($faili_suurus <= $max_suurus && $faili_tyyp == 'text/plain') {
        $kataloog = 'failid';

        if (move_uploaded_file($ajutine_fail, $kataloog.'/'.$sinu_faili_nimi)) {
            echo 'Faili üleslaadimine oli edukas';
        } else {
            echo 'Faili üleslaadimine ebaõnnestus';
        }
    } else {
        echo 'Faili ei laetud üles!';
    }
}
?>

<h3>Faili olemasolu kontroll</h3>

<?php
if (!empty($_FILES['minu_fail']['name'])) {

    $sinu_faili_nimi = $_FILES['minu_fail']['name'];
    $ajutine_fail = $_FILES['minu_fail']['tmp_name'];

    $faili_suurus = $_FILES['minu_fail']['size'];
    $max_suurus = 1048576;

    $faili_tyyp = $_FILES['minu_fail']['type'];

    if ($faili_suurus <= $max_suurus && $faili_tyyp == 'text/plain') {

        $kataloog = 'failid';
        $faili_koht = $kataloog.'/'.$sinu_faili_nimi;

        if (!file_exists($faili_koht) &&
            move_uploaded_file($ajutine_fail, $faili_koht)) {

            echo 'Faili üleslaadimine oli edukas';

        } else {
            echo 'Fail on juba olemas või üleslaadimine ebaõnnestus';
        }

    } else {
        echo 'Faili ei laetud üles!';
    }
}
?>

    </div>
</div>
