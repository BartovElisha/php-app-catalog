<?php
require_once "./inc/config.php";
require_once "./inc/utils.php";
include_once "./inc/header.php";
include_once "./inc/navbar.php";
?>

<main class="p-4 bg-dark text-white shadow">
    <div class="text-center">
        <h2>Sport Superstar</h2>
        <h5>Everything that you need to stay active</h5>
    </div>

    <h5>Trending Products</h5>

    <div class="row mb-5 pb-3">

        <?php

        // $products = [
        //     [
        //         'name' => 'Mike Running Shoes',
        //         'description' => 'Very nice product',
        //         'price' => 54,
        //         'image' => 'https://cdn.pixabay.com/photo/2014/05/18/11/26/shoes-346986__340.jpg',
        //         'rating' => 5,
        //     ],
        //     [
        //         'name' => 'Tennis Edge',
        //         'description' => 'Description here...',
        //         'price' => 38,
        //         'image' => 'https://cdn.pixabay.com/photo/2021/06/04/06/54/racket-6308994__340.jpg',
        //         'rating' => 4,
        //     ],
        //     [
        //         'name' => 'Weight It',
        //         'description' => 'Mmm... expansive!',
        //         'price' => 108,
        //         'image' => 'https://cdn.pixabay.com/photo/2016/08/31/22/20/weights-1634747__340.jpg',
        //         'rating' => 5,
        //     ],
        // ];     

        $recommended = ['Tennis Edge', 'Weight It'];

        $fn_icon = function ($name) {
            global $recommended;
            return in_array($name, $recommended) ? "bi-star-fill" : "bi-star";
        };

        $db_conn = mysqli_connect(DB_URL, DB_USER, DB_PWD, DB_NAME);
        $sql = "SELECT * FROM products";
        $result = mysqli_query($db_conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            while ($item = mysqli_fetch_assoc($result)) {
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
        }
        
        ?>
    </div>

    <?php $time = time(); ?>

    <h5>
        Our Special Offers for <?= date('d/m/Y', $time) ?>
    </h5>

    <?php
    // $offers = [
    //     [
    //         'title' => 'Black Friday Sale',
    //         'description' => 'buy now before the offer expires',
    //         'code' => 'BF015'
    //     ],
    //     [
    //         'title' => '2 in the price of 1',
    //         'description' => 'for club members only!',
    //         'code' => 'TO211'
    //     ]
    // ];
    ?>

    <div class="row mb-5 pb-3">
        <?php
        $sql = "SELECT * FROM offers";
        $result = mysqli_query($db_conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            while ($offer = mysqli_fetch_assoc($result)) {
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
        }
        ?>
    </div>

</main>

<?php
include_once "./inc/footer.php";
