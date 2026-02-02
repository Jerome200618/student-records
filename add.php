<?php
include 'includes/db.php';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $course = $_POST['course'];
    $year_level = $_POST['year_level'];
    $email = $_POST['email'];

    $sql = "INSERT INTO students (name, course, year_level, email) 
            VALUES ('$name', '$course', '$year_level', '$email')";

    if(mysqli_query($conn, $sql)){
        header("Location: index.php"); // redirect to main screen
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="add-container">
    <h2 class="center">Add New Student</h2>
    <form method="POST" action="" class="add-form">
        <div class="form-row">
            <label>Name:</label>
            <input type="text" name="name" required>
        </div>
        <div class="form-row">
            <label>Course:</label>
            <input type="text" name="course" required>
        </div>
        <div class="form-row">
            <label>Year Level:</label>
            <input type="text" name="year_level" required>
        </div>
        <div class="form-row">
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>
        <input type="submit" name="submit" value="Add Student">
    </form>
</div>

</body>
</html>
