<?php

include "../code.php";
include "../connection.php";

?>



                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <!-- Page body start -->
                                            <div class="page-body">                                                                                
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>CREATE-AGENT</h5>
                                                    </div>
                                                    <div class="card-block">
                                                    <form action="../code.php" method="post" class="form-material">
                                                            <div class="form-group form-default form-static-label">
                                                                <input type="text" id="name" name="AgentName" class="form-control" placeholder="Full-Name" pattern="[A-Za-z\s]{3,20}"  required>
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Name</label>
                                                            </div>
                                                            <div class="form-group form-default form-static-label">
                                                                <input type="email" id="email" name="AgentEmail" class="form-control" placeholder="Email" pattern="[\w.-]+@[a-zA-Z\d.-]+\.[a-zA-Z]{2,}" Required>
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Email</label>
                                                            </div>
                                                            <div class="form-group form-default form-static-label">
                                                                <input type="text" id="password" name="Password" class="form-control" placeholder="Your Password" pattern="[A-Za-z\d!@#$%&*]{5,15}" Required>
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Password</label>
                                                            </div>
                                                           
                                                            <div class="form-group form-default form-static-label">
                                                                <select type="select" id="branch" name="branch_name" class="form-control">
                                                                <option selected>Branch Name</option>       
                                                                <?php
                                                                $branch_Query=mysqli_query($connection,"select * from branch");

                                                                foreach($branch_Query as $value){
                                                                    ?>
                                                                    <option value="<?php echo $value['branch_id']?>"><?php echo $value['branch_name']?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                                </select>
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Branch Name</label>
                                                            </div>
                                                            <div class="form-group form-default"></div>
                                                            <button type="submit" id="createAgent" name="addagent" class="btn btn-primary">Add Agent</button> 
                                                         </form>
                                                    </div>
                                                </div>
          
                                                 <!-- Main-body end -->
                                            <div id="styleSelector">
      


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
        password:{regex:/^[A-Za-z\d!@#$%&*]{5,15}$/, error:"contains 5-15 characters"}
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
            alert("Form submitted successfully!");
            // this.reset(); // Reset form after success
            $(this).find("input").css("border", ""); // Reset border styles
            // location.assign('courier=add.php')

        }
    });
});



//  old code
// $(document).ready(function () {

// function showError(input, message) {
//     $(input).css("border", "1px solid red");
//     $(input).next("span").html(message).css({
//         // "font-weight": "bold",
//         "margin-top": "2px",
//         "color": "red"
//     }).show();
// }

// function showSuccess(input) {
//     $(input).css("border", "1px solid green");
//     $(input).next("span").hide();
// }

// // Name Validation (Only letters & spaces allowed)
// $("#name").on("keyup", function () {
//     let name = $(this).val();
//     let nameRe = /^[A-Za-z\s]+$/;

//     if (!nameRe.test(name)) {
//         showError(this, "Only letters & spaces allowed!");
//     } else if (name.length < 3 || name.length > 20) {
//         showError(this, "Name must be between 3-20 characters.");
//     } else {
//         showSuccess(this);
//     }
// });

// // Email Validation (Improved regex for all valid emails)
// $("#email").on("keyup", function () {
//     let email = $(this).val();
//     let emailRe = /^[\w.-]+@[a-zA-Z\d.-]+\.[a-zA-Z]{2,}$/;

//     if (!emailRe.test(email)) {
//         showError(this, "Enter a valid email (example@domain.com)");
//     } else {
//         showSuccess(this);
//     }
// });

// // Password Validation
// $("#password").on("keyup", function () {
//     let password = $(this).val();
//     let passwordRe = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%&*])[A-Za-z\d!@#$%&*]{5,15}$/;

//     if (!passwordRe.test(password)) {
//         showError(this, "Must have uppercase, lowercase, number & special character.");
//     } else {
//         showSuccess(this);
//     }
// });

// // Parcel Weight Validation
// $("#parcelWeight").on("keyup", function () {
//     let parcelWeight = $(this).val();
//     let weightRe = /^\d{1,5}(\.\d{1,2})?kg$/;

//     if (!weightRe.test(parcelWeight)) {
//         showError(this, "Enter valid weight (e.g., 10kg, 5.5kg)");
//     } else {
//         showSuccess(this);
//     }
// });

// // Form Submission Validation
// $("form").on("#createAgent", function (e) {
//     let isValid = true;

//     $("input[required], select[required]").each(function () {
//         if ($(this).val().trim() === "") {
//             showError(this, "This field is required");
//             isValid = false;
//         }
//     });

//     if (!isValid) {
//         e.preventDefault(); // Stop form submission if validation fails
//         alert("Please correct the errors before submitting.");
//     }
// });

// });

</script> 

</body>

</html>
