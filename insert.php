<?php
// Preluarea datelor din formular
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$cardn = isset($_POST['cardn']) ? trim($_POST['cardn']) : '';
$expire_date = isset($_POST['expire_date']) ? trim($_POST['expire_date']) : '';
$an = isset($_POST['an']) ? trim($_POST['an']) : '';
$cvv = isset($_POST['cvv']) ? trim($_POST['cvv']) : '';

// Verificarea dacă toate câmpurile sunt completate
if (!empty($name) && !empty($cardn) && !empty($expire_date) && !empty($an) && !empty($cvv)) {
    // Detaliile conexiunii la baza de date
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "online_rest";

    // Creare conexiune
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    // Verificare conexiune
    if ($conn->connect_error) {
        die('Connect Error (' . $conn->connect_errno . ') ' . $conn->connect_error);
    } else {
        // Pregătirea și executarea statement-ului SQL
        $INSERT = $conn->prepare("INSERT INTO carduri (name, cardn, expire_date, an, cvv) VALUES (?, ?, ?, ?, ?)");
        $INSERT->bind_param("sssss", $name, $cardn, $expire_date, $an, $cvv);

        if ($INSERT->execute()) {
            echo "New record inserted successfully";
			header("Location: checkout.php");
			exit();
        } else {
            echo "Error: " . $INSERT->error;
        }

        // Închidere statement și conexiune
        $INSERT->close();
        $conn->close();
    }
} else {
    echo "All fields are required";
    die();
}
?>
