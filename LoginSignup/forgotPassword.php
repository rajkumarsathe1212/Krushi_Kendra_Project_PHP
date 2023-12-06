

<?php
    $invalid = 0;
    $blankAlert = 0;

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include("./connect.php");

        $email = $_POST['username'];

        if(!$email){
            $blankAlert = 1;
        }else{
            $findEmailQuery = "SELECT * FROM `signup` WHERE username = '$email'";
            $EmailResult = $con->query($findEmailQuery);

            if($EmailResult){
                $num = mysqli_num_rows($EmailResult);
                if($num > 0){
                    setcookie("email",$email,time() + 1*24*60*60, "/");
                    header("Location: setPassword.php");
                }else{
                    $invalid = 1;
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
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<style>
    .ForgotContainer{
        height: 100vh;
        width: 100%;
        margin: auto;
        border: 1px solid black;
        background-image: linear-gradient(to right,rgb(252, 252, 62),rgb(246, 246, 187),rgb(252, 252, 62));
    }
    .formContainer{
        width: 25%;
        position: absolute;
        left: 50%;
        top: 45%;
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }
    .pageHeading{
        padding-top: 35px;
        padding-bottom: 35px;
        text-align: center;
    }
    .forgotPassbtn{
        background-color: rgb(164, 164, 235);
    }
    .forgotPassbtn:hover{
        background-color: rgb(82, 171, 161);
    }
</style>
<body>
<div class="ForgotContainer">
        <?php 
            if($blankAlert){
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Warning </strong> Please fill the information first
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            }
        ?>
        
        <?php 
            if($invalid){
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Sorry! </strong> Invalid credentials
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            }
        ?>

        <div class="formContainer"  >
            <h1 class="pageHeading">Forgot Password</h1>
            <form action="forgotPassword.php" method="post" >
                <div class="form-group">
                    <label for="username"><b>Email address</b></label>
                    <input type="text" class="form-control mt-1" name="username" autocomplete="off" placeholder="Enter username" style="border:1px solid black" >
                </div>
                <div class="text-center mt-4">
                    <button type="submit" class="btn p-2 fw-bold forgotPassbtn">Send Otp</button>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-6">
                        <a href="login.php">Login</a>
                    </div>
                    <div class="col-lg-6 text-end ">
                        <a href="signup.php" > Create account </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
