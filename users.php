<?php
require_once "./classes/users.php";
include_once "./inc/header.php";
include_once "./inc/navbar.php";

$users = [
    [
        "id" => 1,
        "username" => "user1",
        "email" => "u1@email.com",
        "avatar" => "https://cdn.pixabay.com/photo/2023/01/03/10/35/butterfly-7694101_640.jpg"
    ],
    [
        "id" => 2,
        "username" => "user2",
        "email" => "u2@email.com",
        "avatar" => "https://cdn.pixabay.com/photo/2023/01/03/10/35/butterfly-7694101_640.jpg"
    ]
];

$user1 = new User();
$user1->set($users[0]);

$user2 = new User();
$user2->set($users[1]);

?>

<main class="p-4 bg-dark text-white shadow">

    <div class="text-center">
        <div class="card">
            <div class="card-body text-dark">
                <p class="card-text">
                    <?= $user1->get('username') ?>
                </p>
                <p class="card-text"><?= $user1->get('email') ?></p>
            </div>
        </div>

        <div class="card">
            <div class="card-body text-dark">
                <p class="card-text">
                    <?= $user2->get('username') ?>
                </p>
                <p class="card-text"><?= $user2->get('email') ?></p>
            </div>
        </div>
    </div>

</main>

<?php
include_once "./inc/footer.php";