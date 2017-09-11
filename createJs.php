<!DOCTYPE html>
<html>
<head>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<body>

<form name="myForm" method="post" id="myformid">

    <label>student id</label> <input type="text" name="st" class="st" id="stid"> <br>
    <label>first name</label> <input type="text" name="first_name" class="first_name" id="fn"> <br>
    <label> secound name</label> <input type="text" name="second_name" class="second_name" id="sn"> <br>
    <label>mobile number</label> <input type="text" name="mobile_number" class="mobile_number" id="mn"> <br>
    <label> age </label> <input type="text" name="age" class="age" id="agee"> <br>
    <input type="submit" id="sub" value="submit" name="submi">


    <script>
        $("#myformid").validate({
            rules: {
                st: {
                    required: true ,
                    number : true
                },
                first_name: {
                    required: true
                },
                second_name: {
                    required: true
                },
                mobile_number: {
                    required : true ,
                    number : true
                },
                age: {
                    required : true ,
                    number:true

                }

            }
        });
    </script>


</form>
</body>
</head>
</html>