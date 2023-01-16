<?php

$db_conn = mysqli_connect(DB_URL, DB_USER, DB_PWD, DB_NAME);

function runQuery($sql)
{
    $data = [];
    global $db_conn;
    $result = mysqli_query($db_conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }

    return $data;
}