<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-dark bg-primary ">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
    <img src="logo.png" alt="" width="50" height="50">
    Homework site
    </a>
    <ul class="navbar-nav d-flex flex-row">
      <li class="navbar-item me-3"><a class="nav-link" href="#aboutMe">About me</a></li>
      <li class="navbar-item me-3"><a class="nav-link" href="#education">Education</a></li>
      <li class="navbar-item me-3"><a class="nav-link" href="#contact">Contact me</a></li>
    </ul>
  </div>
</nav>
<section class="aboutMe bg-secondary p-3" id="aboutMe">
  <h3 class="display-1">About me</h3>
  <h2 class="display-2">Hi there!</h2>
  <div class="row">
    
    <div class="col-12 col-md-6">
      <p>
        "Hi, I'm Nix — and Ive got three powerful meanings wrapped in one sleek, declarative system. Let me break it down for you:"

        1. I'm a package manager  
        "At my core, I'm a package manager. I handle software installations in a super precise, reproducible way. You want Python 3.10 and someone else wants 3.12? No problem — I isolate dependencies so there's no fighting. I keep your system clean and your environments pure. Think of me like a chef who never forgets a recipe — exact ingredients, every time."

        2. I'm a Linux distribution (NixOS)  
        "But I'm more than just a package guy — I'm also a full-blown Linux distro! NixOS is built on me. Instead of messy config files and manual system setups, you just declare what you want in a single config file, and bam, I build your entire system from that description. Want to roll back a change that broke something? I can do that too. I'm basically version control for your whole OS."

        3. I'm a philosophy of reproducibility  
        "Finally, I'm an idea — a philosophy. I believe in reproducibility, immutability, and declarative systems. Whether it's dev environments, servers, or entire systems, I aim to make them predictable and consistent everywhere. No more 'it works on my machine' nonsense. With me, it works everywhere, or it doesnt build at all."

        "So yeah — Im Nix. Not your average OS. I'm precise, clean, and a little obsessed with doing things the right way. And once you get to know me, youll never want to go back."
      </p>
    </div>

    
    <div class="col-12 col-md-6">
      <img src="nix.png" class="img-fluid rounded-top" alt="nix">
    </div>
  </div>
</section>
<section class="education bg-info p-3" id="education">
<h3 class="display-1">Education</h3>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">School name</th>
        <th scope="col">City</th>
      </tr>
    </thead>
    <tbody>
    <tr>
      <td>Osnovna škola Matija Gubec</td>
      <td>Donji Tavankut</td>
    </tr>
    <tr>
      <td>Gimnazija Svetozar Marković</td>
      <td>Subotica</td>
    </tr>
    <tr>
      <td>Visoka Tehnička Škola Strukovnih Studija</td>
      <td>Subotica</td>
    </tr>
    </tbody>
  </table>
</section>
<section class="contact p-3" id="contact">
<h3 class="display-1">Contact Me</h3>
  <form action="mail.php" method="POST">
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input
        type="text"
        class="form-control"
        name="name"
        id="name"
        required
      />
      
      <label for="email" class="form-label">Email</label>
      <input
        type="email"
        class="form-control"
        name="email"
        id="email"
        required
      />
    </div>
    <div class="mb-3">
      <label for="message" class="form-label">Message</label>
      <textarea class="form-control" name="message" id="message" rows="3"></textarea>
    </div>
    <button
      type="submit"
      class="btn btn-primary"
    >
      Send Message
    </button>
    
    
  </form>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
