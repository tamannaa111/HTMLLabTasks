<?php
$name = $email = $phone = $session = $message = "";
$errors = [];
$sessions = ["AI in Education", "Modern Web Trends", "IoT and Smart Cities"];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    function sanitize($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    $name = sanitize($_POST['name']);
    $email = sanitize($_POST['email']);
    $phone = sanitize($_POST['phone']);
    $session = $_POST['session'] ?? "";
    $message = sanitize($_POST['message']);

    if (!$name) $errors['name'] = "Full name is required.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors['email'] = "Valid email is required.";
    if (!preg_match("/^01[3-9][0-9]{8}$/", $phone)) $errors['phone'] = "Enter valid Bangladeshi phone number.";
    if (!in_array($session, $sessions)) $errors['session'] = "Select a valid session.";

    if (!$errors) {
        echo "<h2>Thank you, $name!</h2><p>You have registered for: <strong>$session</strong>.</p>";
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'nav.php'; ?>
    <main>
        <h1>Register for a Session</h1>
        <form action="" method="post">
            <label>Full Name:<br>
                <input type="text" name="name" value="<?php echo $name; ?>">
                <span class="error"><?php echo $errors['name'] ?? ''; ?></span>
            </label><br>

            <label>Email:<br>
                <input type="email" name="email" value="<?php echo $email; ?>">
                <span class="error"><?php echo $errors['email'] ?? ''; ?></span>
            </label><br>

            <label>Phone (BD):<br>
                <input type="text" name="phone" value="<?php echo $phone; ?>">
                <span class="error"><?php echo $errors['phone'] ?? ''; ?></span>
            </label><br>

            <label>Session:<br>
                <select name="session">
                    <option value="">-- Select a session --</option>
                    <?php foreach($sessions as $s): ?>
                        <option value="<?php echo $s; ?>" <?php if ($session == $s) echo 'selected'; ?>><?php echo $s; ?></option>
                    <?php endforeach; ?>
                </select>
                <span class="error"><?php echo $errors['session'] ?? ''; ?></span>
            </label><br>

            <label>Message (optional):<br>
                <textarea name="message"><?php echo $message; ?></textarea>
            </label><br>

            <input type="submit" value="Register">
        </form>
    </main>
</body>
</html>
