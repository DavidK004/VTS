<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<?php
if (isset($_GET['error'])) {
    echo "<div class='alert alert-danger' role='alert'>File size exceeds 1MB limit.</div>";
}
?>
<div
    class="container"
>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
    <label for="alias" class="form-label">Alias:</label>
    <input
        type="text"
        class="form-control"
        name="alias"
        id="alias"
        aria-describedby="helpId"
        placeholder="type alias here"
    />
    <small id="helpId" class="form-text text-muted">this text will display if image cant</small>
</div>
<div class="mb-3">
    <label for="image" class="form-label">Choose file</label>
    <input
        type="file"
        class="form-control"
        name="image"
        id="image"
        
        aria-describedby="fileHelpId"
    />
    <div id="fileHelpId" class="form-text">Choose an image file</div>
</div>
<button
    type="submit"
    class="btn btn-primary"
>
    Submit
</button>
<button
    type="reset"
    class="btn btn-primary"
>
    Reset
</button>

    </form>
</div>



 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>   
</body>
</html>