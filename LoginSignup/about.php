
<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header('location:logout.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>About</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </head>
    <style>
        .card{
            cursor: pointer;
        }
        .card:hover{
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0,0,0,.12), 0 4px 8px rgba(0,0,0,.06);
        }
    </style>

    <body>
        <?php include 'navbar.php' ?>
        <div class="container" style="min-height:70vh" >
            <div class="" >
                <h3 class="text-center pt-4 pb-4 " >About Krushi Sewa Kendra</h3>
                <p class="mt-3" >Welcome to Krushi Sewa Kendra, your trusted partner in agricultural excellence. Our mission is to <b>empower farmers and contribute to the growth of the agricultural sector</b> by providing comprehensive and innovative agricultural services.</p>
            </div>
            
            <div class="row pb-4 ">
                <h3 class="text-center pt-4 pb-4" >Our Services</h3>

                <div class="col-lg-3">
                    <div class="card" style="width: 18rem;">
                        <img src="./images/card-1.jpg" style="height:250px;width:100%;padding:5px" alt="Consultation">
                        <div class="card-body">
                            <h5 class="card-title">Crop Consultation</h5>
                            <p class="card-text" style="min-height:160px " >Our experienced agronomists provide personalized crop consultation services, helping farmers make informed decisions about crop selection, cultivation practices, and pest management.</p>
                        </div>
                        <div class="card-footer text-center ">
                            <a href="#" class="btn btn-sm text-primary ">Read More</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3">
                    <div class="card" style="width: 18rem;">
                        <img src="./images/card-2.jpg" style="height:250px;width:100%;padding:5px" alt="Training">
                        <div class="card-body">
                            <h5 class="card-title">Training Programs</h5>
                            <p class="card-text" style="min-height:160px " >Regular training sessions and workshops are organized to educate farmers on modern farming techniques, water conservation, and the adoption of eco-friendly practices.</p>
                        </div>
                        <div class="card-footer text-center ">
                            <a href="#" class="btn btn-sm text-primary ">Read More</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3">
                    <div class="card" style="width: 18rem;">
                        <img src="./images/card-3.jpg" style="height:250px;width:100%;padding:5px" alt="Supply">
                        <div class="card-body">
                            <h5 class="card-title">Agri-Input Supply</h5>
                            <p class="card-text" style="min-height:160px " >We stock a wide range of quality agricultural inputs, including seeds, fertilizers, pesticides, and farming equipment, to meet the diverse needs of our farming community.</p>
                        </div>
                        <div class="card-footer text-center ">
                            <a href="#" class="btn btn-sm text-primary ">Read More</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3">
                    <div class="card" style="width: 18rem;">
                        <img src="./images/card-4.jpg" style="height:250px;width:100%;padding:5px" alt="Linkages">
                        <div class="card-body">
                            <h5 class="card-title">Market Linkages</h5>
                            <p class="card-text" style="min-height:160px " >Facilitating market linkages to connect farmers with potential buyers, ensuring fair prices for their produce.</p>
                        </div>
                        <div class="card-footer text-center ">
                            <a href="#" class="btn btn-sm text-primary ">Read More</a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="pb-5" >
                <h3 class="text-center pt-5 pb-4" >Our Commitment</h3>
                <ol>
                    <li> <b>Farmers' Welfare: </b> Putting farmers first and working towards their prosperity by offering expert guidance, resources, and solutions. </li>
                    <li> <b>Knowledge Transfer: </b>  Sharing the latest advancements in agricultural practices, technologies, and sustainable farming methods to enhance productivity.</li>
                    <li> <b>Quality Products: </b>  Providing access to high-quality seeds, fertilizers, pesticides, and other agricultural inputs to ensure optimal crop yield.
                    </li>
                    <li> <b>Technical Assistance:  </b>  Offering personalized technical support and assistance to address the unique challenges faced by farmers.
                    </li>
                </ol>
            </div>
        </div>

        <?php include 'footer.php' ?>
    </body>
</html>
