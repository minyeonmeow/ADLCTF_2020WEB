<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PIKA PIKA</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="height: 100vh;">
    <div class="text-center d-flex align-items-center justify-content-center" style="height: 100%">
        <form class="form-signin" action="#">
            <img class="mb-4" src="img/pika_login.jpg" alt="">
            <h1 class="h3 mb-3 font-weight-normal">Please pika.</h1>
            <label for="inputUsername" class="sr-only">Username</label>
            <input type="text" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>
    </div>
    <script src="js/jquery-slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/md5.min.js"></script>
    <script>
        function login(username, password) {
            if (checkUsername(username) && checkPassword(password)) {
                window.location = "./login.php?user=" + username + "&pass=" + password;
            }
        }

        function checkPassword(password) {
            if (password.trim())
                return true;

            alert("Password empty!!!");
            return false;
        }

        function checkUsername(username) {
            if (username.trim())
                return true;

            alert("Username empty!!!");
            return false;
        }

        document.querySelector('form').addEventListener('submit', function(event) {
            event.preventDefault();
            var username = document.querySelector('input#inputUsername').value;
            var password = document.querySelector('input#inputPassword').value;
            login(username, password);
        }, false);
    </script>
</body>
</html>
