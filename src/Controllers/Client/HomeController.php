<?php 

namespace Toannguyen\OopPhp3\Controllers\Client;
use Toannguyen\OopPhp3\Commons\Controller;
use Toannguyen\OopPhp3\Commons\Helper;
use Toannguyen\OopPhp3\Models\User;

class HomeController extends Controller{

    public function index(){

        $user = new User();

        // Helper::debug($user);

        $this->renderViewClient('home', [
            'name'=> 'hihi'
        ]);
    }
}