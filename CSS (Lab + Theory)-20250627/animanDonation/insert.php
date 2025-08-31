<?php
$conn = new mysqli('localhost', 'root', '', 'test');

$name = $_POST['name'];
$email = $_POST['email'];
$amount = $_POST['amount'];
$method = $_POST['method'];
$anon = $_POST['anon'];

$sql = "INSERT INTO animaledonation(name, email, amount, method, anon) values('$name', '$email', '$amount', '$method', '$anon')";

if($conn->query($sql)===TRUE) {
    header('location: form.html');
} else {
    echo "failed";
}

?>