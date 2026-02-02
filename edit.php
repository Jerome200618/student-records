<?php
include 'includes/db.php';

// Get the student ID from URL
$id = $_GET['id'];

// Fetch existing data
$sql = "SELECT * FROM students WHERE id = $id";
$result = mysqli_query($conn, $sql);
$student = mysqli_fetch_assoc($result);

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $course = $_POST['course'];
    $year_level = $_POST['year_level'];
    $email = $_POST['email'];

    $update_sql = "UPDATE students 
                   SET name='$name', course='$course', year_level='$year_level', email='$email' 
                   WHERE id=$id";

    if(mysqli_query($conn, $update_sql)){
        header("Location: index.php"); // redirect back to main screen
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="edit-container">
        <h2 class="center">Edit Student</h2>
        <form method="POST" action="" class="edit-form">
            <div class="form-row">
                <label>Name:</label>
                <input type="text" name="name" value="<?php echo htmlspecialchars($student['name']); ?>" required>
            </div>
            <div class="form-row">
                <label>Course:</label>
                <input type="text" name="course" value="<?php echo htmlspecialchars($student['course']); ?>" required>
            </div>
            <div class="form-row">
                <label>Year Level:</label>
                <input type="text" name="year_level" value="<?php echo htmlspecialchars($student['year_level']); ?>" required>
            </div>
            <div class="form-row">
                <label>Email:</label>
                <input type="email" name="email" value="<?php echo htmlspecialchars($student['email']); ?>" required>
            </div>
            <input type="submit" name="submit" value="Save">
        </form>
    </div>
</body>
</html>
