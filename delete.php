<!DOCTYPE html>
<html>
<head>
</head>>
<body>


<?php

include 'index.php';
?>

<script>

    </script>
<?php


if(isset($_POST['id'])){
    $id = $_POST['id'];
    $sql_q = "delete from student WHERE id='$id'";
    $result = $link->query($sql_q);
    if ($result) {
        header("location: index.php");

    }
}
?>



</body>

</html>