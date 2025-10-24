

let rammatukogu = {
    raamatud: [
        {pealkiri: "Javascript Raaamat", autor: "Illia B.", aasta: 2025, kirjeldus: "Raaamat on õppimiseks"},
        {pealkiri: "Python Raaamat", autor: "Mark J.", aasta: 2005, kirjeldus: "Raaamat on õppimiseks"},
        {pealkiri: "Java Raaamat", autor: "Roman Z.", aasta: 2022, kirjeldus: "Raaamat on õppimiseks"}
    ],
    kuvatud: function() {
        let tekst = "";
        for (let i = 0; i < this.raamatud.length; i++){
            let r = this.raamatud[i];
            tekst += r.pealkiri + " | " + r.autor + " | " + r.aasta + " | " + r.kirjeldus + "\n";
        }
        return tekst;
    },
    lisaRaamat: function(raamat) {
        this.raamatud.push(raamat);
    },
    naitaRaamat: function(){
        return "Raamatute koguarv: " + this.raamatud.length;
    },
    naitaRaamat2k: function(){
        let koik = 0;
        for(let i = 0; i < this.raamatud.length; i++){
            if(this.raamatud[i].aasta > 2000){
                koik++;
            }
        }
        return "Raamatute arv, mis on noorem kui 2000 aasta: " + koik;
    },
    kustutaRaamat: function(raamat){
        for(let i = 0; i < this.raamatud.length; i++){
            if(this.raamatud[i].pealkiri == raamat){
                this.raamatud.splice(i, 1);
                break;
            }
        }
    }
};


function kuvaRaamatud(){
    document.getElementById('valjund').textContent = rammatukogu.kuvatud();
}


function lisaUus(){
    let uus = {
        pealkiri: document.getElementById('pealkiri').value,
        autor: document.getElementById('autor').value,
        aasta: Number(document.getElementById('aasta').value),
        kirjeldus: document.getElementById('kirjeldus').value
    };
    rammatukogu.lisaRaamat(uus);
    document.getElementById('valjund').textContent = "Raamat lisatud!";
}


function naitaKoguarv(){
    document.getElementById('valjund').textContent = rammatukogu.naitaRaamat();
}


function naitaUued(){
    document.getElementById('valjund').textContent = rammatukogu.naitaRaamat2k();
}


function kustuta(){
    let nimi = document.getElementById('kustutaNimi').value;
    rammatukogu.kustutaRaamat(nimi);
    document.getElementById('valjund').textContent = "Kui raamat olemas, see kustutatud.";
}