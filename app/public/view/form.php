<?php
if (isset($_POST['username'])) {
    return;
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
    <title>NLFWD Checkout</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/checkout/">
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
    <link href="checkout.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container">
    <main>
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="../source/logo.svg" alt="" width="72" height="57">
            <h2>Checkout form</h2>
            <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form
                group has a validation state that can be triggered by attempting to submit the form without completing
                it.</p>
        </div>

        <div class="row g-5">
            <div class="col-md-5 col-lg-4 order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-primary"><?php echo $plan ?></span>
                    <span class="badge bg-primary rounded-pill">1</span>
                </h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0">Product name</h6>
                            <small class="text-muted">Brief description</small>
                        </div>
                        <span class="text-muted"><?php echo $price ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (Euro)</span>
                        <strong><?php echo "€" . $price ?></strong>
                    </li>
                </ul>
            </div>

            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3">Delivery details</h4>
                <form>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="firstName">First name</label>
                            <input type="text" class="form-control" id="firstName" value="value2">
                        </div>

                        <div class="col-sm-6">
                            <label for="lastName">Last name</label>
                            <input type="text" class="form-control" id="lastName" value="">
                        </div>

                        <div class="col-12">
                            <label for="email">Email</label>
                            <input type="text" id="email" class="form-control">
                        </div>

                        <div class="col-12">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" class="form-control">
                        </div>

                        <div class="col-12">
                            <h4 class="mb-3">Destination</h4>
                            <label for="destination" class="form-label">Package destination</label>
                            <input type="text" id="destination" class="form-control">
                        </div>
                    </div>

                    <h4 class="mb-3">Payment</h4>

                    <div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                   value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                iDeal
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2"
                                   value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                                Credit card
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3"
                                   value="option3">
                            <label class="form-check-label" for="exampleRadios3">
                                Paypal
                            </label>
                        </div>
                        <br/>
                        <br/>
                    </div>
                    <button name="submit" type="button" class="w-100 btn btn-primary" onclick="createPackage()">Pay and
                        Confirm
                    </button>
                </form>
            </div>
        </div>
    </main>
    <script>
        //const btn = document.getElementById('confirm');


        const destination = document.getElementById('destination');

        function createPackage() {

            if (destination.value == "") {
                alert("please fill in all fields in the form")
                return;
            }
            const packageData = {
                "plan": "<?php echo $plan ?>",
                "status": "Warehouse",
                "destination": destination.value,
            }

            fetch('/warehouse', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(packageData),
            })
                .then(out => {
                    location.href = "confirm";
                })
                .catch(err => console.error(err));

        }
    </script>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017–2021 Company Name</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Privacy</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
    </footer>
</div>

</body>
</html>
