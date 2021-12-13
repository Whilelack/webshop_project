<?php
$message = '';
if (isset($_COOKIE['cookie'])) {
    $cookie_data = unserialize($_COOKIE['cookie'], ["allowed_classes" => false]);
    if ($cookie_data['uname'] != '') {
        header("Location: /", true);
    } else {
        $message = $cookie_data['message'];
    }
}
?>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Jacfac</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/signin.css" rel="stylesheet" />
</head>

<body class="text-center">
    <main class="form-signin">
        <form action="checker.php" method="POST">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <div class="form-floating">
                <input type="text" class="form-control" id="uname" placeholder="username" name="uname" required>
                <label for="uname">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="pword" placeholder="Password" name="pword" required>
                <label for="pword">Password</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        </form>
        <?php
            echo $message;
        ?>
    </main>
</body>