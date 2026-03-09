<?php
require "connect.php";


if (isset($_POST['CustomerID'])) {
    $CustomerID = $_POST['CustomerID'];
    $Name = $_POST['Name'];
    $Birthdate = $_POST['Birthdate'];
    $Email = $_POST['Email'];
    $OutstandingDebt = $_POST['OutstandingDebt'];
    $CountryCode = $_POST['CountryCode'];


    // echo 'CustomerID = ' . $CustomerID;
    // echo 'Name = ' . $Name;
    // echo 'Email = ' . $Email;


    $stmt = $conn->prepare(
        "UPDATE customer SET Name=:Name, Birthdate=:Birthdate, Email=:Email, OutstandingDebt=:OutstandingDebt, CountryCode=:CountryCode WHERE CustomerID=:CustomerID"
     );

     $stmt->bindParam(':Name', $Name);
    $stmt->bindParam(':Birthdate', $Birthdate);
    $stmt->bindParam(':Email', $Email);
    $stmt->bindParam(':OutstandingDebt', $OutstandingDebt);
    $stmt->bindParam(':CountryCode', $CountryCode);
    $stmt->bindParam(':CustomerID', $CustomerID);
    $stmt->execute();
    }
    $conn = null;