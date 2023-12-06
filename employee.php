<?php
include "database_info.php"; // includes database access information

// Use $connection for PDO operations
$pdo = $p;

// Handle form submission for updating orders
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_order"])) {
    $orderID = $_POST['OrderID'];
    $notes = $_POST['Notes'];
    $status = $_POST['Status'];

    // Update the ORDERS table
    $stmt = $pdo->prepare("UPDATE ORDERS SET Notes = :notes, Status = :status WHERE OrderID = :orderID");
    $stmt->bindParam(':notes', $notes);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':orderID', $orderID);
    $stmt->execute();
}

// Fetch data for the table, with filtering based on status if selected
$filterStatus = isset($_POST['filter_status']) ? $_POST['filter_status'] : null;
$query = "SELECT OrderID, CustName, Total, Date, Status, Notes FROM ORDERS";
if ($filterStatus) {
    $query .= " WHERE Status = :filterStatus";
}
$query .= " ORDER BY CustName ASC";
$stmt = $pdo->prepare($query);
if ($filterStatus) {
    $stmt->bindParam(':filterStatus', $filterStatus);
}
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css_files/style.css">
    <title>Orders</title>
</head>
<body>
    <div class="text-center">
        <header>
            <h1>Order Fulfillment</h1>
            </header>
    </div>
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

    <!-- Status Filter Form -->
    <form method="post" action="">
        <label for="filter_status"><b>Filter by Status:</b></label>
        <select name="filter_status" id="filter_status" onchange="this.form.submit()">
            <option value="">All</option>
            <option value="Processing" <?php echo $filterStatus == 'Processing' ? 'selected' : ''; ?>>Processing</option>
            <option value="Shipped" <?php echo $filterStatus == 'Shipped' ? 'selected' : ''; ?>>Shipped</option>
            <option value="Delivered" <?php echo $filterStatus == 'Delivered' ? 'selected' : ''; ?>>Delivered</option>
        </select>
    </form>

    <!-- Orders Table -->
    <table class="table table-bordered mx-auto">
        <tr>
            <th>OrderID</th>
            <th>Name</th>
            <th>Total</th>
            <th>Date</th>
            <th>Status</th>
            <th>Notes</th>
            <th>Options</th>
        </tr>

        <?php foreach ($results as $row): ?>
            <tr>
                <td><?php echo $row['OrderID']; ?></td>
                <td><?php echo $row['CustName']; ?></td>
                <td>$ <?php echo $row['Total']; ?></td>
                <td><?php echo $row['Date']; ?></td>
                <td><?php echo $row['Status']; ?></td>
                <td><?php echo $row['Notes']; ?></td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="OrderID" value="<?php echo $row['OrderID']; ?>">
                        <input type="text" name="Notes" placeholder="Enter notes" value="<?php echo $row['Notes']; ?>">
                        <select name="Status">
                            <option value="Processing" <?php echo $row['Status'] == 'Processing' ? 'selected' : ''; ?>>Processing</option>
                            <option value="Shipped" <?php echo $row['Status'] == 'Shipped' ? 'selected' : ''; ?>>Shipped</option>
                            <option value="Delivered" <?php echo $row['Status'] == 'Delivered' ? 'selected' : ''; ?>>Delivered</option>
                        </select>
                        <input type="submit" name="update_order" value="Update">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
