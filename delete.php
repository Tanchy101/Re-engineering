<?php
// Include your database connection configuration
include('config/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ensure that the comment ID is received from the client-side
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $commentId = $_POST['id'];
        // Check if the user is authorized to delete this comment (e.g., by checking session or token)

        // Perform the delete operation
        $sql = "DELETE FROM `discussion` WHERE id = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('i', $commentId);

        if ($stmt->execute()) {
            // If the deletion is successful, return a success message
            $response = array('statusCode' => 200, 'message' => 'Comment deleted successfully.');
        } else {
            // If there was an error during deletion, return an error message
            $response = array('statusCode' => 500, 'message' => 'Error occurred while deleting the comment.');
        }

        // Close the prepared statement and database connection
        $stmt->close();
        $mysqli->close();
    } else {
        // If the comment ID is not provided, return an error message
        $response = array('statusCode' => 400, 'message' => 'Comment ID not provided.');
    }
} else {
    // If the request method is not POST, return an error message
    $response = array('statusCode' => 405, 'message' => 'Method Not Allowed.');
}

// Send the JSON response back to the client-side
echo json_encode($response);
exit();
?>