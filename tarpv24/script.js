const students = [
    { name: "Igor Aleksejev", url: "https://igoraleksejev24.thkit.ee/" },
    { name: "Illia Blahun", url: "https://illiablahun24.thkit.ee/" },
    { name: "Nikita Gontsarov", url: "https://nikitagontsarov24.thkit.ee/" },
    { name: "Mark Jurgen", url: "https://markjurgen24.thkit.ee/" },
    { name: "Nikita Litvinenko", url: "https://nikitalitvinenko24.thkit.ee/" },
    { name: "Marek Lukk", url: "https://mareklukk24.thkit.ee/" },
    { name: "Nikita Nikiforov", url: "https://nikitanikiforov24.thkit.ee/" },
    { name: "Nikita Orlenko", url: "https://nikitaorlenko24.thkit.ee/" },
    { name: "Milan Petrovski", url: "https://milanpetrovski24.thkit.ee/" },
    { name: "Adriana Pikaljov", url: "https://adrianapikaljov24.thkit.ee/" },
    { name: "Mariia Posvystak", url: "https://mariiaposvystak24.thkit.ee/" },
    { name: "Roman Prikaztsikov", url: "https://romanprikaztsikov24.thkit.ee/" },
    { name: "Artjom Poldsaar", url: "https://artjompoldsaar24.thkit.ee/" },
    { name: "Anastasiia Radasheva", url: "https://anastasiiaradasheva24.thkit.ee/" },
    { name: "Oleksandra Ryshniak", url: "https://oleksandraryshniak24.thkit.ee/" },
    { name: "Martin Rossakov", url: "https://martinrossakov24.thkit.ee/" },
    { name: "Khussein Takhmazov", url: "https://khusseintakhmazov24.thkit.ee/" },
    { name: "Maksim Tsikvasvili", url: "https://maksimtsikvasvili24.thkit.ee/" },
    { name: "Roman Zaitsev", url: "https://romanzaitsev24.thkit.ee/" }
];

const container = document.getElementById("link");

students.forEach(student => {
    container.innerHTML += `<div><a href="${student.url}" target="_blank" rel="noopener noreferrer">${student.name}</a></div>`;
});