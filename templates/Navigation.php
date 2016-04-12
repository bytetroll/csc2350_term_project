<nav>
    <ul>
        <?php if (isset($_SESSION[ "User" ])): ?>
            <li><a href="User.php">User</a></li>
        <?php else: ?>
            <li><a href="Login.php">Login</a></li>
            <li><a href="Register.php">Register</a></li>
        <?php endif ?>
    </ul>
</nav>