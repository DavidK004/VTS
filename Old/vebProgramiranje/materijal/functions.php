<?php
function auto_loader($className)
{
    $file = ucfirst($className) . ".php"; // person.php
    //this will check if file exist
    if (is_file($file)) {
        //finally if file exist then it will include the file
        require_once $file;
        //echo "$className was included";
    }
}

spl_autoload_register("auto_loader");


setcookie("session_id", "abc123", [
    'expires' => time() + 3600,
    'path' => '/',
    'secure' => true,
    'httponly' => true,
    'samesite' => 'Lax'
]);

$_FILES['myfile'] = [
    'name' => 'filename.jpg',         // Original file name on client machine
    'type' => 'image/jpeg',           // MIME type of the uploaded file
    'tmp_name' => '/tmp/php1234.tmp', // Temporary file path on the server
    'error' => 0,                    // Upload error code (0 = no error)
    'size' => 12345                  // Size in bytes
];