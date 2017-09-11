<?php
$servername = "localhost";
$username = "root";
$password = "12345";
$db = "ajax";
$link = mysqli_connect($servername, $username, $password, $db);
if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
}
echo "true" . PHP_EOL;
?>
<?php

$name = $_GET['name'];
$age = $_GET['age'];


$sql = "INSERT INTO form(name , age ) VALUES ('$name','$age')";


if ($link->query($sql) === TRUE) {
    echo "succ";
} else echo "no";


?>

