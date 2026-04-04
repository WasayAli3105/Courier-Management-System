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