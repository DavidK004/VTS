document.querySelectorAll('#descriptionForm input, #descriptionForm select').forEach(el => {
    el.addEventListener('input', () => {
        el.classList.remove('error-border');
        const err = el.previousElementSibling;
        if (err && err.classList.contains('error')) err.remove();
    });
});
