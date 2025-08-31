<?php
$greeting = "Good " . (date("H") < 12 ? "Morning" : (date("H") < 18 ? "Afternoon" : "Evening"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Event 2025</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'nav.php'; ?>
    <main>
        <h1><?php echo $greeting; ?>, Welcome to Tech Event 2025!</h1>
        <p>Join us for an inspiring day of technology, innovation, and networking.</p>
        <a href="register.php" class="btn">Register Now</a>
    </main>
</body>
</html>
