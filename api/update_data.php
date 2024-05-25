<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, DELETE, PUT, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once "../db.php";
global $conn;

$input = json_decode(file_get_contents('php://input'), true);
$id = $input['id'];
$tag = $input['tag'];
$tanggal = date("Y-m-d H:i:s");

$sql = "UPDATE data SET tag='$tag', updatedAt='$tanggal' WHERE id=$id";
$query = mysqli_query($conn, $sql) or die("Error updating data " . mysqli_error($conn));

if (mysqli_affected_rows($conn) > 0) {
    $data_akhir = [
        'status' => '200',
        'message' => 'Data updated successfully',
        'data' => [
            'id' => $id,
            'tag' => $tag,
            'updatedAt' => $tanggal
        ]
    ];
} else {
    $data_akhir = [
        'status' => '404',
        'message' => 'ID not found or no changes made'
    ];
}

header('Content-Type: application/json');
echo json_encode($data_akhir);
