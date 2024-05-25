<?php

$db_host = 'sql12.freesqldatabase.com';
$db_username = 'sql12709243';
$db_password = 'xeBsVrZQSg';
$db_name = 'sql12709243';

$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);
if (!$conn) {
    die('Gagal menghubungkan ke database: ' . mysqli_connect_error());
}
