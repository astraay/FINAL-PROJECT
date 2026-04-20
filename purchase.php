<?php
include "config.php";

if ($_POST) {
    $stmt = $conn->prepare("
        INSERT INTO shoppingcart (productID, amount)
        VALUES (?, ?)
        ON DUPLICATE KEY UPDATE amount = amount + VALUES(amount)
    ");
    $stmt->bind_param("ii", $_POST["productID"], $_POST["amount"]);
    $stmt->execute();

    header("Location: shoppingcart.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Purchase | Bob's Burgers</title>

  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Lora:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

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

    .burger-card{
      background: var(--panel-bg);
      border: 2px solid var(--panel-border);
      border-radius: 12px;
      overflow: hidden;
      height: 100%;
      box-shadow: 0 8px 20px rgba(0,0,0,.35);
    }

    .burger-card img{
      width: 100%;
      height: 250px;
      object-fit: cover;
      display: block;
      border-bottom: 2px solid var(--panel-border);
    }

    .card-body{
      color: var(--secondary);
    }

    .btn-buy{
      background: var(--primary);
      color: #000;
      font-weight: 700;
      border: none;
    }

    .btn-buy:hover{
      background: var(--secondary);
      color: #000;
    }

    .qty-input{
      max-width: 90px;
      margin: auto;
      text-align: center;
      font-weight: 700;
    }

    footer{
      background: #000;
      color: var(--secondary);
      border-top: 2px solid var(--primary);
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light py-3">
  <div class="container">
    <a class="navbar-brand" href="index.php">Bob's Burgers</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav2">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="nav2">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="purchase.php">Purchase our burgers!</a>
        </li>
      </ul>

      <div class="ms-auto">
        <a href="shoppingcart.php" class="cart-link">🛒 Shopping Cart</a>
      </div>
    </div>
  </div>
</nav>

<main class="container py-5">
  <div class="row g-4">

    <div class="col-12 col-md-6 col-lg-4">
      <div class="card burger-card h-100">
        <img src="https://images.unsplash.com/photo-1550547660-d9450f859349?q=80&w=1200&auto=format&fit=crop" alt="Signature Mushroom Burger">
        <div class="card-body text-center">
          <h3 class="card-title">Signature Mushroom Burger</h3>
          <p class="card-text">$8.99</p>

          <form method="POST">
            <input type="hidden" name="productID" value="1">
            <input type="number" name="amount" class="form-control qty-input mt-3" value="1" min="1" required>
            <button type="submit" class="btn btn-buy mt-3 px-4">Order</button>
          </form>
        </div>
      </div>
    </div>

    <div class="col-12 col-md-6 col-lg-4">
      <div class="card burger-card h-100">
        <img src="https://images.unsplash.com/photo-1568901346375-23c9450c58cd?q=80&w=1200&auto=format&fit=crop" alt="Belcher Classic Cheeseburger">
        <div class="card-body text-center">
          <h3 class="card-title">Belcher Classic Cheeseburger</h3>
          <p class="card-text">$7.49</p>

          <form method="POST">
            <input type="hidden" name="productID" value="2">
            <input type="number" name="amount" class="form-control qty-input mt-3" value="1" min="1" required>
            <button type="submit" class="btn btn-buy mt-3 px-4">Order</button>
          </form>
        </div>
      </div>
    </div>

    <div class="col-12 col-md-6 col-lg-4">
      <div class="card burger-card h-100">
        <img src="https://images.unsplash.com/photo-1571091718767-18b5b1457add?q=80&w=1200&auto=format&fit=crop" alt="Louise’s Spicy Chaos Burger">
        <div class="card-body text-center">
          <h3 class="card-title">Louise’s Spicy Chaos Burger</h3>
          <p class="card-text">$9.25</p>

          <form method="POST">
            <input type="hidden" name="productID" value="3">
            <input type="number" name="amount" class="form-control qty-input mt-3" value="1" min="1" required>
            <button type="submit" class="btn btn-buy mt-3 px-4">Order</button>
          </form>
        </div>
      </div>
    </div>

  </div>
</main>

<footer class="text-center py-3">
  <small>&copy; Bob's Burger 2017</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>