
<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header('location:logout.php');
    }
?>

<?php

    include('./connect.php');

    if (isset($_GET['id'])) {
        $Id = $_GET['id'];
        if ($_GET["mode"] == "delete") {
            $deleteQuery = "DELETE FROM farmer WHERE id = $Id";
            $con->query($deleteQuery);
            
            header('location:FarmerTable.php');
        }
    } else {
        $getQuery = 'SELECT * from farmer ORDER BY id';
        $getQueryResult = $con->query($getQuery);

    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmers List</title>
</head>
<body>
    <?php include 'navbar.php' ?>

    <div style="min-height:70vh" >
        <h2 class="text-center p-3 mt-4 mb-5" >List of all Farmers</h2>

        <div class="container"  style="max-height:60vh;overflow-y:auto" >
            <div class="text-end me-3 " >
                <h5><a href="FarmerForm.php">Add Farmers</a></h5>
            </div>
            <table class="table table-bordered table-hover" >
                <tr class="sticky-top" >
                    <th>Sr No</th>
                    <th>Name</th>
                    <th>DOB</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Contact Number</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>

                <?php 
                    $count = 0;
                    while($row = $getQueryResult->fetch_assoc()){
                        $count++;

                ?>

                    <tr>
                        <td><?= $count ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['dob'] ?></td>
                        <td><?= $row['gender'] ?></td>
                        <td><?= $row['address'] ?></td>
                        <td><?= $row['contactno'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td>
                            <a href="FarmerForm.php?id=<?= $row['id'] ?>&mode=edit" class="btn btn-primary btn-sm" >E</a>

                            <a href="FarmerTable.php?id=<?= $row['id'] ?>&mode=delete" onclick="return confirm('Sure to delete?')" class="btn btn-danger btn-sm" >D</a>
                        </td>
                    </tr>
                    
                <?php
                    } 
                ?>
            </table>
        </div>
    </div>

    <?php include 'footer.php' ?>
</body>
</html>

