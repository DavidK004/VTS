
<?php 
include 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Contacty</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
<?php include 'header.php'; ?>
    <div class="container py-5">
        <h1 class="text-center mb-4">About Contacty</h1>
        <p class="text-center text-muted mb-5">Connecting people and businesses through smarter communication.</p>

        <div class="row align-items-center">
            <div class="col-md-6 mb-4 mb-md-0">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQyzWU0AzV-eYaFw7nYEf-WFBv90CJhFpO9UA&s" class="img-fluid rounded shadow-sm" alt="Contacty Office">
            </div>
            <div class="col-md-6">
                <h2 class="h5 mb-3">Who We Are</h2>
                <p>Contacty is a modern communication company focused on building simple and reliable tools that help
                    businesses and individuals stay connected. Our goal is to make reaching out easier, faster, and more personal.</p>

                <p>Founded in 2020, we’ve grown from a small startup into a trusted platform for users who value
                    clarity, connection, and collaboration.</p>
            </div>
        </div>

        <div class="text-center mt-5">
            <p class="text-muted mb-0">© <?php echo date('Y'); ?> Contacty — All rights reserved.</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>
