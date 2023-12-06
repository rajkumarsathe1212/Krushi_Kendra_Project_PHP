
<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: logout.php");
    }
?>

<?php
    include("./connect.php");

    if(isset($_GET['farmer_id'])){
        $farmer_id = $_GET['farmer_id'];

        $getOrders = "SELECT * FROM `orders` WHERE farmer_id = $farmer_id";
        $OrdersResult = $con->query($getOrders);
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing</title>

    <style>
        hr {
            width: 70%;
            display: inline-block;
            height: 15px;
            border: 0;
            box-shadow: inset 0 12px 12px -12px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body>
    <?php include("navbar.php") ?>

    <div style="min-height:75vh;width:50%;margin:auto;margin-bottom:30px;margin-top:70px">
        <div class="text-end me-3 " >
            <h6><a href="OrdersForm.php">See Orders</a></h6>
        </div>

        <div class="card"  style="min-height:600px" >
            <div class="row">

                <div class="col-lg-7 col-sm-12 text-center">
                    <div class="border rounded-5 p-4" style="background-color:#f5eded" >
                        <h3><i>Krushi Sewa Kendra</i></h3>
                        <p><b>Haldi,Pirwadi</b></p>
                        <p><b>416001</b></p>
                    </div>
                </div>

                <div class="col-lg-5 col-sm-12 p-4 ">
                    <div class="row">
                        <div class="col-lg-4 col-md-5 col-xs-5 text-end ">
                            <p><b>Mobile- </b></p>
                        </div>
                        <div class="col-lg-8 col-md-7 col-xs-7 ">
                            9912121212 <br>
                            9507070707
                        </div>
                        <div class="col-lg-4 col-md-5 col-xs-5 text-end ">
                            <p><b>Date- </b></p>
                        </div>
                        <div class="col-lg-8 col-md-7 col-xs-7 ">
                            <?php echo date('d-m-Y'); ?>
                        </div>
                    </div>
                </div>

            </div>
            <div class="text-center mt-3" >
                <hr>
            </div>

            <div class="container">
                <p><b>Name :-  <?php
                    include("./connect.php");

                    $FarmerGet = "SELECT id,name FROM `farmer` WHERE id = ".$_GET['farmer_id'];
                    $FarmerResult = $con->query($FarmerGet);
                    $FarmerRow = $FarmerResult->fetch_assoc();

                    echo "<i>". $FarmerRow['name'] ."</i>";
                ?> </b> </p>
            </div>

            <div class="container" >
                <table class="table table-bordered table-hover" >
                    <tr>
                        <th style="width:20%" >Sr No</th>
                        <th style="width:20%" >Fertilizer</th>
                        <th style="width:20%" >Quantity</th>
                        <th style="width:20%" >Price</th>
                        <th style="width:20%" >Total</th>
                    </tr>

                    <?php
                        $count = 0;
                        $totalAmount = 0;

                        while($OrdersRow = $OrdersResult->fetch_assoc()){
                            $count++;
                            // fertilizer details
                            $FertQuery = "SELECT * FROM `fertilizers` WHERE id = ".$OrdersRow['fert_id'];
                            $FertResult = $con->query($FertQuery);
                            $FertRow = $FertResult->fetch_assoc();

                            // fertilizer price
                            $FertPrice = "SELECT * FROM `fertilizers` WHERE id = ".$OrdersRow['fert_id'];
                            $PriceResult = $con->query($FertPrice);
                            $PriceRow = $PriceResult->fetch_assoc();

                            $total = $OrdersRow['quantity'] * $PriceRow['sell_price'];
                            $totalAmount += $total;
                    ?>
                        <tr>
                            <td><?= $count ?></td>
                            <td><?= $FertRow['fert_name'] ?></td>
                            <td><?= $OrdersRow['quantity'] ?></td>
                            <td><?= $PriceRow['sell_price'] ?></td>
                            <td><?php
                                echo "<b>". $total ."</b>" ?></td>
                        </tr>
                    <?php
                        }
                    ?>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Amount</td>
                        <td>
                            <input type="text" name="amount" class="form-control border-3" value="<?php echo $totalAmount; ?>" readonly>
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Paid</td>
                        <td>
                            <input type="text" name="" value="" >
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Remaining</td>
                        <td>
                            <input type="text" name="" value="" >
                        </td>
                    </tr>
                </table>

                <div class="text-end me-3 " >
                    
                </div>
            </div>

            <div class="card-footer " style="margin-top:172px" >
                <button type="submit" class="btn btn-primary btn-sm" >Save</button>
                <button class="btn btn-success btn-sm" >Print</button>
            </div>
        </div>
    </div>

    <?php include("footer.php") ?>
</body>
</html>
