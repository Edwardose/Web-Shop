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
            
            echo $codice_annuncio;
            echo "<br>";
            echo $compratore;


            $result = mysqli_query($conn,"select distinct(CF) from soggetto as s, annuncio as a, annuncioacquistato as ac
            where $codice_annuncio = a.codice
            and a.Soggetto = s.CF;"); 
            if (!$result) {
                echo 'Could not run query: ' . mysql_error();
                exit;
            }
            $row = mysqli_fetch_row($result);

            echo $row[0]; // 42


            //mysqli_query($conn,$sql);

            $conn->close();
        ?>
    </body>
</html>