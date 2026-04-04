<?php
include "../connection.php";

if (isset($_GET['id'])) {
    $agent_id = $_GET['id'];

    // Fetch agent details
    $query = mysqli_query($connection, "SELECT agent.*, branch.branch_name FROM agent 
        JOIN branch ON branch.branch_id = agent.branch_id 
        WHERE agent_id = '$agent_id'");

    if ($row = mysqli_fetch_assoc($query)) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Agent Details</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 30px;
            text-align: center;
            background-color: #f4f6f9;
        }
        .container {
            width: 70%;
            margin: auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
            border-bottom: 3px solid #007bff;
            padding-bottom: 15px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 16px;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: #ffffff;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        td {
            background-color: #f9f9f9;
        }
        .print-btn {
            margin-top: 30px;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .print-btn:hover {
            background-color: #0056b3;
        }
    </style>
    <script>
        window.onload = function() {
            window.print();  // Auto trigger print dialog
        };
    </script>
</head>
<body>

    <div class="container">
        <h2>Agent Details</h2>
        <table>
            <tr>
                <th>Agent ID</th>
                <td><?php echo $row['agent_id']; ?></td>
            </tr>
            <tr>
                <th>Agent Name</th>
                <td><?php echo $row['agent_name']; ?></td>
            </tr>
            <tr>
                <th>Agent Email</th>
                <td><?php echo $row['agent_email']; ?></td>
            </tr>
            <tr>
                <th>Password</th>
                <td><?php echo $row['agent_password']; ?></td>
            </tr>
            <tr>
                <th>Branch Name</th>
                <td><?php echo $row['branch_name']; ?></td>
            </tr>
        </table>

        <button class="print-btn" onclick="window.print()">Print</button>
    </div>

</body>
</html>

<?php
    } else {
        echo "Agent not found.";
    }
}
?>