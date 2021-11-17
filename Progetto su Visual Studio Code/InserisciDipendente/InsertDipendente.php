<html>
    <body>
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "1234";
            $dbname = "progettobasi";
            
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }
            $cognome = $_POST['cognome'];

            $data = $_POST['data_nascita'];

            $nome = $_POST['nome'];
            
            $CF = $_POST['codice_fiscale'];
            
            $sql = "insert into dipendente(nome,cognome,DataNascita,CF)
            values('$nome','$cognome','$data','$CF');";

            if(!mysqli_query($conn,$sql)){
                echo("Errore operazione: " . mysqli_error($conn));
            }
            else{
                $conn->close();
                header ('Location: ..\PaginaPrincipale.php');
            }

        ?>
    </body>
</html>