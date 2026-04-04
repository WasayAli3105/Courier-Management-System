<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - SwiftShip Courier Services</title>
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
    ?>

    <!-- Contact Hero Section -->
    <section class="hero-section bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4">Get in Touch</h1>
                    <p class="lead mb-4">Have questions? We're here to help! Reach out to our team for support or inquiries.</p>
                </div>
                <div class="col-lg-6">
                    <img src="images/pexels-kampus-7844017.jpg" alt="Contact Us" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Information Section -->
    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-custom">
                        <div class="card-body text-center p-4">
                            <div class="text-primary mb-3">
                                <i class="fas fa-map-marker-alt fa-3x"></i>
                            </div>
                            <h3 class="h5 mb-3">Visit Us</h3>
                            <p class="mb-0">Plot No. 23, Block 6<br>PECHS, Shahrah-e-Faisal<br>Karachi, Pakistan</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-custom">
                        <div class="card-body text-center p-4">
                            <div class="text-primary mb-3">
                                <i class="fas fa-phone fa-3x"></i>
                            </div>
                            <h3 class="h5 mb-3">Call Us</h3>
                            <p class="mb-0">Toll Free: 0800-12345<br>Local: (021) 111-222-333<br>Mobile: 0300-1234567</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-custom">
                        <div class="card-body text-center p-4">
                            <div class="text-primary mb-3">
                                <i class="fas fa-envelope fa-3x"></i>
                            </div>
                            <h3 class="h5 mb-3">Email Us</h3>
                            <p class="mb-0">info@swiftship.com<br>support@swiftship.com<br>sales@swiftship.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form & Map Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="card border-0 shadow-custom">
                        <div class="card-body p-4">
                            <h2 class="h3 mb-4">Send us a Message</h2>
                            <form id="contactForm" onsubmit="return validateForm(event)">
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="name" required>
                                <span id="nameError" class="error-message text-danger"></span>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" required>
                                <span id="emailError" class="error-message text-danger"></span>
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" required>
                                <span id="phoneError" class="error-message text-danger"></span>
                            </div>

                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" class="form-control" id="subject" required>
                                <span id="subjectError" class="error-message text-danger"></span>
                            </div>

                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" id="message" rows="5" required></textarea>
                                <span id="messageError" class="error-message text-danger"></span>
                            </div>

                                <button type="submit" class="btn btn-primary">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card border-0 shadow-custom h-100">
                        <div class="card-body p-4">
                            <h2 class="h3 mb-4">Our Location</h2>
                            <!-- Replace the src with your actual Google Maps embed code -->
                            <div class="ratio ratio-4x3">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d462118.02491053584!2d66.88720964950555!3d25.19338946981612!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33e06651d4bbf%3A0x9cf92f44555a0c23!2sKarachi%2C%20Karachi%20City%2C%20Sindh%2C%20Pakistan!5e0!3m2!1sen!2s!4v1643825291749!5m2!1sen!2s" 
                                    style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Business Hours Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Business Hours</h2>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-custom">
                        <div class="card-body p-4">
                            <div class="table-responsive">
                                <table class="table table-borderless mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="fw-bold">Monday - Friday:</td>
                                            <td class="text-end">8:00 AM - 8:00 PM</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Saturday:</td>
                                            <td class="text-end">9:00 AM - 6:00 PM</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Sunday:</td>
                                            <td class="text-end">Closed</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Holidays:</td>
                                            <td class="text-end">Hours may vary</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
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
        <script>
function validateForm(event) {
    event.preventDefault(); // Prevent form submission

    // Clear previous error messages
    document.querySelectorAll(".error-message").forEach(el => el.textContent = "");

    let isValid = true;

    let name = document.getElementById("name").value.trim();
    let email = document.getElementById("email").value.trim();
    let phone = document.getElementById("phone").value.trim();
    let subject = document.getElementById("subject").value.trim();
    let message = document.getElementById("message").value.trim();

    // Regular expressions for validation
    let nameRegex = /^[A-Za-z\s]+$/; // Only letters and spaces
    let emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/; // Standard email pattern
    let phoneRegex = /^[0-9]{10,15}$/; // 10-15 digits
    let subjectRegex = /^[A-Za-z0-9\s]+$/; // Alphanumeric and spaces
    let messageRegex = /^.{10,}$/; // At least 10 characters

    if (!nameRegex.test(name)) {
        document.getElementById("nameError").textContent = "Name can only contain letters and spaces.";
        isValid = false;
    }
    if (!emailRegex.test(email)) {
        document.getElementById("emailError").textContent = "Enter a valid email address.";
        isValid = false;
    }
    if (!phoneRegex.test(phone)) {
        document.getElementById("phoneError").textContent = "Phone number must be 10-15 digits.";
        isValid = false;
    }
    if (!subjectRegex.test(subject)) {
        document.getElementById("subjectError").textContent = "Subject can only contain letters, numbers, and spaces.";
        isValid = false;
    }
    if (!messageRegex.test(message)) {
        document.getElementById("messageError").textContent = "Message must be at least 10 characters.";
        isValid = false;
    }

    if (isValid) {
        alert("Your message has been sent successfully!");
        document.getElementById("contactForm").reset(); // Reset the form

    }
}
</script>
</body>
</html>
