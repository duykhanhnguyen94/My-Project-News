<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class SliderModel extends Model
{
    protected $table = 'slider as s';
    protected $primary = 'id';
    public $timestamps = false;
    const CREATED_AT = 'cteated';
    const UPDATED_AT = 'modified';

    public function listItems($params = null, $option){
        $result = null;
        // echo '<pre style="color:red">';
        // print_r($params);
        // echo '</pre>';
        if($option['task'] == 'admin-list-item'){
            $query = $this->select('s.id', 's.name', 's.description', 's.link', 's.thumb', 's.status', 's.created', 's.created_by', 's.modified', 's.modified_by');
            // ->where('id', '>', 4)
            if(isset($params['filter']['status']) && $params['filter']['status'] != 'all'){
                $query->where('status', '=', $params['filter']['status']);
            }
            $result = $query->get()->toArray();
        }

        return $result;
    }

    public function countItems($params = null, $option){
        $result = null;
        if($option['task'] == 'admin-count-item-group-by-status'){
            $result = $this->select(DB::raw('count(*) as count, status'))
            ->groupBy('status')
            ->get()
            ->toArray();
        }

        return $result;
    }

    



}
