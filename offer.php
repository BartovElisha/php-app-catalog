<?php
$selected_code = $_GET['code'];
$selected_title = $_GET['title'];


include_once "./inc/header.php";
include_once "./inc/navbar.php";
?>

<main class="p-4 bg-dark text-white shadow flex-fill">

    <div class="text-center">
        <h2>Get This Offer: <?= $selected_title ?></h2>
        <h5>
            Coupon code: <?= $selected_code ?>
        </h5>
    </div>

    <form action="" method="POST" class="d-block w-50 m-auto mt-5">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="your@email.com">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Mobile Phone</label>
            <input type="text" class="form-control" id="phone" name="phone">
        </div>

        <button class="btn btn-primary btn-lg">
            Get It Now
        </button>
    </form>
</main>

<?php
include_once "./inc/footer.php";