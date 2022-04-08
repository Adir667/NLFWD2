<?php


class SwitchRouter
{

    public function route($uri, $method, $body, $path)
    {

        switch ($uri) {
            case '':
            case '/':
            case 'index':
                require __DIR__ . '/controller/HomeController.php';
                $controller = new HomeController();
                $controller->home();
                break;

            case 'about':
                require __DIR__ . '/controller/HomeController.php';
                $controller = new HomeController();
                $controller->about();
                break;

            case 'login':
                require __DIR__ . '/controller/HomeController.php';
                $controller = new HomeController();
                $controller->login();
                break;

            case 'login?':
                if ($method === 'POST') {
                    if (!isset($_POST['password'])) {
                        echo "no pass";
                    }
                    require __DIR__ . '/controller/UserController.php';
                    $controller = new UserController();
                    if ($controller->login(($_POST["username"]), ($_POST["password"]))) {
                        require __DIR__ . '/controller/PackageController.php';
                        $controller = new PackageController();
                        $controller->adminDashboard();
                    } else {
                        require __DIR__ . '/controller/HomeController.php';
                        $controller = new HomeController();
                        $controller->login();
                    }
                } else {
                    require __DIR__ . '/controller/HomeController.php';
                    $controller = new HomeController();
                    $controller->login();
                }

                break;

            case 'dashboard':
                if (isset($_SESSION['User'])) {
                    require __DIR__ . '/controller/PackageController.php';
                    $controller = new PackageController();
                    $controller->adminDashboard();
                } else if ($method === 'POST') {
                    require __DIR__ . '/controller/UserController.php';
                    $controller = new UserController();
                    if ($controller->login(($_POST["username"]), ($_POST["password"]))) {
                        require __DIR__ . '/controller/PackageController.php';
                        $controller = new PackageController();
                        $controller->adminDashboard();
                    } else {
                        header("location: ../login?");
                    }
                } else {
                    http_response_code(403);
                }

                break;

            case 'basic':
                require __DIR__ . '/controller/PackageController.php';
                $controller = new PackageController();
                $controller->form("Basic", 12);

            case 'plus':
                require __DIR__ . '/controller/PackageController.php';
                $controller = new PackageController();
                $controller->form("Plus", 23);

            case 'premium':
                require __DIR__ . '/controller/PackageController.php';
                $controller = new PackageController();
                $controller->form("Premium", 42);
                break;

            case 'confirm':
                require __DIR__ . '/controller/PackageController.php';
                $controller = new PackageController();
                $controller->confirm();
                break;

            case 'signout':
                header("location: ../index");
                require __DIR__ . '/controller/PackageController.php';
                $controller = new PackageController();
                $controller->signout();
                break;

            case 'warehouse':
                require __DIR__ . '/controller/PackageController.php';
                $controller = new PackageController();
                if ($method === 'POST' & $path == null) {
                    $controller->createPackage(json_decode($body, true));
                }
                if ($method === 'DELETE') {
                    $controller->deletePackage($path);
                }
                if ($method === 'GET' & $path == null) {
                    $controller->getWarehouse();
                }
                break;

            case
            'truck':
                require __DIR__ . '/controller/PackageController.php';
                $controller = new PackageController();
                if ($method === 'POST' & $path != null) {
                    $controller->loadToTruck($path);
                }
                if ($method === 'PUT' & $path != null) {
                    $controller->dropOff($path);
                }
                if ($method === 'GET' & $path == null) {
                    $controller->getTruck();
                }
                break;

                case 'delivered':
                require __DIR__ . '/controller/PackageController.php';
                $controller = new PackageController();
                if ($method === 'GET' & $path == null) {
                    $controller->getDelivered();
                }
                break;


            default:
                echo '404 not found';
                http_response_code(404);
        }
    }
}
