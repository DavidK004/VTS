<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="David Katrinka">
    <meta name="description" content="Web Presentation about me">
    <meta name="robots" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="css/styles.css">
    <title>Landing Page</title>
</head>
<body>

    <header>
        
        <div class="header-inner">
            <ul class="nav">
                <li><a class="current" href="index.php">Home</a></li>
                <li><a href="about.php">About Me</a></li>
                <li><a href="education.php">Education</a></li>
                <li><a href="favs.php">My Favorite sites</a></li>
                <li><a href="index.php">Favorite Music</a></li>
                <li><a href="index.php">Favorite Books</a></li>
                <li><a href="index.php">Contact</a></li>
                <li><a href="index.php">School Tasks</a></li>
            </ul>
        </div>
        
    </header>
    <section class="welcome">
        <div class="container">
        <div class="welcome-inner">
            <div class="welcome-text">
            <h1>Hi, I am David Katrinka</h1>
            <p>Welcome to my website, where you will find lots of information about me, like my favorite sites, music and books, my education and tasks i did in class.</p><br>
            <?php echo "Current date and time: " . date("Y-m-d H:i:s"); ?> 
            </div>
            <div class="image-container">
                <img src="images/pfp.jpg" alt="pfp">
            </div>
        </div>
        </div>
    </section>
   <!-- Background from https://wweb.dev/resources/animated-css-background-generator -->
    <div class="background">
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
</div>
<!-- Background end -->
</body>
</html>