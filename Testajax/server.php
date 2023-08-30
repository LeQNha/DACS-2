<?php
    // Kết nối cơ sở dữ liệu và truy vấn
    $conn = mysqli_connect("localhost", "username", "password", "database");
    $query = "SELECT * FROM users";
    $result = mysqli_query($conn, $query);

    // Tạo mảng kết quả
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    // Trả về kết quả dưới dạng JSON
    echo json_encode($data);
?>