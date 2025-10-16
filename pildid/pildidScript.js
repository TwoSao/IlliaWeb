function  juhuslikPilt(){

    const pildid=[
        'pildid/01.png',
        'pildid/02.png',
        'pildid/03.png',
        'pildid/04.png'
    ];
    // HTML failis määratud pult kus id=pilt
    const pilt = document.getElementById('pilt');

    // Math.floor - ümardamine
    // Math.random - juhustlik arv
    // pildid.length - elementide arv piltide massiivis
    const randomPilt = Math.floor(Math.random() * pildid.length);
    pilt.src = pildid[randomPilt];
}
function selectPilt(){
    let vastus = document.getElementById('vastus');
    let pilt = document.getElementById('pilt');
    let valik = document.getElementById('valik');

    if (valik.value && pilt.getAttribute("src") == valik.value) {
        vastus.innerHTML = "Vastus: Õige vastus! Hästi tehtud!";
        vastus.style.color = "green";
    } else{
        vastus.innerHTML = "Vastus: Vale vastus. Proovi uuesti!";
        vastus.style.color = "red";
    }
}
function arvuta(kogus, hind){
    return (kogus*hind).toFixed(2);

}
const silmPilt=2.3;
const PaikePilt = 1.5;
const ilusPilt = 0.75;
const raskePilt = 0;

function arvutaPildiHind(){
    let summa = document.getElementById('summa');
    let kogus = document.getElementById('kogus').value;
    let src = document.getElementById('pilt').getAttribute("src")
    if (src=="pildid/01.png"){
        summa.innerHTML = arvuta(kogus, silmPilt) + "€";
    }
    else if (src=="pildid/02.png"){
        summa.innerHTML = arvuta(kogus, PaikePilt) + "€";
    }
    else if (src=="pildid/03.png"){
        summa.innerHTML = arvuta(kogus, ilusPilt) + "€";
    }
    else if (src=="pildid/04.png"){
        summa.innerHTML = arvuta(kogus, raskePilt) + "€";
    }
}



