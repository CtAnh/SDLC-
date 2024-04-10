<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <link rel="stylesheet" href="stylestudent2.css">
</head>
<body>
    <div class="sidebar">
        <div class="dropdown">
            <div class="dropdown-toggle" onclick="toggleDropdown()">
                User
            </div>
            <div class="dropdown-content" id="dropdown-content">
                <a href="#">Course</a>
                <a href="#">Subject</a>
                <a href="#">Class</a>
                <a href="#">Teacher</a>
                <a href="logout.php" onclick="return confirm('Are you sure you want to logout?')">Logout</a>
            </div>
        </div>
    </div>
    <div class="container">
        <h1>Student List</h1>
        <div class="search-bar">
    <input type="text" class="search-input" placeholder="Search..." onkeyup="searchFunction()">
</div>
        <table align="center" border="1px" cellpadding="5" cellspacing="0" id="studentTable">
            <thead>
                <tr>
                    <th>Roll No</th>
                    <th>Student Full Name</th>
                    <th>Address</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "db_conn.php";
                $sql = "SELECT * FROM students";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($result)) {        
                ?>
                <tr>
                    <td><?php echo $row['Rollno']; ?></td>
                    <td><?php echo $row['Sname']; ?></td>
                    <td><?php echo $row['Address']; ?></td>
                    <td><?php echo $row['Email']; ?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        function searchFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.querySelector(".search-input");
            filter = input.value.toUpperCase();
            table = document.getElementById("studentTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
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

        function toggleDropdown() {
            var dropdownContent = document.getElementById("dropdown-content");
            dropdownContent.classList.toggle("show");
        }

        window.onclick = function(event) {
            if (!event.target.matches('.dropdown-toggle')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }

    </script>
</body>
</html>
