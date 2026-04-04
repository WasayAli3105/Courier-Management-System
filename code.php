<link rel="stylesheet" href="">
<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

?>

<?php

include "connection.php";

include_once "session.php";


// user register code

if(isset($_POST['register'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['pass'];

    $insertQuery=mysqli_query($connection,"insert into customer (C_name,C_email,C_password)
    values ('$name','$email','$password')");

    if($insertQuery){
        echo "<script>
        alert('Account created successfully')
        location.assign('signup.php')
        </script>";

    }
}


// agent register code

if(isset($_POST['agentregister'])){
    $name=$_POST['name'];
    $email=$_POST['agentemail'];
    $password=$_POST['agentpassword'];
    $role =2;


    $insertQuery=mysqli_query($connection,"insert into agent (name,email,password,role_id)
    values ('$name','$email','$password','$role')");

    if($insertQuery){
        echo "<script>
        alert('Account created successfully')
        location.assign('agent.php')
        </script>";

    }
}




// Role-Base login form code

if(isset($_POST['login'])){
    $email = $_POST['emailcheck'];
    $password = $_POST['passwordcheck'];

    $userQuery =mysqli_query($connection,"SELECT * from  customer where C_email = '$email' AND C_password = '$password'");
    
    $adminQuery =mysqli_query($connection,"SELECT * from  admin where email = '$email' AND password = '$password'");

    $agentQuery =mysqli_query($connection,"SELECT * from  agent where agent_email = '$email' AND agent_password = '$password'");
    // data return in 1 or 0

    if(mysqli_num_rows($adminQuery)){
        // convert into array
        $data = mysqli_fetch_assoc($adminQuery);
        $_SESSION['adminName']=$data['name'];
        header('Location: admindashboard/public.php?index');

    }
    else if(mysqli_num_rows($userQuery)){
        // convert into array
        $data = mysqli_fetch_assoc($userQuery);
        $_SESSION['C_id']=$data['C_id'];
        header('Location: tracking.php');

    }else if(mysqli_num_rows($agentQuery)){
        // convert into array
        $data = mysqli_fetch_assoc($agentQuery);
        $_SESSION['agentid']=$data['agent_id'];
        $_SESSION['branch_id'] = $data['branch_id'];
        $_SESSION['agentName']=$data['agent_name'];
        header('Location: agentdashboard/public.php?index');
        // echo "working agent";

    }else{
        echo "Email Or Password Not Correct";
    }
}






// ***************Agent Courier Add
if(isset($_POST['agentaddData'])){
    // echo "workin";
    // die();
    $s_name = $_POST['senderName'];
    $s_email = $_POST['senderEmail'];
    $s_contact = $_POST['senderContact'];
    $s_address = $_POST['senderAddress'];
    $courier_type = $_POST['courierType'];
    $r_name = $_POST['receiverName'];
    $r_email = $_POST['receiverEmail'];
    $r_contact = $_POST['receiverContact'];
    $r_address = $_POST['receiverAddress'];
    $parcel = $_POST['parcelWeight'];
    // $price = $_POST['price'];
    $branch = $_POST['branch'];
    $status="pending";
    // $tracking_id = 12345; // You might want to generate a unique tracking ID dynamically
    // $tracking_id = uniqid(); // Generates a unique tracking number
    $tracking_id=
    // Generate a random number between 1 and 100
     rand(1000000,2000000);
    
    // Insert Courier Into Database 
    $addCourier_query = mysqli_query($connection, "INSERT INTO courier 
    (sender_name, sender_email, sender_contact, sender_address, courier_type, receiver_name, receiver_email,receiver_contact, receiver_address, price,status, parcel_weight, tracking_no, branch_id)
    VALUES 
    ('$s_name', '$s_email', '$s_contact', '$s_address', '$courier_type', '$r_name', '$r_email','$r_contact', '$r_address', '$price','$status', '$parcel', '$tracking_id', '$branch')");


    if($addCourier_query){
        echo "<script>
        alert('Your Courier has been Successfully Added!');
        location.assign('agentdashboard/public.php?courier-add');
        </script>";
    } 
}

// Admin Delete Courier 

if(isset($_POST['courierDelete'])){
    $courier_id = $_POST['id'];
    $deleteData = mysqli_query($connection, "DELETE FROM courier WHERE courier_id = '$courier_id'");
    if($deleteData){
        echo "<script>
        alert('Courier deleted successfully')
        location.assign('admindashboard/public.php?courier-details');</script>";
    }
}

// Agent Courier Delete
if(isset($_POST['agnetcourierDelete'])){
    $courier_id = $_POST['id'];
    $deleteData = mysqli_query($connection, "DELETE FROM courier WHERE courier_id = '$courier_id'");
    if($deleteData){
        echo "<script>
        alert('Courier deleted successfully')
        location.assign('agentdashboard/public.php?dashboard&status=success');</script>";
    }
}

// Update Courier And Send Email Code

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Ensure PHPMailer is installed via Composer

if(isset($_POST['courierUpdate'])) {
    $id = $_POST['id'];
    $s_name = $_POST['senderName'];
    $s_email = $_POST['senderEmail'];
    $s_contact = $_POST['senderContact'];
    $s_address = $_POST['senderAddress'];
    $r_name = $_POST['receiverName'];
    $r_email = $_POST['receiverEmail'];
    $r_contact = $_POST['receiverContact'];
    $r_address = $_POST['receiverAddress'];
    $parcel = $_POST['parcelWeight'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    
    $update_query = mysqli_query($connection, "UPDATE courier SET 
        sender_name = '$s_name', sender_email = '$s_email', sender_contact = '$s_contact',
        sender_address = '$s_address', receiver_name = '$r_name', receiver_email = '$r_email',
        receiver_contact = '$r_contact', receiver_address = '$r_address',
        price = '$price', parcel_weight = '$parcel', status = '$status' 
        WHERE courier_id = '$id'");

    if($update_query) {
        $check_query = mysqli_query($connection, "SELECT * FROM courier WHERE courier_id = '$id'");

        if ($row = mysqli_fetch_assoc($check_query)) {
            $tracking_id = $row['tracking_no']; // Generate a unique tracking ID
            $senderEmail = $row['sender_email'];
            $receiverEmail = $row['receiver_email'];
            $parcelWeight = $row['parcel_weight'];
            $deliveryDate = date('Y-m-d', strtotime('+3 days')); // Estimated delivery in 3 days

            $mail = new PHPMailer(true);
            try {
                // SMTP Configuration
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'ah1482006@gmail.com'; // Use environment variables
                $mail->Password = 'asqqpjwhzundqbox'; // Use app-specific password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port = 465;

                // Email Recipients
                $mail->setFrom('no-reply@yourcourier.com', 'Your Courier Service');
                $mail->addAddress($senderEmail, $s_name);
                $mail->addAddress($receiverEmail, $r_name);
                // $mail->addReplyTo('support@yourcourier.com', 'Customer Support');

                // Email Content
                $mail->isHTML(true);
                $mail->Subject = "Courier Status Update - Tracking #$tracking_id";
                
                $mail->Body = "
                <html>
                <body style='font-family:Arial, sans-serif; line-height:1.6;'>
                    <h2 style='color:#008080;'>Courier Tracking Update</h2>
                    <p>Dear <b>$s_name</b>,</p>
                    <p>Your courier has been successfully updated with the following details:</p>
                    <table style='border-collapse:collapse; width:100%; border:1px solid #ddd;'>
                        <tr><td><b>Tracking ID:</b></td><td>$tracking_id</td></tr>
                        <tr><td><b>Sender Name:</b></td><td>$s_name</td></tr>
                        <tr><td><b>Receiver Name:</b></td><td>$r_name</td></tr>
                        <tr><td><b>Parcel Weight:</b></td><td>$parcelWeight</td></tr>
                        <tr><td><b>Parcel Price:</b></td><td>$$price</td></tr>
                        <tr><td><b>Current Status:</b></td><td><b style='color:green;'>$status</b></td></tr>
                        <tr><td><b>Estimated Delivery:</b></td><td>$deliveryDate</td></tr>
                    </table>
                    <p>You can track your shipment at: <a href='https://yourcourier.com/track?tracking_id=$tracking_id' style='color:#008080;'>Track Your Shipment</a></p>
                    <p>Thank you for using <b>Your Courier Service</b>. If you have any questions, contact our support team.</p>
                    <hr>
                    <p style='font-size:12px; color:#666;'>This is an automated email, please do not reply.</p>
                </body>
                </html>";

                $mail->AltBody = "Courier Tracking Update:
                - Tracking ID: $tracking_id
                - Sender: $s_name
                - Receiver: $r_name
                - Parcel Weight: $parcelWeight kg
                - Price: $" . number_format($price, 2) . "
                - Status: $status
                - Estimated Delivery: $deliveryDate
                Track your shipment at https://yourcourier.com/track?tracking_id=$tracking_id";

                if ($mail->send()) {
                    echo "<script>alert('Email has been sent successfully!'); window.location.href='admindashboard/public.php?courier-details&status=success';</script>";
                    exit();
                } else {
                    echo "<script>alert('Email could not be sent. Error: " . addslashes($mail->ErrorInfo) . "'); window.location.href='admindashboard/public.php?courier-details&status=failed';</script>";
                    exit();
                }
                
            } catch (Exception $e) {
                echo "Email could not be sent. Error: {$mail->ErrorInfo}";
            }
        } else {
            echo "No record found for this courier ID.";
        }
    } else {
        echo "Error updating courier record.";
    }
}



// Create Agent

if(isset($_POST['addagent'])){
    // echo "working";
    // die();
    $agentname=$_POST['AgentName'];
    $agentemail=$_POST['AgentEmail'];
    $password=$_POST['Password'];
    $branch = $_POST['branch_name'];

    $addAgent_query = mysqli_query($connection, "INSERT INTO agent(
    agent_name,agent_email,agent_password,branch_id) values 
    ('$agentname', '$agentemail', '$password','$branch')");

    if($addAgent_query){
        echo "<script>
        alert('Your Agent data has been Successfully Added');
        location.assign('admindashboard/public.php?agent-create');
        </script>";
    } 
    
}






// `status` ko 'pending' set karein
// `status` values
$pending = 'PENDING';
$process = 'PROCESSING';
$deliver = 'DELIVERED';
$complete = 'COMPLETED';

// SQL queries for each status
$sql_pending = "SELECT COUNT(*) as count FROM courier WHERE status = '$pending'";
$sql_process = "SELECT COUNT(*) as count FROM courier WHERE status = '$process'";
$sql_delivered = "SELECT COUNT(*) as count FROM courier WHERE status = '$deliver'";
$sql_completed = "SELECT COUNT(*) as count FROM courier WHERE status = '$complete'";

// Execute the queries and get the results
$result_pending = $connection->query($sql_pending);
$result_process = $connection->query($sql_process);
$result_delivered = $connection->query($sql_delivered);
$result_completed = $connection->query($sql_completed);

// Initialize counts
$pending_count = 0;
$process_count = 0;
$delivered_count = 0;
$completed_count = 0;

// Fetch results for each status
if ($result_pending->num_rows > 0) {
    $row = $result_pending->fetch_assoc();
    $pending_count = $row['count'];
}

if ($result_process->num_rows > 0) {
    $row = $result_process->fetch_assoc();
    $process_count = $row['count'];
}

if ($result_delivered->num_rows > 0) {
    $row = $result_delivered->fetch_assoc();
    $delivered_count = $row['count'];
}

if ($result_completed->num_rows > 0) {
    $row = $result_completed->fetch_assoc();
    $completed_count = $row['count'];
}

// Close connection
// $connection->close();


// Validation 

if (isset($_POST['senderName'])) {
    // 🔹 Sanitize Inputs (Matching Form Field Names)F
    $senderName = trim($_POST['senderName']); // Matches input name="senderName"
    $senderEmail = trim($_POST['senderEmail']);
    $senderContact = trim($_POST['senderContact']);
    $senderAddress = trim($_POST['senderAddress']);
    // 
    $courierType = trim($_POST['courierType']);
    $branch = trim($_POST['branch']);
    // 
    $price = trim($_POST['price']);
    // 
    $receiverName = trim($_POST['receiverName']); // Matches input name="receiverName"
    $receiverEmail = trim($_POST['receiverEmail']);
    $receiverContact = trim($_POST['receiverContact']);
    $receiverAddress = trim($_POST['receiverAddress']);
    $parcelWeight = trim($_POST['parcelWeight']);
    $tracking_id=
    // Generate a random number between 1 and 100
     rand(1000000,2000000);
    // $price = trim($_POST['price']);

    // 🔹 Validate Required Fields
    if (
        empty($senderName) || empty($senderEmail) || empty($senderContact) || empty($senderAddress) || 
          empty($receiverName) || empty($receiverEmail) || 
        empty($receiverContact) || empty($receiverAddress) || empty($parcelWeight) 
    ) 
    {
        die("❌ Error: All fields are required.");
    }

    // 🔹 Validate Name (Only letters & spaces, 3-50 characters)
    if (!preg_match("/^[A-Za-z\s]{3,50}$/", $senderName) || !preg_match("/^[A-Za-z\s]{3,50}$/", $receiverName))
     {
        echo("❌ Error: Name must be between 3-50 characters and only contain letters & spaces.");
    }
    
    // 🔹 Validate Email Format
    if (!filter_var($senderEmail, FILTER_VALIDATE_EMAIL) || !filter_var($receiverEmail, FILTER_VALIDATE_EMAIL))
     {
        die("❌ Error: Invalid email format.");
    }

    // 🔹 Validate Phone Number (Only digits, 10-15 length)
    if (!preg_match("/^\d{10,15}$/", $senderContact) || !preg_match("/^\d{10,15}$/", $receiverContact))
     {
        die("❌ Error: Contact number must be 10-15 digits.");
    }

    // 🔹 Validate Parcel Weight (Format: 10 or 5.5)
    if (!preg_match("/^\d{1,5}(\.\d{1,2})?kg?$/", $parcelWeight)) 
    {
        echo("❌ Error: Invalid parcel weight format. Example: 10kg or 5.5kg");
    }

    // 🔹 Validate Price (Must be a valid number)
    // if (!is_numeric($price))
    //  {
    //     die("❌ Error: Price must be a valid number.");
     // }
     

    // 🔹 Prepare SQL Query to Insert Data
    $query = "INSERT INTO courier (sender_name, sender_email, sender_contact, sender_address,courier_type, 
    receiver_name, receiver_email, receiver_contact, receiver_address,branch_id, parcel_weight, tracking_no, price) 
    VALUES (?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $connection->prepare($query);
    $stmt->bind_param("sssssssssssss", 
        $senderName, $senderEmail, $senderContact, $senderAddress, $courierType, 
         $receiverName, $receiverEmail, 
        $receiverContact, $receiverAddress, $branch, $parcelWeight, $tracking_id, $price
    );

    if ($stmt->execute()) {
        // header('location')
        // echo "✅ Data inserted successfully!";
        // echo "<script>     
        // ✅ Data inserted successfully!
        // </script>";
        echo "<script>
        alert('Your data has been Successfully Added');
        location.assign('admindashboard/public.php?courier-add');
        </script>";
    
    } 
    // else {
    //     echo "❌ Error: " . $stmt->error;
    // }

    // Close the statement and connection
    $stmt->close();
    $connection->close();
}

?>