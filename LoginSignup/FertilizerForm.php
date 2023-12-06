
<?php 
    session_start();

    if(!isset($_SESSION["username"])){
        header("Location: logout.php");
    }
?>

<?php
    include("connect.php");

    $id = 0;
    $fert_name = "";
    $quantity = "";
    $purchase_date = "";
    $expiry_date = "";
    $buy_price = "";
    $sell_price = "";

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $singleGet = "SELECT * FROM fertilizers WHERE id = $id";
        $result = $con->query($singleGet);
        $row = $result->fetch_assoc();

        $fert_name = $row['fert_name'];
        $quantity = $row['quantity'];
        $purchase_date = $row['purchase_date'];
        $expiry_date = $row['expiry_date'];
        $buy_price = $row['buy_price'];
        $sell_price = $row['sell_price'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Fertilizer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>

    <?php include './navbar.php' ?>


    <div class="row" style="min-height:80vh;width:100%" >
        <div class="col-lg-5">
            <img src="./images/FertilizersForm.jpg" style="height:100%;width:100%;padding:10px" alt="...">
        </div>
        <div class="col-lg-7 p-4 ">
            <h2 class="text-center mb-4 mt-4" >Add Fertilizers</h2>

            <form action="FertilizerScript.php" method="post">
                <div class="row ">
                    <input type="hidden" name="id"  value="<?= $id ?>"  />

                    <div class="col-lg-6 p-3 form-group ">
                        <label for="fert_name"><b>Fertilizer Name</b></label>
                        <input type="text" class="form-control mt-1" autocomplete="off" name="fert_name" style="border:1px solid black" placeholder="Fertilizer Name" value="<?= $fert_name ?>"  >
                    </div>
                    
                    <div class="col-lg-6 p-3 form-group ">
                        <label for="quantity"><b>Quantity</b></label>
                        <input type="text" class="form-control mt-1" autocomplete="off" name="quantity" style="border:1px solid black" placeholder="Quantity" value="<?= $quantity ?>" >
                    </div>

                    <div class="col-lg-6 p-3 form-group ">
                        <label for="purchase_date"><b>Purchase Date</b></label>
                        <input type="date" class="form-control mt-1" autocomplete="off" name="purchase_date" style="border:1px solid black" value="<?= $purchase_date ?>" >
                    </div>

                    <div class="col-lg-6 p-3 form-group ">
                        <label for="expiry_date"><b>Expiry Date</b></label>
                        <input type="date" class="form-control mt-1" name="expiry_date" autocomplete="off" style="border:1px solid black" value="<?= $expiry_date ?>" >
                    </div>

                    <div class="col-lg-6 p-3 form-group ">
                        <label for="buy_price"><b>Buy Price</b></label>
                        <input type="text" class="form-control mt-1" name="buy_price" autocomplete="off" placeholder="Buy Price" style="border:1px solid black" value="<?= $buy_price ?>"   >
                    </div>

                    <div class="col-lg-6 p-3 form-group ">
                        <label for="sell_price"><b>Sell Price</b></label>
                        <input type="text" class="form-control mt-1" name="sell_price" autocomplete="off" placeholder="Sell Price" style="border:1px solid black" value="<?= $sell_price ?>"  >
                    </div>
                    

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary btn-sm fw-bold">Submit</button>
                        <button type="button" class="btn btn-danger btn-sm" ><a href="FertilizerForm.php" class="text-decoration-none fw-bold text-white" >Cancel</a></button>
                    </div>
                    
                    <div class="text-end mt-1">
                        <a href="FertilizerTable.php" > See List </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php include './footer.php' ?>
    
</body>
</html>
