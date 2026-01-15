<?php


function kuvaRSS($url, $kogus)
{
    $feed = simplexml_load_file($url);

    echo "<h2>{$feed->channel->title}</h2>";
    echo "Kuupäev: " . date("d.m.Y", strtotime($feed->channel->pubDate));
    echo "<ul>";

    $loendur = 0;
    foreach ($feed->channel->item as $item) {
        if ($loendur >= $kogus) {
            break;
        }

        echo "<li>";
        echo "<a href='{$item->link}' target='_blank'><h3>{$item->title}</h3></a>";
        echo "<img src='{$item->enclosure['url']}' style='max-width:300px;'><br>";
        echo "<p>{$item->description}</p>";
        echo "<small>" . date("H:i", strtotime($item->pubDate)) . "</small>";
        echo "</li>";

        $loendur++;
    }

    echo "</ul>";
}


