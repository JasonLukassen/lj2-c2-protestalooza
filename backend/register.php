<?php
session_start();

include "../backend/db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($connection, $query);

    mysqli_stmt_bind_param($stmt, "ss", $email, $password);

    mysqli_stmt_execute($stmt);

    $query_result = mysqli_stmt_get_result($stmt);


    if ($query_result) {
        if (!mysqli_num_rows($query_result) > 0) {
            $query = "INSERT INTO users (name, email, password) VALUES ($name, $email, $password)";
            mysqli_query($connection, $query);
            $_SESSION['loggedin'] = true;
            header('Location: ../home.php');
            exit;
        } else {
            $error = 'Email already in use';
        }
    } else {
        $error = 'Something went wrong';
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