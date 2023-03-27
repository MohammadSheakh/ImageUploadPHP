<?php
// first i want to connect to my database 
// https://www.youtube.com/watch?v=72U5Af8KUpA 13:55
include 'connect.php';

if(isset($_POST['submit'])){
    // form e POST method pass kora hoyechilo .. eta jodi submit hoy
    // taile database e data entry dibo 
    $name = $_POST['name']; // name attribute gula pass korbo 
    $email = $_POST['email'];
    $gender= $_POST['gender'];
    $dob = $_POST['dob'];
    $amount = $_POST['amount'];
    $file = $_FILES['file']['tmp_name'];

    $imgContent = addslashes(file_get_contents($file));

    // get the temporary location of the file
    $image_temp_location = $file['tmp_name'];

    // read the file contents into a variable 
    $image_data = file_get_contents($image_temp_location);

    // write insert query
    $sql = "insert into `php_basic_crud`.`crud`(name, email, gender, dob, amount, file) values('$name', '$email','$gender','$dob', '$amount', '$imgContent')";
    // to execute this query 
    $result = mysqli_query($con, $sql); // connection and query variable 
    // this method will allow us to execute this query
    if($result){
        // if query has execute successfully 
        // echo "Data inserted successfully" ; // show me this 
        // echo er poriborte ami onno ekta page e redirect korte chai .. 
        header('location:displayInformation.php');
    }else{
        // error 
        die(mysqli_error($con));
    }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap add kora jete pare .. othoba tailwind css -->
</head>
<body>
    <div>
        <form action="" method="post" enctype='multipart/form-data'>
            <div style="display:flex">
            <h3>enter your name : </h3>
            <input autocomplete="off" id="name" name="name"  style="height:20px; margin-top:17px"/>
            <!-- uporer POST er moddhe jeita pass kortesi .. sheita ei name attribute er shathe milte hobe  -->
            </div>

            <div style="display:flex">
            <h3>enter your email : </h3>
            <input autocomplete="off" type="text" id="email" name="email" style="height:20px; margin-top:17px"/>
            </div>

            <div style="display:flex">
            <h3>Gender: </h3>
            <input type="radio" id="gender" value="male" name="gender"> 
            <label for="gender">Male</label>

            <input type="radio" id="gender" value="female" name="gender"> 
            <label for="gender">Female</label>
            </div>

            <div style="display:flex">
            <h3>Date Of Birth : </h3>
            <input autocomplete="off" type="date" id="dob" name="dob" style="height:20px; margin-top:17px"/>
            </div>


            <div style="display:flex">
            <h3>Amount : </h3>
            <input autocomplete="off" type="number" id="amount" name="amount" style="height:20px; margin-top:17px"/>
            </div>

            <div style="display:flex">
            <h3>File : </h3>
            <input autocomplete="off" type="file" id="file" name="file" style="height:20px; margin-top:17px"/>
            </div>


            <button type="submit" name="submit"> submit</button>

            <div>
            
        </div>
        
            
        </form>
        <a href="displayInformation.php"><button>Display Information</button></a> 
    </div>
</body>
</html>