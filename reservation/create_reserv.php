<?php
// include '../connection.php';

// $data = json_decode(file_get_contents("php://input"));
// if ($data) {
//     if ($data->id) {
//         $sql = "UPDATE reservation SET "; // Start query for updating existing record
//     } else {
//         $sql = "INSERT INTO reservation SET "; // Start query for inserting a new record
//     }

//     foreach ($data as $k => $v) {
//         $sql .= "$k = '$v',"; // Build the query
//     }

//     $sql = rtrim($sql, ","); // Remove the trailing comma

//     if ($data->id) {
//         $sql .= " WHERE id = '" . $data->id . "'"; // Add a WHERE clause for updates
//     }

//     $result = $db->query($sql);

//     if ($result) {
//         echo json_encode(array("status" => 1));
//     } else {
//         echo json_encode(array("status" => 0));
//     }
// } else {
//     echo json_encode(array("status" => 0, "message" => "No data received."));
// }


include '../connection.php';

$data = json_decode(file_get_contents("php://input"));
if ($data) {
    $id = isset($data->id) ? $data->id : null; // Check if 'id' property exists

    if ($id) {
        $sql = "UPDATE reservation SET "; // Start query for updating existing record
    } else {
        $sql = "INSERT INTO reservation SET "; // Start query for inserting a new record
    }

    foreach ($data as $k => $v) {
        if ($k !== 'id') { // Skip 'id' field in the loop
            $sql .= "$k = '$v',"; // Build the query
        }
    }

    $sql = rtrim($sql, ","); // Remove the trailing comma

    if ($id) {
        $sql .= " WHERE id = '$id'"; // Add a WHERE clause for updates
    }

    $result = $db->query($sql);

    if ($result) {
        echo json_encode(array("status" => 1));
    } else {
        echo json_encode(array("status" => 0));
    }
} else {
    echo json_encode(array("status" => 0, "message" => "No data received."));
}


?>
