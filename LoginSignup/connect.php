
<?php
    $HOSTNAME = "localhost";
    $USERNAME = "root";
    $PASSWORD = "";
    $DATABASE = "phpcrud";

    $con = mysqli_connect($HOSTNAME,$USERNAME,$PASSWORD,$DATABASE);

    if(!$con){
        die("Connection failed: " . mysqli_error($con));
    }

?>
