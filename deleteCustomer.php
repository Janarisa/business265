<?php
require "connect.php";

if (isset($_GET['CustomerID'])) {
    $CustomerID = $_GET['CustomerID'];

    $stmt = $conn->prepare("DELETE FROM customer WHERE CustomerID = :CustomerID");
    $stmt->bindParam(':CustomerID', $CustomerID);
    $stmt->execute();

    $conn = null;
    // header('Location: index.php');
    exit;
}