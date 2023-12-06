

<?php
    include("connect.php");

    $id = isset($_POST['id']) ? $_POST['id'] : 0;
    
    $fert_name = $_POST['fert_name'];
    $quantity = $_POST['quantity'];
    $purchase_date = $_POST['purchase_date'];
    $expiry_date = $_POST['expiry_date'];
    $buy_price = $_POST['buy_price'];
    $sell_price = $_POST['sell_price'];

    if($id == 0){
        $postQuery = "INSERT INTO `fertilizers`(fert_name,quantity,purchase_date,expiry_date,buy_price,sell_price) VALUES('$fert_name',$quantity,'$purchase_date','$expiry_date',$buy_price,$sell_price)";
        $con->query($postQuery);
        $id = mysqli_insert_id($con);
    }else{
        $putQuery = "UPDATE `fertilizers` SET fert_name = '$fert_name', quantity = $quantity, purchase_date = '$purchase_date', expiry_date = '$expiry_date', buy_price = $buy_price, buy_price = $buy_price, sell_price = $sell_price WHERE id = $id";
        $con->query($putQuery);
    }

    header("Location: FertilizerForm.php");

?>
