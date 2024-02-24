<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>

<?php

    $showError = "false";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include '_dbconnect.php';
        $user_email = $_POST['signupEmail'];
        $password = $_POST['signupPassword'];
        $cpassword = $_POST['signupcPassword'];
    

        // Check whether this email exists in the database
        $existsSql = "SELECT * FROM `users` WHERE `user_email` = '$user_email'";
        $result = mysqli_query($conn, $existsSql);
        $numRows = mysqli_num_rows($result);

        if ($numRows > 0){
            $showError = "Email is already assigned";
        }
        else{
        if($username!="" && $password!=""){
            if ($password == $cpassword){
                $hash = password_hash($pass, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `users` (`sno`, `user_email`, `user_pass`, `timestamp`) VALUES (NULL, '$user_email', '$hash', current_timestamp())";
                $result = mysqli_query($conn, $sql);
                if($result){
                    $showAlert = true;
                    header("Location: /forums/index.php?signupSuccess=true");
                    exit();
                }
        }
            else {
                $showError = "Passwords do not match";
                
            }
        }
        else {
            $showError = "The field(s) cannot be empty";
        }
    }
        header("Location: /forums/index.php?signupSuccess=false&error=$showError");
    }
?>