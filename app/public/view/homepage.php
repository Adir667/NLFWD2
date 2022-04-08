<?php

//session_start();
if (isset($_SESSION['User'])) {
    echo "session1";
}
else {
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
    <title>Pricing example · Bootstrap v5.1</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/pricing/">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

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
    <link href="pricing.css" rel="stylesheet">
</head>
<body>

<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap"/>
                </svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
                <li><a href="#" class="nav-link px-2 text-white">About</a></li>
            </ul>
            <div class="text-end">
                <?php
                if (!isset($_SESSION['User'])) { ?>
                    <button id="btnlogin" type="button" onclick="location.href='login';"
                            class="btn btn-outline-light me-2">Login
                    </button>
                <?php } else { ?>
                    <button id="btnlogin" type="button" onclick="location.href='dashboard';"
                            class="btn btn-outline-light me-2">Dashboard
                    </button>
                <?php }
                ?>
            </div>
        </div>
    </div>
</header>

<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="check" viewBox="0 0 16 16">
        <title>Check</title>
        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
    </symbol>
</svg>

<div class="container py-3">
    <header>

        <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
            <h1 class="display-4 fw-normal">Welcome to NLFWD</h1>
            <p class="fs-5 text-muted">We offer 3 plans for you to send you packages</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At ex hic quo voluptas! A ab, animi cupiditate
                deserunt dignissimos dolorum ducimus eos magni minima modi nesciunt nisi non, nostrum, nulla optio
                perferendis possimus quae quos saepe voluptatem! Accusamus deserunt dolore qui quia voluptatibus. Amet,
                cum hic ipsam porro repellendus voluptatum.</p>
            <img src="../source/logo.svg"></img>
        </div>
    </header>

    <main>
        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">Basic</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">10€</h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>Deliver within 5 business days</li>
                            <li>Weight up to 5kg</li>
                            <li></li>
                        </ul>
                        <button id="basic" onclick="location.href = 'basic'"; type="button" class="w-100 btn btn-lg btn-outline-primary">Basic</button>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">Plus</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">25€</h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>Deliver within 3 business days</li>
                            <li>Weight up to 12kg</li>
                            <li>Get a tracking number</li>
                        </ul>
                        <button id="adminTemp" type="button" class="w-100 btn btn-lg btn-primary">AdminTemp!</button>
                        <script type="text/javascript">
                            document.getElementById("adminTemp").onclick = function () {
                                location.href = "dashboard";
                            };
                        </script>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm border-primary">
                    <div class="card-header py-3 text-white bg-primary border-primary">
                        <h4 class="my-0 fw-normal">Premium</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">60€</h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>Deliver within 24 hours</li>
                            <li>Weight up to 35kg</li>
                            <li>Also in the weekend</li>
                        </ul>
                        <button type="button" onclick="location.href = 'premium'"; class="w-100 btn btn-lg btn-primary">Premium</button>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="display-6 text-center mb-4">Compare plans</h2>

        <div class="table-responsive">
            <table class="table text-center">
                <thead>
                <tr>
                    <th style="width: 34%;"></th>
                    <th style="width: 22%;">Basic</th>
                    <th style="width: 22%;">Plus</th>
                    <th style="width: 22%;">Premium</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row" class="text-start">Public</th>
                    <td>
                        <svg class="bi" width="24" height="24">
                            <use xlink:href="#check"/>
                        </svg>
                    </td>
                    <td>
                        <svg class="bi" width="24" height="24">
                            <use xlink:href="#check"/>
                        </svg>
                    </td>
                    <td>
                        <svg class="bi" width="24" height="24">
                            <use xlink:href="#check"/>
                        </svg>
                    </td>
                </tr>
                <tr>
                    <th scope="row" class="text-start">Private</th>
                    <td></td>
                    <td>
                        <svg class="bi" width="24" height="24">
                            <use xlink:href="#check"/>
                        </svg>
                    </td>
                    <td>
                        <svg class="bi" width="24" height="24">
                            <use xlink:href="#check"/>
                        </svg>
                    </td>
                </tr>
                </tbody>

                <tbody>
                <tr>
                    <th scope="row" class="text-start">Permissions</th>
                    <td>
                        <svg class="bi" width="24" height="24">
                            <use xlink:href="#check"/>
                        </svg>
                    </td>
                    <td>
                        <svg class="bi" width="24" height="24">
                            <use xlink:href="#check"/>
                        </svg>
                    </td>
                    <td>
                        <svg class="bi" width="24" height="24">
                            <use xlink:href="#check"/>
                        </svg>
                    </td>
                </tr>
                <tr>
                    <th scope="row" class="text-start">Sharing</th>
                    <td></td>
                    <td>
                        <svg class="bi" width="24" height="24">
                            <use xlink:href="#check"/>
                        </svg>
                    </td>
                    <td>
                        <svg class="bi" width="24" height="24">
                            <use xlink:href="#check"/>
                        </svg>
                    </td>
                </tr>
                <tr>
                    <th scope="row" class="text-start">Unlimited members</th>
                    <td></td>
                    <td>
                        <svg class="bi" width="24" height="24">
                            <use xlink:href="#check"/>
                        </svg>
                    </td>
                    <td>
                        <svg class="bi" width="24" height="24">
                            <use xlink:href="#check"/>
                        </svg>
                    </td>
                </tr>
                <tr>
                    <th scope="row" class="text-start">Extra security</th>
                    <td></td>
                    <td></td>
                    <td>
                        <svg class="bi" width="24" height="24">
                            <use xlink:href="#check"/>
                        </svg>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </main>

    <!--  <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">-->
    <!--    <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">-->
    <!--  </form>-->

    <footer class="pt-4 my-md-5 pt-md-5 border-top">
        <div class="row">
            <div class="col-12 col-md">
                <img class="mb-2" src="../assets/brand/bootstrap-logo.svg" alt="" width="24" height="19">
                <small class="d-block mb-3 text-muted">&copy; 2017–2021</small>
            </div>
            <div class="col-6 col-md">
                <h5>Features</h5>
                <ul class="list-unstyled text-small">
                    <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Cool stuff</a></li>
                    <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Random feature</a></li>
                    <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Team feature</a></li>
                    <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Stuff for developers</a>
                    </li>
                    <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Another one</a></li>
                    <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Last time</a></li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>Resources</h5>
                <ul class="list-unstyled text-small">
                    <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Resource</a></li>
                    <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Resource name</a></li>
                    <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Another resource</a></li>
                    <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Final resource</a></li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>About</h5>
                <ul class="list-unstyled text-small">
                    <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Team</a></li>
                    <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Locations</a></li>
                    <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Privacy</a></li>
                    <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Terms</a></li>
                </ul>
            </div>
        </div>
    </footer>
</div>


</body>
</html>
