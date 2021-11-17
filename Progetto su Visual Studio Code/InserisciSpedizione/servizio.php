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

            $spedizione = $_POST['codice_spedizione'];
            $dipendente = $_POST['dipendente'];
            $magazzino = $_POST['magazzino'];

            if(!mysqli_query($conn,"insert into servizio(Spedizione,Dipendente,Magazzino) values('$spedizione','$dipendente','$magazzino');")){
                echo("Errore operazione: " . mysqli_error($conn));
            }
            else{
                $conn->close();
                header ('Location: ..\PaginaPrincipale.php');
            }

        ?>
    </body>
</html>