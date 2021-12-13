<?php
$server_name = "";
$server_username = "";
$server_password = "";
$server_database = "";


$mysqli = new mysqli($server_name, $server_username, $server_password, $server_database);

// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

$given_uname = mysqli_real_escape_string($mysqli, $_POST["uname"]);
$given_pword = mysqli_real_escape_string($mysqli, $_POST["pword"]);

$query = "SELECT * FROM users WHERE username = '$given_uname'";
$result = $mysqli->query($query);

$username = $message = '';

// Perform query
if ($result->num_rows > 0) {
    $top_row = $result->fetch_all()[0];
    if ($top_row[2] == $given_pword) {
        $message = "Login Succesfull";
        $username = $top_row[1];
    } else {
        $message = "Incorect username or password";
    }
} else {
    $message = "User not found";
}
// Free result set
$result->free_result();
$mysqli->close();

$cookie_values = ['uname' => $username, 'message' => $message];
setcookie('cookie', serialize($cookie_values), time() + (86400 * 30), "/");

header("Location: login.php", true);
