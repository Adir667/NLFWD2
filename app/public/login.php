<?php

if (isset($_POST['login'])) {

    $name = $_POST['username'];
    $password = $_POST['password'];

    echo $name . $password;

}
