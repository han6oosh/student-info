<?php
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname="db";
$table="student";
$valid_submit = true;
$valid_numric=true;
$valid_found=false;
$valid_keep=true;
$valid_check=false;
$conn = new mysqli($servername, $username, $password,$dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "";
?>
<!DOCTYPE html>
<html>
<head>
<body>

<form method="post" >


stid: <input type ="text" name ="stid" placeholder="Enter your SID" value= "<?php
if(isset($_POST['stid']))
echo $_POST['stid'] ;

?>">
</br>
<?php
if(isset($_POST['stid']) && $_POST['stid']==='')
{

echo '<font size="2" color="red"> *the student id is required </font> ';
echo "</br>";
}elseif(isset($_POST['stid']) && !is_numeric($_POST['stid']))
{
$valid_numric=false;
echo '<font size="2" color="red"> *the student id must be number </font> ';
echo "</br>";
}elseif(isset($_POST['stid']))
{
  $stid = $_POST['stid'];
}
 ?>

first name : <input type ="text" name ="fname" placeholder="Enter your First name" value=
"<?php
if(isset($_POST['fname']))
  echo $_POST['fname'];
?>">
</br>

<?php
if(isset($_POST['fname']))
{
  $valid_found=true;
$fname=$_POST['fname'];
if($fname=="")
{
  $valid_submit = false;
echo '<font size="2" color="red"> *the first name is required </font> ';
echo "</br>";
}}
?>


secound name : <input type ="text" name ="sname" placeholder="Enter your secound name" value=
"<?php
if(isset($_POST['sname']) )
echo $_POST['sname'];
 ?>">


</br>

<?php
if(isset($_POST['sname']))
{
  $valid_found=true;
$sname=$_POST['sname'];
if($sname=="")
{
  $valid_submit = false;
echo '<font size="2" color="red"> *the secound name is required </font> ';
echo "</br>";
}}
?>


mobile number :
<input type ="text" name ="mobilenumber" placeholder="Enter your mobile number" value="<?php echo (isset($_POST['mobilenumber']))?$_POST['mobilenumber']:'';?>">
</br>

<?php
if(isset($_POST['mobilenumber']) && $_POST['mobilenumber']==='')
{
echo '<font size="2" color="red"> *the mobile number is required </font> ';
echo "</br>";
}elseif(isset($_POST['mobilenumber']) && !is_numeric($_POST['mobilenumber']))
{
$valid_numric=false;
echo '<font size="2" color="red"> *the  mobile number must be number </font> ';
echo "</br>";
}elseif(isset($_POST['mobilenumber'])){
  $mobile = $_POST['mobilenumber'];
}
?>


age : <input type ="text" name ="nage" placeholder="Enter your SID" value=
"<?php
if(isset($_POST['nage']))
  echo $_POST['nage'];
?>">
</br>
<?php
if(isset($_POST['nage']) && $_POST['nage']==='')
{
echo '<font size="2" color="red"> *the age is required </font> ';
}elseif(isset($_POST['nage']) && !is_numeric($_POST['nage']))
{
$valid_numric=false;
echo '<font size="2" color="red"> *the age must be number </font> ';
echo "</br>";
}elseif(isset($_POST['nage'])){
  $age = $_POST['nage'];
}
?>
</br>
<Input type = 'Radio' Name ='male' value="male">Male
<Input type = 'Radio' Name ='female' value="female">female
<?php
if (isset($_POST['male']))
$male=$_POST['male'];
else {
$male="0";
}
if (isset($_POST['female']))
$female=$_POST['female'];
else {
  $female="0";
}
 ?>


</br>
<input type="submit" name = "sub" >

<?php


if($valid_submit && isset($_POST) && $valid_numric && $valid_found)
{
$valid_keep=true;
  $sql = "INSERT INTO student(stid,first_name, secound_name, mobile_number, age, male_gender, female_gender) VALUES ('$stid','$fname','$sname','$mobile','$age','$male','$female')";

  if ($conn->query($sql) === TRUE){
      echo "success";
   }else{
     echo "</br>";
     echo "Error: " . $sql . "<br>" . $conn->error;
  }
}  elseif(isset($_POST)) {
    echo "</br>";
}

     $conn->close();
?>


</body>
</head>
</html>
