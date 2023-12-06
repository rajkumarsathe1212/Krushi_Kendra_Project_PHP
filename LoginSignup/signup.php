
<?php
    $success = 0;
    $user = 0;
    $blankAlert = 0;

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include 'connect.php';

        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        if($username == "" || $password == ""){
            $blankAlert = 1;
        }else{
            $getQuery = "select * from `signup` where username = '$username'";
            $getQueryResult = mysqli_query($con,$getQuery);
    
            if($getQueryResult){
                $num = mysqli_num_rows($getQueryResult);
                if($num > 0){
                    // echo "User already exists";
                    $user = 1;
                }else{
                    $postQuery = "insert into `signup`(name,username,password) values('$name','$username','$password')";
                    $postQueryResult = mysqli_query($con,$postQuery);
    
                    if($postQueryResult){
                        // echo "Data inserted successfully";
                        $success = 1;
                        header('location:login.php');
                    }else{
                        die(mysqli_error($con));
                    }
                }
            }else{
                die(mysqli_error($con));
            }
        }
        
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<style>
    .mainContainer{
        height: 100vh;
        width: 100%;
        margin: auto;
        background-image: linear-gradient(to right,rgb(252, 252, 62),rgb(246, 246, 187),rgb(252, 252, 62));
    }
    .formContainer{
        width: 35%;
        position: absolute;
        left: 50%;
        top: 50%;
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }
    .pageHeading{
        padding-top: 35px;
        padding-bottom: 35px;
        text-align: center;
    }
    .signupbtn{
        background-color: rgb(164, 164, 235);
    }
    .signupbtn:hover{
        background-color: rgb(82, 171, 161);
    }
</style>

<body>
    <div class="mainContainer " >
        <?php 
            if($blankAlert){
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Warning </strong> Please fill the information first
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
        ?>

        <?php 
            if($user){
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Ohh No! </strong> User already exists
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
        ?>

        <?php 
            if($success){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Data Submitted successfully </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
        ?>


        <div class="formContainer ">
            <h1 class="pageHeading">Sign Up</h1>
            <form action="signup.php" method="post" >
                <div class="form-group">
                    <label for="name"><b>Name</b></label>
                    <input type="text" class="form-control mt-1" name="name" autocomplete="off" placeholder="Enter name" style="border:1px solid black" >
                </div>
                <div class="form-group mt-3">
                    <label for="username"><b>Email address</b></label>
                    <input type="text" class="form-control mt-1" name="username" autocomplete="off" placeholder="Enter username" style="border:1px solid black" >
                </div>
                <div class="form-group mt-3">
                    <label for="password"><b>Password</b></label>
                    <input type="password" class="form-control mt-1" name="password" autocomplete="off" placeholder="Password" style="border:1px solid black" >
                </div>
                <div class="text-center mt-4">
                    <button type="submit" class="btn p-2 fw-bold signupbtn">Sign Up</button>
                </div>
                <div class="text-end mt-4">
                    <a href="login.php" > already have an account </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
