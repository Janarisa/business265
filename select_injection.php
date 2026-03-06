<?php
require "connect.php";
if (isset($_GET["CustomerID"])) {
    $strCustomerID = $_GET["CustomerID"];
    $sql = "SELECT * FROM customer WHERE CustomerID = '" . $strCustomerID . "'";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    print_r($result);
}
