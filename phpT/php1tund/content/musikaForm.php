<body>

<h1>Küsimused muusika</h1>

<form id="muusikaVorm">
    <table>
        <!-- Esimene: muusikud/ansamblid -->
        <tr>
            <td>
                Milliseid muusikuid/ansambleid sa tead?<br>
                <input type="checkbox" name="valik" id="musikryhm1" value="Ludwig van Beethoven">
                <label for="musikryhm1">Ludwig van Beethoven</label><br>
                <input type="checkbox" name="valik" id="musikryhm2" value="Eminem">
                <label for="musikryhm2">Eminem</label><br>
                <input type="checkbox" name="valik" id="musikryhm3" value="Avicii">
                <label for="musikryhm3">Avicii</label><br>
                <input type="checkbox" name="valik" id="musikryhm4" value="David Guetta">
                <label for="musikryhm4">David Guetta</label>
                <div class="viga" id="viga1">Vali vähemalt üks muusik.</div>
            </td>
        </tr>

        <!-- Mida arvad muusika kuulamisest koolis -->
        <tr>
            <td>
                <label for="musik">Mida arvad muusika kuulamisest koolis?</label><br>
                <textarea name="musik" id="musik" cols="30" rows="5"></textarea>
                <div class="viga" id="viga2">See väli ei tohi olla tühi.</div>
            </td>
        </tr>

        <!-- Mitu tundi päevas kuulad muusikat -->
        <tr>
            <td>
                <label for="musiktund">Mitu tundi päevas sa kuulad muusikat?</label><br>
                <input type="number" id="musiktund" min="0" max="24">
                <div class="viga" id="viga3">Sisesta number 0–24.</div>
            </td>
        </tr>

        <!-- Kas kuulad raadiot -->
        <tr>
            <td>
                Kas sa kuulad raadiot?<br>
                <input type="radio" name="raadio" id="jah" value="Jah">
                <label for="jah">Jah</label>
                <input type="radio" name="raadio" id="ei" value="Ei">
                <label for="ei">Ei</label>
                <div class="viga" id="viga4">Vali üks vastus.</div>
            </td>
        </tr>

        <!-- Milliseid raadiojaamu oskad nimetada -->
        <tr>
            <td>
                <label for="kysi5">Milliseid raadiojaamu oskad nimetada?</label><br>
                <input type="text" id="kysi5">
                <div class="viga" id="viga5">See väli ei tohi olla tühi ja sisaldada ainult tähti.</div>
            </td>
        </tr>

        <!-- Millist muusikat kuulad -->
        <tr>
            <td>
                <label for="muusikaliik">Millist muusikat sa kõige rohkem kuulad?</label><br>
                <select id="muusikaliik">
                    <option value="">Vali muusika liik</option>
                    <option value="Pop">Pop</option>
                    <option value="Rock">Rock</option>
                    <option value="Klassikaline">Klassikaline</option>
                    <option value="Jazz">Jazz</option>
                    <option value="Elektronika">Elektronika</option>
                    <option value="Hip-hop">Hip-hop</option>
                </select>
                <div class="viga" id="viga6">Vali muusika liik.</div>
            </td>
        </tr>

        <!-- Nupud -->
        <tr>
            <td>
                <button type="submit">Saada</button>
                <button type="button" id="puhasta">Puhasta</button>
            </td>
        </tr>
    </table>
</form>