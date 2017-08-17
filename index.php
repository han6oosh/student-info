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

<!DOCTYPE html>

<br>
<input type="search" name="ss" placeholder="search throgh first name" onclick="">
<input type="submit" name="sear" value="search">

<table>


    <?php
    if (isset($_GET['page']))  {
        $current_page = $_GET['page'];
    } else {
        $current_page = 1;
    }
    if (!isset($_POST['sear'])) {
        $previous_page = $current_page - 1;
        $next_page = $current_page + 1;
        $per_page = 5;
        $start_page = ($current_page - 1) * $per_page;

        $query = "SELECT * FROM student LIMIT $start_page ,  $per_page";
        $rows_result = $link->query("SELECT count(*) as rows FROM student");
        $rows = mysqli_fetch_assoc($rows_result);
        $total_row = $rows['rows'];
        $last_page = ceil($total_row / $per_page);
        if (!$query)
            echo "e";
        $result = $link->query($query);
        $field_count = mysqli_field_count($link);
        echo "<table id='table' border='1'><tr>";
        for ($i = 0; $i < $field_count; $i++) {
            $field = mysqli_fetch_field($result);
            echo "<td> {$field->name}</td>";

        }
        echo "</tr>\n";
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($row as $data) {
            echo "<tr>";
            echo "<td> <a href='update.php?id={$data['id']}' name = 'link1'> {$data['id']} </a> </td>";
            echo "<td>{$data['stid']}</td>";
            echo "<td>{$data['first_name']}</td>";
            echo "<td>{$data['secound_name']}</td>";
            echo "<td>{$data['mobile_number']}</td>";
            echo "<td>{$data['age']}</td>";
            echo "<td> <a href='delete.php?id={$data['id']}' onclick='if(confirm(\"are you sure?\")){ return true }else{ return false;}'>Delete</a> </td>";
            echo "<td> <a href='index.php?id={$data['id']}' name='veiw'  >veiw</a> </td>";

            echo "</tr>";
        }
    }
    elseif (isset($_POST['sear']))
    {
echo "hi";
    }
    ?>


    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql_q = "select * from student WHERE id=$id";
        $results = $link->query($sql_q);
        while ($rowx = mysqli_fetch_row($results)) {

            echo "<table border='1'>";
            echo "</br>";
            echo "<tr>";
            echo "<td>{$rowx['0']}</td>";
            echo "<td>{$rowx['1']}</td>";
            echo "<td>{$rowx['2']}</td>";
            echo "<td>{$rowx['3']}</td>";
            echo "<td>{$rowx['4']}</td>";
            echo "</tr>";
            echo "</table>";
        }
    }
    ?>

    <div>
        <a href="?page=1"> first </a> |

        <?php
        if ($current_page == 1)
            echo "prev";
        else
            echo '<a href= "?page=' . $previous_page . '"> prev </a>';

        ?>
        |

        <?php

        if ($current_page == $last_page)
            echo "next";
        else
            echo '<a href= "?page=' . $next_page . '"> next </a>';

        ?>

        <a href="?page=<?php echo $last_page ?>"> last </a> |

    </div>
</table>
<a href="create.php"> student info form</a>
</br>
</br>
<a href="create.php">add new student </a>
</br>

</body>
</head>
</html>