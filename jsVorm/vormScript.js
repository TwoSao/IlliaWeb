function nimiLugemine(){
    // let - muutujate määramine (var)

    let nimi = document.getElementById("nimi");
    let v1 = document.getElementById("vastus1");

    // innerText või innerHTML genireerib lehel vastav tekst
    v1.innerText = "Tere õpilane, " + nimi.value;

}

// puhasta funktsioon
function puhasta(){
    let v1 = document.getElementById("vastus1");
    let v2 = document.getElementById("vastus2");
    let nimi = document.getElementById("nimi");
    let mees = document.getElementById("mees");
    let naine = document.getElementById("naine");
    let laps = document.getElementById("laps");
    let v3 = document.getElementById("vastus3");
    let varv = document.getElementById("varv");
    let range = document.getElementById("range");
    let v4 = document.getElementById("vastus4");
    let java = document.getElementById("java");
    let javascript = document.getElementById("javascript");
    let php = document.getElementById("php");
    let py = document.getElementById("python");
    let v5 = document.getElementById("vastus5");


    nimi.value = "";
    v1.innerText="";
    v2.innerText="";
    v3.innerText="";
    v4.innerText="";
    v5.innerText="";
    range.value = 50;
    mees.checked=false;
    naine.checked=false;
    laps.checked=false;
    java.checked=false;
    javascript.checked=false;
    php.checked=false;
    py.checked=false;
    varv.value = "black";

}

// radionuppu valik
function valiSugu(){
    let v2 = document.getElementById("vastus2");
    let mees=document.getElementById("mees");
    let naine=document.getElementById("naine");
    let laps=document.getElementById("laps");
    let pilt = document.getElementById("pilt");
    if(naine.checked){
        pilt.src="images/01.png";
        v2.innerHTML=naine.value;

    }
    else if(mees.checked){
        v2.innerHTML=mees.value;
        pilt.src="images/02.png";
    }
    else if(laps.checked){
        v2.innerHTML=laps.value;
        pilt.src="images/03.png";
    }
    else{
        v2.innerHTML="Palun vali oma sugu";
    }
}

function valiVarv(){
    let varv = document.getElementById("varv");
    let v1 = document.getElementById("vastus1");
    let v2 = document.getElementById("vastus2");
    let v3 = document.getElementById("vastus3");

    v1.style.backgroundColor=varv.value;
    v2.style.color=varv.value;
    v3.style.backgroundColor=varv.value;

}
// range
function rangeLiigub(){
    let range = document.getElementById("range");
    let v3 = document.getElementById("vastus3");

    v3.innerText=range.value + "punkti";
}

// select - selectedIndex

function valiKoht(){
    let v4 = document.getElementById("vastus4");
    let koht = document.getElementById("koht");

    if  (koht.selectedIndex !== 0){
        v4.innerHTML="Sa valisid: " + koht.value;

    }
    else{
        v4.innerHTML="Tee ripploendi lahti ja vali";
    }
}
//checkbox
function teeValik(){

    let v5 = document.getElementById("vastus5");
    let java = document.getElementById("java");
    let javascript = document.getElementById("javascript");
    let php = document.getElementById("php");
    let py  = document.getElementById("python");
    let valik = "";
    let pilt2 = document.getElementById("pilt2");
    if(java.checked){
        valik += java.value+", ";
        pilt2.src="images/01.png";


    }
    if(javascript.checked){
        valik += javascript.value+", ";
    }
    if(php.checked){
        valik += php.value+", ";
    }

    if(py.checked){
        valik += py.value+", ";
    }
    v5.innerHTML = "Sa valisid: " + valik;
}