<?php session_start(); 
$title = 'AI Teenused';
include 'header.php';
?>
<main>
    <div class="flex-container" id="pea">
        <div>
            <h1>Tere tulemast!</h1>
            <p>Oleme kaasaegne ettevõte, mis kasutab oma tehisaru teie ülesannete lahendamiseks. Meie AI aitab ettevõtetel ja inimestel saavutada eesmärke kiiremini, targemalt ja tõhusamalt.</p>
            <h3>Meie teenused:</h3>
            <ul id="teenused-list">
                <li>Protsesside automatiseerimine</li>
                <li>Analüütika ja prognoosimine</li>
                <li>Sisu loomine</li>
                <li>Isiklikud assistendid</li>
                <li>Lahenduste optimeerimine</li>
            </ul>
            <a href="teenused.php">Loe rohkem</a>

        </div>


    </div>
</main>
<?php include 'footer.php'; ?>