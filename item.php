<?php
session_start();
include('functions.php');

// see if item_id is in the URL
if (isset($_GET['item_id']) && !empty($_GET['item_id'])) {
    $itemId = $_GET['item_id'];

    // retrieve item details from the database based $itemId
    global $conn;
    $sql = "SELECT * FROM Item WHERE item_id = $itemId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $item = $result->fetch_assoc();
    } else {
        echo "Item not found.";
        exit();
    }
} else {
    echo "Item ID not provided or invalid.";
    exit();
}
?>
