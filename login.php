<?php
// Include the database information
include 'database_info.php';

// Start the session
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the input values
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate the username and password (you should add more secure validation)
    if ($username && $password) {
        // Check the database for the user
        $stmt = $p->prepare("SELECT * FROM EMPLOYEE WHERE LOWER (Name) = LOWER(:username)");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Debug information
        echo "Username: $username, Password: $password<br>";
        echo "Database query error: " . json_encode($stmt->errorInfo()) . "<br>";
        echo "Fetched user data: " . json_encode($user) . "<br>";

        if ($user) {
            
            if ($password === $user['Password']) {
                // Login successful, set session variables
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $user['ROLE'];

                // Debug information
                echo "Password verification successful<br>";

                // Redirect based on the user's role
                switch ($_SESSION['role']) {
                    case 'associate':
                        echo "Redirecting to employee.php...<br>";
                        echo '<script>window.location.href = "employee.php";</script>';
                        exit();
                    case 'owner':
                        echo "Redirecting to owner.php...<br>";
                        echo '<script>window.location.href = "owner.php";</script>';
                        exit();
                    default:
                        echo "Unknown role: " . $_SESSION['role'] . "<br>";
                }
            } else {
                $loginError = "Invalid password.";
            }
        } else {
            $loginError = "User not found.";
        }
    } else {
        $loginError = "Username and password are required.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

<?php
// Display login error if exists
if (isset($loginError)) {
    echo "<p style='color: red;'>$loginError</p>";
}
?>

<form action="login.php" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <button type="submit">Login</button>
    <button type="button" onclick="window.location.href='homepage.php';">Go to Homepage</button>
</form>

</body>
</html>
