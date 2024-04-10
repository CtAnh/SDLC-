<?php
// Include DB connection
include "db_conn.php";

// Initialize variables
$Rollno = $Sname = $Address = $Email = "";
$error = "";

// Add Student
if(isset($_POST['btnAdd'])) {
    $Rollno = $_POST['Rollno'];
    $Sname = $_POST['Sname'];
    $Address = $_POST['Address'];
    $Email = $_POST['Email'];

    // Validate input
    if(empty($Rollno) || empty($Sname) || empty($Address) || empty($Email)) {
        $error = "(*) Fields cannot be empty";
    } else {
        // Check if student already exists
        $sql_check = "SELECT Rollno FROM students WHERE Rollno='$Rollno'";
        $result_check = mysqli_query($conn, $sql_check);
        if(mysqli_num_rows($result_check) == 0) {
            // Insert new student
            $sql_insert = "INSERT INTO students (Rollno, Sname, Address, Email) VALUES ('$Rollno', '$Sname', '$Address', '$Email')";
            if(mysqli_query($conn, $sql_insert)) {
                header("Location: StudentList.php"); // Redirect to student list page after successful insertion
                exit();
            } else {
                $error = "Error: " . $sql_insert . "<br>" . mysqli_error($conn);
            }
        } else {
            $error = "Student already exists";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Student</title>
<link rel="stylesheet" href="styleadd.css">
</head>
<body>
<div class="container">
    <h1>Add Student</h1>

    <!-- Form to add a new student -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="text" name="Rollno" placeholder="Rollno" value="<?php echo $Rollno; ?>">
        <input type="text" name="Sname" placeholder="Student Name" value="<?php echo $Sname; ?>">
        <input type="text" name="Address" placeholder="Address" value="<?php echo $Address; ?>">
        <input type="email" name="Email" placeholder="Email" value="<?php echo $Email; ?>">
        <input type="submit" name="btnAdd" value="Add Student">
        <a href="StudentList.php" class="btn-cancel">Cancel</a> <!-- Nút Quay lại -->
        <span class="error"><?php echo $error; ?></span> <!-- Display error message -->
    </form>
</div>
</body>
</html>
