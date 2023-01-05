<?php
session_start();

$prod_name = $_GET['prod'];

if (isset($prod_name) && !empty($prod_name)) {
    $_SESSION['prod_name'] = $prod_name;
}

include_once "./inc/header.php";
include_once "./inc/navbar.php";
?>

<main class="p-4 bg-dark text-white shadow">

    <div class="text-center">
        <h2>Product Page</h2>
        <h5>
            <?= $prod_name ?>
        </h5>

        <a href="cart.php" class="btn btn-primary">
            Go to cart
        </a>
    </div>

</main>

<?php
include_once "./inc/footer.php";
