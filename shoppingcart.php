<?php
include "config.php";

if ($_POST) {
    $id = (int) $_POST["orderID"];

    if (isset($_POST["remove"]) || $_POST["amount"] == 0) {
        $stmt = $conn->prepare("DELETE FROM shoppingcart WHERE OrderID = ?");
        $stmt->bind_param("i", $id);
    } else {
        $stmt = $conn->prepare("UPDATE shoppingcart SET amount = ? WHERE OrderID = ?");
        $stmt->bind_param("ii", $_POST["amount"], $id);
    }

    $stmt->execute();
    header("Location: shoppingcart.php");
    exit;
}

$items = $conn->query("
    SELECT OrderID, Name, Price, amount
    FROM shoppingcart
    JOIN products ON shoppingcart.productID = products.ProductID
");

$subtotal = 0;
foreach ($items as $item) $subtotal += $item["Price"] * $item["amount"];
$delivery = $subtotal ? 2.50 : 0;
$total = $subtotal + $delivery;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopping Cart | Bob's Burgers</title>

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

    h1, h2, h3, h4, .navbar-brand{
      font-family: 'Lora', serif;
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

    .cart-panel,
    .summary-panel{
      background: var(--panel-bg);
      border: 2px solid var(--panel-border);
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(0,0,0,.35);
      padding: 1.5rem;
    }

    .cart-item{
      background: rgba(255,255,255,0.03);
      border: 1px solid rgba(255,214,10,0.35);
      border-radius: 12px;
      padding: 1rem;
    }

    .price-text{
      color: var(--secondary);
      font-weight: 700;
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

    .remove-btn{
      background: transparent;
      border: 1px solid var(--primary);
      color: var(--primary);
      font-weight: 700;
      border-radius: 8px;
      padding: .45rem .9rem;
    }

    .remove-btn:hover{
      background: var(--primary);
      color: #000;
    }

    .summary-line{
      display: flex;
      justify-content: space-between;
      margin-bottom: .85rem;
      color: var(--secondary);
    }

    .summary-total{
      border-top: 2px solid var(--panel-border);
      margin-top: 1rem;
      padding-top: 1rem;
      font-size: 1.1rem;
      font-weight: 700;
    }

    footer{
      background: #000;
      color: var(--secondary);
      border-top: 2px solid var(--primary);
      margin-top: 3rem;
    }

    .qty-input{
      width: 90px;
      text-align: center;
      font-weight: 700;
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
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="purchase.php">Purchase our burgers!</a></li>
      </ul>
      <div class="ms-auto">
        <a href="shoppingcart.php" class="cart-link">🛒 Shopping Cart</a>
      </div>
    </div>
  </div>
</nav>

<main class="container py-5">
  <div class="row g-4">
    <div class="col-lg-8">
      <div class="cart-panel">
        <h1 class="mb-4">Your Shopping Cart</h1>

        <?php if ($items->num_rows): ?>
          <div class="d-flex flex-column gap-3">
            <?php foreach ($items as $item): ?>
              <div class="cart-item">
                <div class="row align-items-center g-3">
                  <div class="col-md-5">
                    <h4><?= htmlspecialchars($item["Name"]) ?></h4>
                    <p class="price-text mb-0">$<?= number_format($item["Price"], 2) ?> each</p>
                  </div>

                  <div class="col-md-4">
                    <form method="POST" class="d-flex gap-2 align-items-center">
                      <input type="hidden" name="orderID" value="<?= $item["OrderID"] ?>">
                      <input type="number" name="amount" class="form-control qty-input" min="0" value="<?= $item["amount"] ?>" required>
                      <button class="btn btn-buy" name="update">Update</button>
                    </form>
                  </div>

                  <div class="col-md-3 text-md-end">
                    <form method="POST">
                      <input type="hidden" name="orderID" value="<?= $item["OrderID"] ?>">
                      <button class="remove-btn" name="remove">Remove</button>
                    </form>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php else: ?>
          <p>Your cart is empty.</p>
        <?php endif; ?>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="summary-panel">
        <h2 class="mb-4">Order Summary</h2>
        <div class="summary-line"><span>Subtotal</span><span>$<?= number_format($subtotal, 2) ?></span></div>
        <div class="summary-line"><span>Delivery</span><span>$<?= number_format($delivery, 2) ?></span></div>
        <div class="summary-line summary-total"><span>Total</span><span>$<?= number_format($total, 2) ?></span></div>
        <a href="purchase.php" class="btn btn-buy w-100 mt-4 py-2">Continue Shopping</a>
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