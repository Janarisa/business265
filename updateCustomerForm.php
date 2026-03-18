<?php
require "connect.php";

$sql_c = "SELECT customer.*, country.CountryName
    FROM customer, country
    WHERE customer.CountryCode = country.CountryCode
    AND CustomerID = :CID";
$stmt_customer = $conn->prepare($sql_c);
$stmt_customer->bindParam(':CID', $_GET['CustomerID']);
$stmt_customer->execute();
$result_customer = $stmt_customer->fetch(PDO::FETCH_ASSOC);

$sql_country = "SELECT * FROM country";
$stmt_c = $conn->prepare($sql_country);
$stmt_c->execute();
$cc = $stmt_c->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>แก้ไขข้อมูลลูกค้า</title>
</head>

<body>
    <div class="container">
        <div class="col-md-6"><br>
            <h3>แก้ไขข้อมูลลูกค้า</h3>
            <form action="updateCustomerDB.php" method="POST">
                <div class="mb-2">
                    <label>รหัสลูกค้า</label>
                    <input type="text" name="CustomerID" class="form-control" value="<?= $result_customer['CustomerID'] ?>" readonly>
                </div>
                <div class="mb-2">
                    <label>ชื่อ-นามสกุล</label>
                    <input type="text" name="Name" class="form-control" value="<?= $result_customer['Name'] ?>">
                </div>
                <div class="mb-2">
                    <label>วันเกิด</label>
                    <input type="date" name="Birthdate" class="form-control" value="<?= $result_customer['Birthdate'] ?>">
                </div>
                <div class="mb-2">
                    <label>Email</label>
                    <input type="email" name="Email" class="form-control" value="<?= $result_customer['Email'] ?>">
                </div>
                <div class="mb-2">
                    <label>ยอดหนี้</label>
                    <input type="number" name="OutstandingDebt" class="form-control" value="<?= $result_customer['OutstandingDebt'] ?>">
                </div>
                <div class="mb-2">
                    <label>ประเทศ</label>
                    <select name="CountryCode" class="form-control">
                        <?php foreach ($cc as $c) : ?>
                            <option value="<?= $c['CountryCode'] ?>" <?= ($c['CountryName'] == $result_customer['CountryName']) ? 'selected' : '' ?>>
                                <?= $c['CountryName'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <input type="submit" value="บันทึก" class="btn btn-warning">
                <a href="index.php" class="btn btn-secondary">ยกเลิก</a>
            </form>
        </div>
    </div>
</body>

</html>