document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    const inputs = form.querySelectorAll('input, textarea, select, file, number'); // Select all input elements

    // Load saved data from localStorage
    inputs.forEach(input => {
        const savedValue = localStorage.getItem(input.name);
        if (savedValue) {
            input.value = savedValue; // Restore the saved value
        }
    });

    // Save data to localStorage on input change
    inputs.forEach(input => {
        input.addEventListener('input', function () {
            localStorage.setItem(input.name, input.value);
        });
    });

    // Clear localStorage when the form is submitted
    form.addEventListener('submit', function () {
        inputs.forEach(input => {
            localStorage.removeItem(input.name);
        });
    });
});