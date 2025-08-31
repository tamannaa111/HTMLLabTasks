<?php
$speakers = [
    ["name" => "Dr. Ahsan Habib", "bio" => "AI expert from Dhaka University.", "topic" => "AI in Education", "photo" => "img/ahsan.jpg"],
    ["name" => "Sara Rahman", "bio" => "Web developer and freelancer.", "topic" => "Modern Web Trends", "photo" => "img/sara.jpg"],
    ["name" => "Tanvir Alam", "bio" => "IoT researcher at BRAC University.", "topic" => "IoT and Smart Cities", "photo" => "img/tanvir.jpg"]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Speakers</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'nav.php'; ?>
    <main>
        <h1>Event Speakers</h1>
        <div class="speakers">
            <?php foreach($speakers as $sp): ?>
                <div class="card">
                    <img src="<?php echo $sp['photo']; ?>" alt="<?php echo $sp['name']; ?>">
                    <h2><?php echo $sp['name']; ?></h2>
                    <p><strong>Topic:</strong> <?php echo $sp['topic']; ?></p>
                    <p><?php echo $sp['bio']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
</body>
</html>
