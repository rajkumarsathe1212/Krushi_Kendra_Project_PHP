

<?php 
    session_start();

    if(!isset($_SESSION["username"])){
        header("Location: logout.php");
    }
?>

<?php
    include('connect.php');

    if(isset($_GET['id'])){
        $ID = $_GET['id'];

        if($_GET['mode']=="delete"){
            $deleteQuery = "DELETE FROM fertilizers WHERE id = $ID";
            $con->query($deleteQuery);

            header("Location: FertilizerTable.php");
        }
    }else{
        $getQuery = "SELECT * FROM fertilizers";
        $getResult = $con->query($getQuery);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fertilizer Table</title>
</head>
<body>

    <?php include './navbar.php' ?>

    <div style="min-height:75vh" >
        <h2 class="text-center p-3 mt-4 mb-5" > Fertilizers Information </h2>

        <div class="container"  style="max-height:60vh;overflow-y:auto" >
            <div class="text-end me-3 " >
                <h5><a href="FertilizerForm.php">Add Fertilizers</a></h5>
            </div>
            <table class="table table-bordered table-hover" >
                <tr class="sticky-top" >
                    <th>Sr No</th>
                    <th>Fertilizer Name</th>
                    <th>Quantity</th>
                    <th>Purchase Date</th>
                    <th>Expiry Date</th>
                    <th>Buy Price</th>
                    <th>Sell Price</th>
                    <th>Action</th>
                </tr>

                <?php
                    $count = 0;
                    while($row = $getResult->fetch_assoc()){
                        $count++;

                ?>

                <tr >
                    <td><?= $count ?></td>
                    <td><?= $row['fert_name'] ?></td>
                    <td><?= $row['quantity'] ?></td>
                    <td><?= $row['purchase_date'] ?></td>
                    <td><?= $row['expiry_date'] ?></td>
                    <td><?= $row['buy_price'] ?></td>
                    <td><?= $row['sell_price'] ?></td>
                    <td>
                        <a href="FertilizerForm.php?id=<?=$row['id']?>&mode=edit" class="btn btn-sm btn-primary" >E</a>
                        <a href="FertilizerTable.php?id=<?=$row['id']?>&mode=delete" onclick="return confirm('Sure to delete')" class="btn btn-sm btn-danger" >D</a>
                    </td>
                </tr>

                <?php
                    }
                ?>
            </table>
        </div>

    </div>

    <?php include './footer.php' ?>
    
</body>
</html>