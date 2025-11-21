const toggleBtn = document.getElementById('day-select');
const dropdown = document.getElementById('custom-select-dropdown');

toggleBtn.addEventListener('click', () => {
    dropdown.classList.toggle('hidden');
});

document.addEventListener('click', (e) => {
    if (!dropdown.contains(e.target) && !toggleBtn.contains(e.target)) {
        dropdown.classList.add('hidden');
    }
});



const options = document.querySelectorAll('.dropdown-item');

options.forEach(option => {
    option.addEventListener('click', () => {
        const selectedValue = option.getAttribute('data-value');

        options.forEach(opt => opt.classList.remove('dropdown-selected'));

        if (selectedValue === 'remove') {
            toggleBtn.textContent = 'Add to list';
        } else {
            toggleBtn.textContent = option.textContent;
            option.classList.add('dropdown-selected');
        }

        dropdown.classList.add('hidden');

        alert(`You selected: ${selectedValue}`);
    });
});

const qrContainer = document.getElementById("qrcode");
const downloadLink = document.getElementById("downloadLink");
const qrBtn = document.getElementById("qr-btn");
const qrPopup = document.querySelector(".qr-popup");
const overlay = document.getElementById('overlay');

qrBtn.addEventListener("click", () => {
    
    qrPopup.classList.toggle("hidden")
    overlay.classList.toggle("hidden")
    
    qrContainer.innerHTML = "";

    
    new QRCode(qrContainer, {
        text: window.location.href,
        width: 200,
        height: 200
    });

    
    setTimeout(() => {
        const qrImg = qrContainer.querySelector("img");
        if (qrImg) {
            downloadLink.href = qrImg.src;
        }
    }, 500);
});

document.addEventListener('click', (e) =>{
    if(!qrPopup.contains(e.target) && !qrBtn.contains(e.target)){
        qrPopup.classList.add("hidden");
        overlay.classList.add("hidden");
    }
});