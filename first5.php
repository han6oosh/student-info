<!DOCTYPE html>
<html>
<head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "12345";
$db = "db";
$count = 0;
$link = mysqli_connect($servername, $username, $password, $db);

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
}
echo "Success " . PHP_EOL;

?>

<?php
$query2="SELECT * FROM student";
$result2 = $link->query($query2);
$row_cnt = mysqli_num_rows($result2);
echo $row_cnt;


?>

<?php
if (isset($_POST['sub']))
for($J=0;$J<$row_cnt;$J++) {

        $query = "SELECT * FROM student LIMIT 5";

        $result = $link->query($query);
        $field_count = mysqli_field_count($link);
        echo "<table border='1'><tr>";
        for ($i = 0; $i < $field_count; $i++) {
            $field = mysqli_fetch_field($result);
            echo "<td>{$field->name}</td>";
        }
        echo "</tr>\n";
        while ($row = mysqli_fetch_row($result)) {
            echo "<tr>";
            foreach ($row as $cell) {
                echo "<td>$cell</td>";
            }
            echo "</tr>\n";
        }
}
$link->close();
?>




<form action="first5.php" method="post">
    <input type="submit" name="sub" value="next 5 row">
</body>
</head>
</html>