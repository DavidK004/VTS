const breedText = document.getElementById('breed_description');
document.getElementById('insert-breed-form').addEventListener('submit', (e) => {

    let valid = true;




    clearError(breedText);

    if (breedText.value.trim().length < 8) {
        showError(breedText, 'the description must be at least 8 characters long');
        valid = false;
    }

    if (!valid) {
        e.preventDefault();
    }

})


breedText.addEventListener('input', (e) => {
    clearError(breedText);
})



function showError(element, message) {
    element.style.borderColor = 'red';
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