<?php include 'anekdoot_header.php'; ?>

<div class="anekdoot-container">
    <?php
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 1;
    $file = "../anekdoodid/anekdoot{$id}.txt";
    
    if (file_exists($file)) {
        if ($id == 1) echo '<h2>Kool ja gravitatsioon</h2>';
        elseif ($id == 2) echo '<h2>Tark koer</h2>';
        elseif ($id == 3) echo '<h2>Arst ja patsient</h2>';
        else echo '<h2>Anekdoot ' . $id . '</h2>';
        
        echo '<div class="anekdoot-text">' . nl2br(file_get_contents($file)) . '</div>';
    } else {
        echo '<h2>Anekdooti ei leitud</h2>';
        echo '<p>Vali mõni teine anekdoot menüüst.</p>';
    }
    ?>
</div>

<?php include 'anekdoot_footer.php'; ?>