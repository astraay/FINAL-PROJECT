<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bob's Burger</title>
  <!-- Google Fonts (2 families) -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Lora:wght@400;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    :root{
      --primary:#ff8c00;
      --secondary:#ffd60a;
      --dark:#121212;
      --panel-bg:rgba(255,140,0,0.12);
      --panel-border:#ffd60a;
      --nav-bg:rgba(255,255,255,0.9);
    }

    body{
      background: var(--dark);
      color: var(--secondary);
      font-family: 'Roboto', sans-serif;
      margin: 0;
    }

    .navbar{
      background: var(--nav-bg);
      border-bottom: 2px solid var(--primary);
    }

    .navbar .navbar-brand,
    .navbar .nav-link,
    .cart-link{
      color: var(--primary) !important;
      font-weight: 700;
      text-decoration: none;
    }

    .navbar .nav-link:hover,
    .cart-link:hover{
      color: #cc7000 !important;
    }

    h1, h2, h3, .navbar-brand{
      font-family: 'Lora', serif;
    }
    .wrap{ 
  min-height:30vh; 
  padding:1rem 0;
}

.panel{
  background: var(--panel-bg);
  border:1px solid var(--panel-border);
  border-radius:.5rem;
  padding:1rem;
}

.soft-shadow{
  box-shadow:0 8px 20px rgba(0,0,0,.5);
}

/* Carousel */
.carousel-item img{
  height:320px;
  object-fit:cover;
  display:block;
}

@media (max-width: 575.98px){
  .carousel-item img{ height:260px; }
}

/* Buttons */
.btn-light{ 
  font-weight:700;
  background: var(--primary);
  color:#000;
  border:none;
}

.btn-light:hover{
  background: var(--secondary);
}

/* Sections */
.section{
  padding:1.5rem 0;
}

/* Images */
img.img-fluid{
  border-radius:.5rem;
}

img:hover{
  outline:4px solid var(--primary);
  filter:brightness(1.15) saturate(1.2);
  transition:0.2s;
}

/* Text hover */
p:hover, h1:hover, h3:hover{
  text-shadow:0 0 8px rgba(253,136,3,0.884);
}

small:hover{
  color: var(--primary);
}

/* Footer */
footer{
  background:#000;
  color: var(--secondary);
  border-top:2px solid var(--primary);
}
</style>
<body>

<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Bob's burgers</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="nav">

      <!-- LEFT SIDE (links) -->
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="purchase.php">Purchase our burgers!</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
            Socials
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="Roblox.com">Roblox</a></li>
            <li><a class="dropdown-item" href="youtube.com">YouTube</a></li>
          </ul>
        </li>
      </ul>

      <!-- RIGHT SIDE (cart) -->
      <div class="ms-auto">
        <a href="shoppingcart.php" class="nav-link fw-bold">🛒 Cart</a>
      </div>

    </div>
  </div>
</nav>


<!-- Hero Row: Carousel (left) + Intro (right) -->
<div class="container">
    <div class="row wrap g-3 mb-2">

      <!-- Carousel: left half -->
      <div class="col-12 col-md-6">
        <div id="mainCarousel" class="carousel slide panel soft-shadow" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="https://wpcdn.us-east-1.vip.tn-cloud.net/www.thepitchkc.com/content/uploads/2023/05/t/u/image4-scaled.jpeg" alt="Alternate" class="d-block w-100 rounded">
            </div>
            <div class="carousel-item">
              <img src="https://tse4.mm.bing.net/th/id/OIP.SeS6jzSBdUxTVPO9-ceKHwHaEK?rs=1&pid=ImgDetMain&o=7&rm=3" alt="Alternate" class="d-block w-100 rounded">
            </div>
            <div class="carousel-item">
              <img src="https://tse3.mm.bing.net/th/id/OIP.sC4HQ6TpQQFLwob3lflOgwHaFj?w=1600&h=1200&rs=1&pid=ImgDetMain&o=7&rm=3" alt="Alternate" class="d-block w-100 rounded">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
      
      <!-- Text: right half -->
      <div class="col-12 col-md-6 text-center" style="margin-top: 6rem;">
        <div class="panel soft-shadow">
          <h1 class="mb-3">What is Bob's burger?</h1>
          <p class="mb-3">
            Bob's Burger is a family-run burger stand that resides in Oklahoma, selling fresh burgers everyday from 9-6pm.
          </p>
          <a class="btn btn-light" href="purchase.php">Buy now!</a>
        </div>
      </div>
    </div>
  </div>


  <!-- Section 1 -->
  <div class="container section">
    <div class="row align-items-center g-3">
      <div class="col-md-6">
        <h3>Introduction</h3>
        <p>
          This is my family, the Bob family. I love burgers, and I'm glad my family has the same passion as I do, cooking burgers!
        </p>
      </div>
      <!-- col-md-6 makes the column take up 6/12 columns (half ot the row on medium screens and larger) -->
      <div class="col-md-6">
        <img src="https://th.bing.com/th/id/OIP.x1DjQxRS8j0VSkih19mGqAHaEK?o=7rm=3&rs=1&pid=ImgDetMain&o=7&rm=3" alt="Bob image" class="img-fluid rounded soft-shadow">
      </div>
    </div>
  </div>

  <!-- Section 2 -->
  <div class="container section">
    <!-- aligns item center helps to center all columns within that row, so all content in each column will be centered along the row's cross-axis(vertically if the row is horizontal)  -->
     <!-- g3 sets the spacing between columns and rows to a medium size(3) the higher the number, the more space between grid items -->
      <!-- flex-md-row-reverse: On medium screens and up, reverses the order of columns in the row (so the second column appears before the first). On smaller screens, the order is normal (not reversed). -->
    <div class="row align-items-center g-3 flex-md-row-reverse">
      <div class="col-md-6">
        <h3>Why Bob's Burger?</h3>
        <p>
        Bob's Signature Burger, especially the mushroom burger, is a must-try because it perfectly balances rich, savory flavors with a satisfying, hearty texture. The juicy beef patty is cooked to perfection, delivering a deep, smoky taste that pairs beautifully with the earthy, umami-packed mushrooms layered on top. The mushrooms add a slightly buttery, melt-in-your-mouth quality that elevates the entire burger beyond the ordinary.
        </p>
      </div>
      <div class="col-md-6">
        <img src="https://img.freepik.com/premium-vector/delicious-cartoon-burger-vector-illustration-creative-projects_1323048-20092.jpg" alt="burgerimg" class="img-fluid rounded soft-shadow">
      </div>
    </div>
  </div>

  <!-- Footer (white background) -->
   <!-- py-3 is for vertical padding, padding on top and bottom to an element -->
  <footer class="py-3 mt-auto"> <!-- mt-auto pushes footer to bottom -->
    <div class="container text-center">
        <!-- &is for copyright logo -->
      <small>&copy; Bob's burger 2017</small>
    </div>
  </footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>