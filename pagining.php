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
$query="SELECT COUNT(*) FROM table";
$limit=5;
$pages = ceil($query / $limit);
$page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
    'options' => array(
        'default'   => 1,
        'min_range' => 1,
    ),
)));
$offset = ($page - 1)  * $limit;


?>

</body>
</head>
</html>