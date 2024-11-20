document.addEventListener('DOMContentLoaded', function() {
    let carousel = document.querySelector('#carouselExample');
    let carouselInstance = new bootstrap.Carousel(carousel, {
        interval: 5000,
        ride: 'carousel'
    });

    let isCarouselPaused = false;

    // Listen for visibility changes
    document.addEventListener('visibilitychange', function() {
        if (document.visibilityState === 'hidden') {
            carouselInstance.pause();
            isCarouselPaused = true;
        } else if (document.visibilityState === 'visible' && isCarouselPaused) {
            carouselInstance.cycle();
            isCarouselPaused = false;
        }
    });
});