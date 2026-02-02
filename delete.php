<?php
include 'includes/db.php';

// Get student ID from URL
$id = $_GET['id'];

// Delete student
$sql = "DELETE FROM students WHERE id=$id";

if(mysqli_query($conn, $sql)){
    header("Location: index.php"); // Redirect to table
    exit();
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
?>
