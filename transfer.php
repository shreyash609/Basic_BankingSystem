<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer</title>
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
</head>
<body>
    <?php include 'header.php' ?>
    <?php
         
         $host='localhost';
         $username='root';
         $password='123456';
         $dbname='bank';
         
         $conn = mysqli_connect($host, $username ,$password, $dbname);
         if (!$conn) 
         {
           die("Connection failed:".mysqli_connect_error());
         }
         
            $account=$_GET['acc'];
            $sql = "SELECT * FROM  customers where account=$account";
            $result=mysqli_query($conn,$sql);
            if(!$result)
            {
                echo "Error : ".$sql."<br>".mysqli_error($conn);
            }
            $rows=mysqli_fetch_assoc($result);
        ?>

    <div class="row1">
        <div class="column">
            <div class="card">
                <h3>Sender Details</h3>
                <p><b>Account Number:</b> <?php echo $rows['account'] ?></p>
                <p><b>Name: </b><?php echo $rows['name'] ?></p>
                <p><b>Email ID: </b><?php echo $rows['email'] ?></p>
                <p><b>Balance: </b><?php echo $rows['balance'] ?></p>
            </div>
        </div>
        
        <div class="column">
            <div class="card">
                <h3>Receiver Details</h3>
                <form method="post">
                    <div class="">
                        <label for="transfer"><b>Transfer: </b></label>
                        <select name="to" required>
                            <option value="" disabled selected>Choose</option>
                            <?php
                            $host='localhost';
                            $username='root';
                            $password='123456';
                            $dbname='bank';            
                            $conn = mysqli_connect($host, $username ,$password, $dbname);
                            if (!$conn) 
                            {
                                die("Connection failed:".mysqli_connect_error());
                            }          
                            $ac=$_GET['acc'];
                            $sql = "SELECT * FROM customers where account!=$ac";
                            $result=mysqli_query($conn,$sql);
                            if(!$result)
                            {
                                echo "Error ".$sql."<br>".mysqli_error($conn);
                            }
                            while($rows = mysqli_fetch_assoc($result)) {
                                ?>
                                <option class="table" value="<?php echo $rows['account'];?>" >       
                                <?php echo $rows['name'] ;?> 
                                (Balance: 
                                <?php echo $rows['balance'] ;?> )   
                            </option>
                            <?php 
                            } 
                            ?>
                            </select>
                        </div>  
                        <div>
                            <label for="amount"><b>Amount</b></label>
                            <input type="number" id="amount" name="amount" required>  
                        </div>
                        <button type="submit" name="submit" class="transfer-button1">Transfer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    $host='localhost';
    $username='root';
    $password='123456';
    $dbname='bank';
    $conn = mysqli_connect($host, $username ,$password, $dbname);
    if (!$conn) 
    {
        die("Connection failed:".mysqli_connect_error());
    }
    if(isset($_POST['submit']))
    {
        $from = $_GET['acc'];
        $to = $_POST['to'];
        $amount = $_POST['amount'];
         
        $sql = "SELECT * from customers where account=$from";
        $query = mysqli_query($conn,$sql);
        $sql1 = mysqli_fetch_array($query); 
          
        $sql = "SELECT * from customers where account=$to";
        $query = mysqli_query($conn,$sql);
        $sql2 = mysqli_fetch_array($query);

        if (($amount)<0)
        {
            echo '<script type="text/javascript">';
            echo ' alert("Oops! Negative values cannot be transferred")';
            echo '</script>';
        }

        else if($amount > $sql1['balance']) 
        {
            echo '<script type="text/javascript">';
            echo ' alert("Bad Luck! Insufficient Balance")'; 
            echo '</script>';
        }

        else if($amount == 0){
            echo "<script type='text/javascript'>";
            echo "alert('Oops! Zero value cannot be transferred')";
            echo "</script>";
        }

        else {
            $newbalance = $sql1['balance'] - $amount;
            $sql = "UPDATE customers set balance=$newbalance where account=$from";
            mysqli_query($conn,$sql);

            $newbalance = $sql2['balance'] + $amount;
            $sql = "UPDATE customers set balance=$newbalance where account=$to";
            mysqli_query($conn,$sql);
            
            $sender = $sql1['name'];
            $receiver = $sql2['name'];
            $sql = "INSERT INTO transfer_history(sender, receiver, amount, time) VALUES ('$sender','$receiver','$amount', now())";
            $query=mysqli_query($conn,$sql);

            if($query){
                echo "<script> alert('Transfer Successfull!!'); window.location.href='transferhistory.php';</script> ";  
                }
                else
                {
                echo "<script> alert('Transfer Failed!!');window.location.href='transferhistory.php'; </script> ";
                }
                $newbalance= 0;
                $amount =0;
            }  
        }
        ?>
    <?php include 'footer.php' ?>
</body>
</html>