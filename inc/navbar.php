<?php

$search = '';

if (isset($_GET['submit']) && !empty($_GET['search'])) {
    $search = 'You searched for: ' . $_GET['search'];
}

?>

<header class="mb-auto">
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">The Catalog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="about.php">About</a>
                    </li>
                </ul>
                <form action="" method="GET" class="d-flex" role="search">
                    <input name="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button name="submit" value="submit" class="btn btn-outline-light" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
</header>

<div class="text-center text-white"><?= $search ?></div>