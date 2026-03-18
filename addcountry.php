<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Country</title>
</head>

<body>
    <h1>Add Country</h1>
    <form action="addcountry.php" method="POST">
        <input type="text" placeholder="Enter Country Code" name="CountryCode">
        <br> </br>
        <input type="text" placeholder="Enter Country Name" name="CountryName">
        <br> </br>
        <input type="submit">
    </form>
</body>

</html>
<?php
if (isset($_POST['CountryCode']) && isset($_POST['CountryName'])):
    // echo "<br>" . $_POST['CountryCode'] . $_POST['CountryName'];

    require "connect.php";

    $sql = "insert into country values(:CountryCode , :CountryName)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':CountryCode', $_POST['CountryCode']);
    $stmt->bindParam(':CountryName', $_POST['CountryName']);

    if ($stmt->execute()):
        $message = 'Successfully add new Country';
    else :
        $message = 'Fail to add new Country';
    endif;

    echo $message;
    $conn = null;
endif;
?>