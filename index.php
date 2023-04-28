<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="app.css">
    <link rel="icon" href="images/icon1.png" type="image/icon type">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto+Slab&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto+Slab&family=Staatliches&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Merriweather:ital,wght@1,300&family=Roboto+Slab&family=Staatliches&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Merriweather:ital,wght@1,300&family=Montserrat&family=Roboto+Slab&family=Staatliches&display=swap"
        rel="stylesheet">

    <title>Home</title>
</head>

<body>
<?php include 'header.php';?>
    <section>
        <!-- <img src="images/bank.jpg" alt="bank" id="main-image"> -->
        <div class="bg-text">
            <h1 style="font-size: 30px;">Basic Banking System</h1>
            <p>It is built to transfer money easily from any place you want.</p><br>
            <button class="button-main">About Us</button>
        </div>
    </section>
    <section class="main-section">
        <div class="heading">
            <span>Our Services</span>
        </div>
    </section>
    <section class="gridbox">
        <div class="grid">
            <div class="web-img">
                <img src="images/check-mark.png" alt="V1">
                <div class="title">
                    <p>Money Transfer in a Second</p>
                </div>
            </div>
            <div class="web-img">
                <img src="images/history.png" alt="V2">
                <div class="title">
                    <p>Check your Transaction History</p>
                </div>
            </div>
            <div class="web-img">
                <img src="images/support.png" alt="V3">
                <div class="title">
                    <p>24x7 Customer Service</p>
                </div>
            </div>
            <div class="web-img">
                <img src="images/easy-installation.png" alt="V4">
                <div class="title">
                    <p>Easy to Use</p>
                </div>
            </div>
        </div>
    </section>
    <?php include 'footer.php';?>
</body>

</html>