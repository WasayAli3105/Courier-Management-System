<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - SwiftShip Courier Services</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Navigation Bar -->
   <?php 
   include 'navbar.php';

   include "connection.php";
   ?>

    <!-- Sign Up Section -->
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="card border-0 shadow-custom">
                        <div class="card-body p-5">
                            <h2 class="text-center mb-4">Create an Account</h2>
                            <form id="signupForm" action="code.php" method="post">
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="firstName" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="firstName" required name="name">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="email" required name="email">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password" required name="pass">
                                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                    <div class="form-text">Password must be at least 8 characters long and include numbers and special characters.</div>
                                </div>
                               
                                <button type="submit" class="btn btn-primary w-100 mb-3" name="register">Sign Up</button>
                                <div class="text-center">
                                    <p class="mb-0">Already have an account? <a href="signin.php" class="text-decoration-none">Sign In</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
   
    <?php
    include 'footer.php';
    ?>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    
    <!-- Custom JavaScript -->
    <script>
        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const password = document.getElementById('password');
            const icon = this.querySelector('i');
            
            if (password.type === 'password') {
                password.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                password.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });

        // // Form validation
        // function validateForm(event) {
        //     event.preventDefault();
            
        //     const password = document.getElementById('password').value;
        //     const confirmPassword = document.getElementById('confirmPassword').value;
            
        //     if (password !== confirmPassword) {
        //         alert('Passwords do not match!');
        //         return false;
        //     }
            
        //     // Add more validation logic here
        //     // For demo purposes, just show an alert
        //     alert('Account created successfully!');
        //     return false;
        // }
    </script>
</body>
</html>
