<?php
require 'kuvaRSSfunktsioon.php';
?>
<!DOCTYPE html>
<html>
<head lang="et">
    <title>RSS uudised</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style.css  ">
</head>
<body>
<h1>RSS - Really Simple Syndication</h1>
Really Simple Syndication (RSS) on tehnoloogia, mis võimaldab sind huvitavate veebilehtede, nagu uudisteprotaalide ja ajaveebide, värskendusi automaaselt ja korraga ühte saada, ilma et peaksid iga lehte eraldi külastama
<br>
<?php
kuvaRSS("https://www.err.ee/rss", 5);
kuvaRSS("https://www.postimees.ee/rss", 5);
?>
</body>
</html>

