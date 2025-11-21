document.getElementById('myForm').addEventListener('submit', function(e) {
    let valid = true;

    const breed = document.getElementById('breed');
    const description = document.getElementById('description');

    // Clear previous errors
    clearError(breed);
    clearError(description);

    if (breed.value.trim() === '') {
        showError(breed, 'Please select a breed');
        valid = false;
    }

    if (description.value.trim().length < 8) {
        showError(description, 'Description must be at least 8 characters');
        valid = false;
    }

    if (!valid) e.preventDefault();
});

function showError(element, message) {
    element.style.borderColor = 'red';
    // Insert or show error message above element
    let error = document.createElement('div');
    error.className = 'error';
    error.style.color = 'red';
    error.innerText = message;
    element.parentNode.insertBefore(error, element);
}

function clearError(element) {
    element.style.borderColor = '';
    const prevError = element.parentNode.querySelector('.error');
    if (prevError) prevError.remove();
}
