<?php
include_once('util-db.php'); // Include the file containing get_db_connection() function

// Function to save user information into the Quote table
function saveQuote($id, $name, $address, $creditCard) {
    $conn = get_db_connection(); // Get the database connection
    
    if ($conn === false) {
        return false; // Return false if the connection fails
    }

    // Escape the variables to prevent SQL injection
    $safeId = mysqli_real_escape_string($conn, $id);
    $safeName = mysqli_real_escape_string($conn, $name);
    $safeAddress = mysqli_real_escape_string($conn, $address);
    $safeCreditCard = mysqli_real_escape_string($conn, $creditCard);

    // SQL query to insert customer information into the Quote table
    $sql = "INSERT INTO Quote (ID, name, address, credit_card) 
            VALUES ('$safeId', '$safeName', '$safeAddress', '$safeCreditCard')";

    if ($conn->query($sql) === TRUE) {
        return $conn->insert_id; // Return the generated Quote ID
    } else {
        return false; // Return false if the insertion fails
    }
}

function getCartItems() {
    if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
        return []; // Return an empty array if cart is empty or not set
    } else {
        return $_SESSION['cart']; // Return cart items from session
    }
}
// Other functions related to the Quote table...
?>
