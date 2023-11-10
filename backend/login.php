<?php
session_start();

include "../backend/db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = ? AND password = ?";
    $stmt = mysqli_prepare($connection, $query);

    mysqli_stmt_bind_param($stmt, "ss", $email, $password);

    mysqli_stmt_execute($stmt);

    $query_result = mysqli_stmt_get_result($stmt);

    if ($query_result) {
        if (mysqli_num_rows($query_result) > 0) {
            $_SESSION['loggedin'] = true;
            header('Location: ../frontend/home.php');
            exit;
        } else {
            $error = 'Invalid password';
        }
    } else {
        $error = 'User not found';
    }

    mysqli_stmt_close($stmt);
}
?>

<?php
// session_start();

// if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
//     header("Location: ../frontend/login.php");
//     exit;
// }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav>

    </nav>
    <main>
        <section>

        </section>
        <section>
            
        </section>

    </main>
    <footer>

    </footer>
</body>
</html>