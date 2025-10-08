function muusikaValik(){

    let vastus1 = document.getElementById("vastus1");
    let musikryhm1 = document.getElementById("musikryhm1");
    let musikryhm2 = document.getElementById("musikryhm2");
    let musikryhm3 = document.getElementById("musikryhm3");
    let musikryhm4  = document.getElementById("musikryhm4");
    let valik = "";


    if(musikryhm1.checked){
        valik += musikryhm1.value+", ";
    }
    if(musikryhm2.checked){
        valik += musikryhm2.value+", ";
    }
    if(musikryhm3.checked){
        valik += musikryhm3.value+", ";
    }

    if(musikryhm4.checked){
        valik += musikryhm4.value+", ";
    }
    vastus1.innerHTML = "Sinu valitud muusikud: " + valik;
}

function arvatesMusic(){
    let vastus2 = document.getElementById("vastus2");
    let musik = document.getElementById("musik");
    let valik = "";

    valik += musik.value;

    vastus2.innerHTML = "Sinu valitud muusikud: " + valik;
}
function tundMusic(){
    let vastus3 = document.getElementById("vastus3");
    let tund = document.getElementById("musiktund");
    let valik = "";

    valik += tund.value;

    vastus3.innerHTML = "Sa kuulad muusikat [ "+ valik +"] tundi päevas" ;

}
function radioInp(){
    let vastus4=document.getElementById("vastus4");
    let jah = document.getElementById("jah");
    let ei = document.getElementById("ei");
    let valik = ""
    if(jah.checked){
        let valik = jah.value;
        vastus4.innerHTML="Raadio kuulamine: "+ valik;
    }
    else if(ei.checked){
        let valik = ei.value;
        vastus4.innerHTML="Raadio kuulamine: "+ valik;
    }
    else{
        vastus4.innerHTML="Raadio kuulamine: ---"+ valik;
    }

}

function kysi5(){
    let vastus5 = document.getElementById("vastus5");
    let kysi5 = document.getElementById("kysi5");
    let valik = "";

    valik += kysi5.value;

    vastus5.innerHTML = "Sinu nimetatud jaamad: " + valik;
}

function muusikaLiikValik(){
    let vastus6 = document.getElementById("vastus6");
    let select = document.getElementById("muusikaliik");
    
    if(select.value){
        vastus6.innerHTML = "Sa kuulad kõige rohkem: " + select.value;
    } else {
        vastus6.innerHTML = "";
    }
}

function puhasta(){
    // Puhasta checkboxid
    document.getElementById("musikryhm1").checked = false;
    document.getElementById("musikryhm2").checked = false;
    document.getElementById("musikryhm3").checked = false;
    document.getElementById("musikryhm4").checked = false;
    
    // Puhasta radio nupud
    document.getElementById("jah").checked = false;
    document.getElementById("ei").checked = false;
    
    // Puhasta input väljad
    document.getElementById("musik").value = "";
    document.getElementById("musiktund").value = "";
    document.getElementById("kysi5").value = "";
    document.getElementById("muusikaliik").value = "";
    
    // Puhasta kõik vastused
    for(let i = 1; i <= 9; i++){
        document.getElementById("vastus" + i).innerHTML = "";
    }
    document.getElementById("kokkuvotte").innerHTML = "";
}