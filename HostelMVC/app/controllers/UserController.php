<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $this->view('user/login');
    }

    public function login()
    {
        session_start();
        $emailreg = $_POST['emailreg'];
        $password = $_POST['password'];

        $userModel = $this->model('User');
        $user = $userModel->findUser($emailreg, $password);

        if ($user) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['login'] = $emailreg;
            $uip = $_SERVER['REMOTE_ADDR'];
            $ldate = date('d/m/Y h:i:s', time());
            
            $ip = $_SERVER['REMOTE_ADDR'];
            $geopluginURL = 'http://www.geoplugin.net/php.gp?ip=' . $ip;
            $addrDetailsArr = unserialize(file_get_contents($geopluginURL));
            $city = $addrDetailsArr['geoplugin_city'];
            $country = $addrDetailsArr['geoplugin_countryName'];
            
            $userModel->logUser($user['id'], $emailreg, $ip, $city, $country);
            
            header("Location: /public/dashboard.php");
        } else {
            echo "<script>alert('Invalid Username/Email or password');</script>";
            $this->view('user/login');
        }
    }
}
