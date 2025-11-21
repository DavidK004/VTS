<?php
/**
 * Upload file to server
 * @param  array $file
 * @param string $subfolder_name like 'products/'
 * @param string $file_type (image, ...)
 * @return string|false
 */
function upload_file(array $file, string $subfolder_name, string $file_type)
{
    if (isset($file) && $file['error'] === UPLOAD_ERR_OK) {
        $uploadDir = BASE_PATH . '/media/';

        // Create new unique filename
        $fileName = pathinfo($file['name'], PATHINFO_FILENAME);
        $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);

        $newFileName = $fileName . '_' . uniqid() . '.' . $fileExtension;

        // media/{subfolder_name}/{new_file.png}
        $uploadFile = $uploadDir . $subfolder_name . $newFileName;
        $filepath_db = $subfolder_name . $newFileName;

        // Get file type
        $fileType = mime_content_type($file['tmp_name']);

        // if subfolder is not exists
        if (!is_dir($uploadDir . $subfolder_name)) {
            mkdir($uploadDir . $subfolder_name, 0775, true);
        }

        // Upload file to server
        if (strpos($fileType, 'image') === 0) {
            if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
                return $filepath_db;
            } else {
                return false;
            }
        }
    }
    return false;
}





<?php
// Define the base path (adjust as needed)
define('BASE_PATH', __DIR__); // or some other base path

require_once 'upload-function.php'; // or wherever your function is

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = upload_file($_FILES['myfile'], 'products/', 'image');

    if ($result !== false) {
        echo "File uploaded successfully!<br>";
        echo "File path: media/" . htmlspecialchars($result);
    } else {
        echo "File upload failed.";
    }
}
