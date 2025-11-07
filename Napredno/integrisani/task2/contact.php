<?php 
include 'functions.php';
$status = $_GET['status'] ?? '';

if ($status === 'success') {
    echo '<div class="alert alert-success" role="alert">
        Your message has been sent successfully!
    </div>';
} elseif ($status === 'error') {
    echo '<div class="alert alert-danger" role="alert">
        There was an error sending your message. Please try again.
    </div>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
 <?php include 'header.php'; ?>
    <div class="wrapper">
        <h1>Send a message to our support team</h1>
        <img src="https://img.freepik.com/free-vector/flat-customer-support-illustration_23-2148899114.jpg?semt=ais_hybrid&w=740&q=80"
            alt="supportImg" width="400px">
        <div class="form-wrapper">

            <form action="mail.php" method="post" name="contact-form" id="contactForm">
                <div class="mb-3">
                    <label for="firstName" class="form-label">First Name</label>
                    <input required type="text" class="form-control" id="firstName" name="first-name">
                </div>
                <div class="mb-3">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input required type="text" class="form-control" id="lastName" name="last-name">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input required type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Your message</label>
                    <textarea  required class="form-control" id="message" rows="3" name="message"></textarea>
                </div>



                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>