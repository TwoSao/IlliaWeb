<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>Illia PHP Tööd</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/kalukatorStyle.css">
    <link rel="stylesheet" href="style/musikaStyle.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/kohvikalc.js"></script>
    <script src="js/musikaJS.js"></script>
    <script src="js/paev.js"></script>
</head>
<body>
<?php
    include ("header.php")
?>
<?php
    include ("nav.php")
?>
<div class="flex-container">
    <div>

        <?php
            if (isset($_GET['link'])) {
               include ("content/".$_GET['link']);
            }
            else {
                include ("content/avaleht.php");
            }
        ?>

    </div>
    <div>
        <img src="image/img.png" alt="pilt vabal valikul">
        <div>
            Veebirakendus on arvutitarkvara või programm, mida hoitakse veebiserveris ning
            mida saab kasutada interneti kaudu veebibrauserite abil.
            <br>
            <input type="button" value="TÄNA ON" onclick="showDate()">
            <input type="button" value="Minu sünnipäevani" onclick="daysToBirthday()">
        </div>
        <div id="result"></div>
    </div>
</div>


<?php
    include ("footer.php")
?>

</body>
</html>