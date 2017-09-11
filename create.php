<?php
$servername = "localhost";
$username = "root";
$password = "12345";
$dbname = "db";
$table = "student";
$valid_submit = true;
$valid_numric = true;
$valid_found = false;
$valid_keep = true;
$valid_check = false;
$valid = true;
$v = true;
$found_stid = false;
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "";
?>
<?php
if (isset($_GET['ajax'])) {
    $sti = $_POST['stid'];
    $first = $_POST['fname'];
    $second = $_POST['sname'];
    $mobi = $_POST['mobilenumber'];
    $ag = $_POST["nage"];

    $check = "select * from student WHERE stid='$sti'";
    $check_id = mysqli_query($conn, $check);
    $check_rows = mysqli_num_rows($check_id);
    if ($check_rows > 0) {
        echo "student exists";
        exit;

    }
    else {
        $sql = "INSERT INTO student(stid,first_name, secound_name, mobile_number, age,paid ) VALUES ('$sti','$first','$second','$mobi','$ag','yes')";
    }
    if ($conn->query($sql) === TRUE) {
        echo 'success';


    } else {
        $valid = false;
        echo "</br>";
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        echo "</br>";

    }


   exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id="div"></div>

<form method="post" id="myformid">
    <div id="student_info_form">

        <h1>student info form</h1>
        <label> stid :</label> <input type="text" name="stid" id="student" class="st" placeholder="Enter your SID"
                                      value="<?php
                                      if (isset($_POST['stid'])) {
                                          echo $_POST['stid'];
                                      }
                                      ?>">
        </br>
        <?php
        if (isset($_POST['stid']) && $_POST['stid'] === '') {
            $v = false;
            echo '<font size="2" color="red"> *the student id is required </font> ';
            echo "</br>";
        } elseif (isset($_POST['stid']) && !is_numeric($_POST['stid'])) {
            $v = false;
            $valid_numric = false;
            echo '<font size="2" color="red"> *the student id must be number </font> ';
            echo "</br>";
        } elseif (isset($_POST['stid'])) {
            $found_stid = true;
            $stid = $_POST['stid'];
        }
        ?>

        <label> first name :</label> <input type="text" id="first" name="fname" class="first_name"
                                            placeholder="Enter your First name" value=
                                            "<?php
                                            if (isset($_POST['fname']))
                                                echo $_POST['fname'];
                                            ?>">
        </br>

        <?php
        if (isset($_POST['fname'])) {
            $valid_found = true;
            $fname = $_POST['fname'];
            $fname = mysqli_real_escape_string($conn, $fname);
            if ($fname == "") {
                $valid_submit = false;
                echo '<font size="2" color="red"> *the first name is required </font> ';
                echo "</br>";
            }
        }
        ?>


        <label> secound name : </label> <input type="text" name="sname" id="second" class="second_name"
                                               placeholder="Enter your secound name" value=
                                               "<?php
                                               if (isset($_POST['sname']))
                                                   echo $_POST['sname'];
                                               ?>">


        </br>

        <?php
        if (isset($_POST['sname'])) {
            $valid_found = true;
            $sname = $_POST['sname'];
            $sname = mysqli_real_escape_string($conn, $sname);
            if ($sname == "") {
                $valid_submit = false;
                echo '<font size="2" color="red"> *the secound name is required </font> ';
                echo "</br>";
            }
        }
        ?>


        <label> mobile number :</label>
        <input type="text" name="mobilenumber" class="mobile_number" id="mobile" placeholder="Enter your mobile number"
               value="<?php echo (isset($_POST['mobilenumber'])) ? $_POST['mobilenumber'] : ''; ?>">
        </br>

        <?php
        if (isset($_POST['mobilenumber']) && $_POST['mobilenumber'] === '') {
            echo '<font size="2" color="red"> *the mobile number is required </font> ';
            echo "</br>";
        } elseif (isset($_POST['mobilenumber']) && !is_numeric($_POST['mobilenumber'])) {
            $valid_numric = false;
            echo '<font size="2" color="red"> *the  mobile number must be number </font> ';
            echo "</br>";
        } elseif (isset($_POST['mobilenumber'])) {
            $mobile = $_POST['mobilenumber'];
        }
        ?>


        <label> age :</label> <input type="text" name="nage" id="age" class="agee" placeholder="Enter your SID" value=
        "<?php
        if (isset($_POST['nage']))
            echo $_POST['nage'];
        ?>">
        </br>
        <br>
        <label> paid : </label> <input type="checkbox" value="paid" name="paid">

        <?php
        if (isset($_POST['nage']) && $_POST['nage'] === '') {
            echo '<font size="2" color="red"> *the age is required </font> ';
        } elseif (isset($_POST['nage']) && !is_numeric($_POST['nage'])) {
            $valid_numric = false;
            echo '<font size="2" color="red"> *the age must be number </font> ';
            echo "</br>";
        } elseif (isset($_POST['nage'])) {

            $age = $_POST['nage'];

        }
        ?>
        </br>


        </br>
        <input type="submit" id="subm" name="sub" value="enter">
    </div>
</form>


<div id="di"></div>
<?php


if ($valid_submit && isset($_POST) && $valid_numric && $valid_found && $found_stid) {
    $valid_keep = true;
    if (isset($_POST['paid']))
        $paid = 'YES';
    else
        $paid = 'NO';


} elseif (isset($_POST)) {
    echo "</br>";
}

$conn->close();
?>
<a href="index.php" id="href"> to students information </a>


<script>
    $("#myformid").validate({
        rules: {
            stid: {
                required: true,
                number: true
            },
            fname: {
                required: true
            },
            sname: {
                required: true
            },
            mobilenumber: {
                required: true,
                number: true
            },
            nage: {
                required: true,
                number: true
            }

        },
        submitHandler: function (form) {
            var data = $("#myformid").serialize();
            $.ajax({
                data: data,
                type: "post",
                url: "create.php?ajax=1",
                success: function (data) {
                  alert(data);
                  if(data=="success")
window.location="index.php";
                  else
                      return false;
                }
            });
            return false;
        }
    });


</script>
</body>
</html>
