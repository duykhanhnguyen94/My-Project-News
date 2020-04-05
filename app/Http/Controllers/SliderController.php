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
        $this->params['pagination']['totalItemperPage'] = 1;
        $this->model = new MainModel();
        view()->share('controllerName' , $this->controllerName);
    }
    
    public function index(Request $request){
        $this->params['filter']['status'] = $request->input('filter_status');
        // dd($params);
        // $test = $this->model->listItems(null, ['task' => 'admin-list-item']);
        $items            = $this->model->listItems($this->params, ['task' => 'admin-list-item']);
        $countItemsStatus = $this->model->countItems($this->params, ['task' => 'admin-count-item-group-by-status']);
        // echo '<pre style="color:red">';
        // print_r($countItemsStatus);
        // echo '</pre>';
        // dd();
        return view($this->pathViewController . 'index', [
            'items'            => $items,
            'params'           => $this->params,
            'countItemsStatus' => $countItemsStatus,
        ]);
    }
}
