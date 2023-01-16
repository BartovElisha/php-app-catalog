<?php
require_once "./inc/config.php";
require_once "./inc/utils.php";
require_once "./inc/database.php";
require_once "./classes/products.php";
include_once "./inc/header.php";
include_once "./inc/navbar.php";

$shirtProduct = new Product();
$shirtProduct->name = 'Special Tshirt';
$shirtProduct->price = 15;
//$shirtProduct->size = 'L';

$weightProduct = new Product();
$weightProduct->name = '15kilo';
$weightProduct->price = 22;
?>

<main class="p-4 bg-dark text-white shadow">
    <div class="text-center">
        <h2>Sport Superstar</h2>
        <h5>Everything that you need to stay active</h5>
    </div>

    <h5>Trending Products</h5>

    <div class="row mb-5 pb-3">

        <?php

        $recommended = ['Tennis Edge', 'Weight It'];

        $fn_icon = function ($name) {
            global $recommended;
            return in_array($name, $recommended) ? "bi-star-fill" : "bi-star";
        };

        $sql = "SELECT * FROM products";
        $result = runQuery($sql);

        foreach ($result as $item) {
            $col = <<<COL
                <div class="col-sm-12 col-md-4 mb-3">
                    <div class="card">
                        <img src="{$item['image']}" class="card-img-top" alt="{$item['name']}">
                        <div class="card-body text-dark">
                            <h5 class="card-title">{$item['name']}</h5>
                            <p class="card-text">{$fn_price($item['price'])}</p> 
                            <p class="card-text">{$item['description']}</p>
                            <p class="card-text">rating: {$item['rating']}</p>
                            <p class="card-text"><i class="{$fn_icon($item['name'])}"></i></p>
                            <a href="product.php?prod={$item['name']}" class="btn btn-primary">View Product</a>
                        </div>
                    </div>
                </div>
            COL;

            echo $col;
        }
        ?>
    </div>
    <div class="row mb-5 pb-3">
        <div class="col-sm-12 col-md-4 mb-3">
            <div class="card">
                <div class="card-body text-dark">
                    <p class="card-text"><?= $shirtProduct->name; ?></p>
                    <p class="card-text">price: <?= $shirtProduct->price; ?></p>
                    <p class="card-text">tax: 17%</p>
                    <p class="card-text">total: <?= $shirtProduct->totalPrice(); ?></p>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-4 mb-3">
            <div class="card">
                <div class="card-body text-dark">
                    <p class="card-text"><?= $weightProduct->name; ?></p>
                    <p class="card-text"><?= $weightProduct->price; ?></p>
                </div>
            </div>
        </div>
    </div>

    <?php $time = time(); ?>

    <h5>
        Our Special Offers for <?= date('d/m/Y', $time) ?>
    </h5>

    <div class="row mb-5 pb-3">
        <?php
        $sql = "SELECT * FROM offers";
        $result = runQuery($sql);
        
        foreach ($result as $offer) {
            $card = <<<CARD
                <div class="col-sm-12 col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body text-dark">
                            <h5 class="card-title">{$offer['title']}</h5>
                            <p class="card-text">{$offer['description']}</p>
                            <a href="offer.php?code={$offer['code']}&title={$offer['title']}" class="btn btn-primary">Get It</a>
                        </div>
                    </div>
                </div>
            CARD;

            echo $card;
        }
        ?>
    </div>

</main>

<?php
include_once "./inc/footer.php";
