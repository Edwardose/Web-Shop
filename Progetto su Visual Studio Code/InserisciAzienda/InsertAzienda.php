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
            $ragione = $_POST['ragione_sociale'];
            $indirizzo = $_POST['Via'];
            
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

            $nome = $_POST['nome'];            
            
            $sql = "insert into azienda(ragione_sociale,nome,Città,Via,civico,CAP)
            values('$ragione','$nome','$città','$Via','$civico','$CAP');";

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