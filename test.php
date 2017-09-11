<form method="post" id="myForm" action="">
name <input type="text" name="name" id="name">
<br>
age <input type="text" id="age">
<input type="button" id="sub" name="age" onclick="myfun()" value="sub">
    <div id="d1"></div>
</form>
    <script type="text/javascript">
function myfun() {
    var xml=new XMLHttpRequest();
    xml.open("GET","ajax.php?name="+document.getElementById("name").value+"&age="+document.getElementById("age").value,false);
    xml.send(null);
    document.getElementById("d1").innerHTML=xml.responseText;
}
</script>