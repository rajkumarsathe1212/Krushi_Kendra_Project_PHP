
<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: logout.php");
    }
?>

<?php
    include("./connect.php");

    $fetchFarmers = "SELECT id,name FROM farmer";
    $fetchFarmerResult = $con->query($fetchFarmers);

    $fetchFert = "SELECT id,fert_name FROM fertilizers";
    $resultFertResult = $con->query($fetchFert);

    $id= 0;
    $farmer_id = "";
    $fert_id = "";
    $quantity = "";
    $date = "";

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        if($_GET['mode'] == "delete"){
            $deleteQuery = "DELETE FROM `orders` WHERE id = $id";
            $deleteResult = $con->query($deleteQuery);
            header("Location: OrdersForm.php");
        }else{
            $singleGet = "SELECT * FROM `orders` WHERE id = $id";
            $singleResult = $con->query($singleGet);
            $row = $singleResult->fetch_assoc();
    
            $farmer_id = $row['farmer_id'];
            $fert_id = $row['fert_id'];
            $quantity = $row['quantity'];
            $date = $row['date'];
        }

        
    }

    $fetchFarmerResult->data_seek(0);
    $resultFertResult->data_seek(0);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <style>
        hr {
            width: 90%;
            display: inline-block;
            height: 15px;
            border: 0;
            box-shadow: inset 0 12px 12px -12px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body>

    <?php include './navbar.php' ?>

    <div style="min-height:75vh;width:40%;margin:auto;margin-bottom:40px" >

        <h2 class="text-center mb-4 mt-4" >Orders</h2>

        <form action="OrdersScript.php" method="post">
            <div class="row">

                <input type="hidden" name="id" value="<?= $id ?>" />

                <div class="col-lg-6 p-2 form-group ">
                    <label for="name"><b>Farmer Name</b></label>
                    <select class="form-control" name="farmer_id" style="border:1px solid black" >
                        <option value="" > --- select --- </option>
                        <?php
                            while($row = $fetchFarmerResult->fetch_assoc()){
                                $farmerID = $row['id'];
                                $farmerName = $row['name'];

                                echo "<option value=\"$farmerID\" ".($farmerID == $farmer_id ? "selected" : "").">$farmerName</option>";
                            }
                        ?>
                    </select>
                </div>

                <div class="col-lg-6 p-2 form-group ">
                    <label for="order_date"><b>Date of Order</b></label>
                    <input type="date" value="<?= $date ?>" class="form-control mt-1" name="date" autocomplete="off" style="border:1px solid black"  >
                </div>

                <?php
                    for ($i = 0; $i < 5; $i++) {
                        echo '<div class="col-lg-6 p-2 form-group">';
                        echo '<label for="fertilizer"><b>Fertilizer</b></label>';
                        echo '<select class="form-control" name="fert_id[]" style="border:1px solid black">';
                        echo '<option value="">--- select ---</option>';
    
                        $resultFertResult->data_seek(0);
    
                        while ($Row = $resultFertResult->fetch_assoc()) {
                            $fertId = $Row['id'];
                            $fertName = $Row['fert_name'];
    
                            echo "<option value=\"$fertId\">$fertName</option>";
                        }
    
                        echo '</select>';
                        echo '</div>';
    
                        echo '<div class="col-lg-6 p-2 form-group">';
                        echo '<label for="quantity"><b>Quantity</b></label>';
                        echo '<input type="number" class="form-control mt-1" name="quantity[]" autocomplete="off" placeholder="Quantity" style="border:1px solid black">';
                        echo '</div>';
                    }
                ?>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary btn-sm fw-bold">Submit</button>
                    <button type="button" class="btn btn-danger btn-sm" ><a href="OrdersForm.php" class="text-decoration-none fw-bold text-white" >Cancel</a></button>
                </div>

            </div>
        </form>
        
        <div class="text-center mt-4" >
            <hr>
        </div>

    </div>

    <div class="w-50 mx-auto " >
        <?php include("OrdersTable.php") ?>
    </div>

    <?php include './footer.php' ?>

</body>
</html>
