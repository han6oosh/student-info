<!DOCTYPE html>
<html>
<head>
  <body>
    <?php
    $servername="localhost";
    $username="root";
    $password="123456";
    $db="db";

    $link = mysqli_connect($servername,$username,$password,$db);

    if (!$link) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
      }
      echo "Success " . PHP_EOL;

        ?>

<?php

$query="SELECT * FROM student";
if(!$query)
echo "e";
$result = $link->query($query);
$field_count =mysqli_field_count ($link);
echo "<table border='1'><tr>";
for($i=0; $i<$field_count; $i++)
{
    $field =mysqli_fetch_field($result);
    echo "<td>{$field->name}</td>";
}
echo "</tr>\n";
while($row = mysqli_fetch_row($result))
{
     echo "<tr>";
     foreach ($row as $cell)
      {
              echo "<td>$cell</td>";
     }
    echo "</tr>\n";
  }
?>
</body>
</head>
</html>
