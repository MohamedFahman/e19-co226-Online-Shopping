<!DOCTYPE html>
<html>
    <head>
        <title>
            Online Shopping
        </title>
        <link rel = "icon" href = Logo.jpg type = "image/x-icon">
        <link rel="stylesheet" type="text/css" href="../css/test.css" />
        <link rel="stylesheet" type="text/css" href="../css/styles.css" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
         
    </head>

    <body>


    <div class="container pt-2 pb-2">
    <div class="row">
        <div class="col-sm-1"> <img class="logoimg" src="../images/LogoFinal.jpg" alt="Logo"> </div>
        <div class="col-sm-8 text-danger"> <h2>The largest online shopping platform in Sri Lanka.</h2> </div>  
        
        <div class="col-sm-1"> <a href="Login.html"> <button type="button" class="btn btn-outline-primary"> Log in </button> </a> </div>

        <div class="col-sm-1">  <a href="Signup.html"><button type="button" class="btn btn-outline-primary"> Sign up </button></a> </div>
        <div class="col-sm-1">  <a href="admin.html"> <button type="button" class="btn btn-outline-primary"> Admin </button></a> </div>
    </div>
</div>

        <div>
            <ul class="NavigationBar">
                <li ><a href=Home.php> Home </a></li>
                <li ><a href=cart.php> Cart </a></li>
                <li ><a href=orderNow.php> Order Now </a></li>
                <li ><a href=Track_order.html> Track the Order </a></li>
                <li ><a href=contacts.html> Contacts Us </a></li>
                <li ><a href=Rating.html> Rate Us </a></li>
                <li ><a href=Aboutus.html> About Us </a></li>   
            </ul>    
        </div>

<div class="container pt-2">     
<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array(); // Initialize the cart array if it doesn't exist
}

if (isset($_POST['add_to_cart'])) {
    // Retrieve the product details from the form
    $productID = $_POST['productID'];
    $productName = $_POST['productName'];
    $sellingPrice = $_POST['sellingPrice'];
    $quantity = $_POST['quantity'];

    // Create an associative array for the cart item
    $cartItem = array(
        'productID' => $productID,
        'productName' => $productName,
        'sellingPrice' => $sellingPrice,
        'quantity' => $quantity
    );

    // Add the cart item to the cart array in the session
    $_SESSION['cart'][] = $cartItem;
}

echo '    <table class= "table table-striped">';
echo '        <tr><th>Product ID</th><th>Product Name</th><th>Selling Price</th><th>Quantity</th></tr>';

foreach ($_SESSION['cart'] as $cartItem) {
    echo '        <tr>';
    echo '            <td>' . $cartItem['productID'] . '</td>';
    echo '            <td>' . $cartItem['productName'] . '</td>';
    echo '            <td>' . $cartItem['sellingPrice'] . '</td>';
    echo '            <td>' . $cartItem['quantity'] . '</td>';
    echo '        </tr>';
}
echo '    </table>';

echo '<form action="ordernow.php" method="post">';

echo '<div>';
echo '<br>'.'<br>';
echo '<label> Payment Method :</label>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;';
echo '<input name="Payment_Method" type="radio" value = "Cash_Payment" required> Cash Payment </input>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;';
echo '<input name="Payment_Method" type="radio" value = "Card_Payment" required> Card Payment </input>';
echo '<br>'.'<br>'.'<br>';
echo '</div>';

echo '    <button type="submit" name="order_now" class="ordernow"> Order Now </button>';

echo '</form>';

?>
</div>

    <br><br>
    </body>

    <footer>  
    <p>&copy; 2023 Online Shopping, Sri Lanka, All rights reserved.</p>
    </footer>

</html>