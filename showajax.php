

<?php

$servername = "localhost";
$username = "root";
$password = "12345";
$db = "db";
$link = mysqli_connect($servername, $username, $password, $db);
if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
}
echo "" . PHP_EOL;
?>

<?php
echo "<table border='1' style='background-color: lightgray' cellpadding='3px' cellspacing='5px' id='rowv'>";
if(isset($_POST['id'])) {

    $id = $_POST['id'];
    $sql_q = "select * from student WHERE id=$id";

    $results = $link->query($sql_q);
    $field_count = mysqli_field_count($link);
    for ($i = 0; $i < $field_count; $i++) {
        $fieldx = mysqli_fetch_field($results);
        echo "<td> {$fieldx->name}</td>";

    }


    while ($rowx = mysqli_fetch_row($results)) {


        echo "</br>";
        echo "<tr>";
        echo "<td>{$rowx['0']}</td>";
        echo "<td>{$rowx['1']}</td>";
        echo "<td>{$rowx['2']}</td>";
        echo "<td>{$rowx['3']}</td>";
        echo "<td>{$rowx['4']}</td>";
        echo "<td>{$rowx['5']}</td>";
        echo "<td>{$rowx['6']}</td>";
        echo "</tr>";

    }
    echo "</table>";
}

?>
