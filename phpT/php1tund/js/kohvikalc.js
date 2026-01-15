function arvuta(kogus, hind) {
    return (kogus * hind).toFixed(2);
}

const espressoHind = 2.50;
const cappuccinoHind = 3.20;
const latteHind = 3.80;
const americanoHind = 2.80;
const mochaHind = 4.20;

function muudaPilt() {
    let img = document.getElementById("coffeeImage");

    if (document.getElementById("espresso").checked) {
        img.src = "image/Espresso.png";
    } else if (document.getElementById("cappuccino").checked) {
        img.src = "image/Cappuccino.png";
    } else if (document.getElementById("latte").checked) {
        img.src = "image/Latte.png";
    } else if (document.getElementById("americano").checked) {
        img.src = "image/Americano.png";
    } else if (document.getElementById("mocha").checked) {
        img.src = "image/Mocha.png";
    }

    arvutaHind();
}

function arvutaHind() {
    let summa = document.getElementById("totalPrice");
    let kogus = document.getElementById("kogus").value;
    let soodustus = document.getElementById("soodustus").checked;
    let hind = 0;
    cappuccino = document.getElementById("cappuccino");
    latte = document.getElementById("latte");
    americano = document.getElementById("americano");
    mocha = document.getElementById("mocha");
    espresso = document.getElementById("espresso");


    if (espresso.checked) {
        hind = espressoHind;
    } else if (cappuccino.checked) {
        hind = cappuccinoHind;
    } else if (latte.checked) {
        hind = latteHind;
    } else if (americano.checked) {
        hind = americanoHind;
    } else if (mocha.checked) {
        hind = mochaHind;
    }

    if (kogus > 0 && hind > 0) {
        let kokku = kogus * hind;
        if (soodustus) {
            kokku = kokku * 0.9; // -10% скидка
        }
        summa.innerHTML = kokku.toFixed(2) + "€";
    } else {
        summa.innerHTML = "0.00€";
    }
}
