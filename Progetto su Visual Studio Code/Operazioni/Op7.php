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

$sql = "select * from dipendente as d, azienda as az, impiegatocorrente imp
where imp.Dipendente = d.CF
and imp.Azienda = az.id
and az.Città = (select Città from SpedizioniPerOgniCittà 
where num_Spedizioni = any 
(select max(num_Spedizioni) from SpedizioniPerOgniCittà));

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