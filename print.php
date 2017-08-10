<!DOCTYPE html>
<html>
<head>
  <body>
    <?php
    $servername="localhost";
    $username="root";
    $password="12345";
    $db="db";

    $link = mysqli_connect($servername,$username,$password,$db);

    if (!$link) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
      }
      echo "Success " . PHP_EOL;

        ?>

<?php
if(isset($_GET['page']))
    $current_page=$_GET['page'];
    else
        $current_page=1;



$previous_page=$current_page-1;
$next_page=$current_page+1;

$per_page=5;
$start_page=($current_page-1)*$per_page;
$query="SELECT * FROM student LIMIT $start_page,$per_page";
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

    <div>
        <a href= "?page=<?php echo $previous_page ; ?>"> prev </a>
        |
        <a href= "?page=<?php echo $next_page ; ?>"> next </a>
    </div>
</body>
</head>
</html>
