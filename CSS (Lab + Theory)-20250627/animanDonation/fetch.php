<?php
$conn = new mysqli('localhost', 'root', '', 'test');

$sql = "SELECT * FROM animaledonation WHERE anon='No' ORDER BY amount desc LIMIT 1";

$result = $conn->query($sql);

$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main">
        <div class="header">
            <div class="logo">
                <h2>Animal Donation</h2>
            </div>
            <div class="nav">
                <a href="index.php">Add Donation</a>
                <a href="fetch.php">View Top Donor</a>
            </div>
        </div>
        <div class="card-container">
            <div class="card">
            <div class="card-top">
                <h1>Today's Top Donor</h1>
            </div>
            <div class="card-bottom">
                <h1><?=$row['name']?></h1>
                <div>
                    <h2>Taka: <?=$row['amount']?></h2>
                </div>
            </div>
        </div>
        </div>
    </div>
</body>
</html>