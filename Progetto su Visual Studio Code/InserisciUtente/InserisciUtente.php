<?php
    session_start();
?>
<html>

    <head>

        <title>INSERISCI UTENTE</title>
    </head>


    <body>
    <br><br>
    <table align="center" bgcolor="white">
        <td>
        
        <form method="POST" action="Registrazione.php" id="registrazione" name="registrazione" enctype="multipart/form-data">
            <div>
                <p align="center"> 

                        <label for="CF" class="labels">Codice Fiscale: </label>
                        <input type="text" maxlength="15" required name="CF" id="CF"><br><br>

                        <label for="dataNascita" class="labels">Data di nascita: </label> 
                        <input type="date" required name="dataNascita" id="dataNascita"><br><br>

                        <label for="email" class="labels">E-mail: </label>
                        <input type="email" maxlength="30" name="email" id="email" required><br><br>

                        <label for="nome" class="labels">Nome: </label>
                        <input type="text" maxlength="20" required name="nome" id="nome"><br><br>
                        
                        <label for="cognome" class="labels">Cognome: </label> 
                        <input type="text" maxlength="20" required name="cognome" id="cognome"><br><br>

                        <label for="Via" class="labels" >Via:</label>
                        <select name="Via" id="Via">
                            <option value="nessuna" selected>Vuoto</option>
                            <option>Via prova-1-171</option>
                            <option>Via prova-2-191</option>
                            <option>Via prova-3-191</option>
                            <option>Via prova-4-191</option>
                            <option>Via prova-5-121</option>
                            <option>Via prova-6-121</option>
                            <option>Via prova-7-121</option>
                            <option>Via prova-8-171</option>
                            <option>Via prova-9-111</option>
                            <option>Via prova-10-122</option>
                        </select>  <br><br>

                        <label for="citta" class="labels" >Città:</label>
                        <select name="citta" id="citta">
                            <option value="nessuna" selected>Vuoto</option>
                            <option>Bologna</option>
                            <option>Firenze</option>
                            <option>Milano</option>
                            <option>Napoli</option>
                            <option>Roma</option>
                        </select>  <br><br>

                        <label for="nickname" class="labels">NickName: </label>
                        <input type="text" maxlength="20" required name="nickname" id="nickname"><br><br>
                        
                        <label for="conto" class="labels">Conto: </label>
                        <input type="text" name="conto" id="conto"><br><br>

                        <label for="telefono" class="labels">Telefono: </label>
                        <input type="text" name="telefono" id="telefono"><br><br>

                    <input type="reset" value="Reset"> &nbsp;&nbsp; 
                    <input type="submit" name="registerButton" value="Conferma"> 
                </p>
            </div>
        </form>
        </td>
        </table>

    </body>

</html>