<html>
    <head>
        <title>PUBBLICA ANNUNCIO</title>
    </head>

    <body>
        <form method="POST" action="Pubblica.php">
            
            Periodo Usato <select name="periodo_usato" id="periodo_usato">
                <option selected>VUOTO</option>
                <option>meno di 1 mese</option>
                <option>meno di 6 mesi</option>
                <option>meno di 1 anno</option>
                <option>più di 1 anno</option>
                <option>nuovo</option>
            </select><br><br>

            Prezzo :<input type="text" name="prezzo"><br><br>

            Descrizione <br><textarea cols=20 rows="2" wrap="phisical" name="descrizione" id="descrizione"></textarea> <br><br>

            CF del Soggetto che vuole pubblicare <input type="text" name="soggetto"><br><br>

            Categoria <select name="categoria" id="categoria">
                <option selected>VUOTO</option>
                <option>felpa</option>
                <option>maglietta</option>
                <option>pantaloni</option>
                <option>scarpe</option>
            </select><br><br>

            Inserisci FOTO<input type="text" name="foto"><br><br>

            <input type="submit" value="Conferma"><br><br>
            <input type="reset" value="Annulla"><br><br>

        </form>
    </body>

</html>