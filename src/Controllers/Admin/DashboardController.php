<?php 

namespace Toannguyen\OopPhp3\Controllers\Admin;
use Toannguyen\OopPhp3\Commons\Controller;

class DashboardController extends Controller{

    public function dashboard(){
        $this->renderViewAdmin(__FUNCTION__);
    }
}