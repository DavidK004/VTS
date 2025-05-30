<?php
require_once 'config.php';
require_once 'db_config.php';

if (!isset($_FILES['image'])) {
    die("No file uploaded or file too large.");
}

if ($_FILES['image']['size'] > 1048576) {
    header("Location: index.php?error=1");
    exit();
} else {
    $originalName = $_FILES['image']['name'];
    $extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
    $alias = $_POST['alias'];
    $timestamp = time();
    $randomNumber = rand(1000, 9999);
    $newFileName = "{$alias}-{$timestamp}-{$randomNumber}.{$extension}";

   $imageExtensions = ['jpg', 'jpeg', 'png', 'gif'];
   $destinationFolder = in_array($extension, $imageExtensions) ? 'images' : 'other';

   if (!is_dir($destinationFolder)) {
    mkdir($destinationFolder, 0755, true);
}

    $uploadPath = $destinationFolder . '/' . $newFileName;

    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)) {
    echo "File uploaded successfully as: $uploadPath";
} else {
    echo "Failed to upload file.";
}
    echo "<br><a href='show_files.php'>See all files</a>";

    try {
        $sql = "INSERT INTO files (file_id, file_name, directory, date_time_added) 
                VALUES (NULL, :file_name, :directory, NOW())";

                 $stmt = $connection->prepare($sql);

                $stmt->bindParam(':file_name', $newFileName);
                $stmt->bindParam(':directory', $destinationFolder);

                $stmt->execute();

    echo "File info saved to database.";
    } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
   
}
?>