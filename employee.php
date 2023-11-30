<?php
include "database_info.php"; // includes database access information

// Assuming $p contains the PDO connection
$connection = $p;

// Fetch data for the dropdown
$stmt = $connection->prepare("SELECT OrderID, CustName, Status FROM ORDERS ORDER BY CustName ASC");
$stmt->execute();
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
            <h1>Orders</h1>
        </header>
        <h2>Name of Store</h2>
    </div>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark py-3">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <div class="right">
                        <div class="button"><button onclick="Logout()">Logout</button></div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <form method="post" action="">
        <label for="order"><b>Select Order:</b></label>
        <!-- Dropdown box for customers to show from the ORDERS table -->
        <select name="order" id="order" onchange="this.form.submit()">
            <?php
            while ($row = $stmt->fetch()) {
                $OrderId = $row["OrderID"];
                $customerName = $row["CustName"];
                $selected = isset($_POST["order"]) && $_POST["order"] === $OrderId ? "selected" : "";
                echo "<option value='$OrderId' $selected>$customerName</option>";
            }
            ?>
        </select>
    </form>

    <?php
    // Check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["order"])) {
        // Display the results as a table
        $stmt = $connection->prepare("SELECT OrderID, CustName, Total, Date, Status, Notes FROM ORDERS WHERE OrderID = :order_id");
        $stmt->bindParam(':order_id', $_POST['order']);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    
        <!-- Display the results as a table -->
        <table class="table table-bordered mx-auto">
            <tr>
                <th><u>OrderID</u></th>
                <th><u>Name</u></th>
                <th><u>Total</u></th>
                <th><u>Date</u></th>
                <th><u>Status</u></th>
                <th><u>Notes</u></th>
            </tr>

            <?php foreach ($results as $row): ?>
                <tr>
                    <!-- Display data for each row in the table -->
                    <td><?php echo $row['OrderID']; ?></td>
                    <td><?php echo $row['CustName']; ?></td>
                    <td>$ <?php echo $row['Total']; ?></td>
                    <td><?php echo $row['Date']; ?></td>
                    <td><?php echo $row['Status']; ?></td>
                    <td><?php echo $row['Notes']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php } ?>
</body>
</html>
