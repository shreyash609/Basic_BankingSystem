<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer History</title>
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
            <span>Transfer History</span>
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

$sql = "SELECT * FROM transfer_history order by time DESC";
$result = mysqli_query($conn,$sql);

echo "<table class='customers'>
<tr>
<th>Sender</th>
<th>Receiver</th>
<th>Amount</th>
<th>Time</th>
</tr>";

for (;$row=mysqli_fetch_assoc($result);)
{ 
    echo "<tr>";
    echo "<td>" . $row['sender']. "</td>";
    echo "<td>" . $row['receiver'] . "</td>";
    echo "<td>" . $row['amount'] . "</td>";
    echo "<td>" . $row['time']. "</td>";
    echo "</tr>";
} 
echo "</table>";

mysqli_close($conn);
}
?>
    <?php include 'footer.php'; ?>
</body>
</html>