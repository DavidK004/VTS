/*
 = =*========================
 AJAX Cheat Sheet (Beginner Level)
 ==========================

 AJAX = Asynchronous JavaScript and XML (but mostly JSON or text today)
 Allows you to send/receive data from server without reloading the page.

 -----------------------------------------
 1. Basic fetch() POST Request
 -----------------------------------------
 fetch("handler.php", {
 method: "POST",                            // Use POST method
headers: {
"Content-Type": "application/x-www-form-urlencoded" // Send form-style data
},
body: "key=value&another=123"              // Data sent as URL-encoded string
})
.then(response => response.text())             // Read response as plain text
.then(data => {
document.getElementById("result").innerHTML = data;  // Insert response into page
});

-----------------------------------------
2. Constructing URL-encoded Body Safely
-----------------------------------------
const params = new URLSearchParams();
params.append("key", "value");
params.append("another", "123");

fetch("handler.php", {
method: "POST",
headers: {
"Content-Type": "application/x-www-form-urlencoded"
},
body: params
});

-----------------------------------------
3. Reading Response as JSON (if server returns JSON)
-----------------------------------------
fetch("api.php", { method: "POST", body: params })
.then(response => response.json())
.then(data => {
console.log(data);    // data is now a JavaScript object/array
});

-----------------------------------------
4. Using GET Request with Query Params
-----------------------------------------
fetch("handler.php?key=value&another=123")
.then(res => res.text())
.then(data => {
console.log(data);
});

-----------------------------------------
5. Handling Errors
-----------------------------------------
fetch("handler.php", { method: "POST", body: params })
.then(res => {
if (!res.ok) throw new Error("Network response was not ok");
return res.text();
})
.then(data => {
console.log(data);
})
.catch(error => {
console.error("Fetch error:", error);
});

-----------------------------------------
6. Preventing Form Submission and Using AJAX
-----------------------------------------
document.getElementById("form").addEventListener("submit", function(e) {
e.preventDefault();  // Prevent full page reload

const formData = new FormData(this);
fetch("handler.php", {
method: "POST",
body: formData
})
.then(res => res.text())
.then(data => {
document.getElementById("result").innerHTML = data;
});
});

-----------------------------------------
Summary:
- Use fetch() with method POST or GET to send requests
- Set Content-Type for POST when sending URL encoded or JSON data
- Use .then() to handle responses asynchronously
- Update the page dynamically without full reload
- Always handle errors with catch()

*/
document.querySelectorAll('input[name="vote"]').forEach(radio => {
    radio.addEventListener('change', e => {
        const breedId = e.target.value;
        fetch('votes.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'breed=' + encodeURIComponent(breedId)
            })
        .then(res => res.json())
        .then(data => {
            // Update your voting results on the page here
            console.log(data);
        })
        .catch(err => console.error('Error:', err));
        });
    });
