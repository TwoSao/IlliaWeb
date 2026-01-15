
function puhasta() {
    const MyCanva = document.getElementById("MyCanva");
    if (MyCanva.getContext) {
        const ctx = MyCanva.getContext("2d");
        ctx.clearRect(0, 0, MyCanva.width, MyCanva.height);
    }
}

function pilt() {
    const MyCanva = document.getElementById("MyCanva");
    if (MyCanva.getContext) {
        const ctx = MyCanva.getContext("2d");
        const img = new Image();
        img.src = "img_1.png";
        img.onload = function () {
            ctx.drawImage(img, 0, 0, 400, 600);
        };
    }
}

function elka() {
    const MyCanva = document.getElementById("MyCanva");
    if (MyCanva.getContext) {
        const ctx = MyCanva.getContext("2d");
        
        // Ствол ёлки
        ctx.fillStyle = "#8B4513";
        ctx.fillRect(190, 450, 20, 60);
        
        // Три треугольника для ёлки
        ctx.fillStyle = "#228B22";
        
        // Верхний треугольник
        ctx.beginPath();
        ctx.moveTo(200, 200);
        ctx.lineTo(150, 300);
        ctx.lineTo(250, 300);
        ctx.closePath();
        ctx.fill();
        
        // Средний треугольник
        ctx.beginPath();
        ctx.moveTo(200, 270);
        ctx.lineTo(140, 380);
        ctx.lineTo(260, 380);
        ctx.closePath();
        ctx.fill();
        
        // Нижний треугольник
        ctx.beginPath();
        ctx.moveTo(200, 350);
        ctx.lineTo(130, 460);
        ctx.lineTo(270, 460);
        ctx.closePath();
        ctx.fill();
    }
}

function zvezda() {
    const MyCanva = document.getElementById("MyCanva");
    if (MyCanva.getContext) {
        const ctx = MyCanva.getContext("2d");
        
        // Звезда на верхушке
        ctx.fillStyle = "#FFD700";
        ctx.beginPath();
        ctx.moveTo(200, 180);
        ctx.lineTo(205, 195);
        ctx.lineTo(220, 195);
        ctx.lineTo(210, 205);
        ctx.lineTo(215, 220);
        ctx.lineTo(200, 210);
        ctx.lineTo(185, 220);
        ctx.lineTo(190, 205);
        ctx.lineTo(180, 195);
        ctx.lineTo(195, 195);
        ctx.closePath();
        ctx.fill();
    }
}

function snezinka() {
    const MyCanva = document.getElementById("MyCanva");
    if (MyCanva.getContext) {
        const ctx = MyCanva.getContext("2d");

        for (let i = 0; i < 8; i++) {
            let x = Math.random() * 400;
            let y = Math.random() * 600;
            let radius = Math.random() * 4 + 3;
            
            ctx.beginPath();
            ctx.arc(x, y, radius, 0, 2 * Math.PI);
            ctx.fillStyle = "white";
            ctx.fill();
            ctx.strokeStyle = "#B0E0E6";
            ctx.lineWidth = 1;
            ctx.stroke();
        }
    }
}

function podarki() {
    const MyCanva = document.getElementById("MyCanva");
    if (MyCanva.getContext) {
        const ctx = MyCanva.getContext("2d");
        
        // Подарок 1 (красный)
        ctx.fillStyle = "#DC143C";
        ctx.fillRect(100, 480, 40, 30);
        ctx.fillStyle = "#FFD700";
        ctx.fillRect(100, 485, 40, 5);
        ctx.fillRect(115, 480, 10, 30);
        
        // Подарок 2 (зелёный)
        ctx.fillStyle = "#32CD32";
        ctx.fillRect(260, 490, 35, 25);
        ctx.fillStyle = "#FF69B4";
        ctx.fillRect(260, 495, 35, 4);
        ctx.fillRect(272, 490, 8, 25);
        
        // Подарок 3 (синий)
        ctx.fillStyle = "#4169E1";
        ctx.fillRect(320, 485, 30, 28);
        ctx.fillStyle = "#FFD700";
        ctx.fillRect(320, 490, 30, 4);
        ctx.fillRect(330, 485, 8, 28);
    }
}

function novyiGod() {
    const MyCanva = document.getElementById("MyCanva");
    if (MyCanva.getContext) {
        const ctx = MyCanva.getContext("2d");
        
        ctx.font = "bold 28px Arial";
        ctx.fillStyle = "#ffffff";
        ctx.strokeStyle = "#8B0000";
        ctx.lineWidth = 2;
        ctx.textAlign = "center";
        ctx.fillText("Head uut aastat!", 200, 80);
        ctx.strokeText("Head uut aastat!", 200, 80);
    }
}

function koikKoos(){
    const MyCanva = document.getElementById("MyCanva");
    if (MyCanva.getContext) {
        const ctx = MyCanva.getContext("2d");
        let img = new Image();
        img.src = "img_1.png";
        img.onload = function () {
            ctx.drawImage(img, 0, 0, 400, 600);
            elka();
            zvezda();
            snezinka();
            podarki();
            novyiGod();

        }
    }
}