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

            $codice_annuncio = $_POST['codice'];
            $compratore = $_POST['compratore'];

            $result = mysqli_query($conn,"select distinct(CF) from soggetto as s, annuncio as a, annuncioacquistato as ac
            where $codice_annuncio = a.codice
            and a.Soggetto = s.CF;"); 
            if (!$result) {
                echo 'Could not run query: ' . mysql_error();
                exit;
            }
            $row = mysqli_fetch_row($result);
            
            if (!mysqli_query($conn,"insert into annuncioacquistato(DataOra,Annuncio,Soggetto)
            values(NOW(),'$codice_annuncio','$compratore');") || (!mysqli_query($conn,"insert into annunciovenduto(DataOra,Annuncio,Utente)
            values(NOW(),'$codice_annuncio','$row[0]');"))) {
                echo("Errore operazione: " . mysqli_error($conn));
              }
            else{
                header ('Location: ..\PaginaPrincipale.php');
            }





            $conn->close();

        ?>
    </body>
</html>