
<?php
    include("./connect.php");

    $OrdersGet = "SELECT * FROM `orders` AS O JOIN farmer AS F ON F.id = O.farmer_id";
    $OrdersResult = $con->query($OrdersGet);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders Table</title>
</head>
<body>

    <!-- <div class="container row mb-5">
        <div class="col-lg-6 p-2 form-group ">
            <label for="name"><b>Farmer Name</b></label>
            <select class="form-control" name="farmer_name" style="border:1px solid black" >
                <option value="" > --- select --- </option>
                <?php
                    $fetchFarmersQuery = "SELECT id,name FROM farmer";
                    $fetchFarmersQueryResult = $con->query($fetchFarmersQuery);
                    while($row = $fetchFarmersQueryResult->fetch_assoc()){
                        $fID = $row['id'];
                        $fName = $row['name'];

                        echo "<option value=\"$fID\">$fName</option>";
                    }
                ?>
            </select>
        </div>
    </div> -->

    <div class="container-fluid">
        <table class="table table-bordered table-hover" >
            <tr>
                <th>Name</th>
                <th>Fert. Name</th>
                <th>Quantity</th>
                <th>Order Date</th>
                <th>Action</th>
            </tr>

            <?php
                $count = 0;
                while($ROW = $OrdersResult->fetch_assoc()){
                    $count++;
            ?>

                <tr>
                    <?php
                        $getFarmer = "SELECT * FROM `farmer` WHERE id = ".$ROW['farmer_id'];
                        $resultFarmer = $con->query($getFarmer);
                        $farmerRow = $resultFarmer->fetch_assoc();

                        echo "<td>" . $farmerRow['name'] . "</td>"
                    ?>
                    <?php
                        $getFert = "SELECT * FROM fertilizers WHERE id = ".$ROW['fert_id'];
                        $resultFert = $con->query($getFert);
                        $fertRow = $resultFert->fetch_assoc();

                        echo "<td>" . $fertRow['fert_name'] . "</td>"
                    ?>
                    <td><?= $ROW['quantity'] ?></td>
                    <td><?= $ROW['date'] ?></td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="OrdersForm.php?id=<?= $ROW['id'] ?>&mode=edit">E</a>
                        <a class="btn btn-danger btn-sm" href="OrdersForm.php?id=<?= $ROW['id'] ?>&mode=delete" onclick="return confirm('sure to delete?')" >D</a>
                        <a class="btn btn-success btn-sm" href="Bill.php?id=<?= $ROW['id'] ?>&farmer_id=<?= $ROW['farmer_id'] ?>">Bill</a>
                    </td>
                </tr>

            <?php
                }
            ?>

        </table>
    </div>

</body>
</html>
