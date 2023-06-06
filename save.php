<?php
require "config.php";

$uname = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['password'];
$phone = $_POST['phone'];

$query = "INSERT INTO `crud-php` (username, email, password, phone) 
          VALUES (:uname, :email, :pass, :phone)";

if (isset($_POST['submit'])) {
    try {
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':uname', $uname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':pass', $pass);
        $stmt->bindParam(':phone', $phone);

        if ($stmt->execute()) {
            echo "<script>alert('Stored success');window.location.href='view.php';</script>";
        } else {
            echo "<script>alert('Stored error');window.location.href='view.php';</script>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
