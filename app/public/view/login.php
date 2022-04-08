<?php
if (isset($_SESSION)) {
    echo "session1";
} else {
    echo "nosession0";
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>NLFWD - Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="./../view/login.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
</head>
<body class="text-center">

<main class="form-signin">
    <form action="dashboard" method="POST">
        <img class="mb-4" src="../source/logo.svg" alt="" width="72" height="57"/>
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        <div class="form-floating">
            <input name="username" id="floatingInput" placeholder="Username">

        </div>
        <div class="form-floating">
            <input name="password" type="password" id="floatingPassword" placeholder="Password">

        </div>

        <button name="submit" type="submit" onclick="location.href='login';" class="btn btn-lg btn-primary">Sign in</button>

        <p class="mt-5 mb-3 text-muted">&copy;NLFWD</p>
    </form>

    <script>
        function login() {
            const username = document.getElementById('floatingInput');
            const password = document.getElementById('floatingPassword');
            if (username.value == "" || password.value == "") {
                alert("Please fill in both username and password")
                return;
            }
        }
    </script>
</main>

</body>
</html>

