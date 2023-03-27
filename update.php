<?php

include 'connect.php';
$id = $_GET['updateid']; // query parameter theke value nilam

// ekhane amra ekta query likhbo .. ei id er against e .. tar shob field er value 
// database theke niye ashbo 
$sql = "Select * from `php_basic_crud`.`crud` where id=$id";
// we want to execute the query
$result = mysqli_query($con, $sql);

$row = mysqli_fetch_assoc($result); // i want only once .. not in the while loop

$id= $row['id'];
$name= $row['name']; // row theke data gula access kortesi 
$email= $row['email']; // 'email' // eita hocche amar table er column field  
$gender= $row['gender'];
$dob= $row['dob'];
$amount= $row['amount'];
$file= $row['file'];

if(isset($_POST['submit'])){
    // form e POST method pass kora hoyechilo .. eta jodi submit hoy
    // taile database e data entry dibo 
    $name = $_POST['name']; // name attribute gula pass korbo 
    $email = $_POST['email'];
    $gender= $_POST['gender'];
    $dob = $_POST['dob'];
    $amount = $_POST['amount'];
    $file = $_POST['file'] ?? " ";

    // write update query
    $sql = "update `php_basic_crud`.`crud` set id=$id, name= '$name', email='$email' , gender='$gender' , dob='$dob', amount='$amount' where id=$id ";
    // to execute this query 
    $result = mysqli_query($con, $sql); // connection and query variable 
    // this method will allow us to execute this query
    if($result){
        // if query has execute successfully 
        // echo "Data updated successfully" ; // show me this 
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
        <form action="" method="post">
            <div style="display:flex">
            <h3>enter your name : </h3>
            <input value=<?php echo $name;?> autocomplete="off" id="name" name="name"  style="height:20px; margin-top:17px"/>
            <!-- uporer POST er moddhe jeita pass kortesi .. sheita ei name attribute er shathe milte hobe  -->
            </div>

            <div style="display:flex">
            <h3>enter your email : </h3>
            <input value=<?php echo $email;?>  autocomplete="off" type="text" id="email" name="email" style="height:20px; margin-top:17px"/>
            </div>

            <div style="display:flex">
            <h3>Gender : </h3>
            <input  value=<?php echo $gender;?>  autocomplete="off" type="text" id="mobile" name="mobile" style="height:20px; margin-top:17px"/>
            </div>

            <div style="display:flex">
            <h3>Date of birth : </h3>
            <input  value=<?php echo $dob;?>  autocomplete="off" type="date" id="dob" name="dob" style="height:20px; margin-top:17px"/>
            </div>

            <div style="display:flex">
            <h3>Amount : </h3>
            <input autocomplete="off" value=<?php echo $amount;?> type="number" id="amount" name="amount" style="height:20px; margin-top:17px"/>
            </div>

            <div style="display:flex">
            <h3>File : </h3>
            <input autocomplete="off" value=<?php echo $file;?> type="file" id="file" name="file" style="height:20px; margin-top:17px"/>
            </div>

            <button type="submit" name="submit"> Update Information</button>

            <div>
            
        </div>
        
            
        </form>
        <a href="displayInformation.php"><button>Display Information</button></a> 
    </div>
</body>
</html>