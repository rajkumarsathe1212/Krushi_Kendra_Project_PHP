

<?php
    include('./connect.php');


    $id = isset($_POST["id"]) ? $_POST["id"] : 0;
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $contactno = $_POST['contactno'];
    $email = $_POST['email'];

    if($id == 0 ){
        $postQuery = "INSERT INTO `farmer`(name,dob,gender,address,contactno,email) VALUES ('$name','$dob','$gender','$address','$contactno','$email') ";
        $con -> query($postQuery);
        $id = mysqli_insert_id($con);
        
    }else{
        $putQuery = "UPDATE `farmer` SET name = '$name', dob = '$dob', gender = '$gender', address = '$address', contactno = '$contactno', email = '$email' WHERE id = $id";
        $con->query($putQuery);

    }
    
    header('Location: FarmerForm.php');
?>
