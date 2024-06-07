<?php 

namespace Toannguyen\OopPhp3\Controllers\Client;
use Toannguyen\OopPhp3\Commons\Controller;

class ProductController extends Controller{

    public function index(){
        echo __CLASS__ . '@' . __FUNCTION__;
        
    }

    public function detail($id){
        echo __CLASS__ . '@' . __FUNCTION__ . '@' . $id;
        
    }
}