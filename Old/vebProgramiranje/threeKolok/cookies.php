<?php
// --- Set a cookie ---
// Syntax: setcookie(name, value, expire_time, path, domain, secure, httponly);
setcookie("username", "David", time() + 3600, "/");  // Expires in 1 hour

// --- Get a cookie ---
if (isset($_COOKIE["username"])) {
    echo "Username: " . $_COOKIE["username"];
}

// --- Delete a cookie ---
// To delete, set expiration time in the past
setcookie("username", "", time() - 3600, "/");

// --- Notes ---
// - Cookies must be set BEFORE any HTML output (before <html> tag).
// - Use path "/" to make cookie available across the whole website.
// - Secure & HttpOnly flags improve security:
//   setcookie("name", "value", time()+3600, "/", "", true, true);
?>
