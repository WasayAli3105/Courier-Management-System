<?php
session_start();
include "connection.php"; // Include your database connection file

// Function to check if user is logged in
function isLoggedIn() {
    return isset($_SESSION['C_id']);
}



// Get the tracking number from the form (if set)
$trackingNumber = isset($_POST['tracking_id']) ? $_POST['tracking_id'] : '';

// Query to fetch courier details based on the tracking number
$courierDetails = null;
if ($trackingNumber) {
    $stmt = $connection->prepare("SELECT * FROM courier WHERE tracking_no = ?");
    $stmt->bind_param("s", $trackingNumber); // Bind the tracking number
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch the courier details if found
        $courierDetails = $result->fetch_assoc();
    } else {
        // No matching tracking ID found
        $errorMessage = "No tracking ID found for '{$trackingNumber}'.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Parcel - SwiftShip Courier Services</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- <style>
        /* Sidebar Style */
        .sidebar {
            width: 250px;
            top: 0;
            left: 0;
            bottom: 0;
            padding-top: 20px;
            padding-left: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar a {
            display: block;
            color: #333;
            padding: 10px;
            text-decoration: none;
            margin-bottom: 10px;
        }

        .sidebar a:hover {
            background-color: #007bff;
            color: white;
        }

        /* Main Content Style */
        .main-content {
            margin-left: 250px; /* To account for the sidebar */
            padding: 20px;
        }

        /* For smaller screens */
        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }
            .main-content {
                margin-left: 200px;
            }
        }
    </style> -->
</head>
<body>
    <?php
    include 'navbar.php'; ?>
     <!-- Sidebar -->
     <!-- <div class="sidebar">
        <a href="#">Details about Courier</a>
        <a href="#">Status of Courier</a>
        <a href="#">Tracking ID Search</a>
        <a href="#">Download Invoice</a>
    </div> -->
    <div class="container my-5">
        <!-- Sign-in Required if not logged in -->
        <?php if (!isLoggedIn()) : ?>
            <div class="alert alert-warning text-center">
                <strong>Please sign in to track your parcel.</strong>
            </div>
        <?php else : ?>
            <!-- Tracking Form -->
            <h2 class="text-center mb-4">Track Your Parcel</h2>
            <form method="POST" class="mb-5">
                <div class="input-group">
                    <input type="text" class="form-control" name="tracking_id" placeholder="Enter Tracking ID" required>
                    <button class="btn btn-primary" type="submit" style=">
                        <i class="fas fa-search me-2"></i>Search
                    </button>
                </div>
            </form>

            <!-- Error Message if No Tracking ID Found -->
            <?php if (isset($errorMessage)) : ?>
                <div class="alert alert-danger text-center"><?= $errorMessage ?></div>
            <?php endif; ?>

            <!-- Display Courier Details if Found -->
            <?php if ($courierDetails) : ?>
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h3 class="mb-0">Courier Details</h3>
                            <button onclick="printCourierDetails()" class="btn btn-primary">
                                <!-- <i class="fas fa-print me-2"></i> -->
                                 Download Details 
                            </button>
                        </div>
                        <div id="printable-content">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Sender Name</th>
                                    <td><?= $courierDetails['sender_name'] ?></td>
                                </tr>
                                <tr>
                                    <th>Sender Email</th>
                                    <td><?= $courierDetails['sender_email'] ?></td>
                                </tr>
                                <tr>
                                    <th>Sender Contact</th>
                                    <td><?= $courierDetails['sender_contact'] ?></td>
                                </tr>
                                <tr>
                                    <th>Sender Address</th>
                                    <td><?= $courierDetails['sender_address'] ?></td>
                                </tr>
                                <tr>
                                    <th>Courier Type</th>
                                    <td><?= $courierDetails['courier_type'] ?></td>
                                </tr>
                                <tr>
                                    <th>Receiver Name</th>
                                    <td><?= $courierDetails['receiver_name'] ?></td>
                                </tr>
                                <tr>
                                    <th>Receiver Email</th>
                                    <td><?= $courierDetails['receiver_email'] ?></td>
                                </tr>
                                <tr>
                                    <th>Receiver Contact</th>
                                    <td><?= $courierDetails['receiver_contact'] ?></td>
                                </tr>
                                <tr>
                                    <th>Receiver Address</th>
                                    <td><?= $courierDetails['receiver_address'] ?></td>
                                </tr>
                                <tr>
                                    <th>Parcel Weight</th>
                                    <td><?= $courierDetails['parcel_weight'] ?> kg</td>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <td>$<?= $courierDetails['price'] ?></td>
                                </tr>
                                <tr>
                                    <th>Date</th>
                                    <td><?= $courierDetails['date'] ?></td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td><?= $courierDetails['status'] ?></td>
                                </tr>
                                <tr>
                                    <th>Tracking Number</th>
                                    <td><?= $courierDetails['tracking_no'] ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <script>
                function printCourierDetails() {
                    // Store the original body content
                    const originalContent = document.body.innerHTML;
                    
                    // Get only the printable content
                    const printContent = document.getElementById('printable-content').innerHTML;
                    
                    // Add a header to the print content
                    document.body.innerHTML = `
                        <div style="text-align: center; margin-bottom: 20px;">
                            <h2>SwiftShip Courier Services</h2>
                            <h3>Courier Details</h3>
                        </div>
                        ${printContent}
                    `;
                    
                    // Print the document
                    window.print();
                    
                    // Restore the original content
                    document.body.innerHTML = originalContent;
                    
                    // Reattach the event listener
                    document.querySelector('button').onclick = printCourierDetails;
                }
                </script>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <?php include 'footer.php'; ?>

</body>
</html>