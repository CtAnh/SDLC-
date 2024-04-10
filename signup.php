<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign Up</title>
<link rel="stylesheet" href="stylesigup1.css">
</head>
<body>
<div class="signup-container">
    <form action="signup-check.php" method="post">
        <h2>Sign Up</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <?php if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>

        <div class="input-group">
            <label for="name">Name</label>
            <?php if (isset($_GET['name'])) { ?>
                <input type="text" name="name" id="name" placeholder="Name" value="<?php echo $_GET['name']; ?>">
            <?php } else { ?>
                <input type="text" name="name" id="name" placeholder="Name">
            <?php } ?>
        </div>

        <div class="input-group">
            <label for="uname">User Name</label>
            <?php if (isset($_GET['uname'])) { ?>
                <input type="text" name="uname" id="uname" placeholder="User Name" value="<?php echo $_GET['uname']; ?>">
            <?php } else { ?>
                <input type="text" name="uname" id="uname" placeholder="User Name">
            <?php } ?>
        </div>

        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Password">
        </div>

        <div class="input-group">
            <label for="re_password">Re-enter Password</label>
            <input type="password" name="re_password" id="re_password" placeholder="Re-enter Password">
        </div>

        <button type="submit" class="btn">Sign Up</button>
        <p class="ca">Already have an account? <a href="index.php">Sign In</a></p>
    </form>
</div>
</body>
</html>
