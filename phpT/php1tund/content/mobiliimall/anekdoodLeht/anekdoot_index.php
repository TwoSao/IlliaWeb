<?php include 'anekdoot_header.php'; ?>

<div class="welcome">
    <h2>Tere tulemast anekdoodide lehele!</h2>
    <div style="margin: 20px 0; padding: 15px; background: #e8f5e8; border-radius: 4px;">
        <?php
        echo "Teade<br>";
        echo file_get_contents('teade.txt'); ?>
    </div>
    <p>Vali menüüst mõni anekdoot, et naerda saada.</p>
    <p>Lehel on kokku 3 anekdooti.</p>
</div>

<?php include 'anekdoot_footer.php'; ?>