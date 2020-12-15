<?php
    require_once('php/config.php');
    require_once('php/sqlmap_waf.php');

    $loginStatus = NULL;
    $account = NULL;
    $wafPassed = True;
    $username = $_POST['ctf_username'];
    $password = $_POST['ctf_password'];
    $ip = get_ip_address();

    if (isset($username) && isset($password)) {
        error_log('POST: [' . $username . '] ['. $password . ']');
        if (!sqlmap_waf($username) || !sqlmap_waf($password)) {
            $wafPassed = False;
            ban_ip($ban_db, $ip);
        }
        if ($wafPassed && check_if_banned($ban_db, $ip)) {
            $wafPassed = False;
        }
        if ($wafPassed) {
            // try to login
            $sql = "SELECT * FROM users WHERE `username` = '$username' AND `password` = '$password';";
            $stmt = $user_db->query($sql);

            if ($stmt === False) {
                print_r($user_db->errorInfo());
                die();
            } else if (count($stmt->fetchAll()) > 0) {
                $loginStatus = True;
            } else {
                $loginStatus = False;
            }
        } else {
            // display injected page
            $loginStatus = True;
        }
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Vongola">
    <title>PIKA Inj</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
    <link href="css/rainbow.css" rel="stylesheet">
  </head>
  <body class="text-center" style="display:block;padding: 0;">
<?php
    if ($loginStatus === True) {
?>
    <div class="text-center d-flex justify-content-center flex-column" style="height: 100vh">
        <h1 class="rainbow" style="font-size: 5rem;">Login Success!</h2>
        <p style="font-size: 3em;">
            Flag 1: ADLCTF{51mpl3_5ql_1nj3c710n} <br>
            Flag 2 is in the db, try to find it.
        </p>
        <i style="color: gray; font-size: 14px; position: absolute; bottom: 4px; right: 8px; text-align: right">
            I don't like sqlmap.<br>
            No, for real don't use it!
        </i>
    </div>
<?php
    } else {
        if ($loginStatus === False) {
            echo '<div class="alert alert-danger" role="alert">Login Failed! Try again!</div>';
        }
?>
    <div class="text-center d-flex align-items-center" style="height: 90%">
        <form class="form-signin" action="login.php" method="POST">
            <img class="mb-4" src="img/pika_login.jpg" width=300></img>
            <h1 class="h3 mb-3 font-weight-normal">Please PIKA</h1>
            <label for="inputUsername" class="sr-only">Username</label>
            <input type="text" id="inputUsername" class="form-control" placeholder="Username" name="ctf_username" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="text" id="inputPassword" class="form-control" placeholder="Password" name="ctf_password" required>
            <div class="checkbox mb-3">
                <label>
                <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>
    </div>
<?php
    }
?>
    <script src="js/jquery-slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
