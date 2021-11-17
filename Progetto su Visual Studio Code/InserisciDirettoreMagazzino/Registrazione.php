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

            $CF = $_POST['CF'];
            $dataNascita = $_POST['dataNascita'];
            $email = $_POST['email'];
            $nome = $_POST['nome'];
            $cognome = $_POST['cognome'];
            $indirizzo = $_POST['Via'];

            $saldo = $_POST['conto'];

            $telefono = $_POST['telefono'];
            
            $array = str_split($indirizzo);

            $cont=0;

            $Via='';
            $civico='';
            $CAP='';

            foreach($array as $x){
                if($cont==0){
                    if($x!='-'){
                        $Via .= $x;
                    }
                    else {
                        $cont = $cont +1;
                    }
                }
                elseif($cont==1){
                    if($x!='-'){
                        $civico .= $x;
                    }
                    else{
                        $cont = $cont +1;
                    }
                }
                else{
                    $CAP .= $x;
                }
            }

            $città = $_POST['citta'];

            $nickname = $_POST['nickname'];

            $sql = "insert into soggetto(CF,DataNascita,email,nome,cognome,Via,civico,CAP,Città)
            values ('$CF','$dataNascita','$email','$nome','$cognome','$Via','$civico','$CAP','$città');";
            mysqli_query($conn,$sql);

            $sql = "insert into direttoremagazzino(licenza,Soggetto)
            values (1,'$CF');";

            if(!mysqli_query($conn,$sql)){
                echo("Errore operazione: " . mysqli_error($conn));
            }
            else{

                $sql = "insert into conto(saldo,Soggetto)
                values ('$saldo','$CF');";

                mysqli_query($conn,$sql);

                $sql = "insert into movimento(importo,DataOra,Conto)
                values(0,NOW(),LAST_INSERT_ID());";

                mysqli_query($conn,$sql);

                $sql = "insert into telefono(num,Soggetto)
                values('$telefono','$CF');";

                mysqli_query($conn,$sql);

                $conn->close();
                header ('Location: ..\PaginaPrincipale.php');
            }

        ?>
    </body>
</html>