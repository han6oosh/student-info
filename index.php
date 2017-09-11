<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="table_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="index_style.css">
    <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=IM Fell DW Pica' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
    echo "" . PHP_EOL;
?>

<br>
<?php
//if(isset($_POST['stid']))
//$stID=$_POST['stid'];
//if(isset($_POST['fname']))
//$first_name=$_GET['fname'];
//if(isset($_POST['sname']))
//$second_name=$_GET['sname'];
//if(isset($_POST['mobile_number']))
//$mobile_number=$_GET['mobilenumber'];
//if(isset($_POST['nage']))
//$age=$_GET['nage'];
//
//
//
//
//?>
<form method="get">
    <div id="main">
        <h3>this form to search on student</h3>
        <br>
        <?php
        $student_id = "";
        if (isset($_GET['search_stid'])) {
            $student_id = $_GET['search_stid'];
        }
        ?>
        <label> student number </label> <input type="search" name="search_stid" value="<?php echo $student_id; ?>">

        </br>
        <?php
        $search_first_name = "";
        if (isset($_GET['search_first_name'])) {
            $search_first_name = $_GET['search_first_name'];
        }
        ?>
        <label> first name</label> <input type="search" name="search_first_name"
                                          value="<?php echo $search_first_name ?>">
        </br>

        <?php
        $search_secound_name = "";
        if (isset($_GET['search_secound_name'])) {
            $search_secound_name = $_GET['search_secound_name'];
        }
        ?>
        <label> secound name </label> <input type="search" name='search_secound_name' value="<?php
        echo $search_secound_name; ?>">


        </br>

        <?php
        $search_mobile_number = "";
        if (isset($_GET['search_mobile_number'])) {
            $search_mobile_number = $_GET['search_mobile_number'];
        }
        ?>
        <label> mobile number </label> <input type="search" name="search_mobile_number"
                                              value="<?php echo $search_mobile_number; ?>">

        </br>
        <label>age</label>
        <?php
        $search_age = "";
        if (isset($_GET['search_age'])) {
            $search_age = $_GET['search_age'];
        }
        ?>


        <select name="search_age">
            <option selected="select.." disabled="disabled"> select..</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
        </select>

        </br>
        <label>paid</label> <input type="checkbox" name="paid">

        <input type="submit" id="subm" name="search_button" value="search">
        </br>
        </br>
        <a href="index.php">Reset</a>
        </br>
        </br>

    </div>
    </br>
    </br>


    <?php
    if (isset($_GET['page'])) {
        $current_page = $_GET['page'];
    } else {
        $current_page = 1;
    }


    $previous_page = $current_page - 1;
    $next_page = $current_page + 1;
    $per_page = 3;
    $start_page = ($current_page - 1) * $per_page;

    $where_params = [];
    if (isset($_GET['search_stid']) && $_GET['search_stid'] != '') {
        array_push($where_params, 'stid=' . $student_id);
    }

    if (isset($_GET['search_first_name']) && $_GET['search_first_name'] != '') {
        array_push($where_params, 'first_name LIKE \'%' . $search_first_name . '%\'');
    }
    if (isset($_GET['search_secound_name']) && $_GET['search_secound_name'] != '') {
        array_push($where_params, 'secound_name LIKE \'%' . $search_secound_name . '%\'');
    }
    if (isset($_GET['search_age']) && $_GET['search_age'] != '') {
        array_push($where_params, 'age =' . $search_age);
    }
    if (isset($_GET['search_mobile_number']) && $_GET['search_mobile_number'] != '') {
        array_push($where_params, 'mobile_number LIKE \'%' . $search_mobile_number . '%\'');
    }
    //    if(!isset($_GET['search_button'])) {
    //        if (isset($_GET['paid'])) {
    //            array_push($where_params, 'paid="yes"');}
    //        } else {
    //            array_push($where_params, 'paid="no"');}


    if ($where_params) {
        echo $query = "SELECT * FROM student WHERE " . implode(' and ', $where_params) . "  LIMIT $start_page ,  $per_page";
        $rows_result = $link->query("SELECT count(*) as rows FROM student WHERE " . implode(' and ', $where_params));

    } else {
        $query = "SELECT * FROM student  LIMIT $start_page ,  $per_page";
        $rows_result = $link->query("SELECT count(*) as rows FROM student");
    }
    $rows = mysqli_fetch_assoc($rows_result);
    $total_row = $rows['rows'];
    $last_page = ceil($total_row / $per_page);
    echo "<div class='page'>";
    echo ' <a href="?page=1&search_first_name=' . $search_first_name . '&search_secound_name=' . $search_secound_name . '&search_mobile_number=' . $search_mobile_number . '&search_age=' . $search_age . '&search_stid=' . $student_id . '&paid="> first </a> |';
    if ($current_page == 1)
        echo "prev";
    else
        echo '<a href= "?page=' . $previous_page . '&search_first_name=' . $search_first_name . '"> <i class="fa fa-arrow-left" aria-hidden="true"></i> </a>';
    if ($current_page == $last_page)
        echo "next";
    else {

        echo '<a href= "?page=' . $next_page . '&search_first_name=' . $search_first_name . '"> <i class="fa fa-arrow-right" aria-hidden="true"></i> </a>';
        echo '<a href= "?page=' . $last_page . '&search_first_name=' . $search_first_name . '"> last </a> |';
        echo "</div>";
    }

    $result = $link->query($query);
    $field_count = mysqli_field_count($link);
    echo "<table id='table' border='1'><tr> ";
    for ($i = 0; $i < $field_count; $i++) {
        $field = mysqli_fetch_field($result);
        echo "<td> {$field->name}</td>";

    }
    echo "</tr>\n";
    echo "</br>";
    echo "</br>";


    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

        foreach ($row as $data) {
            echo "<tr>";
            echo "<td> <a href='update.php?id={$data['id']}' name = 'link1'> {$data['id']} </a> </td>";
            echo "<td>  {$data['stid']}  </td>";
            echo "<td>{$data['first_name']}</td>";
            echo "<td>{$data['secound_name']}</td>";
            echo "<td>{$data['mobile_number']}</td>";
            echo "<td>{$data['age']}</td>";
            echo "<td>{$data['paid']}</td>";
                echo "<td> <a href= ''  id='{$data['id']}' class='delete'  onclick='if(confirm(\"are you sure?\")){ return true }else{ return false;}' ><i class=\"fa fa-close\" style=\"font-size:24px\"></i></a> </td>";

            echo "<td> <a href='' id='{$data['id']}' class='view' name='view'>view  </a>  </td>";

            echo "</tr>";


    }

    ?>
</form>

<!--id='{$data['id']}'-->
<!--    'delete.php?id={$data['id']}'-->
<script>
    $(function(){
        $('.delete').click(function(e){
            e.preventDefault();
            var del_id= $(this).attr('id');
            var rowElement = $(this).parent().parent();

            $.ajax({
                type:'POST',
                data:"id="+del_id,
                url: "delete.php?ajax=1",
                success: function(data){
                    alert('success');
                    if(data) {
                        rowElement.fadeOut(500).remove();
                    }
                    else {

                    }


                }

            });
            return false;
        })
    });
</script>

<script>
    $(function(){
        $('.view').click(function(e){
            e.preventDefault();
            var view_id= $(this).attr('id');


            $.ajax({
                type:'POST',
                data:"id="+view_id,
                datatype:"html",
                url: "showajax.php?ajax=1",
                success: function(data){
//                    alert("the student that id "+view_id);
//                    alert('success');
                   $("#responsecontainer").html(data);

                }

            });
            return false;
        })
    });
</script>




</table>
<a href="create.php"> student info form</a>
</br>
</br>
<a href="create.php">add newstudent </a>
</br>



<?php
function pri($lin, $q)
{

    $result_se = $lin->query($q);
    while ($rowx = mysqli_fetch_row($result_se)) {

        echo "<table border='1'>";
        echo "</br>";
        echo "<tr>";
        echo "<td>{$rowx['0']}</td>";
        echo "<td>{$rowx['1']}</td>";
        echo "<td>{$rowx['2']}</td>";
        echo "<td>{$rowx['3']}</td>";
        echo "<td>{$rowx['4']}</td>";
        echo "<td>{$rowx['5']}</td>";
        echo "</tr>";
        echo "</table>";
    }

}

?>

</br>


</div>
<div id="responsecontainer" align="center"> </div>
</body>
</head>
</html>