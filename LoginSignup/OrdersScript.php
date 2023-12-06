

<?php
    include("./connect.php");

    $id = isset($_POST['id']) ? $_POST['id'] : 0;
    $farmer_id = $_POST['farmer_id'];
    $fert_ids = $_POST['fert_id'];
    $quantities = $_POST['quantity'];
    $date = $_POST['date'];

    if ($id == 0) {
        $postQuery = $con->prepare("INSERT INTO `orders` (farmer_id, fert_id, quantity, date) VALUES (?, ?, ?, ?)");

        $postQuery->bind_param("iiis", $farmer_id, $current_fert_id, $current_quantity, $date);

        foreach ($fert_ids as $key => $fert_id) {
            $current_fert_id = $fert_id;
            $current_quantity = $quantities[$key];

            if ($current_fert_id != "" && $current_quantity != "") {
                $postQuery->execute();
            }
        }

        $id = mysqli_insert_id($con);

        $postQuery->close();
    } else {
        $putQuery = $con->prepare("UPDATE `orders` SET farmer_id = ?, fert_id = ?, quantity = ?, date = ? WHERE id = ?");

        $putQuery->bind_param("iiisi", $farmer_id, $current_fert_id, $current_quantity, $date, $id);

        foreach ($fert_ids as $key => $fert_id) {
            $current_fert_id = $fert_id;
            $current_quantity = $quantities[$key];

            if ($current_fert_id != "" && $current_quantity != "") {
                $putQuery->execute();
            }
        }

        $putQuery->close();
    }

    header("Location: OrdersForm.php");

?>

<!-- calculate total
    $fertGet = "SELECT * FROM `fertilizers` WHERE id = $fert_id";
    $fertResult = $con->query($fertGet);
    $fertRow = $fertResult->fetch_assoc();

    $total = $fertRow['sell_price'] * $quantity; -->