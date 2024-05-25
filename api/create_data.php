<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, DELETE, PUT, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once "../db.php";
global $conn;

$input = json_decode(file_get_contents('php://input'), true);
$tag = $input['tag'];
$tanggal = date("Y-m-d H:i:s");

$sql = "INSERT INTO data (tag, createdAt) VALUES ('$tag', '$tanggal')";
$query = mysqli_query($conn, $sql) or die("Error Inserting data " . mysqli_error($conn));

$data_akhir = [
    'status' => '201',
    'message' => 'Data Created Successfully',
    'data' => [
        'tag' => $tag,    
        'createdAt' => $tanggal
    ]
];

header('Content-Type: application/json');
echo json_encode($data_akhir);
