<?php

$submit = $_REQUEST["submit"];
if (isset($submit)) {
  error_log("user submitted form");

  $name = $_REQUEST["name"];
  if ( !empty($name) ) {
    $nameValid = true;
  } else {
    $nameValid = false;
  }

  $email = $_REQUEST["mail"];
  if ( !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) ) {
    $emailValid = true;
  } else {
    $emailValid = false;
  }

  $order = $_REQUEST["order"];
  if(!isset($_POST["order"]) || count($_POST["order"]) > 1) {
    echo 'please select at least 1 choice';
    $orderValid = false;
  } else {
    echo $_POST['pick_up'][0];
    $orderValid = true;
  }

  $msg = $_REQUEST["msg"];

  $formValid = $nameValid && $emailValid && $orderValid;

  if ($formValid) {
    session_start();
    $_SESSION['name'] = $name;
    $_SESSION['mail'] = $email;
    $_SESSION['order'] = $order;
    $_SESSION['msg'] = $msg;

    header("Location: response.php#order");
    return;
  }
} else {
  error_log("no form submitted");

  $nameValid = true;
  $emailValid = true;
  $orderValid = true;
  $msgValid = true;
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SUNA Breakfast</title>
  <link rel="stylesheet" href="styles/main.css">
  <script type="text/javascript" src="scripts/jquery-3.2.1.js"></script>
  <script type="text/javascript" src="scripts/site.js"></script>
</head>

<body>
  <section class="banner" role="banner">
    <header id="header">
      <div class="header-content clearfix"> <a class="logo" href="index.html">SUNA</a>
        <nav class="navigation" role="navigation">
          <ul class="primary-nav">
            <li><a href="#about">About</a></li>
            <li><a href="#menu">Menu</a></li>
            <li><a href="#teams">Team</a></li>
            <li><a class="navigation_order" href="#order">Order</a><img src="images/shopping-cart.png" alt="shopping cart logo"></li>
            <!-- Image Source: https://www.flaticon.com/free-icon/shopping-cart_126510#term=shopping cart&page=1&position=1 -->
          </ul>
        </nav>
        <div class="dropdown">
          <img src="images/menu.png" alt="shopping cart logo" onclick="myFunction()" class="dropbtn">
          <!-- Image Source:  https://www.iconfinder.com/icons/134216/hamburger_lines_menu_icon -->
          <div id="myDropdown" class="dropdown-content">
            <a href="#about">About</a>
            <a href="#menu">Menu</a>
            <a href="#teams">Team</a>
          </div>
        </div>
      </div>

    </header>
    <div class="container">
      <div class="center">
        <div class="banner-text text-center">
          <h1>SUNA Breakfast</h1>
          <a href="#about" class="btn btn-large">Find out more</a> </div>
        </div>
      </div>
    </section>
    <section id="about" class="section intro">
      <div class="container">
        <div class="center">
          <h3>We get it. You want sleep. You want time. You want to save money.</h3>
          <p>Thats why we started SUNA Breakfast! Cornell needs a fresh, healthy breakfast alternative
            that is completely convenient for you. Our incredibly delicious breakfast options
            will be delivered to you in the window you request!</p>
            <h1>How It Works</h1>
            <p>1) Go to the order form</p>
            <p>2) Select the menu items your would like</p>
            <p>3) Specify the location five minue time window for delivery</p>
            <p>4) Enjoy a fresh and healthy breakfast!</p>
          </div>
        </div>
      </section>

      <section id="menu">
        <div class="container">
          <div class="row1">
            <h1>MENU</h1>
            <ul>
              <li>
                <div class="dotted-bg"></div>
                <h1>SUNA Yogurt</h1>
                <span>$4</span>
                <br>
              </li>
            </ul>
            <p>Vanilla greek yogurt with homemade granola, fresh blueberries, sliced banana, and honey</p>
            <ul>
              <li>
                <div class="dotted-bg"></div>
                <h1>Bagel With Peanut Butter & Banana</h1><span>$3</span><br>
                <br>
              </li>
            </ul>
            <p>Toasted bagel with peanut butter and sliced banana</p>
            <ul>
              <li>
                <div class="dotted-bg"></div>
                <h1>Bagel with Cream Cheese</h1><span>$2.50</span>
                <br>
              </li>
            </ul>
            <p>Toasted bagel with cream cheese</p>
            <ul>
              <li>
                <div class="dotted-bg"></div>
                <h1>Açaí-Mixed Berry Smoothie</h1><span>$4</span>
                <br>
              </li>
            </ul>
            <p>Açaí, strawberries, blueberries, raspberries, milk, yogurt</p>
            <ul>
              <li>
                <div class="dotted-bg"></div>
                <h1>Piña-Colada Smoothie</h1><span>$4</span>
                <br>
              </li>
            </ul>
            <p>Pineapple, banana, coconut juice, and milk</p>
          </div>
        </div>
      </section>

      <section id="teams" class="menu-background">
        <div class="container2">
          <div class="row1">
            <h1>SUNA Founders</h1>
            <div class="founders">
              <div class="person"><img src="images/christophe.jpg" alt="" class="img-responsive">
                <!-- Image Source: http://www.cornellbigred.com/roster.aspx?rp_id=43855&path=msoccer -->
                <div class="person-content">
                  <h4>Christophe Gerlach</h4>
                  <h5 class="role">Co-founder</h5>
                  <p>A sophomore studing AEM</p>
                </div>

              </div>
              <div class="person"> <img src="images/pedro.jpg" alt="" class="img-responsive">
                <!-- Image Source: https://www.linkedin.com/in/pedro-bobrow-182814138/ -->
                <div class="person-content">
                  <h4>Pedro Bobrow</h4>
                  <h5 class="role">Co-founder</h5>
                  <p>A sophomore studing AEM</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="testimonials" class="section intro">
        <div class="container">
          <div class="col-md-8 col-md-offset-2 text-center">
            <h3>"SUNA Breakfast has made my breakfast experience so much easier. They
              have always been on time and incredibly understanding with any cusomizations
              I have made."</h3>
              <p>-John Smith</p>
            </div>
          </div>
        </section>

        <section id="order">
          <div class="container">
            <div class="blue">
              <h1>We are now accepting orders!</h1>
            </div>
          <form method="post" action="/index.php#order" id= "mainForm" novalidate>
          <div>
              <label for="name">Name:</label>
              <input type="text" id="name" name="name" value="<?php echo($name);?>" required>
          </div>
          <div>
              <label for="mail">E-mail:</label>
              <input type="email" id="mail" name="mail" value="<?php echo($email);?>" required>
          </div>
          <div>
            <label for="order">Order</label>
            <div>
              <input type="checkbox" name="order">SUNA Yogurt<br>
              <input type="checkbox" name="order">Bagel with Peanut Butter & Banana<br>
              <input type="checkbox" name="order">Bagel with Cream Cheese<br>
              <input type="checkbox" name="order">Açaí-Mixed Berry Smoothie<br>
              <input type="checkbox" name="order">Piña-Colada Smoothie<br>
            </div>
          </div>
          <div>
              <label for="msg">Additional Comments:</label>
              <textarea id="msg" name="msg" style="width:100%; height:100%;"><?php echo($msg);?></textarea>
          </div>
          <div class="button">
            <button type="submit" name="submit" class="submit">Submit</button>
          </div>
      </form>
          </div>
        </section>

        <footer class="footer">
          <div class="footer-top section">
            <div class="container">
              <div class="row">
                <h5>Our Contact Information</h5>
                <p>
                  sunabreakfast@gmail.com <br>
                  781-686- 8529</p>
                  <h5>Site Map</h5>
                  <ul>
                    <li><a href="#about">About</a></li>
                    <li><a href="#menu">Menu</a></li>
                    <li><a href="#teams">Team</a></li>
                    <li><a href="#order">Order</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </footer>
        </body>
        </html>
