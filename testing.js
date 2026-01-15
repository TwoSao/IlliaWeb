const teostaAJAXPäring = (url, callback) => {
    setTimeout(() => {
        const vastus = "Vastus andmebaasist";
        callback(vastus);
    }, 2000);
};

const callbackFunktsioon = (vastus) => {
    console.log("Vastus saadud:", vastus);
};

teostaAJAXPäring("https://api.example.com/data", callbackFunktsioon);