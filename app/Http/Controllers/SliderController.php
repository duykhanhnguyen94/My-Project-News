<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SliderModel as MainModel;

class SliderController extends Controller
{
    private $pathViewController = 'admin.pages.slider.';
    private $controllerName     = 'slider';
    private $model;
    private $params = [];

    public function __construct(){
        $this->model = new MainModel();
        view()->share('controllerName' , $this->controllerName);
    }
    
    public function index(){
        // $test = $this->model->listItems(null, ['task' => 'admin-list-item']);
        $items            = $this->model->listItems(null, ['task' => 'admin-list-item']);
        $countItemsStatus = $this->model->countItems(null, ['task' => 'admin-count-item-group-by-status']);
        // echo '<pre style="color:red">';
        // print_r($countItemsStatus);
        // echo '</pre>';
        return view($this->pathViewController . 'index', [
            'items'            => $items,
            'countItemsStatus' => $countItemsStatus,
        ]);
    }
}
