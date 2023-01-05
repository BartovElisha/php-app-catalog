<?php
session_start();


include_once "./inc/header.php";
include_once "./inc/navbar.php";
?>

<main class="p-4 bg-dark text-white shadow">

    <div class="text-center">
        <h2>Cart</h2>
        <h5>
            You have this product in your cart:
            <?php
            if (isset($_SESSION['prod_name'])) {
                echo $_SESSION['prod_name'];
            }
            ?>
        </h5>
    </div>

</main>

<?php
include_once "./inc/footer.php";