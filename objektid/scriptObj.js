let rammatukogu = {
    raamatud: [
        {pealkiri: "Javascript Raaamat", autor: "Illia B.", aasta: 2025, kirjeldus: "Raaamat on õppimiseks"},
        {pealkiri: "Python Raaamat", autor: "Mark J.", aasta: 2005, kirjeldus: "Raaamat on õppimiseks"},
        {pealkiri: "Java Raaamat", autor: "Roman Z.", aasta: 2022, kirjeldus: "Raaamat on õppimiseks"}
    ],

    // Kuvab kõik raamatud kenasti konsoolis
    kuvatud: function() {
        let tekst = "";
        this.raamatud.forEach((r) => {
            tekst += r.pealkiri + " | " + r.autor + " | " + r.aasta + " | " + r.kirjeldus + "\n";
        });
        return tekst;
    },

    // Lisab uue raamatu
    lisaRaamat: function(raamat) {
        this.raamatud.push(raamat);
    },

    // Näitab raamatute koguarvu
    naitaRaamat: function() {
        return "Raamatute koguarv: " + this.raamatud.length;
    },

    // Näitab, mitu raamatut on ilmunud pärast 2000. aastat
    naitaRaamat2k: function() {
        let koik = 0;
        this.raamatud.forEach((r) => {
            if (r.aasta > 2000) koik++;
        });
        return "Raamatute arv, mis on ilmunud pärast 2000. aastat: " + koik;
    },

    // Kustutab raamatu pealkirja järgi
    kustutaRaamat: function(raamat) {
        this.raamatud = this.raamatud.filter(r => r.pealkiri !== raamat);
    }
};

let tulemus = "";

rammatukogu.raamatud.forEach((raamat) => {
    tulemus += raamat.pealkiri + " | " + raamat.autor + " | " + raamat.aasta + " | " + raamat.kirjeldus + "<br>";
});

tulemus += "<br>" + rammatukogu.naitaRaamat() + "<br>";

tulemus += rammatukogu.naitaRaamat2k();

let vastus = document.getElementById("vastus");
vastus.innerHTML = tulemus;

    console.log(rammatukogu.kuvatud());
    console.log(rammatukogu.naitaRaamat());
    console.log(rammatukogu.naitaRaamat2k());

