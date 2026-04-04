// Function to animate counting up to a target number
function animateCounter(element, target, duration = 2000, prefix = '', suffix = '') {
    let start = 0;
    const increment = target / (duration / 16); // Update every 16ms (60fps)
    const startTime = performance.now();

    function update(currentTime) {
        const elapsed = currentTime - startTime;
        const progress = Math.min(elapsed / duration, 1);

        start = Math.min(Math.ceil(target * progress), target);
        element.textContent = prefix + start.toLocaleString() + suffix;

        if (progress < 1) {
            requestAnimationFrame(update);
        }
    }

    requestAnimationFrame(update);
}

// Function to check if element is in viewport
function isInViewport(element) {
    const rect = element.getBoundingClientRect();
    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
}

// Initialize counters when they come into view
let hasAnimated = false;
function initCounters() {
    const statsSection = document.querySelector('.stats-section');
    if (isInViewport(statsSection) && !hasAnimated) {
        const counters = document.querySelectorAll('.counter-number');
        counters.forEach(counter => {
            const target = parseInt(counter.getAttribute('data-target'));
            const prefix = counter.getAttribute('data-prefix') || '';
            const suffix = counter.getAttribute('data-suffix') || '';
            animateCounter(counter, target, 2000, prefix, suffix);
        });
        hasAnimated = true;
    }
}

// Listen for scroll and load events
window.addEventListener('scroll', initCounters);
window.addEventListener('load', initCounters);
