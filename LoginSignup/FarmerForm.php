
<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header('location:logout.php');
    }
?>

<?php
    include('./connect.php');

    $id = 0;
    $name = "";
    $dob = "";
    $gender = "";
    $address = "";
    $contactno = "";
    $email = "";

    if(isset($_GET["id"])){
        $id = $_GET["id"];

        $singleGet = "SELECT * FROM farmer WHERE id = $id";
        $result = $con->query($singleGet);
        $row = $result->fetch_assoc();

        $name = $row['name'];
        $dob = $row['dob'];
        $gender = $row['gender'];
        $address = $row['address'];
        $contactno = $row['contactno'];
        $email = $row['email'];
    }


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Farmers</title>
    </head>
    <style>
        .gender-radio {
            display: inline-block;
            margin-right: 10px;
            cursor: pointer;
        }
    </style>

    <body>
        <?php include 'navbar.php' ?>

        <div style="width:40%;margin:auto;margin-bottom:40px" >

            <h2 class="text-center mb-4 mt-4" >Add Farmers</h2>

            <form action="FarmerScript.php" method="post" >
                <div class="row ">
                    <input type="hidden" name="id" value="<?= $id ?>"  />

                    <div class="col-lg-12 p-3 form-group ">
                        <label for="name"><b>Full Name</b></label>
                        <input type="text" class="form-control mt-1" name="name" autocomplete="off" placeholder="Full Name" style="border:1px solid black" value="<?= $name ?>" required >
                    </div>

                    <div class="col-lg-6 p-3 form-group ">
                        <label for="dob"><b>Date of Birth</b></label>
                        <input type="date" class="form-control mt-1" name="dob" style="border:1px solid black" value="<?= $dob ?>" >
                    </div>

                    <div class="col-lg-6 p-3 form-group ">
                        <div class="mb-2" ><label for="gender"><b>Gender</b></label></div>
                        <label class="gender-radio">
                            <input type="radio" name="gender" value="male" <?php if ($gender === 'male') echo 'checked'; ?>> Male
                        </label>

                        <label class="gender-radio">
                            <input type="radio" name="gender" value="female" <?php if ($gender === 'female') echo 'checked'; ?>> Female
                        </label>

                        <label class="gender-radio">
                            <input type="radio" name="gender" value="other" <?php if ($gender === 'other') echo 'checked'; ?>> Other
                        </label>
                    </div>

                    <div class="col-lg-12 p-3 form-group ">
                        <label for="address"><b>Address</b></label>
                        <textarea type="text" class="form-control mt-1" name="address" autocomplete="off" placeholder="Address"style="border:1px solid black" ><?= $address ?></textarea>
                    </div>
    
                    <div class="col-lg-6 p-3 form-group ">
                        <label for="contactno"><b>Contact No</b></label>
                        <input type="number" class="form-control mt-1" name="contactno" autocomplete="off" placeholder="Contact No" style="border:1px solid black" value="<?= $contactno ?>" required >
                    </div>

                    <div class="col-lg-6 p-3 form-group ">
                        <label for="email"><b>Email</b></label>
                        <input type="email" class="form-control mt-1" name="email" autocomplete="off" placeholder="Email Address" style="border:1px solid black" value="<?= $email ?>" >
                    </div>


                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary btn-sm fw-bold">Submit</button>
                        <button type="button" class="btn btn-danger btn-sm" ><a href="FarmerForm.php" class="text-decoration-none fw-bold text-white" >Cancel</a></button>
                    </div>

                    <div class="text-end mt-1">
                        <a href="FarmerTable.php" > See List </a>
                    </div>
                </div>
            </form>

        </div>

        <?php include 'footer.php' ?>
    </body>
</html>
