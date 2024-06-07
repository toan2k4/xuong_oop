<?php 

const PATH_ROOT = __DIR__ . '/';

if (!function_exists('asset')) {
    function asset($path) {
        return $_ENV['BASE_URL'] . $path;
    }
}

if (!function_exists('url')) {
    function url($uri = null) {
        return $_ENV['BASE_URL'] . $uri;
    }
}

if (!function_exists('flash')) {
    function flash($key,$msg,$route)  {
        $_SESSION[$key] = $msg;
        switch ($key) {
            case 'success':
                unset($_SESSION['errors']);
                break;
            case 'errors':
                unset($_SESSION['success']);
                break;
        }
        header('location:'. $_ENV['BASE_URL'] .$route.'?msg='.$key);die;
    }
}

if (!function_exists('auth_check')) {
    function auth_check() {
       if(isset($_SESSION['user'])){
        header('location: ' . url('admin/'));
       }
    }
}