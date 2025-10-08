function showDate() {
    var now = new Date();
    var date = now.getDate() + "." + (now.getMonth() + 1) + "." + now.getFullYear();
    var time = now.getHours() + ":" + "0" +  now.getMinutes();
    let result = document.getElementById("result");
    result.innerHTML = "Kuupäev: " + date + "<br>Kellaaeg: " + time + "<br>Kuupäev ja kellaaeg: " + date + " " + time;
    
    console.log(date);
    console.log(time);
    console.log(date + " " + time);
}

function daysToBirthday() {
    const now = new Date();
    let birthday = new Date(now.getFullYear(), 6, 15); // 15 июля

    if (birthday < now) {
        birthday = new Date(now.getFullYear() + 1, 6, 15);
    }

    const ms = birthday.getTime() - now.getTime();
    const days = ms / (1000 * 60 * 60 * 24);

    const result = document.getElementById("result");
    result.textContent = "Sünnipäevani: " + days + " päeva";
}