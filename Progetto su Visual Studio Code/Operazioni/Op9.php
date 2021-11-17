<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
}

th, td {
  padding: 10px;
}
</style>
</head>
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

$sql = "select ac.Soggetto, av.Utente, ann.codice from annuncioacquistato as ac, annunciovenduto as av, Annuncio as ann
where ac.Annuncio = av.Annuncio
and ac.Soggetto != av.Utente
and ac.Annuncio = ann.codice
and av.Annuncio = ann.codice

and ac.Soggetto not in (select CF from soggetto as sog where sog.Città != any (select Città from soggetto as sog2 where sog2.CF = av.Utente));

";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  echo "<table><tr>";
  if ($result = mysqli_query($conn , $sql)) {

    // Get field information for all fields
    $fieldinfo = mysqli_fetch_fields($result);
  
    foreach ($fieldinfo as $val) {
      echo "<td>";
      printf($val->name);
      echo "</td>";
    }
}
echo "</tr>";
  while($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($row as $col_value){
            echo "<td>$col_value</td>";
        }
        echo "</tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
?> 
</html>