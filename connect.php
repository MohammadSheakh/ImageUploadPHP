<?php
$con = new mysqli("localhost", "root", "", "php_basic_crud"); // as i am not changing my password so empty
// last one is database name 

if($con){
    echo "Connection Successful";
}else{
    // show me an error 
    die(mysqli_error($con));
}
// logic ta amra evabe likhbo je .. error hoile tumi amake ei error ta dekhao 
