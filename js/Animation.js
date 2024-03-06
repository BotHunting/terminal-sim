// Function to add animation to an element
function addAnimation(elementId, animationName) {
    var element = document.getElementById(elementId);
    if (element) {
        element.classList.add('animated', animationName);
        // Remove the animation classes after animation ends
        element.addEventListener('animationend', function() {
            element.classList.remove('animated', animationName);
        });
    }
}
