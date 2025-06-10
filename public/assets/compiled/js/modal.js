const myModal = document.getElementById('Modal')


document.addEventListener('click', function(event) {
    // Check if the clicked element or its parent has the ID 'numero_cuenta'
    if (event.target.matches('.form-select') || event.target.closest('.form-select')) {
        if (myModal) {
            // For Bootstrap 5+ modals
            var modalInstance = bootstrap.Modal.getOrCreateInstance(myModal);
            modalInstance.show();

            // If you're using an older version of Bootstrap (e.g., 3 or 4) that relies on jQuery
            // or a custom modal implementation, you might need a different approach:
            // myModal.style.display = 'block'; // Basic display toggle
            // myModal.classList.add('show'); // Add 'show' class if your CSS uses it for visibility
            // myModal.setAttribute('aria-hidden', 'false'); // Accessibility for screen readers
        }
    }
});