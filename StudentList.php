<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student List</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="sidebar">
    <div class="dropdown">
        <div class="dropdown-toggle" onclick="toggleDropdown()">
            Admin
        </div>
        <div class="dropdown-content" id="dropdown-content">
            <a href="addstudent.php" class="btn">Add Student</a>
            <a href="#" onclick="confirmLogout()">Logout</a>
        </div>
    </div>
</div>

<div class="container">
    <h1>Student List</h1>
    <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search for student...">
    <table border="1">
        <tr>
            <th>Rollno</th>
            <th>Student Fullname</th>
            <th>Address</th>
            <th>Email</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        <?php
        include "db_conn.php";
        if(isset($_GET['delete_id'])) {
            $id = $_GET['delete_id'];
            $sql = "DELETE FROM students WHERE Rollno='$id'";
            if(mysqli_query($conn, $sql)) {
                header("Location: StudentList.php");
                exit();
            } else {
                echo "<h2>Error deleting record:</h2><p class='error-message'>" . mysqli_error($conn) . "</p>";
            }
        }
        $sql = "SELECT * FROM students";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {        
        ?>
        <tr>
            <td><?php echo $row['Rollno']; ?></td>
            <td><?php echo $row['Sname']; ?></td>
            <td><?php echo $row['Address']; ?></td>
            <td><?php echo $row['Email']; ?></td>
            <td>
            <a href="studentedit.php?id=<?php echo $row['Rollno']; ?>" class="btn edit">Edit</a>
</td> 
<td>
    <a href="StudentList.php?delete_id=<?php echo $row['Rollno']; ?>" class="btn delete" onclick="return confirm('Are you sure you want to delete this student?')">Delete</a>
</td> 
        </tr>
        <?php
        }
        ?>
    </table>
</div>
<script>
    function toggleDropdown() {
        var dropdownContent = document.getElementById("dropdown-content");
        dropdownContent.style.display = (dropdownContent.style.display === "block") ? "none" : "block";
    }
    function confirmLogout() {
        if (confirm("Are you sure you want to logout?")) {
            window.location.href = "logout.php";
        }
    }
    function searchTable() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.querySelector("table");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1]; // Change index to the column you want to search (1 for Student Fullname)
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}



</script>
</body>
</html>
