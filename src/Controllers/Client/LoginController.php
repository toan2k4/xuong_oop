<?php

namespace Toannguyen\OopPhp3\Controllers\Client;

use Toannguyen\OopPhp3\Commons\Controller;
use Toannguyen\OopPhp3\Commons\Helper;
use Toannguyen\OopPhp3\Models\User;

class LoginController extends Controller
{

    private User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function showFormLogin()
    {
        auth_check();
        $this->renderViewClient('login');
    }

    public function login()
    {
        auth_check();
        try {
            $user = $this->user->findByEmail($_POST['email']);
            if (empty($user)) {
                throw new \Exception('Không tồn tại Email: ' . $_POST['email']);
            }

            if (password_verify($_POST['password'], $user['password'])) {
                $_SESSION['user'] = $user;
                header('location: ' . url('admin/'));
                exit;
            }
            throw new \Exception('password không đúng: ');
        } catch (\Throwable $th) {
            flash('errors', $th->getMessage(), 'login');
        }

    }

    public function logout()
    {
        unset($_SESSION['user']);
        header('location: ' . url());
        exit;
    }
}