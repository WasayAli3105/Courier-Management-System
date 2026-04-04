<?php session_start(); // Start the session at the beginning ?>

  <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top border-bottom">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <span class="text-primary fw-bold">Swift</span><span class="text-dark">Ship</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tracking.php">Track Parcel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link btn btn-primary text-white ms-2 px-4" href="signin.php">Sign In</a> -->
                    <!-- </li>
                      -->
                      <li>
                    <?php if (isset($_SESSION['C_id'])): ?>
                        <a href="signout.php" class="nav-link text-primary">Sign Out</a>
                    <?php else: ?>
                        <a href="signin.php" class="nav-link text-primary">Sign In</a>
                    <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section with Slider -->
    <header class="hero-section">
        <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/pexels-tima-miroshnichenko-6169051.jpg" class="d-block w-100" alt="Fast Delivery">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 text-start">
                                    <h1 class="display-4 fw-bold text-white mb-4">Fast & Reliable Courier Services</h1>
                                    <p class="lead mb-4">Your trusted partner for swift and secure deliveries worldwide.</p>
                                    <div class="d-flex gap-3">
                                        <a href="tracking.php" class="btn btn-primary btn-lg">Track Parcel</a>
                                        <a href="contact.php" class="btn btn-light btn-lg">contact us</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/pexels-tima-miroshnichenko-6169002.jpg" class="d-block w-100" alt="Warehouse Solutions">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 text-start">
                                    <h1 class="display-4 fw-bold text-white mb-4">Global Logistics Solutions</h1>
                                    <p class="lead mb-4">State-of-the-art warehousing and worldwide shipping network.</p>
                                    <div class="d-flex gap-3">
                                        <a href="about.php" class="btn btn-primary btn-lg">Learn More</a>
                                        <a href="contact.php" class="btn btn-light btn-lg">Contact Us</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/pexels-rdne-7363098.jpg" class="d-block w-100" alt="Real-time Tracking">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 text-start">
                                    <h1 class="display-4 fw-bold text-white mb-4">Real-time Package Tracking</h1>
                                    <p class="lead mb-4">Track your deliveries 24/7 with our advanced tracking system.</p>
                                    <div class="d-flex gap-3">
                                        <a href="tracking.php" class="btn btn-primary btn-lg">Track Now</a>
                                        <a href="signin.php" class="btn btn-light btn-lg">Sign In</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </header>