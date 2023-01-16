<?php
define('UPLOAD_MAX_SIZE', 1024 * 1024 * 2);
define('FILE_EXT', ['jpg', 'jpeg', 'png', 'gif', 'webp']);
define('UPLOAD_DIR', dirname(__FILE__,2) . "/upload/");
//define('UPLOAD_DIR', __DIR__ . "/upload/");

define('DB_URL', 'localhost');
define('DB_USER', 'root');
define('DB_PWD', '');
define('DB_NAME', 'catalog');