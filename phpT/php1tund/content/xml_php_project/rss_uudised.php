<!DOCTYPE html>
<html>
<head lang="et">
	<title>RSS uudised</title>
</head>
<body>
<h1>RSS - Really Simple Syndication</h1>
Really Simple Syndication (RSS) on tehnoloogia, mis võimaldab sind huvitavate veebilehtede, nagu uudisteprotaalide ja ajaveebide, värskendusi automaaselt ja korraga ühte saada, ilma et peaksid iga lehte eraldi külastama


<?php
echo "<h2>ERR uudised</h2>";
$feed = simplexml_load_file("https://www.err.ee/rss");
echo "Kuupäev: ";
echo date("d.m.Y", strtotime($feed->channel->pubDate));
echo "<br>";
echo $feed->channel[0]->item[0]->title;
echo "<ul>";

foreach($feed->channel[0]->item as $item) {
    echo "<li>";
    echo "<a href='{$item->link}' target='_blank'><h3>$item->title</h3></a>";
    echo "<p>$item->description</p>";
    echo date("H:i", strtotime($item->pubDate));
    echo "</li>";
}
echo "</li></ul>"; ?>
</body>
</html>

