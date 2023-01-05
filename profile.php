<?php
define('UPLOAD_MAX_SIZE', 1024 * 1024 * 2);
define('FILE_EXT', ['jpg', 'jpeg', 'png', 'gif', 'webp']);
define('UPLOAD_DIR', __DIR__ . "/upload/");

$error = true;
$message = '';

if (isset($_POST['submit'])) {

    try {
        if ($_FILES['image']['error'] == 1) {
            throw new Exception('Error uploding this file');
        }

        if (!is_uploaded_file($_FILES['image']['tmp_name'])) {
            throw new Exception('not uploaded yet');
        }

        if ($_FILES['image']['size'] > UPLOAD_MAX_SIZE) {
            throw new Exception('Error: file is too large.');
        }

        $file_info = pathinfo($_FILES['image']['name']);
        $file_ex = strtolower($file_info['extension']);

        if (in_array($file_ex, FILE_EXT)) {
            $error = false;
            $file_name = UPLOAD_DIR . date('Y.m.d.H.i.s') . '-' . $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], $file_name);
            $message = 'File was uploaded successfully';
        }

    } catch (Exception $err) {
        $message = $err->getMessage();
    }
}


include_once "./inc/header.php";
include_once "./inc/navbar.php";
?>

<main class="p-4 bg-dark text-white shadow">

    <div class="text-center">
        <h2>Profile</h2>
        <h5>Upload image</h5>

        <form action="" method="POST" enctype="multipart/form-data" class="d-block w-50 m-auto mt-5">
            <label for="image">Choose image:</label>
            <input type="file" name="image" id="image">
            <p>
                <input type="submit" name="submit" value="Upload image" class="btn btn-primary">
            </p>
        </form>

        <?php
        if (isset($message) && !empty($message)) {
            echo "<div class=\"alert alert-info\">";
            echo $message;
            echo "</div>";
        }
        ?>

    </div>

</main>

<?php
include_once "./inc/footer.php";