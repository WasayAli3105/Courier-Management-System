// Navbar Scroll Effect
document.addEventListener('DOMContentLoaded', function() {
    const navbar = document.querySelector('.navbar');
    
    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // Add fade-in-up animation to elements with data-animate attribute
    const animatedElements = document.querySelectorAll('[data-animate]');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('fade-in-up');
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1
    });

    animatedElements.forEach(element => {
        observer.observe(element);
    });
});

// Form Validation
function validateForm(formId) {
    const form = document.getElementById(formId);
    if (!form) return false;

    const inputs = form.querySelectorAll('input[required], textarea[required]');
    let isValid = true;

    inputs.forEach(input => {
        if (!input.value.trim()) {
            isValid = false;
            showError(input, 'This field is required');
        } else {
            clearError(input);
            
            // Email validation
            if (input.type === 'email' && !isValidEmail(input.value)) {
                isValid = false;
                showError(input, 'Please enter a valid email address');
            }
            
            // Phone validation
            if (input.type === 'tel' && !isValidPhone(input.value)) {
                isValid = false;
                showError(input, 'Please enter a valid phone number');
            }
        }
    });

    return isValid;
}

function showError(input, message) {
    const formGroup = input.closest('.form-group') || input.parentElement;
    const errorDiv = formGroup.querySelector('.error-message') || document.createElement('div');
    
    errorDiv.className = 'error-message text-danger mt-1';
    errorDiv.textContent = message;
    
    if (!formGroup.querySelector('.error-message')) {
        formGroup.appendChild(errorDiv);
    }
    
    input.classList.add('is-invalid');
}

function clearError(input) {
    const formGroup = input.closest('.form-group') || input.parentElement;
    const errorDiv = formGroup.querySelector('.error-message');
    
    if (errorDiv) {
        errorDiv.remove();
    }
    
    input.classList.remove('is-invalid');
}

function isValidEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

function isValidPhone(phone) {
    const re = /^[\d\s-+()]{10,}$/;
    return re.test(phone);
}

// Authentication State Management
function isLoggedIn() {
    return localStorage.getItem('authToken') !== null;
}

function login(token) {
    localStorage.setItem('authToken', token);
    updateAuthUI();
}

function logout() {
    localStorage.removeItem('authToken');
    updateAuthUI();
    window.location.href = 'index.html';
}

function updateAuthUI() {
    const authButtons = document.querySelectorAll('[data-auth-display]');
    const isAuthenticated = isLoggedIn();

    authButtons.forEach(button => {
        const showWhen = button.dataset.authDisplay;
        if (showWhen === 'logged-in') {
            button.style.display = isAuthenticated ? '' : 'none';
        } else if (showWhen === 'logged-out') {
            button.style.display = isAuthenticated ? 'none' : '';
        }
    });
}

// Tracking System
function trackParcel(trackingNumber) {
    // This would typically make an API call to get tracking information
    return new Promise((resolve, reject) => {
        // Simulated API response
        setTimeout(() => {
            if (trackingNumber) {
                resolve({
                    status: 'In Transit',
                    location: 'Distribution Center',
                    estimatedDelivery: '2025-02-05',
                    updates: [
                        {
                            status: 'Package in Transit',
                            location: 'Distribution Center',
                            timestamp: new Date()
                        }
                    ]
                });
            } else {
                reject(new Error('Invalid tracking number'));
            }
        }, 1000);
    });
}

// Shipping Calculator
function calculateShipping(weight, serviceType) {
    const baseRates = {
        'standard': 9.99,
        'express': 19.99,
        'sameday': 39.99
    };

    const rate = baseRates[serviceType] || baseRates.standard;
    return (rate + (weight * 2)).toFixed(2);
}

// Toast Notifications
function showToast(message, type = 'success') {
    const toast = document.createElement('div');
    toast.className = `toast toast-${type} fade-in`;
    toast.textContent = message;
    
    document.body.appendChild(toast);
    
    setTimeout(() => {
        toast.classList.add('show');
    }, 100);
    
    setTimeout(() => {
        toast.classList.remove('show');
        setTimeout(() => {
            toast.remove();
        }, 300);
    }, 3000);
}

// Add custom styles for toast
const style = document.createElement('style');
style.textContent = `
    .toast {
        position: fixed;
        bottom: 20px;
        right: 20px;
        padding: 1rem 2rem;
        border-radius: 10px;
        background: white;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        z-index: 1000;
        opacity: 0;
        transition: all 0.3s ease;
    }
    
    .toast.show {
        opacity: 1;
    }
    
    .toast-success {
        background: #28a745;
        color: white;
    }
    
    .toast-error {
        background: #dc3545;
        color: white;
    }
    
    .toast-warning {
        background: #ffc107;
        color: black;
    }
`;

document.head.appendChild(style);
