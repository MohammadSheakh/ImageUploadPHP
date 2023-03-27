<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operation</title>
</head>
<body>
    <div>
        <div>
            <a href="user.php"><button>Add User</button></a> 
        </div>
        
        <div>
            <table>
                <tr>
                    <th style="padding: 8px;">Sl no.</th>
                    <th style="padding: 8px;">FullName</th>
                    <th style="padding: 8px;">Gender</th>
                    <th style="padding: 8px;">Email</th>
                    <th style="padding: 8px;">DOB</th>
                    <th style="padding: 8px;">Amount</th>
                    <th style="padding: 8px;">File</th>
                    <th style="padding: 8px;">Operations</th>
                </tr>
                <!-- here i will be writing my php code ...  -->
                <?php
                    // i want to select all the data from database .. so i write sql query
                    $sql = "Select * from `php_basic_crud`.`crud`"; // query variable 
                    $result = mysqli_query($con, $sql);
                    if($result){
                        // if query has execute successfully 
                        // ekhane ami shob data gula show korbo ////// 
                        // echo "Data inserted successfully" ; // show me this 

                        // $row = mysqli_fetch_assoc($result);
                        // echo $row['name'] ; // i want to echo the name 

                        // while loop use korte hobe ... 
                        while($row = mysqli_fetch_assoc($result)){
                            $id= $row['id'];
                            $name= $row['name'];
                            $email= $row['email'];
                            $gender= $row['gender'];
                            $dob= $row['dob'];
                            $amount= $row['amount'];
                            $file= $row['file'];
                            //header("Content-type:image/jpeg");
                            echo "
                            
                            <tr>
                    <td style='padding: 8px;'>$id</td>
                    <td style='padding: 8px;'>$name</td>
                    <td style='padding: 8px;'>$email</td>
                    <td style='padding: 8px;'>$gender</td>
                    <td style='padding: 8px;'>$dob</td>
                    <td style='padding: 8px;'>$amount</td>
                    <td style='padding: 8px;'>
                     $file
                    
                    
                    
                    </td>
                    <td style='padding: 8px;'>
                        <button><a href='update.php?updateid=".$id."'>Update</a></button> 
                        <button><a href='delete.php?deleteid=".$id."'>Delete</a></button>
                    </td>
                </tr>
                            ";
                        }

                    }else{
                        // error 
                        die(mysqli_error($con));
                    }
                ?>
                <!-- <tr>
                    <td style="padding: 8px;">info1</td>
                    <td style="padding: 8px;">info2</td>
                    <td style="padding: 8px;">info3</td>
                    <td style="padding: 8px;">info4</td>
                    <td style="padding: 8px;">info5</td>
                    <td style="padding: 8px;">
                        <button>Update</button>
                        <button>Delete</button>
                    </td>
                </tr> -->
                
            </table> 
        </div>
    </div>
</body>
</html>