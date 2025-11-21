// JavaScript Events Cheat Sheet - Common Events & Event Listeners

// Mouse events
element.addEventListener('click', () => { /* single click */ });
element.addEventListener('dblclick', () => { /* double click */ });
element.addEventListener('mouseover', () => { /* mouse enters element */ });
element.addEventListener('mouseout', () => { /* mouse leaves element */ });
element.addEventListener('mousemove', () => { /* mouse moves within element */ });
element.addEventListener('mousedown', () => { /* mouse button pressed */ });
element.addEventListener('mouseup', () => { /* mouse button released */ });

// Keyboard events
element.addEventListener('keydown', (e) => { /* key pressed down, e.key for key */ });
element.addEventListener('keyup', (e) => { /* key released */ });
element.addEventListener('keypress', (e) => { /* key pressed and released (deprecated) */ });

// Form events
element.addEventListener('submit', (e) => { e.preventDefault(); /* form submitted */ });
element.addEventListener('change', () => { /* form input/select changed */ });
element.addEventListener('input', () => { /* input value changed live */ });
element.addEventListener('focus', () => { /* element gained focus */ });
element.addEventListener('blur', () => { /* element lost focus */ });

// Window events
window.addEventListener('load', () => { /* page fully loaded */ });
window.addEventListener('resize', () => { /* window resized */ });
window.addEventListener('scroll', () => { /* user scrolls */ });
window.addEventListener('beforeunload', (e) => { /* before page unload */ });

// Touch events (mobile)
element.addEventListener('touchstart', () => { /* finger touches screen */ });
element.addEventListener('touchmove', () => { /* finger moves on screen */ });
element.addEventListener('touchend', () => { /* finger lifted off screen */ });

// Drag and drop events
element.addEventListener('dragstart', () => { /* drag started */ });
element.addEventListener('dragover', (e) => { e.preventDefault(); /* dragged over element */ });
element.addEventListener('drop', (e) => { e.preventDefault(); /* drop on element */ });

// Example usage:
// const btn = document.querySelector('button');
// btn.addEventListener('click', () => console.log('Button clicked!'));
