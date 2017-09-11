<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="updateS.css">
</head>
<body>
<?php

$servername = "localhost";
$username = "root";
$password = "12345";
$db = "db";
$link = mysqli_connect($servername, $username, $password, $db);
if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
}
echo " " . PHP_EOL;
?>

<form method="post">
    <div id="update">
        <h3> this form for update student information </h3>
    <label> student number </label> <input type="text" name="stid" value=" <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sqq = "select * from student WHERE id = $id";
        $result5 = $link->query($sqq);
        $row = mysqli_fetch_array($result5);
        echo $row['stid'];
    }
    ?>">

    </br>
   <label>first name </label> <input type="text" name="first_name" value="<?php
    if (isset($_POST['sub']))
    {
    $new_first_name=$_POST['first_name'];
    echo $new_first_name;
    }
    elseif(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sqq = "select * from student WHERE id = $id";
        $result5 = $link->query($sqq);
        $row = mysqli_fetch_array($result5);
        echo $row['first_name'];

    }

    ?>">

    </br>
    <label>secound name</label> <input type="text" name="secound_name" value="<?php

    if (isset($_POST['sub']))
    {
        $new_secound_name=$_POST['secound_name'];
        echo $new_secound_name;
    }
    elseif(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sqq = "select * from student WHERE id = $id";
        $result5 = $link->query($sqq);
        $row = mysqli_fetch_array($result5);
        echo $row['secound_name'];
    }
    ?>">
    </br>
   <label>mobile number</label>  <input type="text" name="mobile_number" value="<?php

    if (isset($_POST['sub']))
    {
        $new_mobile_number=$_POST['mobile_number'];
        echo $new_mobile_number;
    }
    elseif(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sqq = "select * from student WHERE id = $id";
        $result5 = $link->query($sqq);
        $row = mysqli_fetch_array($result5);
        echo $row['mobile_number'];
    }
    ?>">
    </br>
    <label>age</label>  <input type="text" name="age" value="<?php
    if (isset($_POST['sub']))
    {
        $new_age=$_POST['age'];
        echo $new_age;
    }
    elseif(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sqq = "select * from student WHERE id = $id";
        $result5 = $link->query($sqq);
        $row = mysqli_fetch_array($result5);
        echo $row['age'];
    }
    ?>">


    <input type="submit" name="sub" value="update">
  </div>
    <?php

    if (isset($_POST['sub'])) {
        $new_student_number = $_POST['stid'];

        $new_first_name = $_POST['first_name'];
        $new_secound_name = $_POST['secound_name'];
        $new_mobile_number = $_POST['mobile_number'];
        $new_age = $_POST['age'];
        $sql = "UPDATE student SET stid='$new_student_number',first_name='$new_first_name',secound_name='$new_secound_name' ,mobile_number='$new_mobile_number' ,age='$new_age' where id=$id";
        $result = $link->query($sql);
        if (!$result) {
            echo "error , the student number exist";
        } else {
            echo "</br>";
            echo "<label id='succ'>updating successfuly</label>";
        }


    }


    ?>


</form>


</body>

</html>