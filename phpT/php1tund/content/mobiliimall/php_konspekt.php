<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobiilimalli Konspekt</title>
</head>
<body>
<div class="container">
    <h1>Mobiilimalli Konspekt</h1>

    <section>
        <h3>Sissejuhatus</h3>
        <p><strong>Ülesanded:</strong> Luua mobiilisõbralik veebileht anekdootide näitamiseks.</p>
        <p><strong>Kasutatud tehnoloogiad:</strong> HTML5, CSS3, PHP, meta viewport.</p>
    </section>

    <section>
        <h3>1. Failide lugemine PHP-ga</h3>
        <p><strong>Mida teeb:</strong> Loeb tekstifailidest sisu ja kuvab lehel.</p>
        <pre>&lt;?php
echo nl2br(file_get_contents("teade.txt"));
echo file_get_contents("autor.txt");
?&gt;</pre>
        <p><strong>Selgitus:</strong> file_get_contents() loeb faili, nl2br() muudab reavahetused &lt;br&gt; tagideks.</p>
    </section>

    <section>
        <h3>2. Mobiilne Meta Tag</h3>
        <pre>&lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;</pre>
        <p><strong>Selgitus:</strong> Leht kohandub seadme ekraani laiusega.</p>
    </section>

    <section>
        <h3>3. Anekdootide dünaamiline laadimine</h3>
        <pre>$id = isset($_GET['id']) ? (int)$_GET['id'] : 1;
$file = "anekdoodid/anekdoot{$id}.txt";
if(file_exists($file)){
    echo "&lt;h2&gt;Anekdoot $id&lt;/h2&gt;";
    echo "&lt;div&gt;" . nl2br(file_get_contents($file)) . "&lt;/div&gt;";
}else{
    echo "&lt;h2&gt;Anekdooti ei leitud&lt;/h2&gt;";
}</pre>
        <p><strong>Selgitus:</strong> Kontrollib URL parameetrit ja kuvab faili sisu.</p>
    </section>

    <section>
        <h3>4. Mobiilne navigatsioon</h3>
        <pre>&lt;ul class="nav"&gt;
    &lt;li&gt;&lt;a href="esmaspaev.php"&gt;E&lt;/a&gt;&lt;/li&gt;
    &lt;li&gt;&lt;a href="teisipaev.php"&gt;T&lt;/a&gt;&lt;/li&gt;
    &lt;li&gt;&lt;a href="kolmapaev.php"&gt;K&lt;/a&gt;&lt;/li&gt;
&lt;/ul&gt;</pre>
        <p><strong>Selgitus:</strong> Lühendab menüü nuppe mobiilse ekraani jaoks.</p>
    </section>

    <section>
        <h3>5. CSS mobiilivaatele</h3>
        <pre>.nav li { display: inline; margin: 5px; }
.anekdoot-text { font-size: 14px; line-height: 1.5; }</pre>
        <p><strong>Selgitus:</strong> Lihtne kujundus, mis töötab mobiilse seadme ekraanil.</p>
    </section>

    <section>
        <h3>Mobiilne vaade</h3>
        <p>Leht kohandub automaatselt väikese ekraani laiusega. Menüü lühendatakse, tekst väiksemaks, kõik elemendid mahuvad ekraanile.</p>
        <img src="../../image/mobil1.png" alt="Mobiilne vaade"><br>
        <img src="../../image/mobil2.png" alt="Mobiilne vaade">
    </section>
</div>

</body>
</html>
