<?php
include "database_info.php"; // includes database access information

$pdo = $p; // Assuming $pdo contains the PDO connection

// Fetching In Stock items
$stmtInStock = $pdo->prepare("SELECT ProdID, Name, Cost, Amount, Description FROM PRODUCT WHERE Amount > 0");
$stmtInStock->execute();
$inStockResults = $stmtInStock->fetchAll(PDO::FETCH_ASSOC);

// Fetching Out of Stock items
$stmtOutOfStock = $pdo->prepare("SELECT ProdID, Name, Cost, Amount, Description FROM PRODUCT WHERE Amount = 0");
$stmtOutOfStock->execute();
$outOfStockResults = $stmtOutOfStock->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css_files/style.css">
    <title>Inventory</title>
</head>
<body>
    <h1 class="text-center">Inventory</h1>
    <!-- Navigation bar -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark py-3">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="homepage.php" class="btn btn-light">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        

        <!-- In Stock Table -->
        <h2>In Stock</h2>
        <table class="table table-bordered">
            <tr>
                <th>ProdID</th>
                <th>Name</th>
                <th>Cost</th>
                <th>Amount</th>
                <th>Description</th>
            </tr>
            <?php foreach ($inStockResults as $row): ?>
                <tr>
                    <td><?php echo $row['ProdID']; ?></td>
                    <td><?php echo $row['Name']; ?></td>
                    <td>$ <?php echo $row['Cost']; ?></td>
                    <td><?php echo $row['Amount']; ?></td>
                    <td><?php echo $row['Description']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <!-- Out of Stock Table -->
        <h2>Out of Stock</h2>
        <table class="table table-bordered">
            <tr>
                <th>ProdID</th>
                <th>Name</th>
                <th>Cost</th>
                <th>Amount</th>
                <th>Description</th>
            </tr>
            <?php foreach ($outOfStockResults as $row): ?>
                <tr>
                    <td><?php echo $row['ProdID']; ?></td>
                    <td><?php echo $row['Name']; ?></td>
                    <td>$ <?php echo $row['Cost']; ?></td>
                    <td><?php echo $row['Amount']; ?></td>
                    <td><?php echo $row['Description']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
