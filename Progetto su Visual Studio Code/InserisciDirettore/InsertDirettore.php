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
            $direttore = $_POST['direttore'];

            $sql = "insert into direttore(Dipendente)
            values('$direttore');";

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