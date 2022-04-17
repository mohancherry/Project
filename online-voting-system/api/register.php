<?php
    include("connection.php");

    $name = $_POST['name'];
    $mobile = $_POST['mob'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    $add = $_POST['add'];
    $role = $_POST['role'];

    if(empty($name) || empty($mobile) || empty($pass) || empty($cpass) || empty($add) || empty($role)){
        echo '<script>
        alert("Please fill all required field");
        window.location = "../routes/register.php";
        </script>';
    }
     
    else if($cpass!=$pass){
        echo '<script>
                alert("Passwords do not match!");
                window.location = "../routes/register.php";
            </script>';
    }
    else if(strlen($mobile)<10 || strlen($mobile)>10){
        echo '<script>
                alert("Please Enter a Valid Mobile Number!");
                window.location = "../routes/register.php";
            </script>';

    }
    else{
        $insert = mysqli_query($connect, "insert into user (name, mobile, password, address, status, votes, role) values('$name', '$mobile', '$pass', '$add', 0, 0, '$role') ");
        if($insert){
            echo '<script>
                    alert("Registration successfull!");
                    window.location = "../";
                </script>';
        }
    }
    
?>