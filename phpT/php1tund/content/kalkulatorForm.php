<h1>Kohvi Tellimise Kalkulaator</h1>

<h2>Vali kohvi tüüp:</h2>
<input type="radio" id="espresso" name="coffee" onclick="muudaPilt()">
<label for="espresso">Espresso - 2.50€</label><br>

<input type="radio" id="cappuccino" name="coffee" onclick="muudaPilt()">
<label for="cappuccino">Cappuccino - 3.20€</label><br>

<input type="radio" id="latte" name="coffee" onclick="muudaPilt()">
<label for="latte">Latte - 3.80€</label><br>

<input type="radio" id="americano" name="coffee" onclick="muudaPilt()">
<label for="americano">Americano - 2.80€</label><br>

<input type="radio" id="mocha" name="coffee" onclick="muudaPilt()">
<label for="mocha">Mocha - 4.20€</label><br>

<h2>Pilt:</h2>
<img id="coffeeImage" src="image/img_1.png" alt="Kohvi pilt" width="200" height="150" >

<h2>Kogus:</h2>
<input type="number" id="kogus" min="1" value="1" placeholder="Sisesta kogus" oninput="arvutaHind()">

<h2>Lisatingimus - Soodustus:</h2>
<input type="checkbox" id="soodustus" onchange="arvutaHind()">
<label for="soodustus">Püsikliendi soodustus 10%</label>

<h2>Lõpphind:</h2>
<p id="totalPrice">0.00€</p>