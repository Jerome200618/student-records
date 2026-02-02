<?php
include 'includes/db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Records</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Student Records</h2>

        <!-- Top controls: Add button + Search -->
        <div class="top-controls">
            <a href="add.php" class="add-button">Add New Student</a>
            <input type="text" id="searchInput" placeholder="Search students...">
        </div>

        <!-- Student table -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Year Level</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM students";
                $result = mysqli_query($conn, $sql);

                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['course']."</td>";
                        echo "<td>".$row['year_level']."</td>";
                        echo "<td>".$row['email']."</td>";
                        echo "<td>
                                <a href='edit.php?id=".$row['id']."' class='edit'>Edit</a>
                                <a href='delete.php?id=".$row['id']."' class='delete'>Delete</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No students found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- JS inclusion -->
    <script src="js/script.js"></script>
</body>
</html>
