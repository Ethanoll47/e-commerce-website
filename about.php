<?php
session_start();

require_once("php/dbcontroller.php");
$database = new DBController();
require_once("php/component.php");
require_once("php/config.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <title>Company Name</title>
</head>

<body>
    <!-- About Us -->
    <section class="p-5">
        <div class="container text-center">
            <h2 class="mb-4">About Us</h2>
            <div class="d-flex flex-wrap justify-content-center">
                Thrifted is a Malaysian-based company started in 2022 that sells second-hand clothing. According to the Ellen Macarthur Foundation, 60% of average consumers throw away their clothes in the first year, and an estimated 18.6 million tonnes of clothing will end up in landfills. Hence, we aim to provide customers with the best online shopping experience while also reducing the number of clothes that end up in landfills.
            </div>

        </div>
    </section>

    <!-- Our Mission -->
    <section class="p-5 bg-light">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="d-flex flex-column flex-md-row">
                    <h2 class="mx-4">Our Mission</h2>
                    <p class="mx-4">
                        Thrifted’s mission is to reduce the number clothes that end up in landfills by reselling second-hand clothes and powering the circular economy for fashion. All our clothes are carefully collected, sorted, cleaned before being sold on our website. This ensures customers will get the highest quality clothes while also ensuring a more sustainable environment. 40% of all Thrifted’s profits will be donated to Fashion Revolution Malaysia in support of their efforts to change the way clothing is produced, sourced, and consumed.
                    </p>
                </div>
            </div>
    </section>

    <!-- Our Vision -->
    <section class="p-5">
        <div class="container text-center">
            <h2 class="mb-4">Our Vision</h2>
            <div class="d-flex flex-wrap justify-content-center">
                To clean up the fashion industry and create a more sustainable environment.
            </div>

        </div>
    </section>
    <?php
    footer();
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>