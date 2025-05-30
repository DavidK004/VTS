<?php
date_default_timezone_set('Europe/Belgrade');

echo '<h2>PHP 8.2 Cookie Example</h2>';
echo 'Timestamp: ' . time() . '<br>';

/*
────────────────────────────────────────────────────────────────────────────
 'samesite' in PHP 8.2 – Explanation and Best Practices
────────────────────────────────────────────────────────────────────────────

The 'samesite' attribute controls whether the cookie is sent along with
cross-site requests (e.g. requests initiated from other domains, iframes, or embedded services).

Available values:
──────────────────────────────────────────────
1. 'Lax'  (Recommended default)
   - The cookie is sent:
     • On same-site requests
     • On top-level cross-site GET navigations (e.g., clicking a link or opening a bookmark)
   - The cookie is **not sent** on:
     • Background POST requests (e.g., from malicious cross-site forms)
   - Use for:
     Session cookies
     Login cookies
     Most secure, user-friendly applications

2. 'Strict' (Most restrictive)
   - The cookie is **only sent** if the request originates from the same site.
   - It is **not sent** even when users click a link from another domain.
   - Can break auto-login or user sessions when coming from external sources.
   - Use for:
     Extra-sensitive apps (banking, admin panels)
     Not recommended for public login flows

3. 'None'  (Cross-site support allowed)
   - The cookie **will be sent** with all requests, including cross-site.
   - Must include: `'secure' => true` (otherwise, browsers will block the cookie!)
   - Use for:
     Third-party services
     Apps using iframes or cross-domain APIs (e.g., SSO, analytics)

Important Notes:
──────────────────────────────────────────────
- If 'samesite' is omitted:
    • Modern browsers may default to 'Lax' or reject the cookie
    • PHP will not add the attribute unless explicitly set

- 'None' requires 'secure' => true:
    • Browsers will silently reject SameSite=None cookies sent over HTTP

- PHP 8.2 behavior:
    • PHP does not default to any SameSite value unless specified
    • Use array-style `setcookie()` to include 'samesite'

Example:
────────
setcookie('my_cookie', 'abc123', [
    'expires' => time() + 3600,
    'path' => '/',
    'secure' => true,
    'httponly' => true,
    'samesite' => 'Lax'
]);

MDN: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Set-Cookie/SameSite
PHP: https://www.php.net/manual/en/function.setcookie.php
*/

// Cookie with SameSite=Lax (recommended default for logins)
setcookie("session_id", "abc123", [
    'expires' => time() + 3600,
    'path' => '/',
    'secure' => true,
    'httponly' => true,
    'samesite' => 'Lax'
]);

// Cookie with SameSite=Strict (very limited sharing)
setcookie("strict_cookie", "only_from_same_origin", [
    'expires' => time() + 3600,
    'path' => '/',
    'secure' => true,
    'httponly' => true,
    'samesite' => 'Strict'
]);

// Cross-site cookie with SameSite=None → must use HTTPS (secure => true)
setcookie("cross_site_cookie", "shared_token", [
    'expires' => time() + 3600,
    'path' => '/',
    'secure' => true, // Required with 'None'
    'httponly' => true,
    'samesite' => 'None'
]);

// Demonstration: will be rejected by browsers (SameSite=None without secure)
setcookie("invalid_cookie", "this_will_be_blocked", [
    'expires' => time() + 3600,
    'path' => '/',
    'secure' => false, // invalid with 'None'
    'httponly' => true,
    'samesite' => 'None'
]);

// 🧹 Delete cookie (from browser)
setcookie("to_delete", "", [
    'expires' => time() - 3600,
    'path' => '/',
]);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Cookie Demo</title>
</head>
<body>
<h3>Active Cookies</h3>
<?php
if (!empty($_COOKIE)) {
    echo "<ul>";
    foreach ($_COOKIE as $name => $value) {
        echo "<li><strong>$name:</strong> " . htmlspecialchars($value) . "</li>";
    }
    echo "</ul>";
} else {
    echo "<p style='color:gray;'>No cookies visible on first load. Reload to see results.</p>";
}

echo "<hr><pre>";
print_r($_COOKIE);
echo "</pre>";
?>
</body>
</html>
