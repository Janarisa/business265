<?php
require "connect.php";

$sql_select = "SELECT * FROM country ORDER BY CountryCode";
$stmt_s = $conn->prepare($sql_select);
$stmt_s->execute();

if (isset($_POST['submit'])) {

    if (!empty($_POST['CustomerID']) && !empty($_POST['Name'])) {
        // echo "<br>" . $_POST['CustomerID']

        $sql = "insert into customer values(:CustomerID , :Name , 
         :OutstandingDebt, :Email , :Birthdate ,:CountryCode )";
    }
}
?>
<html lang="en">

<head>
    <title>User Registration DropDown</title>
</head>

<body>
    <h1>Add Customer but not in order of colums</h1>
    <form action="addcustomer_dropdown.php" method="POST">
        <input type="text" placeholder="Enter Customer ID" name="CustomerID">
        <br> </br>
        <input type="text" placeholder="Enter Your Name" name="Name">
        <br> </br>
        <input type="number" placeholder="Enter Your Outstanding Debt" name="OutstandingDebt">
        <br> </br>
        <input type="email" placeholder="Enter Your Email" name="Email">
        <br> </br>
        <input type="date" placeholder="Enter Your Birthdate" name="Birthdate">
        <br> </br>

        <label>Select a Country Code</label>
        <select name="CountryCode">
            <?php
            require 'connect.php';
            while ($cc = $stmt_s->fetch(PDO::FETCH_ASSOC)):;
            ?>
                <option value="<?php echo $cc["CountryCode"]; ?>">
                    <?php echo $cc["CountryName"]; ?>
                </option>
            <?php
            endwhile;
            ?>
        </select>
        <br> <br>
        <input type="submit" value="submit" name="submit" />
    </form>
</body>

</html>