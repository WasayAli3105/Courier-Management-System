<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pricing - SwiftShip Courier Services</title>
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
    include 'header.php';
    ?>
    <!-- Pricing Hero Section -->
    <section class="hero-section bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4">Transparent Pricing</h1>
                    <p class="lead mb-4">Choose the perfect shipping solution for your needs with our competitive rates.</p>
                </div>
                <div class="col-lg-6">
                    <img src="images/pricing-hero.svg" alt="Pricing" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Plans Section -->
    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                <!-- Standard Shipping -->
                <div class="col-lg-4">
                    <div class="card h-100 border-0 shadow-custom pricing-card">
                        <div class="card-body p-5">
                            <div class="text-center mb-4">
                                <h3>Standard</h3>
                                <div class="pricing-value">
                                    <span class="currency">$</span>
                                    <span class="amount">9.99</span>
                                    <span class="period">/package</span>
                                </div>
                                <p class="text-muted">Best for regular deliveries</p>
                            </div>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-3"><i class="fas fa-check text-primary me-2"></i>3-5 business days</li>
                                <li class="mb-3"><i class="fas fa-check text-primary me-2"></i>Package tracking</li>
                                <li class="mb-3"><i class="fas fa-check text-primary me-2"></i>Up to 10kg weight</li>
                                <li class="mb-3"><i class="fas fa-check text-primary me-2"></i>Insurance included</li>
                            </ul>
                            <div class="text-center">
                                <a href="#calculator" class="btn btn-outline-primary w-100">Choose Standard</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Express Shipping -->
                <div class="col-lg-4">
                    <div class="card h-100 border-0 shadow-custom pricing-card popular">
                        <div class="card-body p-5">
                            <div class="text-center mb-4">
                                <span class="badge bg-primary mb-2">Most Popular</span>
                                <h3>Express</h3>
                                <div class="pricing-value">
                                    <span class="currency">$</span>
                                    <span class="amount">19.99</span>
                                    <span class="period">/package</span>
                                </div>
                                <p class="text-muted">Best for urgent deliveries</p>
                            </div>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-3"><i class="fas fa-check text-primary me-2"></i>1-2 business days</li>
                                <li class="mb-3"><i class="fas fa-check text-primary me-2"></i>Priority handling</li>
                                <li class="mb-3"><i class="fas fa-check text-primary me-2"></i>Up to 20kg weight</li>
                                <li class="mb-3"><i class="fas fa-check text-primary me-2"></i>Premium insurance</li>
                                <li class="mb-3"><i class="fas fa-check text-primary me-2"></i>SMS updates</li>
                            </ul>
                            <div class="text-center">
                                <a href="#calculator" class="btn btn-primary w-100">Choose Express</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Same Day Shipping -->
                <div class="col-lg-4">
                    <div class="card h-100 border-0 shadow-custom pricing-card">
                        <div class="card-body p-5">
                            <div class="text-center mb-4">
                                <h3>Same Day</h3>
                                <div class="pricing-value">
                                    <span class="currency">$</span>
                                    <span class="amount">39.99</span>
                                    <span class="period">/package</span>
                                </div>
                                <p class="text-muted">Best for immediate delivery</p>
                            </div>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-3"><i class="fas fa-check text-primary me-2"></i>Same day delivery</li>
                                <li class="mb-3"><i class="fas fa-check text-primary me-2"></i>VIP handling</li>
                                <li class="mb-3"><i class="fas fa-check text-primary me-2"></i>Up to 30kg weight</li>
                                <li class="mb-3"><i class="fas fa-check text-primary me-2"></i>Premium insurance</li>
                                <li class="mb-3"><i class="fas fa-check text-primary me-2"></i>Real-time tracking</li>
                                <li class="mb-3"><i class="fas fa-check text-primary me-2"></i>24/7 support</li>
                            </ul>
                            <div class="text-center">
                                <a href="#calculator" class="btn btn-outline-primary w-100">Choose Same Day</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Shipping Calculator -->
    <section id="calculator" class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-custom">
                        <div class="card-body p-4">
                            <h2 class="text-center mb-4">Shipping Calculator</h2>
                            <form id="shippingCalculator" onsubmit="return calculateShipping(event)">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">From</label>
                                        <input type="text" class="form-control" id="fromLocation" placeholder="Origin city" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">To</label>
                                        <input type="text" class="form-control" id="toLocation" placeholder="Destination city" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Weight (kg)</label>
                                        <input type="number" class="form-control" id="weight" min="0.1" step="0.1" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Service Type</label>
                                        <select class="form-select" id="serviceType" required>
                                            <option value="standard">Standard Shipping</option>
                                            <option value="express">Express Shipping</option>
                                            <option value="sameday">Same Day Delivery</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary w-100">Calculate Cost</button>
                                    </div>
                                </div>
                            </form>

                            <!-- Result Section -->
                            <div id="calculationResult" class="mt-4" style="display: none;">
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="mb-2">Estimated Cost:</p>
                                        <h3 class="text-primary" id="estimatedCost">$0.00</h3>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mb-2">Estimated Delivery:</p>
                                        <h3 id="estimatedDelivery">-</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Additional Services -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Additional Services</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-custom">
                        <div class="card-body p-4">
                            <div class="text-primary mb-3">
                                <i class="fas fa-box-open fa-2x"></i>
                            </div>
                            <h4>Packaging Service</h4>
                            <p class="text-muted">Professional packaging for fragile and valuable items</p>
                            <p class="mb-0"><strong>From $5.99</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-custom">
                        <div class="card-body p-4">
                            <div class="text-primary mb-3">
                                <i class="fas fa-shield-alt fa-2x"></i>
                            </div>
                            <h4>Extra Insurance</h4>
                            <p class="text-muted">Additional coverage for high-value shipments</p>
                            <p class="mb-0"><strong>From $9.99</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-custom">
                        <div class="card-body p-4">
                            <div class="text-primary mb-3">
                                <i class="fas fa-warehouse fa-2x"></i>
                            </div>
                            <h4>Storage Service</h4>
                            <p class="text-muted">Temporary storage for your packages</p>
                            <p class="mb-0"><strong>From $3.99/day</strong></p>
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
        function calculateShipping(event) {
            event.preventDefault();
            
            const weight = parseFloat(document.getElementById('weight').value);
            const serviceType = document.getElementById('serviceType').value;
            const fromLocation = document.getElementById('fromLocation').value;
            const toLocation = document.getElementById('toLocation').value;
            
            // Simple calculation (in a real app, this would be more complex)
            let baseCost;
            let deliveryTime;
            
            switch(serviceType) {
                case 'standard':
                    baseCost = 9.99;
                    deliveryTime = '3-5 business days';
                    break;
                case 'express':
                    baseCost = 19.99;
                    deliveryTime = '1-2 business days';
                    break;
                case 'sameday':
                    baseCost = 39.99;
                    deliveryTime = 'Today';
                    break;
            }
            
            const totalCost = (baseCost + (weight * 2)).toFixed(2);
            
            // Display results
            document.getElementById('estimatedCost').textContent = `$${totalCost}`;
            document.getElementById('estimatedDelivery').textContent = deliveryTime;
            document.getElementById('calculationResult').style.display = 'block';
            
            return false;
        }
    </script>
</body>
</html>
