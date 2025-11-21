<?php
$breed = $_POST['breed'] ?? '';
$description = $_POST['description'] ?? '';

$errors = [];

if (trim($breed) === '') {
    $errors[] = "Breed is required";
}

if (strlen(trim($description)) < 8) {
    $errors[] = "Description must be at least 8 characters";
}

if (empty($errors)) {
    // Insert into DB here
} else {
    // Handle errors, e.g. show them or redirect back
}
?>








