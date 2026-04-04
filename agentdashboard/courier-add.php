<?php

include "code.php";

include "../connection.php"

?>


                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <!-- Page body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            <!-- Courier Form Start -->
                                                <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Sender Information</h5>
                                                    </div>
                                                    <div class="card-block">
                                                    <form action="code.php" method="post" class="form-material">
                                                            <div class="form-group form-default form-static-label">
                                                                <input type="text" id="name" name="senderName" class="form-control" placeholder="Full-Name" pattern="[A-Za-z\s]{3,20}" Required>
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Sender-Name</label>
                                                            </div>
                                                            
                                                            <div class="form-group form-default form-static-label">
                                                                <input type="email" id="email" name="senderEmail" class="form-control" placeholder="Email" pattern="[\w.-]+@[a-zA-Z\d.-]+\.[a-zA-Z]{2,}" Required>
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Sender-Email (exa@gmail.com)</label>
                                                            </div>
                                                            <div class="form-group form-default form-static-label">
                                                                <input type="tel" id="contact" name="senderContact" class="form-control" placeholder="03 ..." pattern="[0-9]{10,15}" Required>
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Sender-Contact</label>
                                                            </div>
                                                            <div class="form-group form-default form-static-label">
                                                                <input type="text" name="senderAddress" class="form-control" placeholder="Full Address"  Required>
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Sender's Address</label>
                                                            </div>
                                                            <div class="form-group form-default form-static-label">
                                                                <select type="select" name="courierType" class="form-control" pattern="" Required>
                                                                <option disabled selected >Courier type</option>       
                                                                <option value="Normal">Normal</option>
                                                                <option value="Fast">Fast</option>
                                                                </select>
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Select type</label>
                                                            </div>
                                                            <!-- <div class="form-group form-default form-static-label">
                                                                <select type="select" name="branch" class="form-control" >
                                                                <option disabled selected>Branch Name</option>       
                                                               
                                                                ?>
                                                                </select>
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Branch Name</label>
                                                            </div> -->

                                                            <div class="form-group form-default form-static-label">
                                                                <select name="branch" class="form-control" readonly>
                                                                    <?php
                                                                    session_start();
                                                                    $agent_branch_id = $_SESSION['branch_id']; //  branch_id is stored in the session

                                                                    $branch_Query = mysqli_query($connection, "SELECT * FROM branch WHERE branch_id = '$agent_branch_id'");
                                                                    $branch = mysqli_fetch_assoc($branch_Query);
                                                                    ?>
                                                                    <option value="<?php echo $branch['branch_id']; ?>" selected>
                                                                        <?php echo $branch['branch_name']; ?>
                                                                    </option>
                                                                </select>
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Branch Name (Auto-assigned)</label>
                                                            </div>

                                                            <div class="form-group form-default form-static-label">
                                                                <textarea class="form-control" placeholder="" ></textarea>
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Desc. From Sender (optional)</label>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Receiver Information</h5>
                                                    </div>
                                                    <div class="card-block form-material">
                                                            <div class="form-group form-default form-static-label">
                                                                <input type="text" id="name" name="receiverName" class="form-control" placeholder="Full Name" pattern="[A-Za-z\s]{3,20}" Required>
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Receiver's Name</label>
                                                            </div>
                                                            <div class="form-group form-default form-static-label">
                                                                <input type="email" id="email" name="receiverEmail" class="form-control" placeholder="Email" pattern="[\w.-]+@[a-zA-Z\d.-]+\.[a-zA-Z]{2,}" Required>
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Receiver's Email (exa@gmail.com)</label>
                                                            </div>
                                                            <div class="form-group form-default form-static-label">
                                                                <input type="tel" id="contact" name="receiverContact" class="form-control" placeholder="03 ..." pattern="[0-9]{10,15}" Required>
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Receiver's Contact</label>
                                                            </div>
                                                            <div class="form-group form-default form-static-label">
                                                                <input type="text" name="receiverAddress" class="form-control" placeholder="Full Address"  Required>
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Receiver's Address</label>
                                                            </div>
                                                            <div class="form-group form-default form-static-label">
                                                                <input type="text" id="parcelWeight" name="parcelWeight" class="form-control" placeholder="Parcel Weight (Kg)" oninput="calculatePrice()" pattern="\d{1,5}(\.\d{1,2})?kg?" Required>
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Weightage in Kg*</label>
                                                            </div>
                                                            <div class="form-group form-default form-static-label">
                                                                <input type="text" id="price" name="price"class="form-control" placeholder="Price" Required readonly>
                                                                <span class="form-bar"></span>
                                                                 <label class="float-label">Parcel Amount</label> 
                                                            </div>
                                                                  
                                                          
                                                            <button type="submit" name="addData" class="btn btn-primary">Add Courier</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Courier Form End -->
                                    </div>
                                    <!-- Page body end -->
                                </div>
                            </div>
                            <!-- Main-body end -->
                            <div id="styleSelector">

                            </div>
                        </div>



                        <?php
// include 'connection.php'; // Include database connection

// if ($_SERVER["REQUEST_METHOD"] == "POST") {

//     function cleanInput($data) {
//         return htmlspecialchars(strip_tags(trim($data)));
//     }

//     $name = cleanInput($_POST['sender_name']);
//     $email = cleanInput($_POST['sender_email']);
//     $contact = cleanInput($_POST['sender_contact']);
//     $address = cleanInput($_POST['sender_address']);
//     $courierType = cleanInput($_POST['courier_type']);
//     // $branch = cleanInput($_POST['branch']);

//     $errors = [];

//     // Name validation
//     if (!preg_match("/^[A-Za-z\s]{3,20}$/", $name)) {
//         $errors['name'] = "Only letters & spaces (3-20 characters).";
//     }

//     // Email validation
//     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//         $errors['email'] = "Invalid email format.";
//     }

//     // Phone validation
//     if (!preg_match("/^[0-9]{10,15}$/", $contact)) {
//         $errors['contact'] = "Phone number must be 10-15 digits.";
//     }

//     // Check for empty required fields
//     if (empty($name) || empty($email) || empty($contact) || empty($address) || empty($courierType) || empty($branch)) {
//         $errors['required'] = "All fields are required.";
//     }

//     // If errors exist, return to form
//     if (!empty($errors)) {
//         session_start();
//         $_SESSION['errors'] = $errors;
//         header("Location: public.php?courier-add.php"); // Redirect to form page
//         exit();
//     }

//     // Insert into database
//     $stmt = $conn->prepare("INSERT INTO courier_orders (name, email, contact, address, courier_type, branch) VALUES (?, ?, ?, ?, ?, ?)");
//     $stmt->bind_param("ssssss", $name, $email, $contact, $address, $courierType, $branch);

//     // if ($stmt->execute()) {
//     //     echo "<script>alert('Order successfully placed!'); window.location.href = 'success.php';</script>";
//     // } else {
//     //     echo "<script>alert('Error occurred. Try again.'); window.location.href = 'form.php';</script>";
//     // }

//     $stmt->close();
//     $conn->close();
// }






// Validation

// include("connection.php"); // Include your database connection file

// if (isset($_POST['addData'])) {
//     // 🔹 Sanitize Inputs (Matching Form Field Names)
//     $senderName = trim($_POST['senderName']); // Matches input name="senderName"
//     $senderEmail = trim($_POST['senderEmail']);
//     $senderContact = trim($_POST['senderContact']);
//     $senderAddress = trim($_POST['senderAddress']);
//     $courierType = trim($_POST['courierType']);
//     $branch = trim($_POST['branch']);
//     $receiverName = trim($_POST['receiverName']); // Matches input name="receiverName"
//     $receiverEmail = trim($_POST['receiverEmail']);
//     $receiverContact = trim($_POST['receiverContact']);
//     $receiverAddress = trim($_POST['receiverAddress']);
//     $parcelWeight = trim($_POST['parcelWeight']);
//     $price = trim($_POST['price']);

//     // 🔹 Validate Required Fields
//     if (
//         empty($senderName) || empty($senderEmail) || empty($senderContact) || empty($senderAddress) || 
//         empty($courierType) || empty($branch) || empty($receiverName) || empty($receiverEmail) || 
//         empty($receiverContact) || empty($receiverAddress) || empty($parcelWeight) || empty($price)
//     ) {
//         die("❌ Error: All fields are required.");
//     }

//     // 🔹 Validate Name (Only letters & spaces, 3-50 characters)
//     if (!preg_match("/^[A-Za-z\s]{3,50}$/", $senderName) || !preg_match("/^[A-Za-z\s]{3,50}$/", $receiverName)) {
//         die("❌ Error: Name must be between 3-50 characters and only contain letters & spaces.");
//     }
    
//     // 🔹 Validate Email Format
//     if (!filter_var($senderEmail, FILTER_VALIDATE_EMAIL) || !filter_var($receiverEmail, FILTER_VALIDATE_EMAIL)) {
//         die("❌ Error: Invalid email format.");
//     }

//     // 🔹 Validate Phone Number (Only digits, 10-15 length)
//     if (!preg_match("/^\d{10,15}$/", $senderContact) || !preg_match("/^\d{10,15}$/", $receiverContact)) {
//         die("❌ Error: Contact number must be 10-15 digits.");
//     }

//     // 🔹 Validate Parcel Weight (Format: 10 or 5.5)
//     if (!preg_match("/^\d{1,5}(\.\d{1,2})?kg?$/", $parcelWeight)) {
//         die("❌ Error: Invalid parcel weight format. Example: 10kg or 5.5kg");
//     }

//     // 🔹 Validate Price (Must be a valid number)
//     if (!is_numeric($price)) {
//         die("❌ Error: Price must be a valid number.");
//     }

//     // 🔹 Prepare SQL Query to Insert Data
//     $query = "INSERT INTO courier 
//               (sender_name, sender_email, sender_contact, sender_address, courier_type, branch_id, 
//               receiver_name, receiver_email, receiver_contact, receiver_address, parcel_weight, price) 
//               VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

//     $stmt = $connection->prepare($query);
//     $stmt->bind_param("ssssssssssss", 
//         $senderName, $senderEmail, $senderContact, $senderAddress, 
//         $courierType, $branch, $receiverName, $receiverEmail, 
//         $receiverContact, $receiverAddress, $parcelWeight, $price
//     );

//     if ($stmt->execute()) {
//         echo "✅ Data inserted successfully!";
//     } else {
//         echo "❌ Error: " . $stmt->error;
//     }

//     // Close the statement and connection
//     $stmt->close();
//     $connection->close();
// }

?>





    <!-- Required Jquery -->
    <script type="text/javascript" src="assets/js/jquery/jquery.min.js "></script>
    <script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js "></script>
    <!-- <script src="assets/js/regex.js"></script> -->

    <!-- waves js -->
    <script src="assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Custom js -->
    <script src="assets/js/pcoded.min.js"></script>
    <script src="assets/js/vertical/vertical-layout.min.js"></script>
    <script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="assets/js/script.js"></script>

    <script>
        function calculatePrice() {
    let weight = document.getElementById('parcelWeight').value.trim();
    let trimWeight = parseFloat(weight.replace(/[^\d.]/g, ''));
    let pricePerKg = 1100;
    let extraCharge = 0;
    
    let courierType = document.querySelector('select[name="courierType"]').value;
    if (courierType === "Fast") {
        extraCharge = 300;
    }

    if (!isNaN(trimWeight)) { 
        let totalPrice = (trimWeight * pricePerKg) + extraCharge;
        document.getElementById('price').value = totalPrice.toFixed(2); 
    } else {
        document.getElementById('price').value = ''; 
    }
}

document.querySelector('select[name="courierType"]').addEventListener('change', calculatePrice);

$(document).ready(function () {
    function showError(input, message) {
        $(input).css("border", "2px solid red");
        $(input).siblings(".error-message").remove(); // Remove previous error
        $(input).after(`<span class="error-message" style="color: red; font-size: 12px;">${message}</span>`);
    }

    function showSuccess(input) {
        $(input).css("border", "2px solid green");
        $(input).siblings(".error-message").remove(); // Remove error if valid
    }

    function validateField(input, regex, errorMsg) {
        let value = $(input).val().trim();
        if (!regex.test(value)) {
            showError(input, errorMsg);
            return false;
        } else {
            showSuccess(input);
            return true;
        }
    }

    // Validation rules
    const rules = {
        name: { regex: /^[A-Za-z\s]{3,20}$/, error: "Only letters & spaces (3-20 characters)" },
        email: { regex: /^[\w.-]+@[a-zA-Z\d.-]+\.[a-zA-Z]{2,}$/, error: "Invalid email format" },
        contact: { regex: /^\d{10,15}$/, error: "Enter 10-15 digit number" },
        parcelWeight: { regex: /^\d{1,50}(\.\d{1,2})?kg?$/, error: "Enter weight (e.g., 10kg, 5.5kg)" },
        // price: { regex: /^\d+(\.\d{1,2})?$/, error: "Enter a valid price (e.g., 100, 99.99)" }
    };

    // Apply validation dynamically to all matching fields
    $("input").on("keyup blur", function () {
        let field = $(this).attr("id") || $(this).attr("name");
        if (rules[field]) {
            validateField(this, rules[field].regex, rules[field].error);
        }
    });

    // Form submission validation
    $("form").on("submit", function (e) {
        let isValid = true; 

        $(this).find("input[required]").each(function () {
            let field = $(this).attr("id") || $(this).attr("name");
            if (rules[field] && !validateField(this, rules[field].regex, rules[field].error)) {
                isValid = false;
            }
        });

        if (!isValid) {
            e.preventDefault(); // Stop form submission if validation fails
            alert("Please correct the errors before submitting.");
        } else {
            // alert("Form submitted successfully!");
            // this.reset(); // Reset form after success
            $(this).find("input").css("border", ""); // Reset border styles
            // location.assign('courier-add.php')

        }
    });
});

</script>
</body>

</html>