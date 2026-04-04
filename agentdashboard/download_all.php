<?php
session_start();
include "assets/php/connection.php";

// Check if agent is logged in
if (!isset($_SESSION['agent_id']) || !isset($_SESSION['branch_id'])) {
    die("Unauthorized Access!");
}

$branch_id = $_SESSION['branch_id']; // Get logged-in agent's branch ID

// Fetch all shipments for the logged-in agent’s branch
$sql = "SELECT courier.*, branch.branch_name 
        FROM courier 
        JOIN branch ON branch.branch_id = courier.branch_id 
        WHERE courier.branch_id = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("i", $branch_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All Shipments</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    font-family: Arial, sans-serif;
    margin: 20px;
}
.container {
    max-width: 1000px;
    margin: auto;
}
table {
    width: 100%;
    border-collapse: collapse;
}
th, td {
    border: 1px solid black;
    padding: 10px;
    text-align: left;
}
@media print {
.btn-print {
    display: none;
}
}
</style>
</head>

<body>
    <div class="container">
        <h2 class="text-center">All Shipments - <?php echo date("d-m-Y"); ?></h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                <th>#</th>
                <th>Sender Name</th>
                <th>Sender Email</th>
                <th>Sender Contact</th>
                <th>Courier Type</th>
                <th>Receiver Name</th>
                <th>Receiver Email</th>
                <th>Receiver Contact</th>
                <th>receiver Address</th>
                <th>Parcel Weight</th>
                <th>Price</th>
                <th>Tracking ID</th>
                <th>Branch Name</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['courier_id']; ?></td>
                    <td><?php echo $row['sender_name']  ?></td>
                    <td><?php echo $row['sender_email']  ?></td>
                    <td><?php echo $row['sender_contact']  ?></td>
                    <td><?php echo $row['courier_type']  ?></td>
                    <td><?php echo $row['receiver_name']  ?></td>
                    <td><?php echo $row['receiver_email']  ?></td>
                    <td><?php echo $row['receiver_contact']  ?></td>
                    <td><?php echo $row['receiver_address']  ?></td>
                    <td><?php echo $row['parcel_weight']  ?></td>
                    <td><?php echo $row['price']  ?></td>
                    <td><?php echo $row['tracking_no']  ?></td>
                    <td><?php echo $row['branch_name']  ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Print Button -->
        <button class="btn btn-primary btn-print" onclick="window.print();">Print Report</button>
    </div>

    <script>
        // Auto print when page loads
        window.onload = function() {
            window.print();
        }
    </script>
</body>
</html>
