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
if (isset($_POST['sub'])) {
    echo "";
} else {
    $query = "SELECT * FROM student LIMIT 5";
    if (!$query)
        echo "e";
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
?>

<?php
if (isset($_POST['sub'])) {
    $count++;
    $query5 = "SELECT * FROM student LIMIT 5 OFFSET 5";
    if (!$query5)
        echo "e";
    $result5 = $link->query($query5);
    $field_count5 = mysqli_field_count($link);
    echo "<table border='1'><tr>";
    for ($i = 0; $i < $field_count5; $i++) {
        $field5 = mysqli_fetch_field($result5);
        echo "<td>{$field5->name}</td>";
    }
    echo "</tr>\n";
    while ($row5 = mysqli_fetch_row($result5)) {
        echo "<tr>";
        foreach ($row5 as $cell5) {
            echo "<td>$cell5</td>";
        }
        echo "</tr>\n";
    }
}

?>
<?php

if (isset($_POST['sub'])) {
    $query10 = "SELECT * FROM student LIMIT 10 OFFSET 5";
    if (!$query10)
        echo "e";
    $result10 = $link->query($query10);
    $field_count10 = mysqli_field_count($link);
    echo "<table border='1'><tr>";
    for ($i = 0; $i < $field_count10; $i++) {
        $field10 = mysqli_fetch_field($result10);
        echo "<td>{$field10->name}</td>";
    }
    echo "</tr>\n";
    while ($row10 = mysqli_fetch_row($result10)) {
        echo "<tr>";
        foreach ($row10 as $cell10) {
            echo "<td>$cell10</td>";
        }
        echo "</tr>\n";

    }
}
?>
<form action="first5.php" method="post">
    <input type="submit" name="sub" value="next 5 row">
</body>
</head>
</html>