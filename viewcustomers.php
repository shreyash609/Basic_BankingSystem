<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers</title>
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
    <?php include 'header.php'; ?>
    <section class="main-section">
        <div class="heading">
            <span>Customers</span>
            <hr style="width: 60%">
        </div>
    </section>
    <?php
{
$host='localhost';
$username='root';
$password='123456';
$dbname='bank';

$conn = mysqli_connect($host, $username ,$password, $dbname);

if (!$conn) 
{
  die("Connection failed:".mysqli_connect_error());
}

$sql = "SELECT * FROM customers";
$result = mysqli_query($conn,$sql);

echo "<table class='customers'>
<tr>
<th>Account Number</th>
<th>Name</th>
<th>Emailid</th>
<th>Phone Number</th>
<th>City</th>
<th>State</th>
<th>Balance</th>
<th>Transaction</th>
</tr>";

for (;$row=mysqli_fetch_assoc($result);)
{ 
    echo "<tr>";
    echo "<td>" . $row['account']. "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['phone']. "</td>";
    echo "<td>" . $row['city']. "</td>";
    echo "<td>" . $row['state'] . "</td>";
    echo "<td>" . $row['balance']. "</td>";
    echo "<td>" ?><a href='http://localhost/basicbankingsystem/transfer.php? acc= <?php echo $row['account'] ;?>'>  <button type="button" class="transfer-button">Click here to transfer</button></a>
    <?php
    echo"</td>";
    echo "</tr>";
} 
echo "</table>";

mysqli_close($conn);
}
?>
    <?php include 'footer.php'; ?>
</body>
</html>