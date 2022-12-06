<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

$cookie_name = "digisell";
$cookie_value = "Visited Digisell" . date("Y-m-d H:i:s");
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  

  <!-- Mumble UI -->
  <link rel="stylesheet" href="uikit/styles/uikit.css" />
  <!-- Custom CSS -->
  <link rel="stylesheet" href="styles/app.css" />
  <link rel="stylesheet" href="styles/custom.css" />

  <title>DIGI SELL</title>
</head>

<body>
  <!-- Header Section -->
  <header class="header">
    <div class="container container--narrow">
      <a href="" class="header__logo">
        <img src="images/logo.svg" alt="Digi Sell" />
      </a>
      <nav class="header__nav">
        <input type="checkbox" id="responsive-menu" />
        <label for="responsive-menu" class="toggle-menu">
          <span>Menu</span>
          <div class="toggle-menu__lines"></div>
        </label>
        <ul class="header__menu">
          <li class="header__menuItem"><a href="index.php">Home</a></li>
          <li class="header__menuItem"><a href="listings.html">Listings</a></li>
          <?php if (isset($user)): ?>
          <li class="header__menuItem"><a href="add_product.html">Add Listing</a></li>
          <li class="header__menuItem"><a href="profile.html">Profile</a></li>
          <li class="header__menuItem"><?= htmlspecialchars($user["username"]) ?></li>
          <li class="header__menuItem"><a href="logout.php" class="btn btn--sub">Logout</a></li>


          <?php else: ?>

          <li class="header__menuItem"><a href="login.php" class="btn btn--sub">Login/Sign Up</a></li>

          <?php endif; ?>

        </ul>
      </nav>
    </div>
  </header>

  <!-- Main Section -->
  <main class="home">
    <section class="hero-section text-center">
      <div class="container container--narrow">
        <div class="hero-section__box">
          <h2>BUY AND SELL <span>DIGITAL PRODUCTS</span></h2>
          <h2>FROM AROUND THE WORLD</h2>
        </div>

        <div class="hero-section__search">
          <form class="form" action="#" method="get">
            <div class="form__field">
              <label for="formInput#search">Search Digital Products </label>
              <input class="input input--text" id="formInput#search" type="text" name="text"
                placeholder="Search Digital Products" />
            </div>

            <input class="btn btn--sub btn--lg custom__button" type="submit" value="Search" />
          </form>
        </div>
      </div>
    </section>
    <!-- Search Result: DevList -->
    <section class="devlist">
      <div class="container">
        <div class="">
          <div class="">
           <div class="card project">
              <a href="" class="project">
                <div class="card__body">
                  <h3 class="project__title">Product Title</h3>
                  <p><a class="project__author">Listed By Ahnaf Rahat</a></p>
                  <p class="project--rating">
                    <span style="font-weight: bold;">Price:</span> 10.0 <span style="font-weight: bold;">USD</span>
                  </p>
                 
                </div>
                <a class="btn btn--main--outline"  style="margin: 20px;" href="single_listing.html">View</a>
                <a class="btn btn--main--outline"  style="margin: 20px;" href="single_listing.html">Buy Now</a>
              </a>
            </div>

            <div class="card project">
              <a href="" class="project">
                <div class="card__body">
                  <h3 class="project__title">Product Title</h3>
                  <p><a class="project__author">Listed By Ahnaf Rahat</a></p>
                  <p class="project--rating">
                    <span style="font-weight: bold;">Price:</span> 10.0 <span style="font-weight: bold;">USD</span>
                  </p>
                 
                </div>
                <a class="btn btn--main--outline"  style="margin: 20px;" href="single_listing.html">View</a>
                <a class="btn btn--main--outline"  style="margin: 20px;" href="single_listing.html">Buy Now</a>
              </a>
            </div>

            <div class="card project">
              <a href="" class="project">
                <div class="card__body">
                  <h3 class="project__title">Product Title</h3>
                  <p><a class="project__author">Listed By Ahnaf Rahat</a></p>
                  <p class="project--rating">
                    <span style="font-weight: bold;">Price:</span> 10.0 <span style="font-weight: bold;">USD</span>
                  </p>
                 
                </div>
                <a class="btn btn--main--outline"  style="margin: 20px;" href="single_listing.html">View</a>
                <a class="btn btn--main--outline"  style="margin: 20px;" href="single_listing.html">Buy Now</a>
              </a>
            </div>
     
          
          </div>
        </div>
      </div>
     
     
    </section>

  </main>
</body>

</html>