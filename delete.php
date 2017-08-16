<!DOCTYPE html>
<html>
<head>
<body>


<?php

include 'print.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql_q = "delete from student WHERE id='$id'";
    $result = $link->query($sql_q);
    if ($result) {
        header("location: print.php");

    }
}
?>

</body>
</head>
</html>