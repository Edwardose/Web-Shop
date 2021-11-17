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

            $periodo_usato = $_POST['periodo_usato'];
            $prezzo = $_POST['prezzo'];
            $descrizione = $_POST['descrizione'];
            $soggetto = $_POST['soggetto'];
            $categoria = $_POST['categoria'];
            $foto = $_POST['foto'];


            
            if (!mysqli_query($conn,"insert into annuncio(DataOra,periodo_usato,prezzo,descrizione,Soggetto,Categoria)
            values(NOW(),'$periodo_usato','$prezzo','$descrizione','$soggetto','$categoria');")
            ) {
                echo("Errore operazione: " . mysqli_error($conn));
              }
            else{
                if(!mysqli_query($conn,"insert into foto(percorso,Annuncio)
                values('$foto',LAST_INSERT_ID());")){echo("Errore operazione: " . mysqli_error($conn));}
                header ('Location: ..\PaginaPrincipale.php');
            }





            $conn->close();

        ?>
    </body>
</html>